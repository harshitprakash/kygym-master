@extends('layouts.admin.master')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="col-md-6 text-left" style="margin-top: 16px;">
                <h2><b>Enquiry List</b></h2><br>
            </div>
            <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#basicModal">ADD Enquiry</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="basicModal">
                <form action="{{ route('index.store')}}" method="post">@csrf
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3><b>Enquiry</b></h3>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                                <br>

                            </div>
                            <div class="modal-body">

                                <div class="basic-form">

                                    <div class="form-row">
                                        <div class="col-sm-6 mt-2 mt-sm-0 mb-4">
                                            <label for="#">FirstName</label>
                                            <input type="text" id="add FirstName" placeholder="FirstName" name="Firstname" class="form-control">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0 mb-4">
                                            <label for="#">LastName</label>
                                            <input type="text" id="add LastName" placeholder="LastName" name="Lastname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row" style="margin-top: 0px;">
                                        <div class="col-sm-12 mt-2 mt-sm-0 mb-4">
                                            <label for="">Email</label>
                                        <input type="text" id="add Email" placeholder="Email" name="Email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-6 mt-2 mt-sm-0 mb-4">
                                            <label for="#">Expected Date</label>
                                            <input type="Date" id="date" name="date" class="form-control">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0 mb-4">
                                            <label for="#">Phone no</label>
                                            <input type="text" id="add Phone no" placeholder="Phone No" name="PhoneNo" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <div class="card-body">

                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Expected Date</th>
                                <th>PhoneNo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($enquiryes as $key => $enquiry)
                                <tr>
                                    <td>{{ $key+ 1 }}</td>
                                    <td>{{ $enquiry->Firstname }}</td>
                                    <td>{{$enquiry->Lastname}}</td>
                                    <td>{{$enquiry->Email}}</td>
                                    <td>{{date('d-M-Y',strtotime($enquiry->date))}}</td>
                                    <td>{{$enquiry->PhoneNo}}</td>

                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-danger text-center"> No record found ..!</td></tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

    </div>

@endsection
