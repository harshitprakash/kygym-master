<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\Door;
use App\Models\Fingerprints;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Google\Service\CloudAsset\RelatedResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class DoorController extends Controller
{
    /**
     * Create API Token for the User Door Access.
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @throws ValidationException
     */
    public function CreateApiToken(Request $request) {
        $value = $this->ValueVerify($request);
        $user = User::where('email', $value['email'])->get()->first();
        if (!$user || !Hash::check($value['password'], $user['password'])) {
            return response([
                'message' => 'Something Went Wrong! Either email or password or both may be Incorrect!'
            ], 404);
        }
        $token = $user->createToken('gate-access')->plainTextToken;
        Door::create([
            'member' => $user['id'],
            'auth-key' => $token,
        ]);
        $response = [
            'message' => 'API Token Generated Successfully! Keep it safe along with you it is unrecoverable!',
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }

    /**
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    private function ValueVerify($data) {
        return $this->validate($data, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    }


    // Above Codes are for Generating API Bearer Tokens for admin only/.
    // Below Codes are for validating & Giving Access to the doors./


    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @throws ValidationException
     */
    public function TargetResponse(Request $request) {
        $information = $this->ValidateInput($request);
        if ($information['tag_id'] != 0) {
            return $this->RFIDScanned($information['tag_id']);
        } elseif ($information['fing_id'] != 0) {
            return $this->FingerScanned($information['fing_id']);
        } elseif ($information['qr_id'] != null) {
            return $this->QRScanned($information['qr_id']);
        } else {
            return $this->SendResponse('false', 'Access method is not allowed!.', '403');
        }
    }

    /**
     * @param array $values
     * @return array
     * @throws ValidationException
     */
    private function ValidateInput($values) {
        return $this->validate($values, [
            'tag_id' => 'nullable|string',
            'fing_id' => 'nullable|string',
            'qr_id' => 'nullable|string',
        ]);
    }

    /**
     * @param $tagID
     * @return Application|ResponseFactory|Response
     */
    private function RFIDScanned($tagID) {
        $status = $this->FindMember('tag_id', $tagID);
        if ($status == true) {
            $member = $this->GetMember('tag_id', $tagID);
            $inOrOut = $this->CheckInOrOut($member['member']);
            $utype = $this->GetPackageRequirement($member['member']);
            if ($utype == true) {
                if ($inOrOut == true) {
                    $this->MarkAttendanceIn($member['member'], 'Insider RFID');
                } else {
                    $this->MarkAttendanceOut($member['member'], 'Insider RFID');
                }
                return $this->SendResponse('true', 'Insider', '201');
            }
            $allowed = $this->CheckValidity($member['member']);
            if ($inOrOut == true) {
                return $this->CheckMembership($allowed, $member['member'], 'RFID Scanning');
            } else {
                $this->MarkAttendanceOut($member['member'], 'RFID Scanning');
                return $this->SendResponse('true', 'Thank You For Coming, Visit Again!', '201');
            }
        } else {
            return $this->SendResponse('false', 'Card is Invalid!', '404');
        }
    }

    /**
     * @param $fingerID
     * @return Application|ResponseFactory|Response
     */
    private function FingerScanned($fingerID) {
        $status = $this->FindMember('fingerprint', $fingerID);
        if ($status == true) {
            $member = $this->GetMember('fingerprint', $fingerID);
            $inOrOut = $this->CheckInOrOut($member['member']);
            $utype = $this->GetPackageRequirement($member['member']);
            if ($utype == true) {
                if ($inOrOut == true) {
                    $this->MarkAttendanceIn($member['member'], 'Insider Finger');
                } else {
                    $this->MarkAttendanceOut($member['member'], 'Insider Finger');
                }
                return $this->SendResponse('true', 'Insider', '201');
            }
            $allowed = $this->CheckValidity($member['member']);
            if ($inOrOut == true) {
                return $this->CheckMembership($allowed, $member['member'], 'Finger Scanning');
            } else {
                $this->MarkAttendanceOut($member['member'], 'Finger Scanning');
                return $this->SendResponse('true', 'Thank You For Coming, Visit Again!', '201');
            }
        } else {
            return $this->SendResponse('false', 'Finger is Invalid!', '404');
        }
    }

    /**
     * @param $qrValue
     * @return Application|ResponseFactory|Response
     */
    private function QRScanned($qrValue) {
        $status = $this->FindMember('qr_code', $qrValue);
        if ($status == true) {
            $member = $this->GetMember('qr_code', $qrValue);
            $inOrOut = $this->CheckInOrOut($member['member']);
            $utype = $this->GetPackageRequirement($member['member']);
            if ($utype == true) {
                if ($inOrOut == true) {
                    $this->MarkAttendanceIn($member['member'], 'Insider QR Code');
                } else {
                    $this->MarkAttendanceOut($member['member'], 'Insider QR Code');
                }
                $this->DeleteQrValue($member['member']);
                return $this->SendResponse('true', 'Insider', '201');
            }
            $allowed = $this->CheckValidity($member['member']);//
            if ($inOrOut == true) {
                return $this->CheckMembership($allowed, $member['member'], 'QR Code Scanning');
            } else {
                $this->MarkAttendanceOut($member['member'], 'QR Scanning');
                $this->DeleteQrValue($member['member']);
                return $this->SendResponse('true', 'Thank You For Coming, Visit Again!', '201');
            }
        } else {
            return $this->SendResponse('false', 'QR Code is Invalid!', '404');
        }
    }

    /**
     * @param $column
     * @param $value
     * @return bool
     */
    private function FindMember($column, $value) {
        if ($column == "fingerprint") {
            $user = Fingerprints::where('finger', $value)->get()->first();
            if (!$user) {
                return false;
            } else {
                return true;
            }
        } else {
            $check = Door::where($column, $value)->get()->first();
            if (!$check) {
                return false;
            } else {
                return true;
            }
        }
    }

    /**
     * @param $status
     * @param $message
     * @param $code
     * @return Application|ResponseFactory|Response
     */
    private function SendResponse($status, $message, $code) {
        $response = [
            'status' => $status,
            'message' => $message,
        ];
        return response($response, $code);
    }

    /**
     * @param $member
     * @return float
     */
    private function CheckValidity($member) {
        $today = date('Y-m-d');
        $info = Door::where('member', $member)->get()->first();
        $expire = $info['access_till'];
        $remain = strtotime($expire)-strtotime($today);
        return round((($remain/24)/60)/60);
    }

    /**
     * Function to find the member details associated in column.
     *
     * @param $column
     * @param $value
     * @return mixed
     */
    private function GetMember($column, $value) {
        if ($column == 'fingerprint') {
            return Fingerprints::where('finger', $value)->get()->first();
        } else {
            return Door::where($column, $value)->get()->first();
        }
    }

    /**
     * Check if users attendance exist or not.
     *
     * @param $mid
     * @return bool
     */
    private function CheckInOrOut($mid) {
        $get = attendance::where(['member' => $mid, 'out_time' => null])->get()->first();
        if (!$get) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Marking the in time attendance!
     *
     * @param $mid
     * @param $method
     */
    private function MarkAttendanceIn($mid, $method) {
        attendance::create([
            'member' => $mid,
            'in_time' => now(),
            'in_method' => $method,
        ]);
    }

    /**
     * @param $mid
     * @param $method
     */
    private function MarkAttendanceOut($mid, $method) {
        $ex = attendance::where(['member' => $mid, 'out_time' => null])->get()->first();
        $val = attendance::find($ex['id']);
        $val->out_time = now();
        $val->out_method = $method;
        $val->save();
    }

    /**
     * @param $allowed
     * @param $mid
     * @return Application|ResponseFactory|Response
     */
    private function CheckMembership($allowed, $mid, $method) {
        if ($allowed >= 3) {
            $this->MarkAttendanceIn($mid, $method);
            return $this->SendResponse('true', 'Welcome! take care of your safety!', '201');
        } elseif ($allowed >= 0) {
            $this->MarkAttendanceIn($mid, $method);
            return $this->SendResponse('true', 'Welcome! your package is about to expire. Renew Now!', '201');
        } elseif ($allowed >= -3) {
            $this->MarkAttendanceIn($mid, $method);
            return $this->SendResponse('true', 'Welcome! your package is expired renew now to avoid access.', '201');
        } else {
            return $this->SendResponse('false', 'Your Package has been expired & need to renew! Contact Help Desk!', '403');
        }
    }

    public function GetPackageRequirement($memberID) {
        $user = User::find($memberID);
        if ($user->info->role_id == 5) {
            return false;
        } else if ($user->info->role_id == 4) {
            return true;
        } else if ($user->info->role_id == 3) {
            return true;
        } else if ($user->info->role_id == 2) {
            return true;
        } else if ($user->info->role_id == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function GenerateQrCode() {
        $doorID = Auth::user()->Access->id;
        $user = User::find(Auth::user()->id);
        $door = Door::find($doorID);
        $code = Auth::user()->member_id.rand(1,1000).strtotime(Carbon::now()->toDateTimeString());
        $door->update([
            'qr_code' => $code
        ]);
        return view('pages.attendance.qrcode', compact('code', 'user'));
    }

    /**
     * @param int $user
     */
    private function DeleteQrValue($user) {
        $door = Door::where('member', $user)->get()->first();
        $door->update([
            'qr_code' => null,
        ]);
    }
}
