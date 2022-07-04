@extends('layouts.websites')
@section('content')

    <!-- Site Breadcrumb Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/about-breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-text">
                        <h2>About Us</h2>
                        <div class="site-breadcrumb">
                            <a href="./home.html" class="sb-item">Home</a>
                            <span class="sb-item">About</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Site Breadcrumb End -->

    <!-- About Us Secion Begin -->
    <section class="about-us-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about-pic">
                        <img src="{{asset('assets/img/about-us.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>Wellcome to KYGYM</h2>
                            <p>Our dedicated KyGym areas and fitness experts can help you discover new training
                                techniques and exercises that offer a dynamic and efficient full-body workout.</p>
                        </div>
                        <p>Our fitness experts can help you discover new training techniques. Lorem ipsum dolor sit
                            amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                            sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Secion End -->

    <!-- Why Chose Us Section Begin -->
    <section class="choseus-section set-bg spad" data-setbg="{{asset('assets/img/chose-us-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Why Choose Us</h2>
                        <p>Our fitness experts can help you discover new training techniques.</p>
                    </div>
                </div>
            </div>
            <div class="chose-items">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="ci-item">
                            <i class="ti-crown"></i>
                            <h5>How do I become an author?</h5>
                            <p>Event Calendar and Event Calendar Pro full support out of the box.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="ci-item">
                            <i class="ti-package"></i>
                            <h5>Is my license transferable?</h5>
                            <p>Event Calendar and Event Calendar Pro full support out of the box.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="ci-item">
                            <i class="ti-shopping-cart"></i>
                            <h5>What do you mean by item?</h5>
                            <p>Event Calendar and Event Calendar Pro full support out of the box.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="ci-item">
                            <i class="ti-user"></i>
                            <h5>Top notch customer support</h5>
                            <p>Event Calendar and Event Calendar Pro full support out of the box.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Chose Us Section End -->

    <!-- About Page Trainer Section Begin -->
    <section class="about-page-trainer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Our Trainer</h2>
                            <p>Our fitness experts can help you discover new training techniques.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-trainer-item">
                        <div class="trainer-pic">
                            <img src="{{asset('assets/img/trainer/trainer-1.jpg')}}" alt="">
                        </div>
                        <div class="trainer-text">
                            <h5>Noah Leonard</h5>
                            <span>Gymer</span>
                            <div class="trainer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-trainer-item">
                        <div class="trainer-pic">
                            <img src="{{asset('assets/img/trainer/trainer-2.jpg')}}" alt="">
                        </div>
                        <div class="trainer-text">
                            <h5>Noah Leonard</h5>
                            <span>Gymer</span>
                            <div class="trainer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-trainer-item">
                        <div class="trainer-pic">
                            <img src="{{asset('assets/img/trainer/trainer-3.jpg')}}" alt="">
                        </div>
                        <div class="trainer-text">
                            <h5>Noah Leonard</h5>
                            <span>Gymer</span>
                            <div class="trainer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-trainer-item">
                        <div class="trainer-pic">
                            <img src="{{asset('assets/img/trainer/trainer-4.jpg')}}" alt="">
                        </div>
                        <div class="trainer-text">
                            <h5>Noah Leonard</h5>
                            <span>Gymer</span>
                            <div class="trainer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
