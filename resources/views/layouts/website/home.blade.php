@extends('layouts.websites')
@section('content')

    <div class="home">
        <div class="background_image" style="background-image:url(assets/images/index.jpg)"></div>
        <div class="overlay"></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content text-center">
                            <div class="video_link">
                                <a class="vimeo video_button d-flex flex-column align-items-center justify-content-center" href="https://player.vimeo.com/video/99340873?autoplay=1&amp;loop=1&amp;title=0&amp;autopause=0">
                                    <div class="video_link_content d-flex flex-row align-items-center justify-content-start">

                                    </div>
                                </a>
                            </div>
                            <div class="home_title">Get fit with us</div>
                            <div class="home_subtitle">Pilates, Yoga, Fitness, Spinning & many more</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    <!-- Boxes -->
    <div class="boxes">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="boxes_container d-flex flex-lg-row flex-column align-items-start justify-content-start">

                        <!-- Box -->
                        <div class="box" style="animation-name: fadeInUp;animation-duration: 1s;">
                            <div class="box_icon d-flex flex-column align-items-center justify-content-center"><img src="{{asset('assets/images/icon_1.png')}}" alt=""></div>
                            <div class="box_title">Pilates with trainer</div>
                            <div class="box_text">
                                <p>Etiam commodo justo nec aliquam feugiat. Donec a leo eget augue porttitor sollicitudin.</p>
                            </div>

                        </div>
                        <!-- Box -->
                        <div class="box" style="background-color: #e2545c;animation-name: fadeInUp;animation-duration: 2.5s;">
                            <div class="box_icon d-flex flex-column align-items-center justify-content-center"><img src="{{asset('assets/images/icon_2.png')}}" alt=""></div>
                            <div class="box_title">Swimming Pool</div>
                            <div class="box_text">
                                <p>Donec a leo eget augue porttitor sollicitudin. Morbi sed varius risus, vitae molestie lectus. Donec id hendrerit.</p>
                            </div>

                        </div>
                        <!-- Box -->
                        <div class="box" style="animation-name: fadeInUp;animation-duration: 3s;">
                            <div class="box_icon d-flex flex-column align-items-center justify-content-center"><img src="{{asset('assets/images/icon_3.png')}}" alt=""></div>
                            <div class="box_title">Healthy diet plan</div>
                            <div class="box_text">
                                <p>Morbi sed varius risus, vitae molestie lectus. Donec id hendrerit velit, eu fringilla neque.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <div class="about">
        <div class="container about_container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_content">
                        <div class="section_title_container">
                            <div class="section_subtitle">welcome to BodyFitness Gym</div>
                            <div class="section_title">About <span style="font-size: 60px;">BodyFitness Gym</span></div>
                        </div>
                        <div class="text_highlight">‘The last three or four reps is what makes the muscle grow. This area of pain divides a champion from someone who is not a champion.’</div>
                        <div class="about_text">
                            <p>At BodyFitness Gym you’ll find all the latest strength and cardio equipment along with a energetic group exercise program that includes POUND, Zumba, Kickboxing, Bootcamp, Muscle Building and many other cardio classes. You’ll find a supportive environment with all kinds of people who are working just as hard as you to meet their goals.</p>
                        </div>
                        <div class="button about_button" style="background-color: #ec3642;"><a href="#">Join Now</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about_background floater">
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="col-lg-6 offset-lg-6 fill_height">
                        <div class="about_image"><img src="{{asset('assets/images/a1.png')}}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials -->
    <!-- Gallery -->
    <div class="gallery">

        <!-- Gallery Slider -->
        <div class="gallery_slider_container">
            <div class="owl-carousel owl-theme gallery_slider">

                <!-- Slide -->
                <div class="owl-item"><img src="{{asset('assets/images/gallery_3.jpg')}}" alt=""></div>
                <!-- Slide -->
                <div class="owl-item"><img src="{{asset('assets/images/gallery_4.jpg')}}" alt=""></div>
                <!-- Slide -->
                <div class="owl-item"><img src="{{asset('assets/images/gallery_5.jpg')}}" alt=""></div>
                <!-- Slide -->
                <div class="owl-item"><img src="{{asset('assets/images/gallery_1.jpg')}}" alt=""></div>
                <!-- Slide -->
                <div class="owl-item"><img src="{{asset('assets/images/gallery_2.jpg')}}" alt=""></div>
            </div>
        </div>
    </div><br>
    <!-- Services -->
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container">
                        <div class="section_subtitle">welcome to sportfit</div>
                        <div class="section_title">Our Courses</div>
                    </div>
                </div>
            </div>
            <div class="row services_row">

                <!-- Service -->
                <div class="col-xl-4 col-md-6 service_col">
                    <div class="service">
                        <div class="service_title_container d-flex flex-row align-items-center justify-content-start">
                            <div><div class="service_icon"><img src="{{asset('assets/images/icon_4.png')}}" alt=""></div></div>
                            <div class="service_title">Weight Loss Class</div>
                        </div>
                        <div class="service_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum.</p>
                        </div>
                    </div>
                </div>
                <!-- Service -->
                <div class="col-xl-4 col-md-6 service_col">
                    <div class="service">
                        <div class="service_title_container d-flex flex-row align-items-center justify-content-start">
                            <div><div class="service_icon"><img src="{{asset('assets/images/icon_5.png')}}" alt=""></div></div>
                            <div class="service_title">Yoga Classes</div>
                        </div>
                        <div class="service_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum.</p>
                        </div>
                    </div>
                </div>
                <!-- Service -->
                <div class="col-xl-4 col-md-6 service_col">
                    <div class="service">
                        <div class="service_title_container d-flex flex-row align-items-center justify-content-start">
                            <div><div class="service_icon"><img src="{{asset('assets/images/icon_6.png')}}" alt=""></div></div>
                            <div class="service_title">Spinning Class</div>
                        </div>
                        <div class="service_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum.</p>
                        </div>
                    </div>
                </div>
                <!-- Service -->
                <div class="col-xl-4 col-md-6 service_col">
                    <div class="service">
                        <div class="service_title_container d-flex flex-row align-items-center justify-content-start">
                            <div><div class="service_icon"><img src="{{asset('assets/images/icon_7.png')}}" alt=""></div></div>
                            <div class="service_title">Private Fit Class</div>
                        </div>
                        <div class="service_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum.</p>
                        </div>
                    </div>
                </div>
                <!-- Service -->
                <div class="col-xl-4 col-md-6 service_col">
                    <div class="service">
                        <div class="service_title_container d-flex flex-row align-items-center justify-content-start">
                            <div><div class="service_icon"><img src="{{asset('assets/images/icon_8.png')}}" alt=""></div></div>
                            <div class="service_title">Nutrition Classes</div>
                        </div>
                        <div class="service_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum.</p>
                        </div>
                    </div>
                </div>
                <!-- Service -->
                <div class="col-xl-4 col-md-6 service_col">
                    <div class="service">
                        <div class="service_title_container d-flex flex-row align-items-center justify-content-start">
                            <div><div class="service_icon"><img src="{{asset('assets/images/icon_9.png')}}" alt=""></div></div>
                            <div class="service_title">Pillates Class</div>
                        </div>
                        <div class="service_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog -->
    <div class="blog">
        <div class="blog_overlay"></div>
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/blog.jpg" data-speed="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class=" d-flex flex-row align-items-start justify-content-start">
                        <div class="section_title_container">
                            <div class="section_subtitle">welcome to BodyGym Fitness</div>
                            <div class="section_title" style="color: black;">Our Testimonials</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row blog_row">

                <!-- Blog Post -->
                <div class="col-lg-4 blog_col">
                    <div class="blog_post">
                        <div class="blog_post_image"><img src="{{asset('assets/images/blog_1.jpg')}}" alt=""></div>

                        <div class="blog_post_date"><a href="#">june 29, 2018</a></div>
                        <div class="blog_post_text">
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Odio vestibulum est mattis effic iturut.</p>
                        </div>
                    </div>
                </div>
                <!-- Blog Post -->
                <div class="col-lg-4 blog_col">
                    <div class="blog_post">
                        <div class="blog_post_image"><img src="{{asset('assets/images/blog_2.jpg')}}" alt=""></div>

                        <div class="blog_post_date"><a href="#">june 29, 2018</a></div>
                        <div class="blog_post_text">
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Odio vestibulum est mattis effic iturut.</p>
                        </div>
                    </div>
                </div>
                <!-- Blog Post -->
                <div class="col-lg-4 blog_col">
                    <div class="blog_post">
                        <div class="blog_post_image"><img src="{{asset('assets/images/blog_3.jpg')}}" alt=""></div>

                        <div class="blog_post_date"><a href="#">june 29, 2018</a></div>
                        <div class="blog_post_text">
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Odio vestibulum est mattis effic iturut.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
