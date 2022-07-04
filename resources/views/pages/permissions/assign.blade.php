@extends('layouts.admin.master')
@section('title','Assign Permission')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Roles</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Set Permission</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('permission.store') }}" method="POST">@csrf
                    <div class="card-header">
                        <h4 class="card-title">Set Permissions for <strong>{{ $role->role }}</strong> Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Module Name</th>
                                    <th class="text-center">View</th>
                                    <th class="text-center">List</th>
                                    <th class="text-center">Create</th>
                                    <th class="text-center">Update</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Profile Settings</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="profileBox" name="permissions[profile][view]"><label class="custom-control-label" for="profileBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="profileBox0" name="permissions[profile][list]"><label class="custom-control-label" for="profileBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="profileBox1" name="permissions[profile][create]"><label class="custom-control-label" for="profileBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="profileBox2" name="permissions[profile][update]"><label class="custom-control-label" for="profileBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="profileBox3" name="permissions[profile][delete]"><label class="custom-control-label" for="profileBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fee Collection</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="feeBox" name="permissions[fee][view]"><label class="custom-control-label" for="feeBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="feeBox0" name="permissions[fee][list]"><label class="custom-control-label" for="feeBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="feeBox1" name="permissions[fee][create]"><label class="custom-control-label" for="feeBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="feeBox2" name="permissions[fee][update]"><label class="custom-control-label" for="feeBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="feeBox3" name="permissions[fee][delete]"><label class="custom-control-label" for="feeBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Member Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="memberBox" name="permissions[member][view]"><label class="custom-control-label" for="memberBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="memberBox0" name="permissions[member][list]"><label class="custom-control-label" for="memberBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="memberBox1" name="permissions[member][create]"><label class="custom-control-label" for="memberBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="memberBox2" name="permissions[member][update]"><label class="custom-control-label" for="memberBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="memberBox3" name="permissions[member][delete]"><label class="custom-control-label" for="memberBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Attendance Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="attendanceBox" name="permissions[attendance][view]"><label class="custom-control-label" for="attendanceBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="attendanceBox0" name="permissions[attendance][list]"><label class="custom-control-label" for="attendanceBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="attendanceBox1" name="permissions[attendance][create]"><label class="custom-control-label" for="attendanceBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="attendanceBox2" name="permissions[attendance][update]"><label class="custom-control-label" for="attendanceBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="attendanceBox3" name="permissions[attendance][delete]"><label class="custom-control-label" for="attendanceBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Role Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="roleBox" name="permissions[role][view]"><label class="custom-control-label" for="roleBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="roleBox0" name="permissions[role][list]"><label class="custom-control-label" for="roleBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="roleBox1" name="permissions[role][create]"><label class="custom-control-label" for="roleBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="roleBox2" name="permissions[role][update]"><label class="custom-control-label" for="roleBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="roleBox3" name="permissions[role][delete]"><label class="custom-control-label" for="roleBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Package Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="packageBox" name="permissions[package][view]"><label class="custom-control-label" for="packageBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="packageBox0" name="permissions[package][list]"><label class="custom-control-label" for="packageBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="packageBox1" name="permissions[package][create]"><label class="custom-control-label" for="packageBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="packageBox2" name="permissions[package][update]"><label class="custom-control-label" for="packageBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="packageBox3" name="permissions[package][delete]"><label class="custom-control-label" for="packageBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Exercise Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="exerciseBox" name="permissions[exercise][view]"><label class="custom-control-label" for="exerciseBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="exerciseBox0" name="permissions[exercise][list]"><label class="custom-control-label" for="exerciseBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="exerciseBox1" name="permissions[exercise][create]"><label class="custom-control-label" for="exerciseBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="exerciseBox2" name="permissions[exercise][update]"><label class="custom-control-label" for="exerciseBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="exerciseBox3" name="permissions[exercise][delete]"><label class="custom-control-label" for="exerciseBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Diet Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="dietBox" name="permissions[diet][view]"><label class="custom-control-label" for="dietBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="dietBox0" name="permissions[diet][list]"><label class="custom-control-label" for="dietBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="dietBox1" name="permissions[diet][create]"><label class="custom-control-label" for="dietBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="dietBox2" name="permissions[diet][update]"><label class="custom-control-label" for="dietBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="dietBox3" name="permissions[diet][delete]"><label class="custom-control-label" for="dietBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Video Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="videoBox" name="permissions[video][view]"><label class="custom-control-label" for="videoBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="videoBox0" name="permissions[video][list]"><label class="custom-control-label" for="videoBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="videoBox1" name="permissions[video][create]"><label class="custom-control-label" for="videoBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="videoBox2" name="permissions[video][update]"><label class="custom-control-label" for="videoBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="videoBox3" name="permissions[video][delete]"><label class="custom-control-label" for="videoBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Post Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="postBox" name="permissions[post][view]"><label class="custom-control-label" for="postBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="postBox0" name="permissions[post][list]"><label class="custom-control-label" for="postBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="postBox1" name="permissions[post][create]"><label class="custom-control-label" for="postBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="postBox2" name="permissions[post][update]"><label class="custom-control-label" for="postBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="postBox3" name="permissions[post][delete]"><label class="custom-control-label" for="postBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Assign Exercise</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assignexBox" name="permissions[assignex][view]"><label class="custom-control-label" for="assignexBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assignexBox0" name="permissions[assignex][list]"><label class="custom-control-label" for="assignexBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assignexBox1" name="permissions[assignex][create]"><label class="custom-control-label" for="assignexBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assignexBox2" name="permissions[assignex][update]"><label class="custom-control-label" for="assignexBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assignexBox3" name="permissions[assignex][delete]"><label class="custom-control-label" for="assignexBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Assign Diet</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assigndietBox" name="permissions[assigndiet][view]"><label class="custom-control-label" for="assigndietBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assigndietBox0" name="permissions[assigndiet][list]"><label class="custom-control-label" for="assigndietBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assigndietBox1" name="permissions[assigndiet][create]"><label class="custom-control-label" for="assigndietBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assigndietBox2" name="permissions[assigndiet][update]"><label class="custom-control-label" for="assigndietBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="assigndietBox3" name="permissions[assigndiet][delete]"><label class="custom-control-label" for="assigndietBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>RFID Card Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="rfidBox" name="permissions[rfid][view]"><label class="custom-control-label" for="rfidBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="rfidBox0" name="permissions[rfid][list]"><label class="custom-control-label" for="rfidBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="rfidBox1" name="permissions[rfid][create]"><label class="custom-control-label" for="rfidBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="rfidBox2" name="permissions[rfid][update]"><label class="custom-control-label" for="rfidBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="rfidBox3" name="permissions[rfid][delete]"><label class="custom-control-label" for="rfidBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Finger Print Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="fingerBox" name="permissions[finger][view]"><label class="custom-control-label" for="fingerBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="fingerBox0" name="permissions[finger][list]"><label class="custom-control-label" for="fingerBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="fingerBox1" name="permissions[finger][create]"><label class="custom-control-label" for="fingerBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="fingerBox2" name="permissions[finger][update]"><label class="custom-control-label" for="fingerBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="fingerBox3" name="permissions[finger][delete]"><label class="custom-control-label" for="fingerBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Notification Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="notificationBox" name="permissions[notification][view]"><label class="custom-control-label" for="notificationBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="notificationBox0" name="permissions[notification][list]"><label class="custom-control-label" for="notificationBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="notificationBox1" name="permissions[notification][create]"><label class="custom-control-label" for="notificationBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="notificationBox2" name="permissions[notification][update]"><label class="custom-control-label" for="notificationBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg"><input type="checkbox" class="custom-control-input" value="1" id="notificationBox3" name="permissions[notification][delete]"><label class="custom-control-label" for="notificationBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="role_id" value="{{$role->id}}">
                        <button type="submit" class="btn btn-primary fa-pull-right"><i class="fa fa-save">&nbsp;</i> Set Permission</button>
                        <br><br><br>
                    </div>
                </form>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection
