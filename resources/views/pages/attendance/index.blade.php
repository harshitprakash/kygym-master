@extends('layouts.admin.master')
@section('title','Member\'s Attendance')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('member.index') }}">Member</a></li>
            @if(isset($member))
            <li class="breadcrumb-item active"><a href="{{ route('member.show', \Illuminate\Support\Facades\Crypt::encrypt($member->id)) }}">{{ $member->first_name.' '.$member->last_name }}</a></li>
            @endif
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Attendance</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Attendance List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="attendanceValues" class="display min-w850">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Member ID</th>
                                <th>Member Name</th>
                                <th>Date</th>
                                <th>In-Time</th>
                                <th>Out-Time</th>
                                <th>In Method</th>
                                <th>Out Method</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($list)>0)
                                @foreach($list as $key=>$data)
                                    <tr class="text-center">
                                        <th>{{ $key+1 }}</th>
                                        <th class="text-primary"><a class="text-primary" href="{{route('member.show', \Illuminate\Support\Facades\Crypt::encrypt($data->memberData->id))}}">{{$data->memberData->member_id}}</a></th>
                                        <td>{{ $data->memberData->first_name.' '.$data->memberData->last_name }}</td>
                                        <td>{{ date('j M, Y', strtotime($data->in_time)) }}</td>
                                        <td>{{ date('h:i:s A', strtotime($data->in_time)) }}</td>
                                        <td>@if($data->out_time == "") @else {{ date('h:i:s A', strtotime($data->out_time)) }} @endif</td>
                                        <td class="color-primary">{{ $data->in_method }}</td>
                                        <td class="color-primary">{{ $data->out_method }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center"><h3 class="text-danger">No Records Available!</h3></td>
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
@section('custom-script')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#attendanceValues').DataTable();
        });
    </script>
@endsection
