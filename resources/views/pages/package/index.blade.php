@extends('layouts.admin.master')
@section('title','Package List')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Package</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> Package List</a></li>
        </ol>
    </div>

   <div class="row">
       @if(count($data))
           @foreach( $data as $package)
           <div class="col-xl-4 col-lg-6 col-sm-6">
           <div class="card overflow-hidden">
               <div class="card-body">
                   <div class="card-header text-center">
                       <h3 class="card-title text-center">{{$package->package}}</h3>
                   </div>
                   <table class="table table-responsive table-borderless">
                       <tr><td><strong>Duration</strong>    </td><th>{{$package->duration}} Days</th></tr>
                       <tr><td><strong>Price</strong>  </td><th> ₹ &nbsp{{$package->price}} </th></tr>
                       <tr><td><strong> Personal Trainer</strong>   </td><th>@if($package->personal_trainer) Included @else Not Included @endif</th></tr>

                   </table>
               </div>

               <div class="card-footer pt-0 pb-0 text-center">
                   <div class="row">
                       <div class="col-6 pt-3 pb-3">

                           <a href="{{ route('package.edit', \Illuminate\Support\Facades\Crypt::encrypt($package->id)) }}"><input type="button" value="update" class="btn btn-sm float-right btn-secondary"></a>
                       </div>

                       <div class="col-6 pt-3 pb-3">
                       <span><input type="button" value="View Package" class="btn btn-sm float-right btn-secondary"></span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
           @endforeach
       @else
       @endif
   </div>



@endsection
