@extends('layouts.websites')
@section('content')

    <div class="home">
        <div class="background_image" style="background-image:url(images/services.jpg)"></div>
        <div class="overlay"></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="home_title">Services</div>
                            <div class="home_subtitle">Pilates, Yoga, Fitness, Spinning & many more</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <div><div class="service_icon"><img src="images/icon_4.png" alt=""></div></div>
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
                            <div><div class="service_icon"><img src="images/icon_5.png" alt=""></div></div>
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
                            <div><div class="service_icon"><img src="images/icon_6.png" alt=""></div></div>
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
                            <div><div class="service_icon"><img src="images/icon_7.png" alt=""></div></div>
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
                            <div><div class="service_icon"><img src="images/icon_8.png" alt=""></div></div>
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
                            <div><div class="service_icon"><img src="images/icon_9.png" alt=""></div></div>
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

    <!-- Timetable -->

    <div class="timetable">
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/timetable.jpg" data-speed="0.8"></div>
        <div class="tt_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container">
                        <div class="section_subtitle">welcome to sportfit</div>
                        <div class="section_title">Classes Timetable</div>
                    </div>
                    <div class="timetable_filtering">
                        <ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
                            <li class="active item_filter_btn" data-filter="*">All Classes</li>
                            <li class="item_filter_btn" data-filter=".weight_loss">Weight Loss</li>
                            <li class="item_filter_btn" data-filter=".aerobics">Aerobics</li>
                            <li class="item_filter_btn" data-filter=".crossfit">Crossfit</li>
                            <li class="item_filter_btn" data-filter=".fitness">Fitness</li>
                            <li class="item_filter_btn" data-filter=".yoga">Yoga</li>
                            <li class="item_filter_btn" data-filter=".pilates">Pilates</li>
                            <li class="item_filter_btn" data-filter=".stretching">Stretching</li>
                        </ul>
                    </div>
                    <div class="timetable_container d-flex flex-sm-row flex-column align-items-start justify-content-sm-between justify-content-start">

                        <!-- Monday -->
                        <div class="tt_day">
                            <div class="tt_title">monday</div>
                            <div class="tt_day_content grid">

                                <!-- Class -->
                                <div class="tt_class grid-item weight_loss">
                                    <div class="tt_class_title">Weight Loss</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">9:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">10:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class empty grid-item">

                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">13:00</div>
                                </div>

                            </div>
                        </div>

                        <!-- Tuesday -->
                        <div class="tt_day">
                            <div class="tt_title">tuesday</div>
                            <div class="tt_day_content grid">

                                <!-- Class -->
                                <div class="tt_class grid-item weight_loss">
                                    <div class="tt_class_title">Weight Loss</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">8:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class empty grid-item">

                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">12:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">13:00</div>
                                </div>
                            </div>
                        </div>

                        <!-- Wednesday -->
                        <div class="tt_day">
                            <div class="tt_title">wednesday</div>
                            <div class="tt_day_content grid">

                                <!-- Class -->
                                <div class="tt_class grid-item crossfit">
                                    <div class="tt_class_title">Crossfit</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">9:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">10:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class empty grid-item">

                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">13:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">17:00</div>
                                </div>
                            </div>
                        </div>

                        <!-- Thursday -->
                        <div class="tt_day">
                            <div class="tt_title">thursday</div>
                            <div class="tt_day_content grid">

                                <!-- Class -->
                                <div class="tt_class grid-item fitness">
                                    <div class="tt_class_title">Fitness</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">9:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">10:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item yoga">
                                    <div class="tt_class_title">Yoga</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">12:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item pilates">
                                    <div class="tt_class_title">Pilates</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">13:00</div>
                                </div>
                            </div>
                        </div>

                        <!-- Friday -->
                        <div class="tt_day">
                            <div class="tt_title">friday</div>
                            <div class="tt_day_content grid">

                                <!-- Class -->
                                <div class="tt_class grid-item yoga">
                                    <div class="tt_class_title">Yoga</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">9:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">10:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class empty grid-item">

                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">13:00</div>
                                </div>
                            </div>
                        </div>

                        <!-- Saturday -->
                        <div class="tt_day">
                            <div class="tt_title">Saturday</div>
                            <div class="tt_day_content grid">

                                <!-- Class -->
                                <div class="tt_class grid-item weight_loss">
                                    <div class="tt_class_title">Weight Loss</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">9:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item pilates">
                                    <div class="tt_class_title">Pilates</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">10:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class empty grid-item">

                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">13:00</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sunday -->
                        <div class="tt_day">
                            <div class="tt_title">Sunday</div>
                            <div class="tt_day_content grid">

                                <!-- Class -->
                                <div class="tt_class grid-item stretching">
                                    <div class="tt_class_title">Stretching</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">9:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class grid-item aerobics">
                                    <div class="tt_class_title">Aerobics</div>
                                    <div class="tt_class_instructor">Jessica Smith</div>
                                    <div class="tt_class_time">10:00</div>
                                </div>

                                <!-- Class -->
                                <div class="tt_class empty grid-item">

                                </div>

                                <!-- Class -->
                                <div class="tt_class empty grid-item">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Extra -->

    <div class="extra d-flex flex-column align-items-center justify-content-center text-center">
        <div class="background_image" style="background-image:url(images/extra_wide.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="extra_content d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="extra_title">15% Discount</div>
                        <div class="extra_text">
                            <p>Morbi sed varius risus, vitae molestie lectus. Donec id hendrerit velit, eu fringilla neque. Etiam id finibus sapien. Donec sollicitudin luctus ex non pharetra.llus.</p>
                        </div>
                        <div class="button extra_button"><a href="#">Join Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
