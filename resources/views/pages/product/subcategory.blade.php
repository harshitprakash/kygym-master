@extends('layouts.admin.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="col-md-6">
                <h2><b>Subcategory List</b></h2><br>
            </div>
            <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#basicModal">ADD SUBCATERORY</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="basicModal">
                <form action="{{ route('subcategory.store')}}" method="post">@csrf
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3><b>SubCategory</b></h3>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                                <br>

                            </div>
                            <div class="modal-body">
                                <div class="container" style="margin-top: 0px;">

                                    <div class="form-group">
                                        <select class="form-control default-select " name="cat_id">
                                            <option>Select Category</option>
                                            @foreach($categories as $key => $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="text" id="add category" placeholder="Add SubCategory" name="sub_cat_name" class="form-control">
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
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($Subcategories as $key => $Subcategory)
                            <tr>
                                <td>{{ $key+ 1 }}</td>
                                <td>{{ $Subcategory->cat_id }}</td>
                                <td>{{$Subcategory->sub_cat_name}}</td>
                                <td><a href="{{ route('subcategory.edit',\Illuminate\Support\Facades\Crypt::encrypt($Subcategory->id)) }}" onclick="event.preventDefault(); document.getElementById('subcategory-form').submit();" class="text-danger">Delete</a></td>
                                <form action="{{ route('subcategory.destroy',\Illuminate\Support\Facades\Crypt::encrypt($Subcategory->id)) }}" id="subcategory-form" method="post">
                                    {{ method_field('DELETE') }}@csrf
                                </form>
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
