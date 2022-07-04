@extends('layouts.admin.master')
@section('title','Create Member')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Member</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Create Member</a></li>
        </ol>
    </div>
    <form method="POST" action="{{ route('member.store') }}" enctype="multipart/form-data">@csrf
        <div class="card">
            <div class="card-header">
                <div class="mr-auto pr-3 mb-sm-0 mb-3">
                    <h4 class="text-black fs-20">Basic Details</h4>
                    <p class="fs-13 mb-0 text-black">Make All <span class="text-red">(*)</span> fields mandatory</p>
                </div>

            </div>
            <div class="card-body mb-0">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name <span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                       name="first_name" placeholder="First Name" value="{{ old('first_name') }}"
                                       autofocus required>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="Text" class="form-control @error('first_name') is-invalid @enderror"
                                       name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">DoB<span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="date_of_birth"
                                       class="form-control @error('date_of_birth') is-invalid @enderror"
                                       value="{{ old('date_of_birth') }}" id="DoB" required>
                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label @error('gender') is-invalid @enderror">Gender<span
                                    class="text-red">*</span></label>
                            <div class="col-sm-9 form-group mb-0">
                                <label class="radio-inline mr-3 mt-2"><input type="radio" name="gender" value="male"
                                                                             @if(old('gender') == 'male') checked="checked" @endif>
                                    Male</label>
                                <label class="radio-inline mr-3 mt-2"><input type="radio" name="gender" value="female"
                                                                             @if(old('gender') == 'female') checked="checked" @endif>
                                    Female</label>
                                <label class="radio-inline mr-3 mt-2"><input type="radio" name="gender" value="other"
                                                                             @if(old('gender') == 'other') checked="checked" @endif>
                                    Other</label>
                            </div>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Email<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <input type="text" name="email"
                                       class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="Enter your email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Mobile No<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <input type="text" onkeypress="return restrictAlphabets(event)" maxlength="10"
                                       name="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror"
                                       id="mobile_no" placeholder="Enter your Mobile No" value="{{ old('mobile_no') }}"
                                       required>
                                @error('mobile_no')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Address<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <textarea rows="5" class="form-control @error('address') is-invalid @enderror"
                                          name="address" id="address" placeholder="Enter your address"
                                          required>{{ old('address') }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Pin Code<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <input type="text" onkeypress="return restrictAlphabets(event)" maxlength="6"
                                       class="form-control @error('pin_code') is-invalid @enderror" name="pin_code"
                                       id="InputPINcode" placeholder="Enter pin" value="{{ old('pin_code') }}" required>
                                @error('pin_code')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Post Office<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <select name="post" id="PostOfficeID" class="form-control @error('post') is-invalid @enderror" required></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State <span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <select name="state" id="stateID" class="form-control @error('state') is-invalid @enderror" required></select>
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City<span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <select name="city" id="cityID" class="form-control @error('city') is-invalid @enderror" required></select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Joining Date<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('created_at') is-invalid @enderror"
                                       name="created_at" placeholder="Enter Joining date if existing member"
                                       value="{{ old('created_at') }}">
                                @error('created_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Register As<span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <select name="role" id="roleID" class="form-control @error('role') is-invalid @enderror"
                                        required>
                                    @if(\Illuminate\Support\Facades\Auth::user()->info->role_id == 1)
                                        <option name="role" value="2"
                                                @if(old('role') == '2') selected="selected" @endif>Admin
                                        </option>
                                        <option name="role" value="3"
                                                @if(old('role') == '3') selected="selected" @endif>Trainer
                                        </option>
                                        <option name="role" value="4"
                                                @if(old('role') == '4') selected="selected" @endif>HelpDesk
                                        </option>
                                        <option name="role" value="5"
                                                @if(old('role') == '5') selected="selected" @endif>Member
                                        </option>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::user()->info->role_id == 2)
                                        <option name="role" value="3"
                                                @if(old('role') == '3') selected="selected" @endif>Trainer
                                        </option>
                                        <option name="role" value="4"
                                                @if(old('role') == '4') selected="selected" @endif>HelpDesk
                                        </option>
                                        <option name="role" value="5"
                                                @if(old('role') == '5') selected="selected" @endif>Member
                                        </option>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::user()->info->role_id == 3)
                                        <option name="role" value="5"
                                                @if(old('role') == '5') selected="selected" @endif>Member
                                        </option>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::user()->info->role_id == 4)
                                        <option name="role" value="5"
                                                @if(old('role') == '5') selected="selected" @endif>Member
                                        </option>
                                    @endif
                                </select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title ">Emergency Contact details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Full Name<span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="emergency_name" id="full_name"
                                       class="form-control @error('emergency_name') is-invalid @enderror"
                                       value="{{ old('emergency_name') }}" placeholder="Enter Name" required>
                                @error('emergency_name')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Relation <span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <input type="text" name="relation" id="relation"
                                       class="form-control @error('relation') is-invalid @enderror"
                                       value="{{ old('relation') }}" placeholder="Enter Relation" required>
                                @error('relation')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Emergency Mobile No<span class="text-red">*</span>
                            </lable>
                            <div class="col-sm-9">
                                <input type="text" name="emergency_mobile_no"
                                       onkeypress="return restrictAlphabets(event)" maxlength="10"
                                       class="form-control @error('emergency_mobile_no')is-invalid @enderror"
                                       placeholder="Emergency Contact details" value="{{ old('emergency_mobile_no') }}"
                                       required>
                                @error('emergency_mobile_no')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title ">Documents</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Document Type <span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <select name="document_type" id="document_type"
                                        class="form-control @error('document_type') is-invalid @enderror" required>
                                    <option name="document_type" value=""
                                            @if(old('document_type') == '') selected="selected" @endif>Select Document
                                    </option>
                                    <option name="document_type" value="Aadhar Card"
                                            @if(old('document_type') == 'Aadhar Card') selected="selected" @endif>Aadhar
                                        Card
                                    </option>
                                    <option name="document_type" value="Pan Card"
                                            @if(old('document_type') == 'Pan Card') selected="selected" @endif>Pan Card
                                    </option>
                                    <option name="document_type" value="Voter Id"
                                            @if(old('document_type') == 'Voter Id') selected="selected" @endif>Voter Id
                                    </option>
                                    <option name="document_type" value="Driving licence"
                                            @if(old('document_type') == 'Driving licence') selected="selected" @endif>
                                        Driving licence
                                    </option>
                                </select>
                                @error('document_type')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">Document Number <span class="text-red">*</span>
                            </lable>
                            <div class="col-sm-9">
                                <input type="text" name="document_number" id="document_number"
                                       class="form-control @error('document_number') is-invalid @enderror"
                                       value="{{ old('document_number') }}" placeholder=" Document Number ">
                                @error('document_number')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                               </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <lable class="col-sm-3 col-form-label">File Upload <span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" name="file_name" value="{{ old('file_name') }}"
                                           class="custom-file-input @error('file_name') is-invalid @enderror"
                                           accept="image/jpeg ,image/png ,application/pdf">
                                    @error('document_number')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{$message}}</strong>
                                   </span>
                                    @enderror
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['create']))
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary fa-pull-right "><i class="fa fa-save">&nbsp;</i>Create
                        Member
                    </button>
                </div>
            @endif
        </div>
    </form>
@endsection
@section('custom-script')
    <script type="text/javascript">
        $(document).ready(function () {
            /*----------- #emploee-department is the id of selector from which we have to take the data. ----------------*/
            $('#InputPINcode').bind("keyup", function (e) {
                const url = "{{ route('get.pin') }}";
                const country = "IN";
                const pin = e.target.value;
                if (pin.length == '6') {
                    $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            country: country,
                            pin: pin,
                        },
                        success: function (data) {
                            $('#stateID').empty().append('<option name="state">Select your State!</option>');
                            $('#stateID').append('<option name="state" value="' + data.state + '">' + data.state + '</option>');
                            $('#cityID').empty().append('<option name="city">Select your city or district!</option>');
                            $('#cityID').append('<option name="city" value="' + data.district + '">' + data.district + '</option>');
                            let post = data.post;
                            let size = post.length - 1;
                            $('#PostOfficeID').empty().append('<option name="post">Select your area!</option>');
                            while(size!=0) {
                                $('#PostOfficeID').append('<option name="post" value="' + post[size] + '">' + post[size] + '</option>')
                                size--;
                            }
                        }
                    })
                } else {
                    $('#stateID').empty();
                    $('#cityID').empty();
                    $('#PostOfficeID').empty();
                }
            });
        });
    </script>
@endsection
