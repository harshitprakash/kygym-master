@extends('layouts.admin.master')
@section('title','Roles Management')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Roles</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Attendance List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-sm">
                            <thead>
                            <tr class="text-center">
                                <th>Role Name</th>
                                <th>Description</th>
                                <th>Manage Permission</th>
                                <th>Edit Role</th>
                                <th>Delete Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($list)>0)
                                @foreach($list as $key=>$data)
                                    <tr class="text-center">
                                        <td>{{$data->role}}</td>
                                        <td>{{$data->description}}</td>
                                        <td><a href="{{ route('permission.show', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" class="btn btn-primary">Manage</a></td>
                                        <td>@if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['role']['update']))<a href="{{ route('roles.edit', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" class="btn btn-secondary">Edit</a> @else <button class="btn btn-secondary" href="#notAllowed" type="button" disabled>Edit</button> @endif</td>
                                        <td class="color-primary">@if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['role']['delete']))<button class="btn btn-danger" id="roleNum{{$key}}" type="button">Delete</button>
                                            <form action="{{ route('roles.destroy', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" method="post" id="delNum{{$key}}">@csrf {{method_field('DELETE')}}</form>
                                            <script type="text/javascript">
                                                document.getElementById('roleNum{{$key}}').addEventListener('click', function () {
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
                                            </script> @else <button class="btn btn-danger" href="#notAllowed" type="button" disabled>Delete</button> @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center"><h3 class="text-danger">No Records Found!</h3></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
