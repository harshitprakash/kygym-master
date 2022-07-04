@extends('layouts.admin.master')
@section('title','Diet List')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Diet</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> Diet Requests</a></li>
        </ol>
    </div>
    <div class="row mb-0">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Diet Requests</h3>
                    <a href="{{ route('diet.create') }}" class="mt-auto end-0 btn btn-secondary btn-sm">Create Diet</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="DietValues" class="display min-w850">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Member ID</th>
                                <th>Mobile</th>
                                <th>Payment</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($list)>0)
                                @foreach($list as $key=>$data)
                                    <tr>
                                        <td><img class="rounded-circle" width="35" src="{{ asset('images/profile/users/'.$data->info->image) }}" alt="{{ $data->first_name.' '.$data->last_name }}"></td>
                                        <td>{{ ucfirst($data->Member->first_name).' '.ucfirst($data->Member->last_name) }}</td>
                                        <td>{{ $data->Member->member_id }}</td>
                                        <td><a href="tel:{{$data->Member->info->mobile}}"><strong>{{ $data->Member->info->mobile }}</strong></a></td>
                                        <td>@if ($data->payment = '0') Unpaid @else Paid @endif</td>
                                        <td>{{ date('j M, Y', strtotime($data->created_at)) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['update']))
                                                    <a href="{{ route('diet.edit', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                @endif
                                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['view']))
                                                    <a href="{{ route('diet.show', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
                                                @endif
                                                @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['delete']))
                                                    <button type="button" id="delKey{{$key}}" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></button></div>
                                            <form action="{{ route('diet.destroy', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" method="post" id="delNum{{$key}}">@csrf {{method_field('DELETE')}}</form>
                                            <script type="text/javascript">
                                                document.getElementById('delKey{{$key}}').addEventListener('click', function () {
                                                    Swal.fire({
                                                        title: 'Are you sure?',
                                                        text: "You won't be able to revert this!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#d33',
                                                        cancelButtonColor: '#3085d6',
                                                        confirmButtonText: 'Yes, delete it!'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('delNum{{$key}}').submit();
                                                        } else {
                                                            swal.fire({
                                                                title: "Action Stopped!",
                                                                text: "Your Data is Safe Now!",
                                                                icon: "info",
                                                            })
                                                        }
                                                    })
                                                });
                                            </script>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#DietValues').DataTable();
        });
    </script>
@endsection
