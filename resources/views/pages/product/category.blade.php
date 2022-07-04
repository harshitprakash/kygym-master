@extends('layouts.admin.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="col-md-6 text-left" style="margin-top: 16px;">
            <h2><b>Category List</b></h2><br>
        </div>
        <div class="col-md-6 text-right">
        <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#basicModal">ADD CATERORY</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="basicModal">
            <form action="{{ route('category.store')}}" method="post">@csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><b>Category</b></h3>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                        <br>

                    </div>
                    <div class="modal-body">
                        <div class="container" style="margin-top: 0px;">
                            <input type="text" id="add category" placeholder="Add Category" name="name" class="form-control">
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $key => $category)
                            <tr>
                                <td>{{ $key+ 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{ route('category.edit',\Illuminate\Support\Facades\Crypt::encrypt($category->id)) }}" onclick="event.preventDefault(); document.getElementById('category-form').submit();" class="text-danger">Delete</a></td>
                                <form action="{{ route('category.destroy',\Illuminate\Support\Facades\Crypt::encrypt($category->id)) }}" id="category-form" method="post">
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
