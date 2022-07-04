@extends('layouts.admin.master')
@section('title','Add Member\'s Fingerprint')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('vendor/lightgallery/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
@endsection
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Member</li>
            <li class="breadcrumb-item active"><a href="#">Add Member's Fingerprint</a></li>
        </ol>
    </div>
    <div class="row">
        @if(count($list)>0)
            <div class="col-xl-12">
                <div class="card plan-list">
                    <div class="card-body tab-content pt-2">
                        @foreach($list as $key=>$data)
                        <div class="d-flex border-bottom flex-wrap pt-3 list-row align-items-center mb-2">
                            <div class="col-xl-5 col-xxl-8 col-lg-6 col-sm-8 d-flex align-items-center">
                                <div class="list-icon bgl-primary mr-3 mb-3">
                                    <img width="100%" src="{{ asset('images/profile/users/'.$data->User->info->image) }}" alt="User's Image" class="rounded-circle">
                                </div>
                                <div class="info mb-3">
                                    <h4 class="fs-20 "><a @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['member']['view'])) href="{{route('member.show', \Illuminate\Support\Facades\Crypt::encrypt($data->member))}}" @endif class="text-black">{{ $data->User->first_name.' '.$data->User->last_name }}</a></h4>
                                    <span class="text-danger font-w600">Not Registered Yet!</span>
                                </div>
                            </div>
                            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['finger']['delete']))
                            <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 activities mb-3 mr-auto pl-3 pr-3 text-sm-center">
                                <a href="javascript:void(0);" id="delBTN{{$key}}" class="btn btn-danger mb-3 rounded mr-3"><i class="las la-trash scale-2 mr-3"></i>Cancel Adding!</a>
                                <form action="{{ route('initiate.remove') }}" method="post" style="display: none;" id="delFORM{{$key}}">@csrf
                                    <input type="hidden" name="identifier" value="{{ $data->id }}">
                                </form>
                                <script type="text/javascript">
                                    document.getElementById('delBTN{{$key}}').addEventListener('click', function () {
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
                                                document.getElementById('delFORM{{$key}}').submit();
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
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="col-12">
                    <h4 class="text-primary text-center">Enter Member ID or Email to Search User ......</h4>
            </div>
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card-body">
                    <div class="basic-form">
                        <label for="UserInputID">Find User for Fees Payment</label>
                        <input type="text" id="UserInputID" class="form-control" name="UserInput" placeholder="Enter Member ID or Email....." required>
                        <button class="btn btn-sm btn-danger mt-3 float-right" type="button" id="ResetButton">Reset Result</button>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="PushResult" class="display min-w850">
                                <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Member Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="ShowResult"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('custom-script')
    <script type="text/javascript">
        $(document).ready(function () {
            /*----------- #emploee-department is the id of selector from which we have to take the data. ----------------*/
            $('#UserInputID').bind("keyup", function (e) {
                const UserInput = e.target.value;
                $.ajax({
                    url: "{{ route('find.member') }}",
                    type: "GET",
                    data: {
                        inputData: UserInput
                    },
                    success: function (data) {
                        $('#ShowResult').empty().append('<tr class="odd"><td valign="top" colspan="4" class="dataTables_empty">No data available in table</td></tr>');
                        $.each(data, function (key, value) {
                            /*----------- #Hiring-Position is the id of selector in which we have to send the data. ----------------*/
                            $('#ShowResult').empty().append('<tr><td>' + value.member_id + '</td><td>' + value.first_name + " " + value.last_name + '</td><td>'+ value.email +'</td><td><a href="/admin/access/finger/'+ value.id +'" class="btn btn-sm btn-primary">Select</a></td></tr>');
                        })
                    }
                })
            });
        });
        $(document).ready(function () {
            $('#ResetButton').on('click', function () {
                $('#ShowResult').empty().append('<tr class="odd"><td valign="top" colspan="4" class="dataTables_empty">No data available in table</td></tr>');
            })
        })
        $(document).ready( function () {
            $('#PushResult').DataTable();
        });
    </script>
@endsection
