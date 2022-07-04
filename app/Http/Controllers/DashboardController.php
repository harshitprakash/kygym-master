<?php

namespace App\Http\Controllers;

use App\Models\Door;
use App\Models\FeeCollection;
use App\Models\packages;
use App\Models\PackRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * View List of Trainers!
     *
     * @return Application|Factory|View
     */
    public function AllTrainers() {
        $page = [
            'page' => 'Trainers'
        ];
        $list = User::orderBy('id', 'DESC')->whereHas('info', function ($q) {
            $q->where([['role_id', '=', '3'],['status', '=', '1']])->orWhere('role_id', '=', '4')->orWhere('role_id', '=', '3');
        })->get();
        return view('pages.member.index', compact('list', 'page'));
    }

    public function MembershipExpiredUsers() {
        $page = [
            'page' => 'Expired Members'
        ];
        $list = User::where('status', '=', '1')->whereHas('access', function($q){$q->where('access_till', '<',Carbon::now());})->get();
        return view('pages.member.index', compact('list', 'page'));
    }

    public function NewJoiningsList()
    {
        $page = [
            'page' => 'New Members'
        ];
        $list = User::where('status', '=', '1')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->whereHas('info', function($q){$q->where('role_id', '=', '5');})->get();
        return view('pages.member.index', compact('list', 'page'));
    }

    public function AnalyticsPage($start, $end) {
        $start = date('Y-m-d', strtotime($start));
        $end = date('Y-m-d', strtotime($end));
        $period = [
            'from' => $start,
            'to' => $end
        ];
        $users = User::whereBetween('created_at', [$start." 00:00:00", $end." 23:59:59"])->whereHas('info', function ($q) {
            $q->where('role_id', '5');
        })->count();
        $cash = FeeCollection::whereBetween('created_at', [$start." 00:00:00", $end." 23:59:59"])->where(['mode' => 'cash', 'status' => '1'])->sum('amount');
        $online = FeeCollection::whereBetween('created_at', [$start." 00:00:00", $end." 23:59:59"])->where(['mode' => 'online', 'status' => '1'])->sum('amount');
        $discount = PackRequest::whereBetween('created_at', [$start." 00:00:00", $end." 23:59:59"])->where(['status' => '1'])->sum('discount');
        $left = Door::whereBetween('access_till', [$start, $end])->count();
        $total = User::where('created_at', '<', $start." 00:00:00")->count();
        $analytics = [
            'users' => $users,
            'cash' => $cash,
            'online' => $online,
            'earning' => $cash+$online,
            'total' => $cash+$online+$discount,
            'discount' => $discount,
            'inactive' => $left,
            'total_user' => $total,
        ];
        return view('pages.analytics.analytics', compact('period', 'analytics'));
    }

    public function GetDateAndSortURL(Request $request) {
        $this->validate($request, [
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);
        if ($request['start_date'] !== null) {
            $start = date('Y-m-d', strtotime($request['start_date']));
        } else {
            $today = Carbon::now()->toDateString();
            $start = date('Y-m-j', strtotime('-30 days',strtotime($today)));
        }
        if ($request['end_date'] !== null) {
            $end = date('Y-m-d', strtotime($request['end_date']));
        } else {
            $end = Carbon::parse(Carbon::now()->toDateString())->toDateString();
        }
        return redirect()->route('analytics', ['start' => $start, 'end' => $end]);
    }
}
