<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Application Landing - Body Fitness Gym </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetAlert/sweetalert2.min.css') }}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="container d-flex justify-content-around">
                        <div class="cart-title mt-1">Inder Fitness Gym</div>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="container">
            <form action="{{ route('store.app.data', 'supplement') }}" method="post">@csrf
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <div class="form-group">
                            <label class="text-label">Your Name*</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                            <input type="hidden" name="service" value="diet">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="form-group">
                            <label class="text-label">Email Address*</label>
                            <input type="email" class="form-control" name="email" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="example@example.com" required>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="form-group">
                            <label class="text-label">Phone Number*</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Enter your phone number" required>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                            <label class="text-label">Where are you from*</label>
                            <input type="text" name="place" class="form-control" placeholder="Enter your city, state or pincode" required>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3 mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="copyright text-center">
        <p>Copyright © Designed &amp; Developed by <a href="http://globaldesign.in" target="_blank">Global Design India</a>
            | <script>const today = new Date(); const value = today.getFullYear(); document.write(value);</script></p>
    </div>
</div>
<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('vendor/sweetAlert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
@if(Session::has('success'))
    <script type="text/javascript">
        swal.fire({
            title: "Successful",
            text: "{{Session::get('success')}}",
            icon: "success",
        })
    </script>
@endif
</body>

</html>
