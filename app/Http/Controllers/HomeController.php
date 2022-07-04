<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\FeeCollection;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth', ['except' => ['GetPrivacyPage']]);
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function index() {
        if (Auth::user()->info->role_id == '5') {
            return redirect()->route('dashboard');
        }
        $new_joinings = User::where('status','=','1')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->whereHas('info', function($q){$q->where('role_id', '=', '5');})->get();
        $inactive_user= User::where('status','=','0')->get();
        $member=User::where('status', '=', '1')->whereHas('info', function($q){$q->where('role_id', '=', '5');})->get();
        $membership_expire=User::where('status', '=', '1')->whereHas('access', function($q){$q->where('access_till', '<',Carbon::now());})->get();
        $trainer=User::where('status', '=', '1')->whereHas('info', function($q){$q->where('role_id', '=', '3');})->get();
        $fees_collection = FeeCollection::where('status','=','1')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        $present_today = count(attendance::where('created_at', '>=', Carbon::parse(Carbon::now()->toDateString())->toDateString())->get());
        $datas = $this->ChartValues();
        return view('pages.dashboard', compact('fees_collection', 'member', 'trainer', 'inactive_user', 'new_joinings', 'membership_expire', 'present_today', 'datas'));
    }

    /**
     * @return string
     */
    public function last_month_record() {
        $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $toDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $last_month=User::where('status', '=', '1')->whereBetween('created_at',[$fromDate,$toDate])->whereHas('info', function($q){$q->where('role_id', '=', '5');})->get();
        $current_month=User::where('status', '=', '1')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->whereHas('info', function($q){$q->where('role_id', '=', '5');})->get();
        if (count($last_month) == 0) {
            $last_month = 1;
        } else {
            $last_month = count($last_month);
        }
        $record = ((count($current_month)/$last_month) * 100);
        if($record>=0) {
            return '+'.$record;
        } else {
            return  '-'.$record;
        }
    }

    /**
     * @return string
     */
    public function fees_analitics()
    {
        $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $toDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $current_month=FeeCollection::where('status','=','1')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get()->count();
        $last_month=FeeCollection::whereBetween('created_at',[$fromDate,$toDate])->get('amount')->sum('amount');
        $increase_value= $current_month-$last_month;
        if ($last_month == 0) {
            $last_month = 1;
        }
        $record = (($increase_value/$last_month) * 100);
        if($record>=0){
            return '+'.$record;
        }else{
            return  '-'.$record;
        }

    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function ControlDashboard($id) {
        $id = $this->DecryptId($id);
        $member = User::find($id);
        return view('pages.member.control', compact('member'));
    }

    /**
     * Decryption of ID...
     *
     * @param $id
     * @return mixed
     */
    private function DecryptId($id) {
        return Crypt::decrypt($id);
    }

    /**
     * @return int[]
     */
    private function ChartValues() {
        $users = User::select(DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $months = User::select(DB::raw("Month(created_at) as month"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $datas[$month-1] = $users[$index];
        }
        return $datas;
    }

    /**
     * @return int[]
     */
    private function MoneyChart() {
        $money = "money";
        $months = "months";
        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        return $datas;
    }

    public function LocationDetail($country, $pin) {
        $curl = curl_init();
        $where = urlencode('{
            "postalCode": "'.$pin.'"
        }');
        curl_setopt($curl, CURLOPT_URL, 'https://parseapi.back4app.com/classes/Worldzipcode_IN?limit=10&where=' . $where);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'X-Parse-Application-Id: QaXqF6dbgx83RHFO4OPi2IgKsTTAz5hjUZnJs2g3', // This is your app's application id
            'X-Parse-REST-API-Key: 1GO8K9V9HySZGTTotkX36TtciQWJT43FkKh2RXzi' // This is your app's REST API key
        ));
        $data = json_decode(curl_exec($curl)); // Here you have the data that you need
        print_r(json_encode($data, JSON_PRETTY_PRINT));
        curl_close($curl);
        return $data;
    }

    /**
     * Showing Member's Dashboard with posts & information.
     *
     * @return Application|Factory|View
     */
    public function MemberDashboard() {
        $greeting = $this->GiveGreetings();
        $post = Post::where('member', '=', Auth::user()->id)->limit(3)->latest()->get();
        $member = User::find(Auth::user()->id);
        return view('pages.member.newsfeed', compact('post', 'member', 'greeting'));
    }

    /**
     * @return string
     */
    private function GiveGreetings() {
        $greetings = "";
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetings = "Morning";
        }
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $greetings = "Afternoon";
        }
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Evening";
        }
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $greetings = "Night";
        }
        return $greetings;
    }

    public function GetPrivacyPage() {
        return view('pages.privacy');
    }
}
