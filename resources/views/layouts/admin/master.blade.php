<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') - Body Fitness Gym </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/sweetAlert/sweetalert2.min.css') }}">
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    @yield('custom-css')
</head>

<body>

<!--*******************
  Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
  Preloader end
********************-->

<!--**********************************
  Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="{{ route('dashboard') }}" class="brand-logo">
            <img class="logo-abbr" src="{{asset('images/logo.png')}}" alt="">
            <h4 class="brand-title text-center"><strong> Body Fitness</strong></h4>
        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Chat box start
    ***********************************-->
    <div class="chatbox">
        <div class="chatbox-close"></div>
        <div class="custom-tab-1">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#alerts">Alerts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#chat">Chat</a>
                </li>
            </ul>

        </div>
    </div>
    <!--**********************************
        Chat box End
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
@include('layouts.admin.includes.header')
<!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
@include("layouts.admin.includes.Sidebar")
<!--**********************************
        Sidebar end
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
        Content body end
    ***********************************-->
        </div>
    </div>
    <!--**********************************
        Footer start
    ***********************************-->
@include('layouts.admin.includes.footer')
<!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
  Main wrapper end
***********************************-->


<!-- Password update popup start -->

<div class="modal fade none-border " id="change-password">
    <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <form action="{{route('change.password')}}" method="post">@csrf
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Change Password</strong></h4>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="current_password">Old password</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required
                                       placeholder="Enter current password">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>

                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="control-label" for="new-password"> Password<span class="text-red">*</span></label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                                       placeholder="Enter the new password" id="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="control-label" for="confirm_password">Re-Enter Password<span class="text-red">*</span></label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required placeholder="Enter same password">
                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>

                                @enderror
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect waves-light save-category" id="formSubmit" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect">Change</button>
                </div>
                 </form>
            </div>
    </div>
</div>

<!-- Password update popup end  -->

<!--**********************************
  Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('vendor/sweetAlert/sweetalert2.all.min.js')}}"></script>
@if(Session::has('error'))
    <script type="text/javascript">
        swal.fire({
            title: "Process Failed",
            text: "{{Session::get('error')}}",
            icon: "error",
        })
    </script>
@endif
@if(Session::has('success'))
    <script type="text/javascript">
        swal.fire({
            title: "Successfully Executed",
            text: "{{Session::get('success')}}",
            icon: "success",
        })
    </script>
@endif
<script type="text/javascript" src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/deznav-init.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/plugins-init/widgets-script-init.js')}}"></script>
<script type="text/javascript">
    function restrictAlphabets(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57 ))
            return true;
        else
            return false;
    }
    // only number and float value //
    function isFloat(evt) {
        var charCode = (event.which) ? event.which : event.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {

            return false;
        } else {
            //if dot sign entered more than once then don't allow to enter dot sign again. 46 is the code for dot sign
            let parts = evt.srcElement.value.split('.');
            if (parts.length > 1 && charCode == 46) {
                return false;
            }
            return true;

        }
    }
</script>
@yield('custom-script')
</body>

</html>
