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
            <li class="breadcrumb-item active"><a href="#">Collection Requests</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card plan-list">
                <div class="card-header d-sm-flex flex-wrap d-block pb-0 border-0">
                    <div class="mr-auto pr-3 mb-3">
                        <h4 class="text-black fs-20">Cash Collection Request</h4>
                        <p class="fs-13 mb-0 text-black">Fee Collection Request by Member's</p>
                    </div>
                    <div class="card-action card-tabs mr-4 mt-3 mt-sm-0 mb-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#cash" role="tab" aria-selected="false">Cash Collection</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#onlinePaid" role="tab" aria-selected="true">Online Paid</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body tab-content pt-2">
                    <div class="tab-pane active show fade" id="cash">
                        @if(count($history)>0)
                            @foreach($history as $key=>$data)
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="list-icon bgl-primary mr-3 mb-3">
                                            <img src="{{ asset('images/profile/users/'.$data->Member->info->image) }}" class="img-fluid rounded-circle" alt="MemberImage">
                                        </div>
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="{{ route('member.show', \Illuminate\Support\Facades\Crypt::encrypt($data->Member->id)) }}" class="text-black">{{ $data->Member->first_name.' '.$data->Member->last_name }} ({{ $data->Member->member_id }})</a></h4>
                                            <a href="mailto:{{strtolower($data->Member->email)}}" class="text-secondary font-w600">{{ strtolower($data->Member->email) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <span class="text-warning ml-2">{{ $data->Pack->package }} @ {{ $data->Pack->price }} INR for {{ $data->Pack->duration }} Days</span>
                                    </div>
                                    @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['fee']['list']))
                                    <div class="col-xl-5 col-xxl-12 col-lg-4 col-sm-12 d-flex align-items-center">
                                        <button type="button" class="btn mb-3 btn-secondary rounded mr-3" data-target="#ConfirmModal{{$key}}" data-toggle="modal"><i class="las la-stamp scale-2 mr-3"></i>Approve</button>
                                        <div class="modal fade" id="ConfirmModal{{$key}}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Approve Cash Collection Request!</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <form action="{{ route('cash.received') }}" method="post">@csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="card flex-xl-column flex-md-row flex-column">
                                                                    <div class="card-body profile px-3 pt-3 pb-0">
                                                                        <div class="profile-head d-flex">
                                                                            <div class="profile-photo">
                                                                                <img src="{{ asset('images/profile/users/'.$data->Member->info->image) }}" class="img-fluid rounded-circle" alt="{{ $data->Member->first_name.' '.$data->Member->last_name }}">
                                                                            </div>
                                                                            <div class="profile-details">
                                                                                <div class="profile-name px-3 pt-2">
                                                                                    <h4 class="text-primary mb-0"><strong>ID : {{ $data->Member->member_id }}</strong></h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <div class="profile-personal-info">
                                                                                <div class="mt-0 text-center"><h4 class="text-primary mb-4"><strong>Personal Information</strong></h4></div>
                                                                                <div class="row mb-2">
                                                                                    <div class="col-sm-3 col-5">
                                                                                        <h5 class="f-w-500"><i class="fa fa-user"></i> <span class="pull-right">:</span></h5>
                                                                                    </div>
                                                                                    <div class="col-sm-9 col-7"><span>{{ ucfirst($data->Member->first_name).' '.ucfirst($data->Member->last_name) }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-2">
                                                                                    <div class="col-sm-3 col-5">
                                                                                        <h5 class="f-w-500"><i class="fa fa-envelope"></i> <span class="pull-right">:</span>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-sm-9 col-7"><span>{{ strtolower($data->Member->email) }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-2">
                                                                                    <div class="col-sm-3 col-5">
                                                                                        <h5 class="f-w-500"><i class="fa fa-phone"></i> <span class="pull-right">:</span>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-sm-9 col-7"><span>{{ $data->Member->info->mobile }}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12 mt-0">
                                                                <div class="card flex-xl-column flex-md-row flex-column">
                                                                    <div class="card-body">
                                                                        <div class="mt-0 text-center"><h4 class="text-primary mb-4"><strong>Package Price & Information</strong></h4></div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-6 col-6">
                                                                                <h5 class="f-w-500">Price <span class="pull-right">:</span></h5>
                                                                            </div>
                                                                            <div class="col-sm-6 col-6">
                                                                                <span>
                                                                                    <strong>{{ $data->Pack->price }} Rupees</strong>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-6 col-6">
                                                                                <h5 class="f-w-500">Duration <span class="pull-right">:</span></h5>
                                                                            </div>
                                                                            <div class="col-sm-6 col-6"><span><strong>{{ $data->Pack->duration }} Days</strong></span></div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-6 col-6">
                                                                                <h5 class="f-w-500">Trainer <span class="pull-right">:</span></h5>
                                                                            </div>
                                                                            <div class="col-sm-6 col-6"><span><strong>@if($data->Pack->personal_trainer == 1) Included @else Not Included @endif</strong></span></div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm-6 col-6">
                                                                                <h5 class="f-w-500">Discount <span class="pull-right">:</span></h5>
                                                                            </div>
                                                                            <div class="col-sm-6 col-6">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox" id="ClickEnable{{$key}}" onclick="checkBox()">
                                                                                    <label class="form-check-label">
                                                                                        <strong>
                                                                                            Apply Discount
                                                                                        </strong>
                                                                                    </label>
                                                                                </div>
                                                                                <script type="text/javascript">
                                                                                    document.querySelector("#ClickEnable{{$key}}").addEventListener("click", checkBox);
                                                                                    function checkBox() {
                                                                                        const Box = document.querySelector("#ClickEnable{{$key}}");
                                                                                        const InBox = document.querySelector("#ShoOnClick{{$key}}");
                                                                                        if (Box.checked == true) {
                                                                                            InBox.style.display = "";
                                                                                        } else {
                                                                                            InBox.style.display = "none";
                                                                                        }
                                                                                    }
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2" style="display: none;" id="ShoOnClick{{$key}}">
                                                                            <div class="col-sm-6 col-6"></div>
                                                                            <div class="col-sm-6 col-6">
                                                                                <span>
                                                                                    <div class="input-group input-group-sm mb-3">
                                                                                        <input type="text" class="form-control-sm" style="width: 70px;" name="discount">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">Rupees</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <label for="RemarkData" class="col-form-label">Fill Collection Detail<span class="text-danger">*</span></label>
                                                                            <textarea class="form-control" rows="3" id="RemarkData" name="remark" placeholder="Enter a remark detail ..." required></textarea>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="Agreement{{$key}}">
                                                                                <script type="text/javascript">
                                                                                    document.querySelector("#Agreement{{$key}}").addEventListener("click", SendForm);
                                                                                    function SendForm() {
                                                                                        const Box = document.querySelector("#Agreement{{$key}}");
                                                                                        const InBox = document.querySelector("#AcceptRequest{{$key}}");
                                                                                        if (Box.checked == true) {
                                                                                            InBox.classList.remove("disabled");
                                                                                        } else {
                                                                                            InBox.classList.add("disabled");
                                                                                        }
                                                                                    }
                                                                                </script>
                                                                                <label class="form-check-label">
                                                                                    <strong>
                                                                                        I {{ Auth::user()->first_name.' '.Auth::user()->last_name }}, Do Hereby Confirm that i have received the Cash on behalf of Gym Owner.
                                                                                    </strong>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="container mt-4">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                            <input type="hidden" name="requestID" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($data->id) }}">
                                                                            <button type="submit" class="btn btn-primary float-right disabled" id="AcceptRequest{{$key}}">Collected!</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn mb-3 btn-danger rounded mr-3" data-target="#RejectModal{{$key}}" data-toggle="modal"><i class="las la-trash scale-2 mr-3"></i>Reject</button>
                                        <div class="modal fade" id="RejectModal{{$key}}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown mb-3">
                                            <a href="javascript:void(0)" class="more-button" data-toggle="dropdown" aria-expanded="false">
                                                <svg width="6" height="26" viewBox="0 0 6 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 3C6 4.65685 4.65685 6 3 6C1.34315 6 0 4.65685 0 3C0 1.34315 1.34315 0 3 0C4.65685 0 6 1.34315 6 3Z" fill="#585858"></path>
                                                    <path d="M6 13C6 14.6569 4.65685 16 3 16C1.34315 16 0 14.6569 0 13C0 11.3431 1.34315 10 3 10C4.65685 10 6 11.3431 6 13Z" fill="#585858"></path>
                                                    <path d="M6 23C6 24.6569 4.65685 26 3 26C1.34315 26 0 24.6569 0 23C0 21.3431 1.34315 20 3 20C4.65685 20 6 21.3431 6 23Z" fill="#585858"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                        @endif
                    </div>
                    <div class="tab-pane fade disabled" id="onlinePaid">
                        <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                            <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                <div class="list-icon bgl-primary mr-3 mb-3">
                                    <p class="fs-24 text-primary mb-0 mt-2">4</p>
                                    <span class="fs-14 text-primary">Mon</span>
                                </div>
                                <div class="info mb-3">
                                    <h4 class="fs-20 "><a href="workout-statistic.html" class="text-black">Routine Cardio Burn Workout</a></h4>
                                    <span class="text-danger font-w600">UNFINISHED</span>
                                </div>
                            </div>
                            <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip6)">
                                        <path d="M0.988957 17.0741C0.328275 17.2007 -0.104585 17.8386 0.0219821 18.4993C0.133361 19.0815 0.644693 19.4865 1.21678 19.4865C1.29272 19.4865 1.37119 19.4789 1.44713 19.4637L6.4592 18.5018C6.74524 18.4461 7.0009 18.2917 7.18316 18.0639L9.33481 15.3503L8.61593 14.9832C8.08435 14.7149 7.71474 14.2289 7.58818 13.6391L5.55804 16.1983L0.988957 17.0741Z" fill="#FF9432"></path>
                                        <path d="M18.84 6.49306C20.3135 6.49306 21.508 5.29854 21.508 3.82502C21.508 2.3515 20.3135 1.15698 18.84 1.15698C17.3665 1.15698 16.1719 2.3515 16.1719 3.82502C16.1719 5.29854 17.3665 6.49306 18.84 6.49306Z" fill="#FF9432"></path>
                                        <path d="M13.0179 3.15677C12.7369 2.8682 12.4762 2.75428 12.1902 2.75428C12.0864 2.75428 11.9826 2.76947 11.8712 2.79479L7.29203 3.88073C6.6592 4.03008 6.26937 4.66545 6.41872 5.29576C6.54782 5.83746 7.02877 6.20198 7.56289 6.20198C7.65404 6.20198 7.74514 6.19185 7.8363 6.16907L11.7371 5.24513C11.9902 5.52611 13.2584 6.90063 13.4888 7.14364C11.8763 8.87002 10.2639 10.5939 8.65137 12.3202C8.62605 12.3481 8.60329 12.3759 8.58049 12.4038C8.10966 13.0037 8.25397 13.9454 8.96275 14.3023L13.9064 16.826L11.3397 20.985C10.9878 21.5571 11.165 22.3064 11.7371 22.6608C11.9371 22.7848 12.1573 22.843 12.375 22.843C12.7825 22.843 13.1824 22.638 13.4128 22.2659L16.6732 16.983C16.8529 16.6919 16.901 16.34 16.8074 16.0135C16.7137 15.6844 16.4884 15.411 16.1821 15.2566L12.8331 13.553L16.3543 9.78636L19.0122 12.0393C19.2324 12.2266 19.5032 12.3177 19.7716 12.3177C20.0601 12.3177 20.3487 12.2114 20.574 12.0038L23.6243 9.16112C24.1002 8.71814 24.128 7.97392 23.685 7.49803C23.4521 7.24996 23.1383 7.12339 22.8244 7.12339C22.5383 7.12339 22.2497 7.22717 22.0245 7.43728L19.7412 9.56107C19.7386 9.56361 14.0178 4.18196 13.0179 3.15677Z" fill="#FF9432"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip6">
                                            <rect width="24" height="24" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="text-warning ml-2">Running</span>
                            </div>
                            <div class="col-xl-5 col-xxl-12 col-lg-4 col-sm-12 d-flex align-items-center">
                                <a href="javascript:void(0);" class="btn mb-3 play-button rounded mr-3"><i class="las la-caret-right scale-2 mr-3"></i>Start Workout</a>
                                <div class="dropdown mb-3">
                                    <a href="javascript:void(0)" class="more-button" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="6" height="26" viewBox="0 0 6 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 3C6 4.65685 4.65685 6 3 6C1.34315 6 0 4.65685 0 3C0 1.34315 1.34315 0 3 0C4.65685 0 6 1.34315 6 3Z" fill="#585858"></path>
                                            <path d="M6 13C6 14.6569 4.65685 16 3 16C1.34315 16 0 14.6569 0 13C0 11.3431 1.34315 10 3 10C4.65685 10 6 11.3431 6 13Z" fill="#585858"></path>
                                            <path d="M6 23C6 24.6569 4.65685 26 3 26C1.34315 26 0 24.6569 0 23C0 21.3431 1.34315 20 3 20C4.65685 20 6 21.3431 6 23Z" fill="#585858"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
