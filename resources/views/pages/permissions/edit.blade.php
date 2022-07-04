@extends('layouts.admin.master')
@section('title','Update Permissions')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Roles</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Permissions</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('permission.update', \Illuminate\Support\Facades\Crypt::encrypt($permission->id)) }}" method="POST">@csrf {{ method_field("PUT") }}
                    <div class="card-header">
                        <h4 class="card-title">Update Permissions for <strong>{{ $permission->roleDetail->role }}</strong> Role</h4>
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
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="profileBox" name="permissions[profile][view]" @if(isset($permission['permissions']['profile']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="profileBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="profileBox0" name="permissions[profile][list]" @if(isset($permission['permissions']['profile']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="profileBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="profileBox1" name="permissions[profile][create]" @if(isset($permission['permissions']['profile']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="profileBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="profileBox2" name="permissions[profile][update]" @if(isset($permission['permissions']['profile']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="profileBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="profileBox3" name="permissions[profile][delete]" @if (isset($permission['permissions']['profile']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="profileBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fee Collection</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="feeBox" name="permissions[fee][view]" @if(isset($permission['permissions']['fee']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="feeBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="feeBox0" name="permissions[fee][list]" @if(isset($permission['permissions']['fee']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="feeBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="feeBox1" name="permissions[fee][create]" @if(isset($permission['permissions']['fee']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="feeBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="feeBox2" name="permissions[fee][update]" @if(isset($permission['permissions']['fee']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="feeBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="feeBox3" name="permissions[fee][delete]" @if (isset($permission['permissions']['fee']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="feeBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Member Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="memberBox" name="permissions[member][view]" @if(isset($permission['permissions']['member']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="memberBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="memberBox0" name="permissions[member][list]" @if(isset($permission['permissions']['member']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="memberBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="memberBox1" name="permissions[member][create]" @if(isset($permission['permissions']['member']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="memberBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="memberBox2" name="permissions[member][update]" @if(isset($permission['permissions']['member']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="memberBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="memberBox3" name="permissions[member][delete]" @if (isset($permission['permissions']['member']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="memberBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Attendance Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="attendanceBox" name="permissions[attendance][view]" @if(isset($permission['permissions']['attendance']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="attendanceBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="attendanceBox0" name="permissions[attendance][list]" @if(isset($permission['permissions']['attendance']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="attendanceBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="attendanceBox1" name="permissions[attendance][create]" @if(isset($permission['permissions']['attendance']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="attendanceBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="attendanceBox2" name="permissions[attendance][update]" @if(isset($permission['permissions']['attendance']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="attendanceBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="attendanceBox3" name="permissions[attendance][delete]" @if (isset($permission['permissions']['attendance']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="attendanceBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Role Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="roleBox" name="permissions[role][view]" @if(isset($permission['permissions']['role']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="roleBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="roleBox0" name="permissions[role][list]" @if(isset($permission['permissions']['role']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="roleBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="roleBox1" name="permissions[role][create]" @if(isset($permission['permissions']['role']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="roleBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="roleBox2" name="permissions[role][update]" @if(isset($permission['permissions']['role']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="roleBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="roleBox3" name="permissions[role][delete]" @if (isset($permission['permissions']['role']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="roleBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Package Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="packageBox" name="permissions[package][view]" @if(isset($permission['permissions']['package']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="packageBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="packageBox0" name="permissions[package][list]" @if(isset($permission['permissions']['package']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="packageBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="packageBox1" name="permissions[package][create]" @if(isset($permission['permissions']['package']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="packageBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="packageBox2" name="permissions[package][update]" @if(isset($permission['permissions']['package']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="packageBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="packageBox3" name="permissions[package][delete]" @if (isset($permission['permissions']['package']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="packageBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Exercise Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="exerciseBox" name="permissions[exercise][view]" @if(isset($permission['permissions']['exercise']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="exerciseBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="exerciseBox0" name="permissions[exercise][list]" @if(isset($permission['permissions']['exercise']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="exerciseBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="exerciseBox1" name="permissions[exercise][create]" @if(isset($permission['permissions']['exercise']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="exerciseBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="exerciseBox2" name="permissions[exercise][update]" @if(isset($permission['permissions']['exercise']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="exerciseBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="exerciseBox3" name="permissions[exercise][delete]" @if (isset($permission['permissions']['exercise']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="exerciseBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Diet Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="dietBox" name="permissions[diet][view]" @if(isset($permission['permissions']['diet']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="dietBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="dietBox0" name="permissions[diet][list]" @if(isset($permission['permissions']['diet']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="dietBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="dietBox1" name="permissions[diet][create]" @if(isset($permission['permissions']['diet']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="dietBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="dietBox2" name="permissions[diet][update]" @if(isset($permission['permissions']['diet']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="dietBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="dietBox3" name="permissions[diet][delete]" @if (isset($permission['permissions']['diet']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="dietBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Video Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="videoBox" name="permissions[video][view]" @if(isset($permission['permissions']['video']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="videoBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="videoBox0" name="permissions[video][list]" @if(isset($permission['permissions']['video']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="videoBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="videoBox1" name="permissions[video][create]" @if(isset($permission['permissions']['video']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="videoBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="videoBox2" name="permissions[video][update]" @if(isset($permission['permissions']['video']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="videoBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="videoBox3" name="permissions[video][delete]" @if (isset($permission['permissions']['video']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="videoBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Post Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="postBox" name="permissions[post][view]" @if(isset($permission['permissions']['post']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="postBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="postBox0" name="permissions[post][list]" @if(isset($permission['permissions']['post']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="postBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="postBox1" name="permissions[post][create]" @if(isset($permission['permissions']['post']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="postBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="postBox2" name="permissions[post][update]" @if(isset($permission['permissions']['post']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="postBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="postBox3" name="permissions[post][delete]" @if (isset($permission['permissions']['post']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="postBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Assign Exercise</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assignexBox" name="permissions[assignex][view]" @if(isset($permission['permissions']['assignex']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assignexBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assignexBox0" name="permissions[assignex][list]" @if(isset($permission['permissions']['assignex']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assignexBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assignexBox1" name="permissions[assignex][create]" @if(isset($permission['permissions']['assignex']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assignexBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assignexBox2" name="permissions[assignex][update]" @if(isset($permission['permissions']['assignex']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assignexBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assignexBox3" name="permissions[assignex][delete]" @if (isset($permission['permissions']['assignex']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assignexBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Assign Diet</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assigndietBox" name="permissions[assigndiet][view]" @if(isset($permission['permissions']['assigndiet']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assigndietBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assigndietBox0" name="permissions[assigndiet][list]" @if(isset($permission['permissions']['assigndiet']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assigndietBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assigndietBox1" name="permissions[assigndiet][create]" @if(isset($permission['permissions']['assigndiet']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assigndietBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assigndietBox2" name="permissions[assigndiet][update]" @if(isset($permission['permissions']['assigndiet']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assigndietBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="assigndietBox3" name="permissions[assigndiet][delete]" @if (isset($permission['permissions']['assigndiet']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="assigndietBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>RFID Card Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="rfidBox" name="permissions[rfid][view]" @if(isset($permission['permissions']['rfid']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="rfidBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="rfidBox0" name="permissions[rfid][list]" @if(isset($permission['permissions']['rfid']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="rfidBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="rfidBox1" name="permissions[rfid][create]" @if(isset($permission['permissions']['rfid']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="rfidBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="rfidBox2" name="permissions[rfid][update]" @if(isset($permission['permissions']['rfid']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="rfidBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="rfidBox3" name="permissions[rfid][delete]" @if (isset($permission['permissions']['rfid']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="rfidBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Finger Print Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="fingerBox" name="permissions[finger][view]" @if(isset($permission['permissions']['finger']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="fingerBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="fingerBox0" name="permissions[finger][list]" @if(isset($permission['permissions']['finger']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="fingerBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="fingerBox1" name="permissions[finger][create]" @if(isset($permission['permissions']['finger']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="fingerBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="fingerBox2" name="permissions[finger][update]" @if(isset($permission['permissions']['finger']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="fingerBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="fingerBox3" name="permissions[finger][delete]" @if (isset($permission['permissions']['finger']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="fingerBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Notification Management</th>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="notificationBox" name="permissions[notification][view]" @if(isset($permission['permissions']['notification']['view'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="notificationBox"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="notificationBox0" name="permissions[notification][list]" @if(isset($permission['permissions']['notification']['list'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="notificationBox0"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="notificationBox1" name="permissions[notification][create]" @if(isset($permission['permissions']['notification']['create'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="notificationBox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="notificationBox2" name="permissions[notification][update]" @if(isset($permission['permissions']['notification']['update'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="notificationBox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 checkbox-success check-lg">
                                            <input type="checkbox" class="custom-control-input" value="1" id="notificationBox3" name="permissions[notification][delete]" @if (isset($permission['permissions']['notification']['delete'])) checked="checked" @endif>
                                            <label class="custom-control-label" for="notificationBox3"></label>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary fa-pull-right"><i class="fa fa-save">&nbsp;</i> Update Permission</button>
                        <br><br>
                    </div>
{{--                            @if(isset(Auth::user()->info->roleDetail->rolePermission->permissions['permission']['update']))--}}

{{--                            @endif--}}
                </form>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection
