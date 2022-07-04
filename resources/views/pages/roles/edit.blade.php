@extends('layouts.admin.master')
@section('title','Update Role')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Role</a></li>
        </ol>
    </div>
    <form method="POST" action="{{ route('roles.update', \Illuminate\Support\Facades\Crypt::encrypt($role->id)) }}">@csrf {{ method_field('PUT') }}
        <div class="card">
            <div class="card-header">
                <h5 class="card-title ">Role Update Form</h5>
            </div>
            <div class="card-body mb-0">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Role Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" placeholder="Enter Role Name....." value="{{$role->role}}" required>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$role->description}}" placeholder="Enter Description....." required>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update Role
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
