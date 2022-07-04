@extends('layouts.admin.master')
@section('title','Assign Diet to Member')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('vendor/lightgallery/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
@endsection
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Diet</li>
            <li class="breadcrumb-item active"><a href="#">Assign to Member</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-12">
            <h4 class="text-primary text-center">Enter Member ID or Email to Search User ......</h4>
        </div>
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card-body">
                <div class="basic-form">
                    <label for="UserInputID">Find User for Assigning DIET</label>
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
                            $('#ShowResult').empty().append('<tr><td>' + value.member_id + '</td><td>' + value.first_name + " " + value.last_name + '</td><td>'+ value.email +'</td><td><a href="/diet/assign/'+ value.id +'" class="btn btn-sm btn-primary">Assign Diet</a></td></tr>');
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
