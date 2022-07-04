<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @yield('custom-seo-meta')
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
        <title>
        @yield('title') | Global Design India
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
        <!-- Nucleo Icons -->
        <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet"/>
        <link type="text/css" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min-1.css') }}" rel="stylesheet">
        @yield('custom-css')
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet"/>
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet"/>
        <style type="text/css">
        *{
        margin: 0px;
        padding: 0px;
        
        }
        body{
        background-image: url({{asset('imgages/login-img.png')}});
        
        }
        </style>
    </head>
    <body>
        <br><br>
        <div class="container" style="top: 40;">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card h-100" style="border-radius: px;">
                        <div class="card-header">
                            <h3 style="font-weight: ;"><span style="color: grey;">We are </span>BodyFitnessGym</h3>
                            <p>Welcome back! Log in to your account to view today's gym status:</p>
                        </div>
                        <div class="container">
                            <form>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="e-mail">Email address</label>
                                        <input type="email" class="form-control" id="e-mail" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password</label>
                                        <input type="Password" class="form-control" id="pwd" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Checked switch</label>
                                </div>
                                <div class="btn" style="background-color: #EC3642;color: white;width: 100%">LOGIN</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
        <script src="{{ asset('vendors/sweetalert2/dist/sweetalert2.all.min-1.js') }}"></script>
        @yield('custom-script')
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
    </body>
</html>