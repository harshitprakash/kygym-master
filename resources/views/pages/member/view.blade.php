@extends('layouts.admin.master')
@section('title','Member Profile')
@section('custom-css')
    <style type="text/css">
        .imgPreview img {
            padding: 8px;
            max-width: 100px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('vendor/lightgallery/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
@endsection
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Member</li>
            <li class="breadcrumb-item active"><a href="#">Member Profile</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="{{ asset('images/profile/users/'.$member->info->image) }}" class="img-fluid rounded-circle" alt="{{ $member->first_name.' '.$member->last_name }}">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{ ucfirst($member->first_name).' '.ucfirst($member->last_name) }}</h4>
                                <p>{{ $member->info->roleDetail->role }}</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">{{ $member->email }}</h4>
                                <p>Email</p>
                            </div>
                            <div class="dropdown ml-auto">
                                <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                        </g>
                                    </svg></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <a href="#" data-toggle="modal" data-target="#change-password"><li class="dropdown-item"><i class="fa fa-key text-primary mr-2"></i>Change Password</li></a>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i>Block</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="profile-statistics ">
                        <div class="text-center ">
                            <div class="row">
                                <div class="col">
                                    @if($member->info->Package)
                                        @if($member->info->door_access <= 0)
                                            <div class="col">
                                                <h3 class="m-b-0">Package Expired!</h3><span>Pay now to continue the services!.</span>
                                            </div>
                                            <a href="{{ route('fee.show', $member->id) }}" class="btn btn-sm btn-danger mt-4">Pay Now</a>
                                        @elseif($member->info->door_access <= 3)
                                            <div class="col">
                                                <h3 class="m-b-0">{{ $member->info->Package->package }} About to Expire!</h3>
                                                <span>Renew now to stay Ahead!.</span>
                                            </div>
                                            <form action="{{ route('package.confirmation') }}" method="post">@csrf
                                                <input type="hidden" name="user" value="{{$member->id}}">
                                                <input type="hidden" name="package" value="{{$member->info->package_id}}">
                                                <button type="submit" class="btn btn-sm btn-danger mt-4">Renew Now</button>
                                            </form>
                                        @else
                                            <div class="col">
                                                <h3 class="m-b-0">{{ $member->info->Package->package }} is Active!</h3><span class="text-secondary is-valid">Active till - <script type="text/javascript">const add = {{ $member->info->door_access }}; const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]; const d = new Date(); d.setDate(d.getDate() + add); let Day = d.getDate(); let Month = monthNames[d.getMonth()]; let Year = d.getFullYear(); const piDate = Day + ' ' + Month + "," + Year; document.write(piDate)</script></span>
                                            </div>
                                        @endif
                                    @else
                                        <div class="col">
                                            <h3 class="m-b-0">Package Not Selected</h3><span>Select Package to start GYM.</span>
                                        </div>
                                        <a href="{{ route('fee.show', $member->id) }}" class="btn btn-sm btn-danger mt-4">Select Package Now</a>
                                    @endif
                                </div>
                            </div>
                            <div class="ti-layout-menu-separated mt-4">

                            </div>
                            @if($member->BMI)
                                <div class="row mt-4">
                                    <div class="col">
                                        <h3 class="m-b-0"> {{ round($member->BMI->bmi)}} </h3><span>B.M.I</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">{{$member->BMI->height}} M</h3><span>Height</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">{{$member->BMI->weight}} Kg</h3><span>Weight</span>
                                    </div>
                                </div>
                                @if($member->BMI->bmi < floor(18.5)) <h4 class="btn  btn-sm alert-info ">under weight</h4> @elseif( $member->BMI->bmi > floor(18.5) && $member->BMI->bmi < floor(24.9) ) <h4 class="btn  btn-block btn-sm alert-success mt-4"> Perfect Weight</h4> @elseif( $member->BMI->bmi > floor(25) && $member->BMI->bmi < floor(29.9) ) <h4 class="alert alert-danger">Over Weight</h4> @elseif($member->BMI->bmi > floor(30)) <h4 class="alert alert-danger">Over Over weight</h4> @else <h4 class="alert">No record Available</h4> @endif
                            @else
                                <div class="row mt-4">
                                    <div class="col">
                                        <h3 class="m-b-0">N/A</h3><span>B.M.I</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">N/A</h3><span>Height</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">N/A</h3><span>Weight</span>
                                    </div>
                                </div>
                            @endif
                            <div class="mt-4">
                                <button data-toggle="modal" type="button" data-target="#exampleModalCenter" class="btn btn-sm btn-outline-primary btn-block">Calculate BMI</button>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Posts</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">About Me</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="user-image mb-3 text-center">
                                        <div class="imgPreview"> </div>
                                    </div>
                                    <div class="my-post-content pt-3">
                                       <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">@csrf
                                           <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title" required>
                                           @error('title')
                                           <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                           @enderror
                                           <div class="post-input">
                                               <textarea name="description" id="description" cols="30" rows="5" maxlength="250" class="form-control bg-transparent @error('description') is-invalid @enderror" placeholder="Please type what you want...." required></textarea>
                                               @error('description')
                                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                               @enderror
                                               <div class="d-flex">
                                                   <a href="javascript:void()" class="btn btn-sm btn-primary light px-3"><i class="fa fa-link"></i> </a>&nbsp;&nbsp;&nbsp;
                                                   <div class="custom-file">
                                                       <a href="javascript:void(0)" style="width: 4rem;" class="btn btn-sm btn-primary light mr-1 px-3"><i class="fa fa-camera"><input type="file" style="opacity: 0; font-size: 40px; position: absolute; top: 0; right: 0; cursor: pointer;" name="imageFile[]" accept="image/*" id="images" multiple="multiple"></i></a>
                                                   </div>
                                                   <input type="hidden" name="member"  value="{{$member->id}}">
                                                   <button class="btn btn-sm btn-primary float-right" type="submit">Post</button>
                                               </div>
                                           </div>
                                       </form>
                                    @if(count($post)>0)
                                        @foreach($post as $key=>$data)
                                        <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                            <div class="d-flex" id="IMGHolder">
                                                @foreach(json_decode($data->Image->name, true) as $img)
                                                    <a href="{{ asset('images/post/'.$img) }}" data-exthumbimage="{{ asset('images/post/'.$img) }}" data-src="{{ asset('images/post/'.$img) }}"><img src="{{ asset('images/post/'.$img) }}" alt="" class="img-fluid"></a>
                                                @endforeach
                                            </div>
                                            <a class="post-title" href="#">
                                                <h3 class="text-black">{{ $data->title }}</h3>
                                            </a>
                                            <p>{{ $data->description }}</p>
                                            <button class="btn btn-primary mr-2"><span class="mr-2"><i class="fa fa-heart"></i></span>Like</button>
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#replyModal"><span class="mr-2"><i class="fa fa-reply"></i></span>Reply</button>
                                        </div>
                                        @endforeach
                                    @else

                                    @endif
                                    </div>
                                </div>
                                <div id="about-me" class="tab-pane fade">

                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mb-4 mt-3">Personal Information</h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{$member->first_name.' '.$member->last_name}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email
                                                    <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7">
                                                <span>{{$member->email}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Gender
                                                    <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7">
                                                <span>{{$member->info->gender}} </span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{$member->info->getAge($member->info->date_of_birth)}} Years</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Mobile No. <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>+91 {{$member->info->mobile}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Package <span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>@if($member->info->Package) {{ $member->info->Package->package }} @else N/A - Select now @endif</span>
                                            </div>
                                        </div>


                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Member Since <span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>{{ date('j M, Y', strtotime($member->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Account Setting</h4>
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Email</label>
                                                        <input type="email" placeholder="Email" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Password</label>
                                                        <input type="password" placeholder="Password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" placeholder="1234 Main St" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Address 2</label>
                                                    <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>City</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>State</label>
                                                        <select class="form-control default-select" id="inputState">
                                                            <option selected="">Choose...</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Zip</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="gridCheck">
                                                        <label class="custom-control-label" for="gridCheck"> Check me out</label>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Sign
                                                    in</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Post Reply</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control" rows="4">Message</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
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
                    <h5 class="modal-title"><strong>BMI Calculator</strong></h5>
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
                                    <div class="input-group">
                                        <input type="text" name="height" id="height" maxlength="6" onkeypress="return isFloat(event)" class="form-control default-control @error('height') is-invalid @enderror" value="{{ old('height') }}" placeholder="Enter height" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-primary-light">(cm)</span>
                                        </div>
                                    </div>

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
                                    <div class="input-group">
                                        <input type="text" name="weight" id="weight" maxlength="6" onkeypress="return isFloat(event)" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}" placeholder="Enter weight" required>
                                        <div class="input-group-append ">
                                            <span class="input-group-text bg-primary-light">(kg)</span>
                                        </div>
                                    </div>

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
    </div>
     <!--    BMI Model End   -->

@endsection
@section('custom-script')
    <script type="text/javascript" src="{{ asset('vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script>
        $('#IMGHolder').lightGallery({
            loop:true,
            thumbnail:true,
            exThumbImage: 'data-exthumbimage'
        });



        $(function() {
            // Multiple images preview with JavaScript
            const multiImgPreview = function (input, imgPreviewPlaceholder) {

                if (input.files) {
                    const filesAmount = input.files.length;

                    for (let i = 0; i < filesAmount; i++) {
                        const reader = new FileReader();

                        reader.onload = function (event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>
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
