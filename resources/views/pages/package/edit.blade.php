@extends('layouts.admin.master')
@section('title', 'Create Package')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Package</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Package</a></li>
        </ol>
    </div>
    <div class="card">
        <form action="{{ route('package.update', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" method="post">@csrf
            {{method_field('PUT')}}
            <div class="card-header">
                <h5 class="card-title">Update package</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6"><div class="form-group ">
                            <label>Package Name</label>
                            <input type="text" name="package" id="package" value="{{$data->package}}" class="form-control @error('package') is-invalid @enderror" placeholder="Enter Package Name">
                            @error('package')
                            <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div></div>
                    <div class="col-6"> <div class="form-group ">
                            <label>Description</label>
                            <input type="text" name="description" id="description" value="{{$data->description}}" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div></div>
                </div>
                <div class="row">
                    <div class="col-6"><div class="form-group ">
                            <label>Duration</label>
                            <input type="text" name="duration" id="duration" value="{{$data->duration}}" class="form-control @error('duration') is-invalid @enderror" placeholder="Enter duration">
                            @error('duration')
                            <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div></div>
                    <div class="col-6"><div class="form-group  ">
                            <label>Price</label>
                            <input type="text" name="price" id="price"  value="{{$data->price}}" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div></div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox mb-3 checkbox-info">
                            <input type="checkbox" class="custom-control-input" name="personal_trainer" @if($data->personal_trainer) checked="" @endif value="1" id="personal_trainer" >
                            <label class="custom-control-label pt-1" for="personal_trainer"> Personal Trainer</label>
                        </div>
                    </div>
                </div>

            </div>
            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['package']['update']))
            <div class="card-footer">
                <input type="hidden" value="{{$data->id}}">
                <button type="submit" class="btn btn-outline-primary btn-sm">Save changes</button>
            </div>
            @endif
        </form>
    </div>

@endsection


