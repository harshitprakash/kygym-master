@extends('layouts.admin.master')
@section('title','Assign')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Exersice</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Assign Exersice </a></li>
        </ol>
    </div>

    {{--    style="background-image: url(images/big/img1.jpg);"--}}
    <div class="row">
        <div class="col-sm-4">
           <div class="row">
               <div class="col-sm-12">
                   <div class="card overflow-hidden mb-5">
                       <div class="text-center p-3 overlay-box " >
                           <div class="profile-photo">
                               <img src="{{ asset('images/profile/users/'.$data->info->image) }}" width="100" class="img-fluid rounded-circle" alt="{{ $data->first_name.' '.$data->last_name }}">
                           </div>
                           <h4 class="mt-3 mb-1 text-white">{{ ucfirst($data->first_name).' '.ucfirst($data->last_name) }}</h4>
                           <p class="text-white mb-0">{{$data->member_id}}</p>
                       </div>
                       <ul class="list-group list-group-flush">
                           <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Gender</span> <strong class="text-muted">{{ ucfirst($data->info->gender)}}	</strong></li>
                           <li class="list-group-item d-flex justify-content-between border-bottom"><span class="mb-0">Age</span> 		<strong class="text-muted"> {{ $data->info->getAge($data->info->date_of_birth) }} Years	</strong></li>

                       </ul>
                       @if($data->BMI)
                           <div class="row border-bottom">
                               <div class="col-4 border-right">
                                   <div class="pt-3  pl-0 pr-0 text-center">
                                       <h4 class="m-1"><span class="counter">{{ round($data->BMI->bmi)}}</span> </h4>
                                       <p class="m-0">BMI</p>
                                   </div>
                               </div>
                               <div class="col-4 border-right">
                                   <div class="pt-3  pl-0 pr-0 text-center">
                                       <h4 class="m-1"><span class="counter">{{ round($data->BMI->height)}}</span> M</h4>
                                       <p class="m-0">Height</p>
                                   </div>
                               </div>
                               <div class="col-4 ">
                                   <div class="pt-3 pb-3 pl-0 pr-0 text-center  ">
                                       <h4 class="m-1"><span class="counter">{{ round($data->BMI->weight)}}</span> Kg</h4>
                                       <p class="m-0">Weight</p>
                                   </div>
                               </div>
                           </div>
                           @if($data->BMI->bmi < floor(18.5)) <h4 class="btn  btn-sm alert-info mt-1 ">under weight</h4>
                           @elseif( $data->BMI->bmi > floor(18.5) && $data->BMI->bmi < floor(24.9) ) <h4 class="btn mt-1 btn-block btn-sm alert-success "> Perfect Weight</h4>
                           @elseif( $data->BMI->bmi > floor(25) && $data->BMI->bmi < floor(29.9) ) <h4 class="alert alert-danger mt-4">Over Weight</h4>
                           @elseif($data->BMI->bmi < floor(30)) <h4 class="alert alert-danger mt-1">Over Over weight</h4>
                           @else <h4 class="alert">No record Available</h4> @endif
                       @else
                           <div class="row">
                               <div class="col-4 border-right">
                                   <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                       <h4 class="m-1"><span class="counter">N/A</span> </h4>
                                       <p class="m-0">BMI</p>
                                   </div>
                               </div>
                               <div class="col-4 border-right">
                                   <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                       <h4 class="m-1"><span class="counter">N/A</span> </h4>
                                       <p class="m-0">Height</p>
                                   </div>
                               </div>
                               <div class="col-4 ">
                                   <div class="pt-3 pb-3 pl-0 pr-0 text-center  ">
                                       <h4 class="m-1"><span class="counter">N/A</span></h4>
                                       <p class="m-0">Weight</p>
                                   </div>
                               </div>
                           </div>
                       @endif

                       <div class="row ">
                           <div class="col-sm-12">
                               <button data-toggle="modal" type="button" data-target="#exampleModalCenter" class="btn btn-sm btn-outline-primary btn-block">Calculate BMI</button>

                           </div>
                       </div>
                   </div >

               </div>
           </div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home1"> Exercise</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile1"> Diet</a>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                    <div class="pt-4">
                                        <label>Select date <span class="text-red">*</span></label>
                                        <input type="date" name="exercise_date" id="exercise_date" class="form-control" placeholder="Select date">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div id="display_date">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile1">
                                    <div class="pt-4">
                                        <h4>This is profile title</h4>
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                        </p>
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--   BMI Model Start    -->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('healthcare.store') }}" method="post">@csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">BMI Calculator</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <lable class="col-sm-3 col-form-label">Age</lable>
                                    <div class="col-sm-9">
                                        <strong>
                                            <input type="text" name="age" value="{{ $data->info->getAge($data->info->date_of_birth) }} Years" class="form-control-plaintext"  placeholder="Enter Age" required>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <lable class="col-sm-3 col-form-label">Height (cm)</lable>
                                    <div class="col-sm-9">
                                        <input type="text" name="height" id="height" class="form-control default-control @error('height') is-invalid @enderror" value="{{ old('height') }}" placeholder="Enter height" required>
                                        @error('height')
                                        <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <lable class="col-sm-3 col-form-label">Weight (kg)</lable>
                                    <div class="col-sm-9">
                                        <input type="text" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}" placeholder="Enter weight" required>
                                        @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="member_id" value="{{$data->id}}">
                        <button type="submit" class="btn btn-outline-primary btn-sm">Save </button>
                        <button type="button" class="btn btn-outline-danger btn-sm light" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--    BMI Model End   -->
@endsection
@section('custom-script')
    <script type="text/javascript">
        $(document).ready(function () {
            /*----------- #emploee-department is the id of selector from which we have to take the data. ----------------*/
            $('#exercise_date').change(function() {

                const date = $('#exercise_date').val();
                var dt = new Date(date);
                $('#display_date').empty();
                for(let i =0;i<7;i++)
                {

                    if(i==0)
                    {
                        var exer_date=dt.setDate(dt.getDate());
                    }else{
                        var exer_date=dt.setDate(dt.getDate() + 1);
                    }

                    var my_data= new Date(exer_date).toDateString();
                    $('#display_date').append('<div class="btn btn-sm btn-light mt-1 btn-info"><div class="custom-control custom-checkbox mb-1 check-lg checkbox-success"> <input type="checkbox" class="custom-control-input" name="date_check[]" value="'+ my_data  +'" id="customCheckBox'+ i +'" required=""> <label class="custom-control-label pt-2" for="customCheckBox'+ i +'">&nbsp;&nbsp;'+ my_data  +' </label></div></div> '); //Add field html
                }
            });

        });
    </script>
@endsection


