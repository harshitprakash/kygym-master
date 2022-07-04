@extends('layouts.admin.master')
@section('title','Package Selection')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $user->first_name.' '.$user->last_name }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Package Selection</a></li>
        </ol>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title ">Kindly Select the Package.</h5>
        </div>
        <div class="card-body mb-0">
            <div class="row">
                @if(count(\App\Models\packages::latest()->get())>0)
                    @foreach(\App\Models\packages::latest()->get() as $key=>$pack)
                        <div class="col-xl-4 col-lg-12 col-sm-12">
                            <div class="card overflow-hidden">
                                <div class="text-center p-3 overlay-box " style="background-image: url({{ asset('images/big/img1.jpg') }});">
                                    <div class="profile-photo">
                                        <img src="{{ asset('images/profile/profile.png') }}" width="100" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">{{ $pack->package }}</h3>
                                    <p class="text-white mb-0">{{ $pack->description }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Personal Trainer</span> <strong class="text-muted">@if($pack->personal_trainer == 0) Not Included @else Included @endif</strong></li>
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Price</span><strong class="text-muted">{{ $pack->price }}</strong></li>
                                </ul>
                                <div class="card-footer border-0 mt-0">
                                    <form action="{{ route('package.confirmation') }}" method="post">@csrf
                                        <input type="hidden" name="user" value="{{$user->id}}">
                                        <input type="hidden" name="package" value="{{$pack->id}}">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                                            <i class="fa fa-money"></i> Select & Pay!
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex">
                        <h3 class="text-center text-danger">No package records found!</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
