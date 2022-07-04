@extends('layouts.admin.master')
@section('title','Member\'s List')
@section('content')

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Member</a></li>
            @if (isset($page))
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> {{ $page['page'] }}</a></li>
            @else
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Member List</a></li>
            @endif
        </ol>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"> <div class="mr-auto pr-3 mb-sm-0 mb-3">
                        <h4 class="text-black fs-20">Member List</h4>
                        <p class="fs-13 mb-0 text-black">Member list you can see here all members and search.</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataValues" class="display min-w850">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Member ID</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Joining Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($list)>0)
                                @foreach($list as $key=>$data)
                                    <tr>
                                        <td><img class="rounded-circle" width="35" src="{{ asset('images/profile/users/'.$data->info->image) }}" alt="{{ $data->first_name.' '.$data->last_name }}"></td>
                                        <td>{{ ucfirst($data->first_name).' '.ucfirst($data->last_name) }}</td>
                                        <td>{{ $data->member_id }}</td>
                                        <td><a href="tel:{{$data->info->mobile}}"><strong>{{ $data->info->mobile }}</strong></a></td>
                                        <td><a href="mailto:{{$data->email}}">{{ $data->email }}</a></td>
                                        <td>{{ date('j M, Y', strtotime($data->created_at)) }}</td>
                                        <td>
                                            <div class="d-flex">
                                            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['update']))
                                            <a href="{{ route('member.edit', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            @endif
                                            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['view']))
                                            <a href="{{ route('member.show', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
                                            @endif
                                            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['delete']))
                                            <button type="button" id="delKey{{$key}}" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></button></div>
                                            <form action="{{ route('member.destroy', \Illuminate\Support\Facades\Crypt::encrypt($data->id)) }}" method="post" id="delNum{{$key}}">@csrf {{method_field('DELETE')}}</form>
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
            $('#dataValues').DataTable();
        });
    </script>
@endsection
