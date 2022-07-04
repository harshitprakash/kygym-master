@extends('layouts.websites')
@section("content")
    <!-- Site Breadcrumb Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/about-breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-text">
                        <h2>Product</h2>
                        <div class="site-breadcrumb">
                            <a href="./home.html" class="sb-item">Home</a>
                            <span class="sb-item">Product</span>
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

            <div class="">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/img/products/dumbles.png')}}" alt="Denim Jeans" style="width:100%">
                            </div>
                            <div class="card-body text-center">
                                <h4>Tailored Jeans</h4>
                                <p class="price">$19.99</p>
                                <p>Some text about the jeans..</p>
                                <p><button>Add to Cart</button></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/img/products/dumbles.png')}}" alt="Denim Jeans" style="width:100%">
                            </div>
                            <div class="card-body text-center">
                                <h4>Tailored Jeans</h4>
                                <p class="price">$19.99</p>
                                <p>Some text about the jeans..</p>
                                <p><button>Add to Cart</button></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/img/products/dumbles.png')}}" alt="Denim Jeans" style="width:100%">
                            </div>
                            <div class="card-body text-center">
                                <h4>Tailored Jeans</h4>
                                <p class="price">$19.99</p>
                                <p>Some text about the jeans..</p>
                                <p><button>Add to Cart</button></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/img/products/dumbles.png')}}" alt="Denim Jeans" style="width:100%">
                            </div>
                            <div class="card-body text-center">
                                <h4>Tailored Jeans</h4>
                                <p class="price">$19.99</p>
                                <p>Some text about the jeans..</p>
                                <p><button>Add to Cart</button></p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/img/products/dumbles.png')}}" alt="Denim Jeans" style="width:100%">
                            </div>
                            <div class="card-body text-center">
                                <h4>Tailored Jeans</h4>
                                <p class="price">$19.99</p>
                                <p>Some text about the jeans..</p>
                                <p><button>Add to Cart</button></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/img/products/dumbles.png')}}" alt="Denim Jeans" style="width:100%">
                            </div>
                            <div class="card-body text-center">
                                <h4>Tailored Jeans</h4>
                                <p class="price">$19.99</p>
                                <p>Some text about the jeans..</p>
                                <p><button>Add to Cart</button></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/img/products/dumbles.png')}}" alt="Denim Jeans" style="width:100%">
                            </div>
                            <div class="card-body text-center">
                                <h4>Tailored Jeans</h4>
                                <p class="price">$19.99</p>
                                <p>Some text about the jeans..</p>
                                <p><button>Add to Cart</button></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/img/products/dumbles.png')}}" alt="Denim Jeans" style="width:100%">
                            </div>
                            <div class="card-body text-center">
                                <h4>Tailored Jeans</h4>
                                <p class="price">$19.99</p>
                                <p>Some text about the jeans..</p>
                                <p><button>Add to Cart</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->
@endsection
