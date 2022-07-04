@extends('layouts.admin.master')
@section('title','Update Exercise Module')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Category </a></li>
        </ol>
    </div>
    <div class="card">
        <div class="card-body">
                    <div class="modal-content">
                        <form action="{{route('manage.update',\Illuminate\Support\Facades\Crypt::encrypt($data->id))}}" method="post">@csrf
                            {{method_field('PUT')}}
                            <div class="modal-header">
                                <h5 class="modal-title">Exercise Category</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group-sm">
                                    <label> Exercise category</label>
                                    <input type="text" name="cat_name" value="{{$data->cat_name}}" class="form-control @error('cat_name') is-invalid @enderror" placeholder="Enter Category">
                                    @error('cat_name')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm light" >Close</button>
                                <input type="hidden" value="{{$data->id}}">
                                <button type="submit" class="btn btn-primary btn-sm">Save </button>
                            </div>
                        </form>
                    </div>

        </div>
    </div>
@endsection
