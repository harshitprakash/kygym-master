@extends('layouts.admin.master')
@section('title','Assign Diet to Member')
@section('custom-css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
@endsection
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Diet</li>
            <li class="breadcrumb-item active"><a href="#">Select Diet For User.</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-9 col-xxl-8">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card plan-list">
                        <div class="card-header d-sm-flex flex-wrap d-block pb-0 border-0">
                            <div class="mr-auto pr-3 mb-3">
                                <h4 class="text-black fs-20">Diets List</h4>
                            </div>
                            <div class="card-action card-tabs mr-4 mt-3 mt-sm-0 mb-3">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#aAddDietMenus" class="nav-link">Add Diet</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body dz-scroll height415"  id="DietMenusContent">
                            @forelse (\App\Models\diet_plan::all() as $item)
                                <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
                                    <div class="media-body col-lg-8 pl-0">
                                        <h6 class="fs-16 font-w600 text-black">{{ $item->name }} <span class="text-primary float-right">Difficulty : {{ $item->level }}</span> </h6>
                                        <p class="fs-14">{{ $item->description }}</p>
                                    </div>
                                    <a href="{{ route('init.assign', ['member' => \Illuminate\Support\Facades\Crypt::encrypt($member->id), 'diet' => $item->id]) }}" class="btn btn-primary light btn-md ml-auto"><i class="fa fa-plus scale5 mr-3"></i>Select Diet</a>
                                </div>
                            @empty
                                <h5 class="fs-30 font-w600 text-danger text-center">No Diets are Available!</h5>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4">
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
                                    <div class="mt-0 text-center">
                                        <h4 class="text-primary mb-4">
                                            <strong>Personal Information</strong>
                                        </h4>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">
                                                <i class="fa fa-user"></i>
                                                <span class="pull-right"> :</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ ucfirst($member->first_name).' '.ucfirst($member->last_name) }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">
                                                <i class="fa fa-birthday-cake"></i>
                                                <span class="pull-right"> :</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ ucfirst($member->info->getAge($member->info->date_of_birth)) }} Years</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">
                                                <i class="fa fa-venus-mars"></i>
                                                <span class="pull-right"> :</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ ucfirst($member->info->gender) }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">
                                                <i class="fa fa-phone"></i>
                                                <span class="pull-right"> :</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ $member->info->mobile }}</span>
                                        </div>
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
@section('custom-script')
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <div class="modal fade" id="aAddDietMenus">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Diet to Assign.</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('diet.store') }}" method="post">@csrf
                        <div class="form-group">
                            <label>Diet Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter a Name for the diet." name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Diet Information<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" id="DietDSC" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>DIET Level</label>
                            <select name="level" id="DietLVL" class="form-control">
                                <option value="">Select Level of DIET.</option>
                                <option value="1">Easy</option>
                                <option value="2">Normal</option>
                                <option value="3">Moderate</option>
                                <option value="4">Hard</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
