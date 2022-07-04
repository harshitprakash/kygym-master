<?php

namespace App\Http\Controllers;

use App\Models\Door;
use App\Models\FeeCollection;
use App\Models\packages;
use App\Models\PackRequest;
use App\Models\User;
use App\Models\user_info;
use DateInterval;
use DateTime;
use Exception;
use Google\Service\Storagetransfer\Date;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    /**
     * Display Page for Selection or Change of Package.
     *
     * @param array $user
     * @return Application|Factory|View
     */
    public function index($user)
    {
        return view('pages.package.select', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $uid = htmlspecialchars(stripslashes($id));
        $user = User::with('info')->find($uid);
        if ($user->info->door_access <= 3) {
            return (new PaymentController)->index($user);
        } else {
            return (new userController)->show(Crypt::encrypt($id));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Admin Page for finding user for fee Payment.
     *
     * @return Application|Factory|View
     */
    public function NewCollection()
    {
        return view('pages.payment.find');
    }

    /**
     * Showing the Cash Collection Requests applied by user.
     *
     * @return Application|Factory|View
     */
    public function CollectionRequests()
    {
        $history = PackRequest::where('status', '=', 0)->latest()->get();
        return view('pages.payment.requests', compact('history'));
    }

    /**
     * History of fee Collection by Online & Offline Method.
     *
     * @return Application|Factory|View
     */
    public function CollectionHistory()
    {
        $historyCash = FeeCollection::where('mode', 'cash')->get();
        $historyOnline = FeeCollection::where('mode', 'online')->get();
        return view('pages.payment.history', compact('historyCash', 'historyOnline'));
    }

    /**
     * @param array $req
     * @return array
     * @throws ValidationException
     */
    private function DataValidate($req) {
        return $this->validate($req, [
            'user' => 'required|integer|min:1',
            'package' => 'required|integer|min:1',
        ]);
    }

    /**
     * Show Payment Details & package information for processing the payment.
     *
     * @param Request $req
     * @return Application|Factory|View
     * @throws ValidationException
     */
    public function DisplayDetail(Request $req) {
        $data = $this->DataValidate($req);
        $user = htmlspecialchars(stripslashes($data['user']));
        $pack = htmlspecialchars(stripslashes($data['package']));
        $member = User::find($user);
        $package = packages::find($pack);
        return view('pages.payment.confirm', compact('member', 'package'));
    }

    /**
     * @param Request $value
     * @return RedirectResponse
     * @throws ValidationException
     * @throws Exception
     */
    public function PayCash(Request $value) {
        $req = $this->PayValidate($value);
        $member = $this->DecryptAnything($req['member']);
        $package = $this->DecryptAnything($req['package']);
        $exist = $this->CheckExist($member);
        if ($exist == true) {
            $store = PackRequest::create([
                'member' => $member,
                'package' => $package,
            ]);
            if (!$store) {
                return redirect()->back()->with('error', 'Something Went Wrong Try Again!');
            } else {
                if ($value['is_admin'] == 1) {
                    $request = $store;
//                    if ($data['discount']) {
//                        $discount = $data['discount'];
//                    } else {
//                        $discount = 0;
//                    }
                    $discount = 0;
                    $approve = $request->update([
                        'status' => 1,
                        'updated_by' => Auth::user()->id,
                        'remark' => 'Directly Collected from the Dashboard.',
                        'discount' => $discount,
                    ]);
                    if (!$approve) {
                        return redirect()->back()->with('error', 'Something Went Wrong! Try Again.');
                    } else {
                        $days = $request->Member->info->door_access;
                        $add = $request->Pack->duration;
                        $final = $days+$add;
                        $user = user_info::find($request->Member->info->id);
                        $update = $user->update([
                            'door_access' => $final,
                            'package_id' => $request['package'],
                        ]);
                        if (!$update) {
                            return redirect()->back()->with('error', 'Database Updated! Door Access Grant Failed!');
                        } else {
                            $packa = packages::find($package);
                            $paid = FeeCollection::create([
                                'member' => $member,
                                'package_id' => $packa['id'],
                                'mode' => 'Cash',
                                'amount' => $packa['price'],
                                'by' => Auth::user()->id,
                                'status' => 1,
                            ]);
                            if (!$paid) {
                                return redirect()->back()->with('error', 'Something Went Wrong!');
                            } else {
                                $pair = User::find($member);
                                $accesg = Door::where('member', $member)->get()->first();
                                $today = new DateTime(now());
                                $last_use = $pair->info->door_access;
                                $today->add(new DateInterval('P'.$last_use.'D'));
                                $allow = $today->format('Y-m-d');
                                $accesg->update([
                                    'access_till' => $allow,
                                ]);
                                return redirect()->back()->with('success', 'Fee Collected Successfully! Enjoy Access to GYM!.');
                            }
                        }
                    }
                } else {
                    return redirect()->route('dashboard')->with('success', 'Request Generated Pay Cash on Reception!');
                }
            }
        } else {
            $exist = PackRequest::where(['member' => $member, 'status' => '0'])->get()->first();
            $pack = $exist->update([
                'package' => $package,
            ]);
            if (!$pack) {
                return redirect()->back()->with('error', 'Something Went Wrong! Try Again!');
            } else {
                return redirect()->route('dashboard')->with('success', 'Cash Collection Request Updated! Pay on Reception.');
            }
        }
    }

    /**
     * @param string $val
     * @return string
     */
    private function DecryptAnything($val) {
        $data = Crypt::decrypt($val);
        return htmlspecialchars(stripslashes($data));
    }

    /**
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    private function PayValidate($data) {
        return $this->validate($data, [
            'member' => 'required|string',
            'package' => 'required|string',
            'is_admin' => 'nullable|integer',
        ]);
    }

    /**
     * @param $member
     * @return boolean
     */
    private function CheckExist($member) {
        $exist = PackRequest::where(['member' => $member, 'status' => '0'])->get()->first();
        if ($exist == null) {
            return true;
        } else {
            return false;
        }
    }

    public function Decline($id) {
        //
    }

    /**
     * @param $in
     * @return mixed
     */
    private function EncID($in) {
        $id = htmlspecialchars(stripslashes($in));
        $id = Crypt::decrypt($id);
        return PackRequest::find($id);
    }

    /**
     * Approval of Payment Request from User.
     *
     * @param Request $input
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function AcceptPayment(Request $input) {
        $data = $this->AcceptValid($input);
        $request = $this->PaymentRequest($data['requestID']);
        if ($data['discount']) {
            $discount = $data['discount'];
        } else {
            $discount = 0;
        }
        $approve = $request->update([
            'status' => 1,
            'updated_by' => Auth::user()->id,
            'remark' => $data['remark'],
            'discount' => $discount,
        ]);
        if (!$approve) {
            return redirect()->back()->with('error', 'Something Went Wrong! Try Again.');
        } else {
            $days = $request->Member->info->door_access;
            $add = $request->Pack->duration;
            $final = $days+$add;
            $user = user_info::find($request->Member->info->id);
            $update = $user->update([
                'door_access' => $final,
                'package_id' => $request['package'],
            ]);
            if (!$update) {
                return redirect()->back()->with('error', 'Database Updated! Door Access Grant Failed!');
            } else {
                $packa = packages::find($request['package']);
                $paid = FeeCollection::create([
                    'member' => $request['member'],
                    'package_id' => $packa['id'],
                    'mode' => 'Cash',
                    'amount' => $data['remark'],
                    'by' => Auth::user()->id,
                    'status' => 1,
                ]);
                if (!$paid) {
                    return redirect()->back()->with('error', 'Something Went Wrong!');
                } else {
                    return redirect()->back()->with('success', 'Fee Collected Successfully! Enjoy Access to GYM!.');
                }
            }
        }
    }

    /**
     * Accept Payment Input Validations.
     *
     * @param $input
     * @return array
     * @throws ValidationException
     */
    private function AcceptValid($input) {
        return $this->validate($input, [
            'requestID' => 'required|string',
            'remark' => 'required|string',
            'discount' => 'nullable|integer',
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    private function PaymentRequest($id) {
        $rid = Crypt::decrypt($id);
        $rid = htmlspecialchars(stripslashes($rid));
        return PackRequest::find($rid);
    }

    /**
     * @param $user
     * @return Application|Factory|View
     */
    public function MemberPayHistory($user) {
        $enc = Crypt::decrypt($user);
        $uid = htmlspecialchars(stripcslashes($enc));
        $member = User::find($uid);
        $history = PackRequest::where([['member', '=', $uid],['status', '=', 1]])->get();
        return view('pages.payment.history', compact('history', 'member'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function PaymentHandler(Request $request) {
        $use = $this->validate($request, [
            '_token' => 'required',
            'package' => 'required|string',
            'payment' => 'required|string',
            'member' => 'required|string',
            'is_admin' => 'nullable|integer',
            'discount' => 'nullable|integer',
        ]);

        $use['member'] = $this->DecryptAnything($use['member']);
        $use['package'] = $this->DecryptAnything($use['package']);
        $exist = PackRequest::where(['member' => $use['member'], 'status' => '0'])->get()->first();
        if ($exist == null) {
            $this->StoreNewPayment($use['member'], $use['package']);
        } else {
            $this->UpdateExisting($use['member'], $use['package']);
        }
        $data = PackRequest::where(['member' => $use['member'], 'status' => '0', 'package' => $use['package']])->get()->first();
        if ($use['is_admin'] == 1) {
            $status = $this->ApproveAdmin($data['id'], $use);
            if ($status == true) {
                return redirect()->route('member.show', Crypt::encrypt($use['member']))->with('success', 'Package Allotted Successfully!..');
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong! Try Again..');
            }
        } else {
            return redirect()->back()->with('success', 'Request Generated Successfully!..');
        }
    }

    /**
     * @param $input
     * @param $data
     * @return RedirectResponse
     * @throws Exception
     */
    public function CheckAndSortIfAdmin($input, $data) {
        if ($input['is_admin'] == 1) {
            $this->ApprovalByAdmin($input, $data);
        } else {
            return redirect()->route('member.index')->with('success', 'Request Generated Kindly Pay at Reception Desk!.');
        }
    }

    /**
     * @param $data
     * @param $value
     * @return RedirectResponse
     * @throws Exception
     */
    public function ApprovalByAdmin($data, $value): RedirectResponse {
        if ($data['discount'] > 0) {
            $discount = $data['discount'];
        } else {
            $discount = 0;
        }
        $value = PackRequest::find($value);
        $approve = $value->update([
            'status' => 1,
            'updated_by' => Auth::user()->id,
            'remark' => 'Directly Collected from the Dashboard.',
            'discount' => $discount,
        ]);
        if (!$approve) {
            return redirect()->route('member.index')->with('error', 'Something Went Wrong! Try Again.');
        } else {
            $days = $value->Member->info->door_access;
            $add = $value->Pack->duration;
            $final = $days+$add;
            $user = user_info::find($value->Member->info->id);
            $update = $user->update([
                'door_access' => $final,
                'package_id' => $value['package'],
            ]);
            if (!$update) {
                return redirect()->route('member.index')->with('error', 'Database Updated! Door Access Grant Failed!');
            } else {
                $packa = packages::find($data['package']);
                $paid = FeeCollection::create([
                    'member' => $data['member'],
                    'package_id' => $packa['id'],
                    'mode' => $data['payment'],
                    'amount' => ($packa['price']-$discount),
                    'by' => Auth::user()->id,
                    'status' => 1,
                ]);
                if (!$paid) {
                    return redirect()->route('member.index')->with('error', 'Something Went Wrong!');
                } else {
                    $pair = User::find($data['member']);
                    $accesg = Door::where('member', $data['member'])->get()->first();
                    $today = new DateTime(now());
                    $last_use = $pair->info->door_access;
                    $today->add(new DateInterval('P'.$last_use.'D'));
                    $allow = $today->format('Y-m-d');
                    $accesg->update([
                        'access_till' => $allow,
                    ]);
                    return redirect()->route('member.index')->with('success', 'Fee Collected Successfully! Enjoy Access to GYM!.');
                }
            }
        }
    }

    private function StoreNewPayment($member, $package) {
        return PackRequest::create([
            'member' => $member,
            'package' => $package,
        ]);
    }

    private function UpdateExisting($member, $package) {
        $exist = PackRequest::where(['member' => $member, 'status' => '0'])->get()->first();
        return $exist->update([
            'package' => $package,
        ]);
    }

    /**
     * @param $requestID
     * @param $input
     * @return bool
     * @throws Exception
     */
    private function ApproveAdmin($requestID, $input) {
        $request = PackRequest::find($requestID);
        $update = $request->update([
            'status' => '1',
            'updated_by' => Auth::user()->id,
            'remark' => 'Collected from without request.',
            'discount' => $input['discount'],
        ]);
        if ($update == true) {
            $days = $request->Member->info->door_access;
            $add = $request->Pack->duration;
            $final = $days+$add;
            $user = user_info::find($request->Member->info->id);
            $userInformation = $user->update([
                'door_access' => $final,
                'package_id' => $request['package'],
            ]);
            if ($userInformation == true) {
                $package = packages::find($input['package']);
                $paid = FeeCollection::create([
                    'member' => $input['member'],
                    'package_id' => $package['id'],
                    'mode' => $input['payment'],
                    'amount' => ($package['price']-$input['discount']),
                    'by' => Auth::user()->id,
                    'status' => 1,
                ]);
                if (!$paid) {
                    return false;
                } else {
                    $userDetail = User::find($input['member']);
                    $door = Door::where('member', $input['member'])->get()->first();
                    $today = new DateTime(now());
                    $last_use = $userDetail->info->door_access;
                    $today->add(new DateInterval('P'.$last_use.'D'));
                    $allow = $today->format('Y-m-d');
                    $open = $door->update([
                        'access_till' => $allow,
                    ]);
                    if ($open == true) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param Request $input
     * @throws ValidationException
     */
    public function ExistingControl(Request $input) {
        $this->validate($input, [
            '_token' => 'required',
            'package' => 'required|string',
            'member' => 'required|string',
            'expire' => 'required|date',
            'is_admin' => 'nullable|integer',
        ]);
        $date = date('d-m-Y');
        $value = date_diff(date_create($input['expire']), date_create($date));
        $final = $value->format("%d");
        $user = user_info::find(Crypt::decrypt($input['member']));
        $userInformation = $user->update([
            'door_access' => $final,
            'package_id' => Crypt::decrypt($input['package']),
        ]);
        if ($userInformation == true) {
            $userDetail = User::find(Crypt::decrypt($input['member']));
            $door = Door::where('member', Crypt::decrypt($input['member']))->get()->first();
            $today = new DateTime(now());
            $last_use = $userDetail->info->door_access;
            $today->add(new DateInterval('P'.$last_use.'D'));
            $allow = $today->format('Y-m-d');
            $open = $door->update([
                'access_till' => $allow,
            ]);
            if ($open == true) {
                return redirect()->back()->with('success', 'Existing Membership Updated Successfully!');
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!...');
            }
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong!...');
        }
    }

    public function OnlineDietPayment() {
        return view('pages.payment.onlinepayment');
    }

    public function OnlinePaymentInitiate(Request $request) {
        $pay = new Api(env('RAZORPAY_KEY', ''), env('RAZORPAY_SECRET', ''));
        dd($request);
    }
}
