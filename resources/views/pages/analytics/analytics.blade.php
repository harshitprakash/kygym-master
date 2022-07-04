@extends('layouts.admin.master')
@section('title','Analytics')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-xxl-12 mr-auto">
                            <div class="d-sm-flex d-block align-items-center">
                                <img src="{{ asset('images/illustration.png') }}" alt="" class="mw-100 mr-3">
                                <div>
                                    <h4 class="fs-20 text-black">Generate analytics report for now </h4>
                                    <p class="fs-14 mb-0">Get all your data analysis with US kindly select the time range default is set to last 30 days!.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-xxl-12 mt-3">
                            <form action="{{ route('call.analytics') }}" method="post">@csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ $period['from'] }}" id="StartDate" required>
                                            @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ $period['to'] }}" id="EndDate" required>
                                            @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-md mb-2">Generate Report<i class="las la-angle-right ml-3 scale5"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pt-4 pb-2">
                            <h3 class="text-center">Total Earnings : {{ $analytics['earning'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header flex-wrap border-0 pb-0">
                            <h4 class="text-black fs-20 mb-3">Payments Collection Analytics</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header flex-wrap border-0 pb-0">
                            <h4 class="text-black fs-20 mb-3">Earning With Discounts</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div id="chartBreakup"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header flex-wrap border-0 pb-0">
                            <h4 class="text-black fs-20 mb-3">Users Trend During Period</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div id="TrendsUser"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <p>Total Business : {{ $analytics['total'] }}</p>
            <p>Total Earnings : {{ $analytics['earning'] }}</p>
            <p>Total Cash Collection : {{ $analytics['cash'] }}</p>
            <p>Total Online Collection : {{ $analytics['online'] }}</p>
            <p>Total Discount : {{ $analytics['discount'] }}</p>
            <p>New Joined : {{ $analytics['users'] }}</p>
            <p>Left members : {{ $analytics['inactive'] }}</p>
            <p>Total members : {{ $analytics['total_user'] }}</p>
        </div>
    </div>
@endsection

@section('custom-script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript">
        $("span.pie").peity("pie")
    </script>
    <script type="text/javascript">
        const PointsShow = {
            series: [{{ $analytics['cash'] }}, {{ $analytics['online'] }}],
            chart: {
                type: 'pie',
            },
            labels: ['Cash = {{ $analytics['cash'] }}', 'Online = {{ $analytics['online'] }}'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        const chart = new ApexCharts(document.querySelector("#chart"), PointsShow);
        chart.render();

        var partB = {
            series: [{{ $analytics['earning'] }}, {{ $analytics['discount'] }}],
            labels: ['Earning = {{ $analytics['earning'] }}', 'Discount = {{ $analytics['discount'] }}'],
            chart: {
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        const chartB = new ApexCharts(document.querySelector("#chartBreakup"), partB);
        chartB.render();


        var partBS = {
            series: [{{ $analytics['users'] }}, {{ $analytics['total_user'] }}],
            labels: ['New Members = {{ $analytics['users'] }}', 'Existing Members = {{ $analytics['total_user'] }}'],
            chart: {
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'center'
                    }
                }
            }]
        };
        const chartBS = new ApexCharts(document.querySelector("#TrendsUser"), partBS);
        chartBS.render();
    </script>
@endsection
