<?php

namespace App\Http\Controllers;

use App\Models\Fingerprints;
use App\Models\RfidCard;
use App\Models\User;
use App\Models\Door;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Crypt;

class AccessMethodController extends Controller
{
    /**
     * @return Application|ResponseFactory|Response
     */
    public function CheckInitiation() {
        $get = Fingerprints::where(['machine' => null, 'finger' => null, 'added' => '0'])->get();
        $count = count($get);
        if ($count == 0) {
            $response = [
                'status' => false,
                'message' => 'User is not selected for finger binding!.....',
            ];
            return response($response, 404);
        } else if ($count == 1) {
            $response = [
                'status' => true,
                'message' => 'User is selected for finger binding!.....',
                'user' => Fingerprints::where(['machine' => null, 'finger' => null, 'added' => '0'])->get()->first(),
            ];
            return response($response, 200);
        } else if ($count > 1) {
            $response = [
                'status' => false,
                'message' => 'More than one user\'s are selected for binding!.....',
            ];
            return response($response, 403);
        } else {
            $response = [
                'status' => false,
                'message' => 'Something Went Wrong!.....',
            ];
            return response($response, 501);
        }

    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    public function AddFinger(Request $request) {
        $this->validate($request, [
            'finger_id' => 'required|string',
            'machine' => 'required|string',
        ]);

        $finger = $request['finger_id'];
        $machine = $request['machine'];
        $check = Fingerprints::where(['machine' => null, 'finger' => null, 'added' => '0'])->get()->first();
        if ($check == null) {
            $get = Fingerprints::where(['machine' => null, 'finger' => null, 'added' => '0'])->get()->first();
            if ($get == null) {
                $response = [
                    'status' => false,
                    'message' => 'User Has Been Removed Registeration Halted, Initiate data delete.',
                ];
                return response($response, 404);
            } else {
                $enter = $get->update([
                    'finger' => $finger,
                    'machine' => $machine,
                ]);
                if (!$enter) {
                    $response = [
                        'status' => false,
                        'message' => 'Something Went Wrong!..',
                    ];
                    return response($response, 501);
                } else {
                    $response = [
                        'status' => true,
                        'message' => 'Fingerprint registered Successfully...',
                        'user' => $enter,
                    ];
                    return response($response, 201);
                }
            }
        } else {
            $check->update([
                'finger' => $finger,
                'machine' => $machine,
                'added' => 1,
                'status' => 1,
            ]);
            $response = [
                'status' => true,
                'message' => 'Entry Inserted Successfully!.....',
            ];
            return response($response, 201);
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function InitiateFingerAdding() {
        $list = Fingerprints::where(['machine' => null, 'finger'=> null, 'added' => '0'])->get();
        return view('pages.accessAdding.finger', compact('list'));
    }

    /**
     * @param $user
     * @return RedirectResponse
     */
    public function AddInDatabase($user) {
        $user = htmlspecialchars(stripcslashes($user));
        $check = Fingerprints::where(['added' => '0', 'machine' => null, 'finger' => null])->get();
        if (count($check) == 0) {
            $qty = env('NUMBER_MACHINES');
            $total = Fingerprints::where(['member' => $user, 'status' => 1])->get();
            if (!$total) {
                return redirect()->route('initiate.finger')->with('error', 'User is Unavailable!');
            } else {
                if ($total >= $qty) {
                    $store = Fingerprints::create([
                        'member' => $user,
                    ]);
                    if (!$store) {
                        return redirect()->back()->with('error', 'Something Went Wrong!...');
                    } else {
                        return redirect()->route('initiate.finger')->with('success', 'Register your finger with machine using master card!');
                    }
                } else {
                    return redirect()->back()->with('info', 'Maximum allowed integration reached');
                }
            }
        } else {
            return redirect()->route('initiate.finger')->with('error', 'A user is already enrolled!');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function RemoveFromDB(Request $request) {
        $this->validate($request, [
            'identifier' => 'required|integer',
        ]);
        $id = htmlspecialchars(stripcslashes($request['identifier']));
        $application = Fingerprints::find($id);
        $application->delete();
        return redirect()->route('initiate.finger')->with('success', 'Application Deleted Successfully');
    }

    /**
     * @return Application|Factory|View
     */
    public function InitiateRFID() {
        $list = RfidCard::where(['card' => null, 'status' => '0'])->get();
        return view('pages.accessAdding.rfid', compact('list'));
    }

    /**
     * @param $user
     * @return RedirectResponse
     */
    public function AddRFIDInDatabase($user) {
        $user = htmlspecialchars(stripcslashes($user));
        $check = RfidCard::where(['status' => '0', 'card' => null])->get()->first();
        if ($check == null) {
            $push = RfidCard::create([
                'member' => $user,
            ]);
            if (!$push) {
                return redirect()->route('init.rfid')->with('error', 'Something Went Wrong! Try Again...');
            } else {
                return redirect()->route('init.rfid')->with('success', 'User registered Add Card Using Device!....');
            }
        } else {
            return redirect()->route('init.rfid')->with('error', 'A user is already enrolled for Card Registration!');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function RemoveRfIDFromDB(Request $request) {
        $this->validate($request, [
            'identifier' => 'required|integer',
        ]);
        $id = htmlspecialchars(stripcslashes($request['identifier']));
        $application = RfidCard::find($id);
        $application->delete();
        return redirect()->route('init.rfid')->with('success', 'Application Deleted Successfully');
    }

    /**
     * @param $user
     * @return RedirectResponse
     */
    public function BanMember($user) {
        $dec = Crypt::decrypt($user);
        $mid = htmlspecialchars(stripslashes($dec));
        $member = User::find($mid);
        $doorid = $member->Access->id;
        $door = Door::find($doorid);
        $member->update([
            'status' => 0,
        ]);
        $update = $door->update([
            'allow' => 0,
        ]);
        if (!$update) {
            return redirect()->back()->with('error', 'Something Went Wrong!....');
        } else {
            return redirect()->back()->with('success', 'Member is Successfully Banned!..');
        }
    }

    /**
     * @param $user
     * @return RedirectResponse
     */
    public function UnbanMember($user) {
        $dec = Crypt::decrypt($user);
        $mid = htmlspecialchars(stripslashes($dec));
        $member = User::find($mid);
        $doorid = $member->Access->id;
        $door = Door::find($doorid);
        $member->update([
            'status' => 1,
        ]);
        $update = $door->update([
            'allow' => 1,
        ]);
        if (!$update) {
            return redirect()->back()->with('error', 'Something Went Wrong!....');
        } else {
            return redirect()->back()->with('success', 'Member is Successfully Unbanned!..');
        }
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @throws ValidationException
     */
    public function AddRFID(Request $request) {
        //Code for Handling Register Request!..
        $this->validate($request, [
            'tag_id' => 'required|string',
        ]);
        $tag = $request['tag_id'];
        $exist = $this->CheckExist($tag);
        if ($exist == true) {
            $qty = count(RfidCard::where(['card' => null, 'status' => '0'])->get());
            if ($qty == 1) {
                $column = RfidCard::where(['card' => null, 'status' => '0'])->get()->first();
                $door = Door::where('member', $column['member']);
                $column->update([
                    'card' => $tag,
                    'status' => 1,
                ]);
                $update = $door->update([
                    'tag_id' => $tag,
                ]);
                if (!$update) {
                    $response = [
                        'status' => false,
                        'message' => 'Adding Failed Try Again!.....',
                    ];
                    return response($response, 501);
                } else {
                    $response = [
                        'status' => true,
                        'message' => 'Added Successfully!.....',
                    ];
                    return response($response, 201);
                }
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Something Went Wrong!.....',
                ];
                return response($response, 404);
            }
        } else {
            //Card is already assigned to someone
            $response = [
                'status' => false,
                'message' => 'Card is already assigned to any user!.....',
            ];
            return response($response, 403);
        }

    }

    /**
     * @return Application|ResponseFactory|Response
     */
    public function CheckInitiationRF() {
        //Code for server response to register or not.
        $get = RfidCard::where(['card' => null, 'status' => '0'])->get();
        $count = count($get);
        if ($count == 0) {
            $response = [
                'status' => false,
                'message' => 'User is not selected for RFID binding!.....',
            ];
            return response($response, 404);
        } else if ($count == 1) {
            $response = [
                'status' => true,
                'message' => 'User is selected for RFID binding!.....',
                'user' => RfidCard::where(['card' => null, 'status' => '0'])->get()->first(),
            ];
            return response($response, 200);
        } else if ($count > 1) {
            $response = [
                'status' => false,
                'message' => 'More than one user\'s are selected for binding!.....',
            ];
            return response($response, 403);
        } else {
            $response = [
                'status' => false,
                'message' => 'Something Went Wrong!.....',
            ];
            return response($response, 501);
        }
    }

    private function CheckExist($tag) {
        $exist = RfidCard::where(['card' => $tag, 'status' => 1])->get();
        if (count($exist) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
