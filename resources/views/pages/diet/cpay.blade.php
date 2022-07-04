@extends('layouts.admin.master')

@section('title', 'DIET Confirmation')

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Diet</li>
            <li class="breadcrumb-item active"><a href="#">DIET Details Confirmation.</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-9 col-xxl-8">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0 border-0">
                        <div class="mr-auto pr-3 mb-3">
                            <h4 class="text-black fs-20">{{ $diet->name }} diet information.</h4>
                        </div>
                        <p class="text-info">{{ $diet->description }}</p>
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
                                            <span>(+91) {{ $member->info->mobile }}</span>
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
