@extends('layouts.admin.master')
@section('title','Dashboard')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-danger">
                <div class="card-body  p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="flaticon-381-user-7"></i>
									</span>
                        <div class="media-body text-white text-right">
                            <a class="mb-1 text-white" href="{{ route('member.index') }}"><p class="mb-1">Total Members</p>
                            <h3 class="text-white">{{ $member->count() }}</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-info">
                <div class="card-body p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="flaticon-381-heart"></i>
									</span>
                        <div class="media-body text-white text-right">
                            <a class="text-white" href="{{ route('trainers.list') }}"><p class="mb-1">Total Trainer</p>
                            <h3 class="text-white">{{$trainer->count()}}</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-success">
                <div class="card-body p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="la la-rupee-sign"></i>
									</span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Collected Fees</p>
                            <h3 class="text-white">{{$fees_collection->sum('amount')}} <i class="la la-rupee-sign"></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body p-4">
                    <div class="media">
									<span class="mr-3">
										<i class="flaticon-381-user-7"></i>
									</span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">In-active User</p>
                            <h3 class="text-white">{{ $inactive_user->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body p-4">
                    <p class="mb-1 text-white text-right" ><big> New Member</big></p>
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">{{ ceil($new_joinings->count()) }}</h3>
                            <span class="badge badge-primary">{{ ceil((new \App\Http\Controllers\HomeController())->last_month_record()) }}%</span>
                        </div>
                    </div>
                    <a href="{{route('new.joining')}}"> <small class="float-right text-white"><u>view more</u></small></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-secondary">
                <div class="card-body p-4">
                    <p class="mb-1 text-white text-right"><big> Monthly Revenue</big></p>
                    <div class="media">
                        <span class="mr-3">
                            <i class="la la-rupee-sign"></i>
                        </span>
                        <div class="media-body text-white text-right">

                            <h3 class="text-white">{{ $fees_collection->sum('amount') }}</h3>
                            <span class="badge badge-primary">{{(new \App\Http\Controllers\HomeController())->fees_analitics()}}%</span>
                        </div>
                    </div>
                    <a href="{{route('collection.history')}}"><small class="float-right text-white"><u>view more</u></small></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-info">
                <div class="card-body p-4">
                    <p class="mb-1 text-white text-right" ><big> Membership Expired</big></p>
                    <div class="media">
									<span class="mr-3">
										<i class="fa fa-ban"></i>
									</span>

                        <div class="media-body text-white text-right">

                            <h3 class="text-white">{{$membership_expire->count()}}</h3>
                        </div>
                    </div>
                    <a href="{{ route('membership.expired') }}"><small class="float-right text-white"><u>view more</u></small></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-info">
                <div class="card-body p-4">
                    <p class="mb-1 text-white text-right"><big> Present Today</big></p>
                    <div class="media">
                        <span class="mr-3">
                            <i class="fa fa-ban"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <h3 class="text-white">{{$present_today}}</h3>
                            {{--                            <span class="badge badge-primary">{{ ($present_today/$member->count())*100 }} % Member's Present!</span>--}}
                        </div>
                    </div>
                    <a href="{{ route('present.today') }}"><small class="float-right text-white"><u>view more</u></small></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
            <div id="user-activity" class="card">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="user" role="tabpanel">
                            <div id="UserTrendChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript">
        const datas = <?php echo json_encode($datas) ?>;
        const options = {
            series: [{
                name: "Users",
                data: datas,
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'User\'s Trends by Month',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            }
        };

        const ShowBox = document.getElementById("UserTrendChart");
        const chart = new ApexCharts(ShowBox, options);
        chart.render();
    </script>
@endsection
