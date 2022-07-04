@extends('layouts.websites')
@section('content')
    <!-- Site Breadcrumb Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/about-breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-text">
                        <h2>Portfolio</h2>
                        <div class="site-breadcrumb">
                            <a href="./home.html" class="sb-item">Home</a>
                            <span class="sb-item">Portfolio</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Site Breadcrumb End -->

    <!-- Gallery Section Begin -->
    <section class="gallery-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="filter-controls">
                        <ul>
                            <li class="active" data-filter=".all">All Gallery</li>
                            <li data-filter=".fitness">Fitness</li>
                            <li data-filter=".coaching">Coaching</li>
                            <li data-filter=".event">Event</li>
                            <li data-filter=".other">Other</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row gallery-filter">
                <div class="col-md-8 mix all fitness">
                    <div class="gallery-item">
                        <div class="gi-img">
                            <img src="{{asset('assets/img/gallery/gallery-1.jpg')}}" alt="">
                        </div>
                        <div class="gi-text">
                            <h5>Sweet Berry Farm</h5>
                            <span>Fitness, Event</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-lg-12 mix all coaching event">
                            <div class="gallery-item">
                                <div class="gi-img">
                                    <img src="{{asset('assets/img/gallery/gallery-2.jpg')}}" alt="">
                                </div>
                                <div class="gi-text">
                                    <h5>Sweet Berry Farm</h5>
                                    <span>Fitness, Event</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mix all other fitness">
                            <div class="gallery-item">
                                <div class="gi-img">
                                    <img src="{{asset('assets/img/gallery/gallery-3.jpg')}}" alt="">
                                </div>
                                <div class="gi-text">
                                    <h5>Sweet Berry Farm</h5>
                                    <span>Fitness, Event</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="row">
                        <div class="col-lg-12 mix all coaching">
                            <div class="gallery-item">
                                <div class="gi-img">
                                    <img src="{{asset('assets/img/gallery/gallery-4.jpg')}}" alt="">
                                </div>
                                <div class="gi-text">
                                    <h5>Sweet Berry Farm</h5>
                                    <span>Fitness, Event</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mix all other event">
                            <div class="gallery-item">
                                <div class="gi-img">
                                    <img src="{{asset('assets/img/gallery/gallery-5.jpg')}}" alt="">
                                </div>
                                <div class="gi-text">
                                    <h5>Sweet Berry Farm</h5>
                                    <span>Fitness, Event</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mix all coaching fitness">
                    <div class="gallery-item">
                        <div class="gi-img">
                            <img src="{{asset('assets/img/gallery/gallery-6.jpg')}}" alt="">
                        </div>
                        <div class="gi-text">
                            <h5>Sweet Berry Farm</h5>
                            <span>Fitness, Event</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mix all event other">
                    <div class="gallery-item">
                        <div class="gi-img">
                            <img src="{{asset('assets/img/gallery/gallery-7.jpg')}}" alt="">
                        </div>
                        <div class="gi-text">
                            <h5>Sweet Berry Farm</h5>
                            <span>Fitness, Event</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->
@endsection
