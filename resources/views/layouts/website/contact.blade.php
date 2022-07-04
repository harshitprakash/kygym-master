@extends('layouts.websites')
@section('content')

    <div class="home">
        <div class="background_image" style="background-image:url(/assets/images/contact.jpg)"></div>
        <div class="overlay"></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="home_title">Contact</div>
                            <div class="home_subtitle">Pilates, Yoga, Fitness, Spinning & many more</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div class="contact">
        <div class="container">
            <div class="row">

                <!-- Contact Content -->
                <div class="col-lg-4">
                    <div class="contact_content">
                        <div class="contact_logo">
                            <div class="logo d-flex flex-row align-items-center justify-content-start"><img src="{{asset('assets/images/GYM WOB.png')}}" alt="" style="height: 80px;"></div>
                        </div>
                        <div class="contact_text">
                            <p>Feel free to contact us, drop us a line or suggetions so that we can work together about it.</p>
                        </div>
                        <div class="contact_list">
                            <ul>
                                <li class="d-flex flex-row align-items-start justify-content-start">
                                    <div><div>A:</div></div>
                                    <div>1481 Creekside Lane Avila Beach, CA 931</div>
                                </li>
                                <li class="d-flex flex-row align-items-start justify-content-start">
                                    <div><div>P:</div></div>
                                    <div>+91 9716358881</div>
                                </li>
                                <li class="d-flex flex-row align-items-start justify-content-start">
                                    <div><div>M:</div></div>
                                    <div>contact@kygym.input</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8 contact_col">
                    <div class="contact_title">Get in touch</div>
                    <div class="contact_form_container">
                        <form action="#" id="contact_form" class="contact_form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input_item"><input type="text" class="contact_input trans_200" placeholder="Name" required="required"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_item"><input type="email" class="contact_input trans_200" placeholder="E-mail" required="required"></div>
                                </div>
                            </div>
                            <div class="input_item"><textarea class="contact_input contact_textarea trans_200" placeholder="Message" required="required"></textarea></div>
                            <button class="contact_button button" style="background-color:  #ec3642;">Send<span></span></button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row google_map_row">
                <div class="col">

                    <!-- Contact Map -->

                    <div class="contact_map">

                        <!-- Google Map -->

                        <div class="map">
                            <div id="google_map" class="google_map">
                                <div class="map_container">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
