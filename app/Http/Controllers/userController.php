<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\Door;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Jobs\sendMailJob;
use App\Models\emergencyContact;
use App\Models\User;
use App\Models\user_info;
use App\Models\userDocs;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        if (Auth::user()->info->role_id == 1) {
            $list = User::orderBy('id', 'DESC')->where('status', '1')->get();
        } else if (Auth::user()->info->role_id == 2) {
            $list = User::orderBy('id', 'DESC')->whereHas('info', function ($q) {
                $q->where([['role_id', '=', '5'],['status', '=', '1']])->orWhere('role_id', '=', '4')->orWhere('role_id', '=', '3')->orWhere('role_id', '=', '2');
            })->get();
        } else {
            $list = User::orderBy('id', 'DESC')->whereHas('info', function ($q) {
                $q->where([['role_id', '=', '5'],['status', '=', '1']])->orWhere('role_id', '=', '4')->orWhere('role_id', '=', '3');
            })->get();
        }
        return view('pages.member.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {

        return view('pages.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request) {
        $data = $this->InpValidate($request);
        if ($data['created_at'] == null) {
            $data['created_at'] = Carbon::now()->toDateTimeString();
        } else {
            $date = new \DateTime($data['created_at']);
            $data['created_at'] = $date->format('Y-m-d H:i:s');
        }
        $data['member_id'] = $this->createMID();
        $data['password'] = $this->randomPass();
        $age = $this->minimumAge($data['date_of_birth']);
        if (!$age == true) {
            $this->validate($request, [
                'date_of_birth' => 'email',
            ], [
                'date_of_birth.email' => 'Minimum age needs to be ' . env('AGE_REQUIRED') . ' Years for joining',
            ]);
        } else {
            if ($request->hasFile('file_name')) {
                $data['file_name'] = $data['member_id'] . '-' . rand(1, 1000) . '.' . $request->file_name->extension();
                $request->file_name->move(public_path('images/documents/'), $data['file_name']);
            } else {
                $data['file_name'] = "null.pdf";
            }
            $user = $this->createLogin($data);
            $this->emergencyContact($user->id, $data);
            $this->userInformation($user->id, $data);
            $this->userDocuments($user->id, $data);
            $this->dispatch(new sendMailJob($data));
            $token = $user->createToken('gate-access')->plainTextToken;
            Door::create([
                'member' => $user['id'],
                'auth-key' => $token,
                'created_at' => $data['created_at'],
            ]);
            return redirect()->back()->with('success', 'Member Registered Successfully');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $member = $this->decrypt($id);
        $post = Post::where('member', '=', $member->id)->limit(3)->latest()->get();
//        return view('pages.member.view', compact('member', 'post'));
        return view('pages.member.control', compact('member'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function ProfileSHow($id)
    {
        $member = $this->decrypt($id);
        $post = Post::where('member', '=', $member->id)->limit(3)->latest()->get();
        return view('pages.member.view', compact('member', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $member = $this->decrypt($id);
        $pin = $member->info->pin_code;
        $country = 'IN';
        $address = $this->ReturnPinResponse($country, $pin);
        $execute = explode(",", $member->info->city, 2);
        $address['post_db'] = $execute[0];
        return view('pages.member.edit', compact('member', 'address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     * @throws ValidationException
     * @throws \Exception
     */
    public function update(Request $request, string $id)
    {
        $member = $this->decrypt($id);
        $infoID = $member->info->id;
        $emCon = $member->emergency->id;
        $docID = $member->documents->id;
        $data = $this->form_validate($request);
        if ($data['last_name'] == null) {
            $data['last_name'] = "";
        }
        if ($data['created_at'] == \Carbon\Carbon::parse($member->created_at)->toDateString()) {
            $data['created_at'] = $member->created_at;
        } else {
            $date = new \DateTime($data['created_at']);
            $data['created_at'] = $date->format('Y-m-d H:i:s');
        }
        if ($request->hasFile('file_name')) {
            $data['file_name'] = $data['member_id'] . '-' . rand(1, 1000) . '.' . $request->file_name->extension();
            $request->file_name->move(public_path('images/documents/'), $data['file_name']);
        } else {
            $data['file_name'] = $member->documents->file_name;
        }
        $this->BasicUpdate($data, $member->id);
        $this->InfoUpdate($data, $infoID);
        $this->DocUpdate($data, $docID);
        $this->EmergencyUpdate($data, $emCon);
        return redirect()->route('member.index')->with('success', 'Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $user = $this->decrypt($id);
        $type = Auth::user()->info->role_id;
        if ($type == 1) {
            $delete = $user->delete();
        } else {
            $delete = $user->update([
                'status' => '0',
            ]);
        }
        if ($delete == null) {
            return redirect()->back()->with('error', 'Unable to Delete Please Try Again!');
        } else {
            return redirect()->route('member.index')->with('success', 'Deleted Successfully.');
        }
    }

    /**
     * Validating User's Input
     *
     * @param $data
     * @return array
     * @throws ValidationException
     */
    public function InpValidate($data)
    {
        return $this->validate($data, [
            'first_name' => 'required|string|max:20',//basic
            'last_name' => 'nullable|string|max:20',//basic
            'email' => 'required|string|email|max:255|unique:users',//basic
            'date_of_birth' => 'required|date',//user-info
            'gender' => 'required',//user-info
            'mobile_no' => 'required|integer|unique:user_infos,mobile',//user-info
            'address' => 'required|string',//user-info
            'pin_code' => 'required|integer',//user-info
            'state' => 'required|string',//user-info
            'city' => 'required|string',//user-info
            'post' => 'required|string', //user-info(city)
            'created_at' => 'nullable|date', //If member is an existing user.
            'emergency_name' => 'required|string|max:30',//emergency
            'relation' => 'required|string',//emergency
            'emergency_mobile_no' => 'required|string',//emergency
            'emergency_address' => 'nullable|string',//emergency
            'document_type' => 'required|string',//document
            'document_number' => 'required|string',//document
            'file_name' => 'nullable|mimes:pdf,jpeg,jpg,png',//documentha
            'role' => 'required|integer',
        ]);
    }

    /**
     *Validating Image type for update.
     *
     * @param $data
     * @return array
     * @throws ValidationException
     */
    public function img_profile($data)
    {
        return $this->validate($data, [
            'img' => 'required|mimes:jpg,bmp,png',
        ]);
    }

    /**
     *Validation of User Input
     *
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    public function form_validate($data)
    {
        return $this->validate($data, [
            'first_name' => 'required|string|max:20',//basic
            'last_name' => 'nullable|string|max:20',//basic
            'email' => 'required|string|email|max:255',//basic
            'date_of_birth' => 'required|date',//user-info
            'gender' => 'required',//user-info
            'mobile_no' => 'required|integer',//user-info
            'address' => 'required|string',//user-info
            'pin_code' => 'required|integer',//user-info
            'state' => 'required|string',//user-info
            'city' => 'required|string',//user-info
            'post' => 'required|string',//user-info
            'emergency_name' => 'required|string|max:30',//emergency
            'relation' => 'required|string',//emergency
            'emergency_mobile_no' => 'required|string',//emergency
            'document_type' => 'required|string',//document
            'document_number' => 'required|string',//document
            'file_name' => 'nullable|mimes:pdf,jpeg,jpg,png',//document
            'created_at' => 'nullable|date', //info
        ]);
    }

    /**
     *Decrypting User ID and returning the user data after finding.
     *
     * @param string $id
     * @return mixed
     */
    private function decrypt($id)
    {
        $id = Crypt::decrypt($id);
        $id = htmlspecialchars(stripslashes($id));
        return User::find($id);
    }

    /**
     *Checking the age minimum age for registration.
     *
     * @param $date
     * @return bool
     */
    public function minimumAge($date)
    {
        $dob = $date;
        $age_limit = env('AGE_REQUIRED');
        $date = date('d-m-Y');
        $value = date_diff(date_create($date), date_create($dob));
        if ($value->format("%y") >= $age_limit) {
            return true;

        } else {
            return false;
        }
    }

    /**
     * Creating UserID for Member
     *
     * @return string
     */
    public function createMID()
    {
        $last = User::orderBy('id', 'DESC')->get()->first();
        if (!$last) {
            return 'BFG0001';
        }
        $make = preg_replace("/[^0-9\.]/", '', $last->member_id);
        return 'BFG' . sprintf('%04d', $make + 1);
    }

    /**
     *Creating login Information for the User that will be sent to the email of User.
     *
     * @param array $data
     * @return mixed
     */
    public function createLogin($data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'member_id' => $data['member_id'],
            'password' => Hash::make($data['password']),
            'created_at' => $data['created_at'],
        ]);
    }

    /**
     *Seeding User EmergencyContact information to table for registration of user profile.
     *
     * @param string $user
     * @param array $data
     * @return mixed
     */
    public function emergencyContact($user, $data)
    {
        return emergencyContact::create([
            'member' => $user,
            'name' => $data['emergency_name'],
            'relation' => $data['relation'],
            'mobile' => $data['emergency_mobile_no'],
            'address' => 'Same as Member',
            'created_at' => $data['created_at'],
        ]);
    }

    /**
     *Seeding data of UserInformation Table for registration of user profile.
     *
     * @param string $user
     * @param array $data
     * @return mixed
     */
    public function userInformation($user, $data)
    {
        $image = 'maleDefault.png';
        if ($data['gender'] == 'female') {
            $image = 'femaleDefault.png';
        }
        return user_info::create([
            'member' => $user,
            'mobile' => $data['mobile_no'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'image' => $image,
            'address' => $data['address'],
            'role_id' => $data['role'],
            'city' => $data['post'].', '.$data['city'],
            'state' => $data['state'],
            'pin_code' => $data['pin_code'],
            'created_at' => $data['created_at'],
        ]);
    }

    /**
     *Seeding Data in UserDocuments Table for registration process.
     *
     * @param string $user
     * @param array $data
     * @return mixed
     */
    public function userDocuments($user, $data)
    {
        return userDocs::create([
            'member' => $user,
            'document_type' => $data['document_type'],
            'document_number' => $data['document_number'],
            'file_name' => $data['file_name'],
            'created_at' => $data['created_at'],
        ]);
    }

    /**
     * Creating a Random Password for User, will be sent to User via Mail.
     *
     * @return false|string
     *
     */
    public function randomPass()
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%!";
        return substr(str_shuffle($chars), '0', '10');
    }

    /**
     * Updating the Basic Information of user's Info.
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    private function BasicUpdate($data, $id)
    {
        $user = User::find($id);
        return $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'created_at' => $data['created_at'],
        ]);
    }

    /**
     * Updating the Additional Information of User's Info.
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    private function InfoUpdate($data, $id)
    {
        $info = user_info::find($id);
        return $info->update([
            'mobile' => $data['mobile_no'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'city' => $data['post'].', '.$data['city'],
            'state' => $data['state'],
            'pin_code' => $data['pin_code'],
            'created_at' => $data['created_at'],
        ]);
    }

    /**
     * Updating the Documents of User Information in Documents Table.
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    private function DocUpdate($data, $id)
    {
        $doc = userDocs::find($id);
        return $doc->update([
            'document_type' => $data['document_type'],
            'document_number' => $data['document_number'],
            'file_name' => $data['file_name'],
            'created_at' => $data['created_at'],
        ]);
    }

    /**
     * Updating the Emergency Contact Details of User Emergency Database.
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    private function EmergencyUpdate($data, $id)
    {
        $emg = emergencyContact::find($id);
        return $emg->update([
            'name' => $data['emergency_name'],
            'relation' => $data['relation'],
            'mobile' => $data['emergency_mobile_no'],
            'created_at' => $data['created_at'],
        ]);
    }

    /**
     * Finding User for Fee Payment.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function MemberFind(Request $request)
    {
        $data = $this->RequestValidate($request);
        $value = $data['inputData'];
        $respond = User::where('member_id', '=', $value)->orWhere('email', 'like', '%' . $value . '%')->get();
        if ($respond == null) {
            return response()->json('No Record Found');
        } else {
            return response()->json($respond);
        }
    }

    /**
     * Validating Fetch Data.
     *
     * @param array $request
     * @return array
     * @throws ValidationException
     */
    private function RequestValidate($request)
    {
        return $this->validate($request, [
            'inputData' => 'nullable|string',
        ]);
    }

    /**
     * Change the current password
     * @param Request $request
     * @return RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request['current_password'], $userPassword)) {
            return back()->withErrors(['current_password' => 'password not match']);
        }

        $user->password = Hash::make($request['password']);

        $user->save();

        return redirect()->back()->with('success', 'password successfully updated');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function CreateTrainer(Request $request)
    {
        $member = $this->ValidDecrypt($request);
        $member = htmlspecialchars(stripslashes($member));
        $member = User::find($member);
        $info_id = $member->info->id;
        $info = user_info::find($info_id);
        $update = $info->update([
            'role_id' => 3,
        ]);
        if (!$update) {
            return redirect()->back()->with('error', 'Something Went Wrong!......');
        } else {
            return redirect()->back()->with('success', 'Member is Promoted to Trainer!..');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function DemoteMember(Request $request)
    {
        $member = $this->ValidDecrypt($request);
        $member = htmlspecialchars(stripslashes($member));
        $member = User::find($member);
        $info_id = $member->info->id;
        $info = user_info::find($info_id);
        $update = $info->update([
            'role_id' => 5,
        ]);
        if (!$update) {
            return redirect()->back()->with('error', 'Something Went Wrong!......');
        } else {
            return redirect()->back()->with('success', 'Demoted to Member Successfully!..');
        }
    }

    /**
     * @param $val
     * @return mixed
     * @throws ValidationException
     */
    private function ValidDecrypt($val)
    {
        $all = $this->validate($val, [
            'member' => 'required|string',
        ]);

        return Crypt::decrypt($all['member']);
    }

    /**
     * @param $user
     * @return Application|Factory|View
     */
    public function AttendanceHistory($user)
    {
        $enc = Crypt::decrypt($user);
        $uid = htmlspecialchars(stripcslashes($enc));
        $member = User::find($uid);
        $list = attendance::where('member', '=', $uid)->get();
        return view('pages.attendance.index', compact('list', 'member'));
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @throws ValidationException
     */
    public function GetPinDetail(Request $request) {
        $this->validate($request, [
            'country' => 'required|string|max:3',
            'pin' => 'required|integer|min:6'
        ]);
        $country = $request['country'];
        $pin = $request['pin'];
        $token = "globaldesign@apiservice";
        $url = "http://globaldesign.in/api/pin/detail?country=".$country."&pin=".$pin."&token=".$token."";
        //Initialize cURL.
        $ch = curl_init();
        //Set the URL that you want to GET by using the CURLOPT_URL option.
        curl_setopt($ch, CURLOPT_URL, $url);
        //Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        //Execute the request.
        $data = curl_exec($ch);
        //Close the cURL handle.
        curl_close($ch);
        //Print the data out onto the page.
        $data = json_decode( json_encode($data), true);
        $data = json_decode($data);
        $post = array();
        foreach ($data as $item) {
            (array)$post[] = $item->post_office;
        }
        $state = array();
        foreach ($data as $item) {
            (array)$state[] = $item->state;
        }
        $city = array();
        foreach ($data as $item) {
            (array)$city[] = $item->city;
        }
        $state = $data['0']->state;
        $city = $data['0']->district;
        $response = [
            'status' => true,
            'state' => $state,
            'district' => $city,
            'post' => $post,
        ];
        return response($response, '200');
    }

    /**
     * @param $country
     * @param $pin
     * @return array
     */
    public function ReturnPinResponse($country, $pin) {
        $token = "globaldesign@apiservice";
        $url = "http://globaldesign.in/api/pin/detail?country=".$country."&pin=".$pin."&token=".$token."";
        //Initialize cURL.
        $ch = curl_init();
        //Set the URL that you want to GET by using the CURLOPT_URL option.
        curl_setopt($ch, CURLOPT_URL, $url);
        //Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        //Execute the request.
        $data = curl_exec($ch);
        //Close the cURL handle.
        curl_close($ch);
        //Print the data out onto the page.
        $data = json_decode( json_encode($data), true);
        $data = json_decode($data);
        $post = array();
        foreach ($data as $item) {
            (array)$post[] = $item->post_office;
        }
        $state = array();
        foreach ($data as $item) {
            (array)$state[] = $item->state;
        }
        $city = array();
        foreach ($data as $item) {
            (array)$city[] = $item->city;
        }
        $state = $data['0']->state;
        $city = $data['0']->district;
        return [
            'status' => true,
            'state' => $state,
            'district' => $city,
            'pin_code' => $pin,
            'country' => 'India',
            'post' => $post
        ];
    }
}

