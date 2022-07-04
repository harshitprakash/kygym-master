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
    <div class="row mt-4">
        <div class="col-lg-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row m-b-30">
                        <div class="col-md-5 col-xxl-12">
                            <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset('images/product/diet.png') }}" alt="Diet Product">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-xxl-12">
                            <div class="new-arrival-content position-relative">
                                <h4><a href="{{ route('app.diet') }}">Ask for Diet</a></h4>
                                <div class="comment-review star-rating">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-empty"></i></li>
                                    </ul>
                                </div>
                                <p>From: <span class="item">Inder</span></p>
                                <p class="text-content">Get DIET Plan as per your requirements based on your body stats, which will help you to boost up & stay energized.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row m-b-30">
                        <div class="col-md-5 col-xxl-12">
                            <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset('images/product/supp.jpeg') }}" alt="Supplements Image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-xxl-12">
                            <div class="new-arrival-content position-relative">
                                <h4><a href="{{ route('app.supplements') }}">Purchase Supplements</a></h4>
                                <div class="comment-review star-rating">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-empty"></i></li>
                                    </ul>
                                </div>
                                <p>Availability: <span class="item"> In stock <i class="fa fa-check-circle text-success"></i></span></p>
                                <p>Product: <span class="item">Supplements</span> </p>
                                <p>Brand: <span class="item">All Leading Brands</span></p>
                                <p class="text-content">Are you in love, with supplements, we also provide supplements for the members as per their need, get your supplements from us with surity of genuine products.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center">
        <p>Copyright © Designed &amp; Developed by <a href="http://globaldesign.in" target="_blank">Global Design India</a>
            | <script>const today = new Date(); const value = today.getFullYear(); document.write(value);</script></p>
    </div>
</div>
<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
</body>

</html>
