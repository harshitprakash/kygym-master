@extends('layouts.admin.master')
@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <div class="col-md-6 text-left" style="margin-top: 16px;">
                        <h2 class="card-title"><b>Product List</b></h2><br>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#basicModal">Add Product
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="basicModal">
                        <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3><b>Product List</b></h3>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                        <br>

                                    </div>
                                    <div class="modal-body">
                                                    <div class="basic-form">

                                                            <input type="text" class="form-control mb-4 " placeholder="Product name" name="product_name">
                                                            <div class="form-row">
                                                                <div class="col-sm-6 mt-2 mt-sm-0 mb-4">
                                                                    <select class="form-control default-select " name="cat_id">
                                                                        <option>Select Category</option>
                                                                        @foreach($categories as $key => $category)
                                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 mt-2 mt-sm-0 mb-4">
                                                                    <select class="form-control default-select " name="sub_cat_id">
                                                                        <option>Select SubCategory</option>
                                                                        @foreach($subcategories as $key => $subcategory)
                                                                            <option value="{{ $subcategory->id }}">{{ $subcategory->sub_cat_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <textarea class="form-control mb-4 "placeholder="Description" name="description"></textarea>
                                                            <div class="form-row">
                                                                <div class="col-sm-12">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control" placeholder="Price" name="price">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">$</span>
                                                                            <span class="input-group-text rounded-right">0.00</span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                          <div class="form-row pt-4">
                                                              <div class="col-sm-12 mt-2 mt-sm-0">
                                                                  <div class="input-group mb-3">
                                                                      <div class="input-group-prepend">
                                                                          <span class="input-group-text">Upload</span>
                                                                      </div>
                                                                      <div class="custom-file">
                                                                          <input type="file" class="custom-file-input" name="image">
                                                                          <label class="custom-file-label">Choose file</label>
                                                                      </div>
                                                                  </div>
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
                        <table id="example" class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Product Name</th>
                                <th>Cat id</th>
                                <th>SubCat id</th>
                                <th>Discription</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($products as $key => $product)
                                <tr style="line-height: 35px;">
                                    <td>{{ $key+ 1 }}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{ $product->cat_id }}</td>
                                    <td>{{$product->sub_cat_id}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td></td>
                                    <td><a href="{{ route('product.destroy',\Illuminate\Support\Facades\Crypt::encrypt($product->id)) }}" onclick="event.preventDefault(); document.getElementById('product-form').submit();" class="text-danger">Delete</a></td>
                                    <form action="{{ route('product.destroy',\Illuminate\Support\Facades\Crypt::encrypt($product->id)) }}" id="product-form" method="post">
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
        </div>

@endsection
