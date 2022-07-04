@extends('layouts.admin.master')
@section('title','Payment Collection Requests')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('vendor/lightgallery/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
@endsection
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Member</li>
            @if(isset($member))
            <li class="breadcrumb-item"><a href="{{ route('member.show', \Illuminate\Support\Facades\Crypt::encrypt($member->id)) }}">{{ $member->first_name.' '.$member->last_name }}</a></li>
            @endif
            <li class="breadcrumb-item active"><a href="#">Collection History</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card plan-list">
                <div class="card-header d-sm-flex flex-wrap d-block pb-0 border-0">
                    <div class="mr-auto pr-3 mb-3">
                        <h4 class="text-black fs-20">Collection History!</h4>
                        <p class="fs-13 mb-0 text-black">Collected Amount history received by Member's!.....</p>
                    </div>
                    <div class="card-action card-tabs mr-4 mt-3 mt-sm-0 mb-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#CashTransact" role="tab" aria-selected="false">Cash Collection!</a>
                            </li>
                            <li class="nav-item" disabled="disabled">
                                <a class="nav-link" data-toggle="tab" href="#OnlineTransact" role="tab" aria-selected="true" disabled="disabled">Online Collection!</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body tab-content pt-2">
                    <div class="tab-pane active show fade" id="CashTransact">
                        @if(count($historyCash)>0)
                            @foreach($historyCash as $key=>$data)
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                            <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                <div class="list-icon bgl-primary mr-3 mb-3">
                                    <p class="fs-24 text-primary mb-0 mt-2">{{ date('j', strtotime($data->updated_at)) }}</p>
                                    <span class="fs-14 text-primary">{{ date('M', strtotime($data->updated_at)) }}</span>
                                </div>
                                <div class="info mb-3">
                                    <h4 class="fs-20 "><a href="workout-statistic.html" class="text-black">{{ ucfirst($data->Pack->package) }} Package @ {{ $data->amount }} : Purchased By - {{ ucfirst($data->Member->first_name).' '.ucfirst($data->Member->last_name) }}</a></h4>
                                    <span class="text-danger font-w600">{{ ucfirst($data->mode) }} Collected By - {{ ucfirst($data->Approver->first_name).' '.ucfirst($data->Approver->last_name) }}</span>
                                </div>
                            </div>
                            <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                <a href="javascript:void(0);" class="btn mb-3 play-button rounded mr-3"><i class="las la-print scale-2 mr-3"></i>Print Receipt</a>
                            </div>
                            <div class="col-xl-5 col-xxl-12 col-lg-4 col-sm-12 d-flex align-items-center">
                                <a href="javascript:void(0);" class="btn mb-3 play-button rounded mr-3"><i class="las la-info-circle scale-2 mr-3"></i>More Information.</a>
                                <div class="dropdown mb-3">
                                    <a href="javascript:void(0)" class="more-button" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="6" height="26" viewBox="0 0 6 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 3C6 4.65685 4.65685 6 3 6C1.34315 6 0 4.65685 0 3C0 1.34315 1.34315 0 3 0C4.65685 0 6 1.34315 6 3Z" fill="#585858"></path>
                                            <path d="M6 13C6 14.6569 4.65685 16 3 16C1.34315 16 0 14.6569 0 13C0 11.3431 1.34315 10 3 10C4.65685 10 6 11.3431 6 13Z" fill="#585858"></path>
                                            <path d="M6 23C6 24.6569 4.65685 26 3 26C1.34315 26 0 24.6569 0 23C0 21.3431 1.34315 20 3 20C4.65685 20 6 21.3431 6 23Z" fill="#585858"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Send Mail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @else
                        <p>No! Cash Records Found...</p>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="OnlineTransact">
                        @if(count($historyOnline)>0)
                            @foreach($historyOnline as $key=>$data)
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="list-icon bgl-primary mr-3 mb-3">
                                            <p class="fs-24 text-primary mb-0 mt-2">{{ date('j', strtotime($data->updated_at)) }}</p>
                                            <span class="fs-14 text-primary">{{ date('M', strtotime($data->updated_at)) }}</span>
                                        </div>
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="workout-statistic.html" class="text-black">{{ ucfirst($data->Pack->package) }} Package @ {{ $data->amount }} : Purchased By - {{ ucfirst($data->Member->first_name).' '.ucfirst($data->Member->last_name) }}</a></h4>
                                            <span class="text-danger font-w600">{{ ucfirst($data->mode) }} Collected By - {{ ucfirst($data->Approver->first_name).' '.ucfirst($data->Approver->last_name) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <a href="javascript:void(0);" class="btn mb-3 play-button rounded mr-3"><i class="las la-print scale-2 mr-3"></i>Print Receipt</a>
                                    </div>
                                    <div class="col-xl-5 col-xxl-12 col-lg-4 col-sm-12 d-flex align-items-center">
                                        <a href="javascript:void(0);" class="btn mb-3 play-button rounded mr-3"><i class="las la-info-circle scale-2 mr-3"></i>More Information.</a>
                                        <div class="dropdown mb-3">
                                            <a href="javascript:void(0)" class="more-button" data-toggle="dropdown" aria-expanded="false">
                                                <svg width="6" height="26" viewBox="0 0 6 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 3C6 4.65685 4.65685 6 3 6C1.34315 6 0 4.65685 0 3C0 1.34315 1.34315 0 3 0C4.65685 0 6 1.34315 6 3Z" fill="#585858"></path>
                                                    <path d="M6 13C6 14.6569 4.65685 16 3 16C1.34315 16 0 14.6569 0 13C0 11.3431 1.34315 10 3 10C4.65685 10 6 11.3431 6 13Z" fill="#585858"></path>
                                                    <path d="M6 23C6 24.6569 4.65685 26 3 26C1.34315 26 0 24.6569 0 23C0 21.3431 1.34315 20 3 20C4.65685 20 6 21.3431 6 23Z" fill="#585858"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0);">Send Mail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No! Online Records Found...</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
