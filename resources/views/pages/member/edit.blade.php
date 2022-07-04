@extends('layouts.admin.master')
@section('title','Edit Member')

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Member</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Member</a></li>
        </ol>
    </div>
        <form action="{{ route('member.update', \Illuminate\Support\Facades\Crypt::encrypt($member->id)) }}" method="POST" enctype="multipart/form-data">@csrf {{ method_field('PUT') }}
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
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="First Name" value="{{$member->first_name }}" autofocus required>
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
                                <input type="Text" class="form-control @error('first_name') is-invalid @enderror" name="last_name" value="{{ $member->last_name}}" placeholder="Last Name">
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
                            <label class="col-sm-3 col-form-label">Date of Birth<span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ $member->info->date_of_birth }}" id="DoB" required>
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
                            <label class="col-sm-3 col-form-label">Date of Joining<span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="created_at" class="form-control @error('created_at') is-invalid @enderror" value="{{ \Carbon\Carbon::parse($member->info->created_at)->toDateString() }}" id="doj" required>
                                @error('doj')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label @error('gender') is-invalid @enderror">Gender <span class="text-red">*</span></label>
                            <div class="col-sm-9 form-group mb-0">
                                <label class="radio-inline mr-3 mt-2"><input type="radio" name="gender" value="male" @if($member->info->gender == 'male') checked="checked" @endif> Male</label>
                                <label class="radio-inline mr-3 mt-2"><input type="radio" name="gender" value="female" @if($member->info->gender == 'female') checked="checked" @endif> Female</label>
                                <label class="radio-inline mr-3 mt-2"><input type="radio" name="gender" value="other" @if($member->info->gender == 'other') checked="checked" @endif> Other</label>
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
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" readonly placeholder="Enter your email" value="{{ $member->email }}" >
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
                                <input type="text" name="mobile_no" onkeypress='return restrictAlphabets(event)' class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" placeholder="Enter your Mobile No" value="{{ $member->info->mobile }}" required>
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
                                <textarea rows="5" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Enter your address" required>{{ $member->info->address}}</textarea>
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
                                <input type="text" onkeypress="return restrictAlphabets(event)" maxlength="6" class="form-control @error('pin_code') is-invalid @enderror" name="pin_code" id="InputPINcode" placeholder="Enter pin" value="{{ $address['pin_code'] }}" required>
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
                                <select name="post" id="PostOfficeID" class="form-control @error('post') is-invalid @enderror" required>
                                    <option name="post">Select Your Area</option>
                                    @foreach($address['post'] as $key => $data)
                                    <option name="post" value="{{$data}}" @if($address['post_db'] == $data) selected @endif>{{$data}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State<span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <select name="state" id="stateID" class="form-control @error('state') is-invalid @enderror" required>
                                    <option name="state" value="{{$address['state']}}" selected="selected">{{$address['state']}}</option>
                                </select>
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
                                <select name="city" id="cityID" class="form-control @error('city') is-invalid @enderror" required>
                                    <option name="state" value="{{ $address['district'] }}" selected="selected">{{ $address['district'] }}</option>
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
                                <input type="text" name="emergency_name" id="full_name" class="form-control @error('emergency_name') is-invalid @enderror" value="{{ $member->emergency->name }}" placeholder="Enter Name" required>
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
                            <lable class="col-sm-3 col-form-label">Relation<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <input type="text" name="relation" id="relation" class="form-control @error('relation') is-invalid @enderror" value="{{ $member->emergency->relation}}" placeholder="Enter Relation" required>
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
                            <lable class="col-sm-3 col-form-label">mobile No<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <input type="text" name="emergency_mobile_no" onkeypress='return restrictAlphabets(event)' class="form-control @error('emergency_mobile_no')is-invalid @enderror" maxlength="10" placeholder="Emergency Contact details" value="{{ $member->emergency->mobile}}" required>
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
                            <lable class="col-sm-3 col-form-label">Document Type<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <select name="document_type" id="document_type" class="form-control @error('document_type') is-invalid @enderror" required>
                                    <option name="document_type" value="" @if(old('document_type') == '') selected="selected" @endif>Select Document</option>
                                    <option name="document_type" value="Aadhar Card" @if($member->documents->document_type == 'Aadhar Card') selected="selected" @endif>Aadhar Card</option>
                                    <option name="document_type" value="Pan Card" @if($member->documents->document_type == 'Pan Card') selected="selected" @endif>Pan Card</option>
                                    <option name="document_type" value="Voter Id" @if($member->documents->document_type == 'Voter Id') selected="selected" @endif>Voter Id</option>
                                    <option name="document_type" value="Driving licence" @if( $member->documents->document_type == 'Driving licence') selected="selected" @endif>Driving licence</option>
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
                            <lable class="col-sm-3 col-form-label">Document Number<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <input type="text" name="document_number" id="document_number" class="form-control @error('document_number') is-invalid @enderror" value="{{ $member->documents->document_number }}" placeholder=" Document Number ">
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
                            <lable class="col-sm-3 col-form-label">File Upload<span class="text-red">*</span></lable>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" name="file_name" value="{{ old('file_name') }}" class="custom-file-input @error('file_name') is-invalid @enderror" accept="image/jpeg ,image/png ,application/pdf">
                                    @error('document_number')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{$message}}</strong>
                                   </span>
                                    @enderror
                                    <label class="custom-file-label">Choose file<span class="text-red">*</span></label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['update']))
            <div class="card-footer">
                <button type="submit" class="btn btn-primary fa-pull-right " > <i class="fa fa-save">&nbsp;</i> Save</button>
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
