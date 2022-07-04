@extends('layouts.admin.master')
@section('title','')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
@endsection
@section('content')
    <div class="page-titles ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Exercise</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Create Exercise</a></li>
        </ol>
    </div>

    {{--    <form method="POST" action="{{ route('exercise.store') }}" enctype="multipart/form-data" >@csrf--}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Create Exercise</h4><a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="float-right btn btn-sm btn-primary">Add Category</a>

        </div>
        <div class="card-body">
            <form action="{{route('exercise.store')}}" method="post">@csrf
                <div class="row">
                    <div class="col-6 mt-2">
                        <label for="category">Category <span class="text-red">*</span></label>
                        <select name="cat_id" id="category" class="select2-hidden-accessible" required>
                            <option  value=""></option>
                            @foreach(App\Models\ExerciseCategory::get() as $data)
                                <option  value="{{$data->id}}">{{$data->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mt-2">
                        <label>Exercise Name <span class="text-red">*</span></label>
                        <input class="form-control @error('exercise_name') is-invalid @enderror" type="text" name="exercise_name" placeholder="Enter Exercise Name">
                        @error('exercise_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <label> Instructions</label>
                        <textarea class="form-control @error('instructions') is-invalid @enderror" name="instructions" rows="4"></textarea>
                        @error('instructions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <table class="table table-borderless" id="dynamicAddRemove" >
                    <tr>
                        <th colspan="2"> Body Effected Part</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control @error('effect_on[]') is-invalid @enderror" placeholder="Enter Effected Part" name="effect_on[]">
                            @error('effect_on[]')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </td>
                        <td><button type="button" name="add" id="add-btn" class="btn btn-success btn-sm">Add More</button></td>
                        <td></td>
                    </tr>

                </table>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-sm btn-secondary">Submit</button>
                </div>

            </form>
        </div>
    </div>
    {{--    </form>--}}
    <div class="modal fade" id="exampleModalCenter" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('category.store')}}" method="post">@csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group-sm">
                            <label> Exercise category</label>
                            <input type="text" name="cat_name" class="form-control @error('cat_name') is-invalid @enderror" placeholder="Enter Category">
                            @error('cat_name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('custom-script')

    <script type="text/javascript" src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $("#category").select2({
            placeholder: "Select a Category!",
            allowClear: true
        });

        var i = 0;
        $("#add-btn").click(function(){
            ++i;

            $("#dynamicAddRemove").append('<tr><td><input type="text" name="effect_on[]" placeholder="Enter Effected " class="form-control" /></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">Remove</button></td><td></td></tr>');

        });
        $(document).on('click', '.remove-tr', function(){
            $(this).parents('tr').remove();
        });
    </script>

@endsection
