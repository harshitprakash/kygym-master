@extends('layouts.admin.master')
@section('title','Member Profile')
@section('custom-css')
    <style type="text/css">
        .imgPreview img {
            padding: 8px;
            max-width: 100px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
@endsection
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Member</li>
            <li class="breadcrumb-item active"><a href="#">{{ $member->first_name.' '.$member->last_name.' - ('.$member->member_id.')' }}</a></li>
        </ol>
    </div>
    <div class="row mt-0">
        <div class="col-xl-12">
            <div class="card-header flex-wrap border-0 pb-0">
                <h4 class="text-black fs-20 mb-3">Member Control Panel</h4>
                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['delete']))
                <div class="flex-wrap">
                    @if($member->status == 1)
                    <button type="button" id="BanMember" class="btn btn-danger btn-rounded" type="button">Ban Member</button>
                    @endif
                    @if($member->status == 0)
                    <button type="button" id="UnbanMember" class="btn btn-danger btn-rounded" type="button">Unban Member</button>
                    @endif
                    <a href="{{ route('member.edit', Crypt::encrypt($member->id)) }}" class="btn btn-danger btn-rounded">Edit Information</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-xl-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card flex-xl-column flex-md-row flex-column">
                        <div class="card-body profile px-3 pt-3 pb-0">
                            <div class="profile-head d-flex">
                                <div class="profile-photo">
                                    <img src="{{ asset('images/profile/users/'.$member->info->image) }}" class="img-fluid rounded-circle" alt="{{ $member->first_name.' '.$member->last_name }}">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0"><strong>ID : {{ ucfirst($member->member_id) }}</strong></h4>
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
                                        <div class="col-sm-9 col-7"><span>{{ ucfirst($member->first_name).' '.ucfirst($member->last_name) }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500"><i class="fa fa-crosshairs"></i> <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{ ucfirst($member->info->roleDetail->role) }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500"><i class="fa fa-venus-mars"></i> <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{ ucfirst($member->info->gender) }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500"><i class="fa fa-envelope"></i> <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{ strtolower($member->email) }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500"><i class="fa fa-phone"></i> <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{ $member->info->mobile }}  @if($member->info->mobile_verified_at) <i class="fa fa-check text-success"></i> <span class="text-success">Verified</span> @else <i class="fa fa-times text-danger"></i> <span class="text-danger">Unverified</span> @endif</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500"><i class="fa fa-birthday-cake"></i> <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{ date('j M, Y', strtotime($member->info->date_of_birth)) }} ({{ $member->info->getAge($member->info->date_of_birth) }} - Years)</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500"><i class="fa fa-map-marker"></i> <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{ $member->info->address.', '.$member->info->city.', '.$member->info->state.' - '.$member->info->pin_code }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 mt-2">
                    <div class="card flex-xl-column flex-md-row flex-column">
                        <div class="card-body">
                            <div class="mt-0 text-center"><h4 class="text-primary mb-4"><strong>Package Information</strong></h4></div>
                            @if($member->info->Package)
                                <div class="row mb-2">
                                    <div class="col-sm-6 col-6">
                                        <h5 class="f-w-500">Package <span class="pull-right">:</span></h5>
                                    </div>
                                    <div class="col-sm-6 col-6"><span><strong>{{ $member->info->Package->package }} Package</strong></span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6 col-6">
                                        <h5 class="f-w-500">Price <span class="pull-right">:</span></h5>
                                    </div>
                                    <div class="col-sm-6 col-6"><span><strong>{{ $member->info->Package->price }} Rupees</strong></span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6 col-6">
                                        <h5 class="f-w-500">Expire On <span class="pull-right">:</span></h5>
                                    </div>
                                    <div class="col-sm-6 col-6"><span><strong><script type="text/javascript">const add = {{ $member->info->door_access }}; const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]; const d = new Date(); d.setDate(d.getDate() + add); let Day = d.getDate(); let Month = monthNames[d.getMonth()]; let Year = d.getFullYear(); const piDate = Day + ' ' + Month + ", " + Year; document.write(piDate)</script></strong></span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6 col-6">
                                        <h5 class="f-w-500">Trainer <span class="pull-right">:</span></h5>
                                    </div>
                                    <div class="col-sm-6 col-6"><span><strong>@if($member->info->Package->personal_trainer == 1) Included @else Not Included @endif</strong></span></div>
                                </div>
{{--                                <div class="row mb-2 mt-5">--}}
{{--                                    <div class="col-sm-6 col-6">--}}
{{--                                        <form action="{{ route('pay.cash') }}" method="post">@csrf--}}
{{--                                            <input type="hidden" name="member" value="{{\Illuminate\Support\Facades\Crypt::encrypt($member->id)}}">--}}
{{--                                            <input type="hidden" name="package" value="{{\Illuminate\Support\Facades\Crypt::encrypt($member->info->Package->id)}}">--}}
{{--                                            <button class="btn btn-sm btn-primary" type="submit">Cash</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-6 col-6">--}}
{{--                                        <form action="#" method="post">--}}
{{--                                            <input type="hidden" name="member" value="{{\Illuminate\Support\Facades\Crypt::encrypt($member->id)}}">--}}
{{--                                            <input type="hidden" name="package" value="{{\Illuminate\Support\Facades\Crypt::encrypt($member->info->Package->id)}}">--}}
{{--                                            <button class="btn btn-sm btn-primary" type="submit" disabled title="Not Available Right Now!">Pay Now</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            @else
                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['package']['view']))
                                <div class="row mb-2 mt-5">
                                    <div class="col-sm-12 col-12 text-center">
                                        <button data-toggle="modal" type="button" data-target="#feeCollectionModal" class="btn mb-3 rounded mr-3 btn-sm btn-primary" title="Select Package Now!"><i class="las la-receipt scale-2 mr-3"></i>Select Now!</button>
                                    </div>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 mt-2">
                    <div class="card flex-xl-column flex-md-row flex-column">
                        <div class="card-body">
                            <div class="mt-0 text-center"><h4 class="text-primary mb-4"><strong>Emergency Contact</strong></h4></div>
                            @if($member->emergency)
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-4">
                                        <h5 class="f-w-500">Name <span class="pull-right">:</span></h5>
                                    </div>
                                    <div class="col-sm-8 col-8"><span><strong>{{ $member->emergency->name }}</strong></span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-4">
                                        <h5 class="f-w-500">Relation <span class="pull-right">:</span></h5>
                                    </div>
                                    <div class="col-sm-8 col-8"><span><strong>{{ $member->emergency->relation }}</strong></span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-4">
                                        <h5 class="f-w-500">Mobile <span class="pull-right">:</span></h5>
                                    </div>
                                    <div class="col-sm-8 col-8"><span><strong><a href="tel:+91{{ $member->emergency->mobile }}">{{ $member->emergency->mobile }}</a></strong></span></div>
                                </div>
                                <div class="row mb-2 mt-0">
                                    <div class="col-sm-4 col-4">
                                        <h5 class="f-w-500">Address <span class="pull-right">:</span></h5>
                                    </div>
                                    <div class="col-sm-8 col-8"><span><strong>{{ $member->emergency->address }}</strong></span></div>
                                </div>
                            @else
                                <p>Register for a pack</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card plan-list">
                            <div class="card-body tab-content pt-2">
                                @if($member->Access->access_till == null)
                                    <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                        <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                            <div class="info mb-3">
                                                <h4 class="fs-20 "><span class="text-black">Add Existing Plan</span></h4>
                                                <span class="text-danger font-w600">Existing Member! Update Previous Plan Expiry.</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                            <button data-toggle="modal" type="button" data-target="#AddExistingExpiry" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-receipt scale-2 mr-3"></i>Existing</button>
                                            <!--    Package Selection Model Starts   -->
                                            <div class="modal fade" id="AddExistingExpiry">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form action="{{ route('member.existing') }}" method="post">@csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Package Selection & Fee Collect!</h5><br>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Select Package for Member!.....</label>
                                                                            <select class="form-control default-select" tabindex="-98" name="package">
                                                                                <option value="" name="package" style="color: black; background-color: black;">Select Package......</option>
                                                                                @foreach(App\Models\packages::get() as $key=>$data)
                                                                                    <option value="{{ Crypt::encrypt($data->id) }}" name="package" style="background-color: black;">{{ $data->package.' '.'@'.' '.$data->price.' ₹' }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">{{ \Illuminate\Support\Facades\Auth::user()->first_name.' '.\Illuminate\Support\Facades\Auth::user()->last_name }} Membership Will Expire on!...<span class="text-red">*</span></label>
                                                                            <input type="date" name="expire" class="form-control " value="" id="expire" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="CheckBOXIDMember">
                                                                            <script type="text/javascript">
                                                                                document.querySelector("#CheckBOXIDMember").addEventListener("click", SendMembership);
                                                                                function SendMembership() {
                                                                                    const Box = document.querySelector("#CheckBOXIDMember");
                                                                                    const InBox = document.querySelector("#SubmitMemberShipBTN");
                                                                                    InBox.disabled = true;
                                                                                    if (Box.checked === true) {
                                                                                        InBox.disabled = false;
                                                                                    }
                                                                                }
                                                                            </script>
                                                                            <label class="form-check-label">
                                                                                <strong>
                                                                                    I {{ Auth::user()->first_name.' '.Auth::user()->last_name }}, Do Hereby Confirm that the Member is an existing Gym Member & His/Her Membership expire on the date mentioned above!.
                                                                                </strong>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="member" value="{{ Crypt::encrypt($member->id) }}">
                                                                <input type="hidden" name="is_admin" value="1">
                                                                <button type="submit" class="btn btn-outline-primary btn-sm" id="SubmitMemberShipBTN" disabled>Update Membership!</button>
                                                                <button type="button" class="btn btn-outline-danger btn-sm light" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--    Package Selection Model End   -->
                                        </div>
                                    </div>
                                @endif
                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['package']['view']))
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><span class="text-black">Select Package & Collect Fees</span></h4>
                                            @if($member->info->Package)
                                                <span class="text-secondary font-w600">{{ ucfirst($member->info->Package->package) }} Package - active till : {{ date('j M, Y', strtotime($member->Access->access_till)) }}<span></span></span>
                                            @else
                                                <span class="text-danger font-w600">New! Member Select Package Now!</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <button data-toggle="modal" type="button" data-target="#feeCollectionModal" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-receipt scale-2 mr-3"></i>Collect</button>
                                        <!--    Package Selection Model Starts   -->
                                        <div class="modal fade" id="feeCollectionModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <form action="{{ route('pay.cash') }}" method="post">@csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Package Selection & Fee Collect!</h5><br>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="dropdown bootstrap-select form-control default-select">
                                                                            <lable class="col-sm-3 col-form-label">Select Package for Member!.....</lable>
                                                                            <select class="form-control default-select" tabindex="-98" name="package">
                                                                                <option value="" name="package" style="color: black; background-color: black;">Select Package......</option>
                                                                                @foreach(App\Models\packages::get() as $key=>$data)
                                                                                    <option value="{{ Crypt::encrypt($data->id) }}" name="package" style="background-color: black;">{{ $data->package.' '.'@'.' '.$data->price.' ₹' }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 mt-4">
                                                                    <div class="form-group mb-0">
                                                                        <label class="radio-inline mr-3"><input type="radio" id="CashPay" name="payment" value="cash" checked> Cash Payment</label>
                                                                        <label class="radio-inline mr-3"><input type="radio" id="OnlinePay" name="payment" value="online"> Online payment</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 mt-4">
                                                                    <div class="row mb-2">
                                                                        <div class="col-sm-6 col-6">
                                                                            <h5 class="f-w-500">Discount <span class="pull-right">:</span></h5>
                                                                        </div>
                                                                        <div class="col-sm-6 col-6">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="ClickEnable" onclick="checkBox()">
                                                                                <label class="form-check-label">
                                                                                    <strong>
                                                                                        Apply Discount
                                                                                    </strong>
                                                                                </label>
                                                                            </div>
                                                                            <script type="text/javascript">
                                                                                document.querySelector("#ClickEnable").addEventListener("click", checkBox);
                                                                                function checkBox() {
                                                                                    const Box = document.querySelector("#ClickEnable");
                                                                                    const InBox = document.querySelector("#ShoOnClick");
                                                                                    const InpAM = document.querySelector("#DiscountBOX");
                                                                                    if (Box.checked === true) {
                                                                                        InpAM.value = "";
                                                                                        InBox.style.display = "";
                                                                                    } else {
                                                                                        InpAM.value = "";
                                                                                        InBox.style.display = "none";
                                                                                    }
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2" style="display: none;" id="ShoOnClick">
                                                                        <div class="col-sm-6 col-6"></div>
                                                                        <div class="col-sm-6 col-6">
                                                                                <span>
                                                                                    <div class="input-group input-group-sm mb-3">
                                                                                        <input type="text" class="form-control-sm" id="DiscountBOX" style="width: 70px;" name="discount">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">Rupees</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-4">
                                                                <div class="col-sm-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="CheckBOXID">
                                                                        <script type="text/javascript">
                                                                            document.querySelector("#CheckBOXID").addEventListener("click", SendForm);
                                                                            function SendForm() {
                                                                                const Box = document.querySelector("#CheckBOXID");
                                                                                const InBox = document.querySelector("#SubmitPackageBTN");
                                                                                InBox.disabled = true;
                                                                                if (Box.checked === true) {
                                                                                    InBox.disabled = false;
                                                                                }
                                                                            }
                                                                        </script>
                                                                        <label class="form-check-label">
                                                                            <strong>
                                                                                I {{ Auth::user()->first_name.' '.Auth::user()->last_name }}, Do Hereby Confirm that the Payment of package has been received, either through cash or online mode.
                                                                            </strong>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="member" value="{{ Crypt::encrypt($member->id) }}">
                                                            <input type="hidden" name="is_admin" value="1">
                                                            <button type="submit" class="btn btn-outline-primary btn-sm" id="SubmitPackageBTN" disabled>Collected!</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm light" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--    Package Selection Model End   -->
                                    </div>
                                </div>
                                @endif
                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['rfid']['view']))
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="#CardAddingURL" class="text-black">Configure RFID Card for Member!</a></h4>
                                            <span class="text-danger font-w600">Card Not Provided to Member!</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <button id="CardConfig" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-credit-card scale-2 mr-3"></i>Card</button>
                                        <!--    Card Configuration Model Starts   -->
                                        <form action="{{ route('init.add', $member->id) }}" id="CardConfigForm" method="get">@csrf
                                        </form>
                                        <script type="text/javascript">
                                            document.getElementById('CardConfig').addEventListener('click', function () {
                                                Swal.fire({
                                                    title: 'Adding card for Member!',
                                                    text: "You are issuing a new card to {{ $member->first_name.' '.$member->last_name }}!.",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#3085d6',
                                                    confirmButtonText: 'Yes, Initiate!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('CardConfigForm').submit();
                                                    } else {
                                                        swal.fire({
                                                            title: "Action Stopped!",
                                                            text: "Process Stopped!.",
                                                            icon: "info",
                                                        })
                                                    }
                                                })
                                            });
                                        </script>
                                        <!--    Card Configuration Model End   -->
                                    </div>
                                </div>
                                @endif
                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['finger']['view']))
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="#CardAddingURL" class="text-black">Configure Finger of Member!</a></h4>
                                            <span class="text-danger font-w600">Finger Not configured to Member!</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <button id="FingerConfig" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-fingerprint scale-2 mr-3"></i>Finger</button>
                                        <!--    Card Configuration Model Starts   -->
                                        <form action="{{ route('initiate.adding', $member->id) }}" id="FingerConfigForm" method="get">@csrf</form>
                                        <script type="text/javascript">
                                            document.getElementById('FingerConfig').addEventListener('click', function () {
                                                Swal.fire({
                                                    title: 'Adding Finger of Member!',
                                                    text: "You are adding a new Finger of {{ $member->first_name.' '.$member->last_name }} in machine!.",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#3085d6',
                                                    confirmButtonText: 'Yes, Add!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('FingerConfigForm').submit();
                                                    } else {
                                                        swal.fire({
                                                            title: "Action Stopped!",
                                                            text: "Process is Stopped!.",
                                                            icon: "info",
                                                        })
                                                    }
                                                })
                                            });
                                        </script>
                                        <!--    Finger Configuration Model End   -->
                                    </div>
                                </div>
                                @endif
                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['assignex']['view']))
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="#CardAddingURL" class="text-black">Assign Exercise for Member</a></h4>
                                            <span class="text-danger font-w600">Assigned Exercises!</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <button data-toggle="modal" type="button" data-target="#AssignExerciseModel" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-user-shield scale-2 mr-3"></i>Exercise</button>
                                        <!--    Assign Exercise Model Starts   -->
                                        <div class="modal fade" id="AssignExerciseModel">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <form action="#" method="post">@csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Assign Exercise to {{ $member->first_name.' '.$member->last_name }}.</h5><br>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Configuration Code will be there.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="member_id" value="{{$member->id}}">
                                                            <button type="submit" class="btn btn-outline-primary btn-sm" id="SubmitDataBTN">Save </button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm light" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--    Assign Exercise Model End   -->
                                    </div>
                                </div>
                                @endif
                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['assigndiet']['view']))
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="#CardAddingURL" class="text-black">Suggest Diet as per BMI of Member!</a></h4>
                                            <span class="text-danger font-w600">Previous Diets will Show up here!</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <button data-toggle="modal" type="button" data-target="#AssignDietModel" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-egg scale-2 mr-3"></i>Diet</button>
                                        <!--    Assign Diet Model Starts   -->
                                        <div class="modal fade" id="AssignDietModel">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <form action="#" method="post">@csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Assign Diet to {{ $member->first_name.' '.$member->last_name }}.</h5><br>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Configuration Code will be there.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="member_id" value="{{$member->id}}">
                                                            <button type="submit" class="btn btn-outline-primary btn-sm" id="SubmitDataBTN">Save </button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm light" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--    Assign Diet Model End   -->
                                    </div>
                                </div>
                                @endif
                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['attendance']['view']))
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="#CardAddingURL" class="text-black">Attendance History of Member!</a></h4>
                                            <span class="text-danger font-w600">Here you can check previous attendance history!</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <a href="{{ route('member.attendance', \Illuminate\Support\Facades\Crypt::encrypt($member->id)) }}" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-list scale-2 mr-3"></i>View All</a>
                                    </div>
                                </div>
                                @endif
                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['fee']['view']))
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="#CardAddingURL" class="text-black">Payments History of Member!</a></h4>
                                            <span class="text-danger font-w600">Here you can check previous payments history!</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <a href="{{ route('member.pay.history', \Illuminate\Support\Facades\Crypt::encrypt($member->id)) }}" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-list scale-2 mr-3"></i>View All</a>
                                    </div>
                                </div>
                                @endif
                                @if($member->info->role_id == 5 && isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['update']))
                                <!-- Promote Button -->
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="#CardAddingURL" class="text-black">Promote to make Trainer or Staff!</a></h4>
                                            <span class="text-secondary font-w600">{{ $member->first_name.' '.$member->last_name }} is Currently a Member.</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <button id="PromoteButton" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-arrow-circle-up scale-2 mr-3"></i>Promote</button>
                                        <!--    Create Trainer (Promote) Model Starts   -->
                                        <form action="{{ route('promote.member') }}" id="PromoteMember" method="post">@csrf
                                            <input type="hidden" name="member" value="{{ Crypt::encrypt($member->id) }}">
                                        </form>
                                        <script type="text/javascript">
                                            document.getElementById('PromoteButton').addEventListener('click', function () {
                                                Swal.fire({
                                                    title: 'Are you sure!',
                                                    text: "After this! {{ $member->first_name.' '.$member->last_name }} Will Become a Trainer!.",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#3085d6',
                                                    confirmButtonText: 'Yes, Do it!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('PromoteMember').submit();
                                                    } else {
                                                        swal.fire({
                                                            title: "Action Stopped!",
                                                            text: "{{ $member->first_name.' '.$member->last_name }} is Still a Member!.",
                                                            icon: "info",
                                                        })
                                                    }
                                                })
                                            });
                                        </script>
                                        <!--    Create Trainer (Promote) Model End   -->
                                    </div>
                                </div>
                                <!-- Promote Button -->
                                @endif
                                @if($member->info->role_id == 3 && isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['update']))
                                <!-- Demote Button -->
                                <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                                    <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                        <div class="info mb-3">
                                            <h4 class="fs-20 "><a href="#CardAddingURL" class="text-black">Demote to make Member!</a></h4>
                                            <span class="text-secondary font-w600">{{ $member->first_name.' '.$member->last_name }} is currenty a Trainer.</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                        <button id="DemoteButton" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-arrow-circle-down scale-2 mr-3"></i>Demote</button>
                                        <!--    Demote Trainer (Demote) Model Starts   -->
                                        <form action="{{ route('demote.trainer') }}" id="DemoteMember" method="post">@csrf
                                            <input type="hidden" name="member" value="{{ Crypt::encrypt($member->id) }}">
                                        </form>
                                        <script type="text/javascript">
                                            document.getElementById('DemoteButton').addEventListener('click', function () {
                                                Swal.fire({
                                                    title: 'Are you sure!',
                                                    text: "After this! {{ $member->first_name.' '.$member->last_name }} Will Become a Gym Member!.",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#3085d6',
                                                    confirmButtonText: 'Yes, Do it!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('DemoteMember').submit();
                                                    } else {
                                                        swal.fire({
                                                            title: "Action Stopped!",
                                                            text: "{{ $member->first_name.' '.$member->last_name }} is Still a Trainer!.",
                                                            icon: "info",
                                                        })
                                                    }
                                                })
                                            });
                                        </script>
                                        <!--    Create Trainer (Promote) Model End   -->
                                    </div>
                                </div>
                                <!-- Demote Button -->
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   BMI Model Start    -->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('healthcare.store') }}" method="post">@csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">BMI Calculator</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <lable class="col-sm-3 col-form-label">Age</lable>
                                    <div class="col-sm-9">
                                        <strong>
                                            <input type="text" name="age" value="{{ $member->info->getAge($member->info->date_of_birth) }} Years" class="form-control-plaintext"  placeholder="Enter Age" required>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <lable class="col-sm-3 col-form-label">Height (cm)</lable>
                                    <div class="col-sm-9">
                                        <input type="text" name="height" id="height" class="form-control default-control @error('height') is-invalid @enderror" value="{{ old('height') }}" placeholder="Enter height" required>
                                        @error('height')
                                        <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <lable class="col-sm-3 col-form-label">Weight (kg)</lable>
                                    <div class="col-sm-9">
                                        <input type="text" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}" placeholder="Enter weight" required>
                                        @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="member_id" value="{{$member->id}}">
                        <button type="submit" class="btn btn-outline-primary btn-sm">Save </button>
                        <button type="button" class="btn btn-outline-danger btn-sm light" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
        <!--    Ban Program Starts   -->
        <form action="{{ route('ban.member', Crypt::encrypt($member->id)) }}" id="BanMemberForm" method="get">@csrf</form>
        <script type="text/javascript">
            document.getElementById('BanMember').addEventListener('click', function () {
                Swal.fire({
                    title: 'Are you Sure to Ban!',
                    text: "You are about to ban {{ $member->first_name.' '.$member->last_name }}!.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, Ban!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('BanMemberForm').submit();
                    } else {
                        swal.fire({
                            title: "Action Stopped!",
                            text: "Member is not banned!.",
                            icon: "info",
                        })
                    }
                })
            });
        </script>
        <!--    Ban Program End   -->
        <!--    Unban Program Starts   -->
        <form action="{{ route('unban.member', Crypt::encrypt($member->id)) }}" id="UnbanMemberForm" method="get">@csrf</form>
        <script type="text/javascript">
            document.getElementById('UnbanMember').addEventListener('click', function () {
                Swal.fire({
                    title: 'Are you Sure to Unban!',
                    text: "You are about to unban {{ $member->first_name.' '.$member->last_name }}!.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, Unban!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('UnbanMemberForm').submit();
                    } else {
                        swal.fire({
                            title: "Action Stopped!",
                            text: "Member is not banned!.",
                            icon: "info",
                        })
                    }
                })
            });
        </script>
        <!--    Unban Program End   -->
    </div>
    <!--    BMI Model End   -->
@endsection
@section('custom-script')
    @if(Session::has('bmi'))
        <script type="text/javascript">
            swal.fire({
                title: "Congratulations!",
                text: "{{Session::get('bmi')}}",
                icon: "success",
            })
        </script>
    @endif
@endsection
