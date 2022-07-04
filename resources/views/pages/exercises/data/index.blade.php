@extends('layouts.admin.master')
@section('title','list')
@section('content')

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Exersice</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> Exersice Category</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="mr-auto pr-3 mb-sm-0 mb-3">
                        <h4 class="text-black fs-20">Exersice Category</h4>
                        <p class="fs-13 mb-0 text-black">Exersice Category list .</p>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table mt-0 pt-0">
                        <thead>
                        <tr>
                            <th>Sn. no</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($data)>0)
                        @foreach($data as $key=>$value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->cat_name}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('manage.edit', \Illuminate\Support\Facades\Crypt::encrypt($value->id)) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp" id="delKey{{$key}}"><i class="fa fa-trash"></i></a>
                                        <form action="{{ route('manage.destroy', \Illuminate\Support\Facades\Crypt::encrypt($value->id)) }}" method="post" id="delNum{{$key}}">@csrf {{method_field('DELETE')}}</form>
                                        <script type="text/javascript">
                                            document.getElementById('delKey{{$key}}').addEventListener('click', function () {
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
                                                        document.getElementById('delNum{{$key}}').submit();
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
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="3">Records Unavailable!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                </div>
        </div>
    </div>
@endsection
