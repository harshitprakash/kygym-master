<header class="header" style="background-color: white;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
                    <a href="#">
                        <div class="logo d-flex flex-row align-items-center justify-content-start"><img src="images/GYM WOB.png" alt="" style="height: 66px;"></div>
                    </a>
                    <nav class="main_nav">
                        <ul class="d-flex flex-row align-items-center justify-content-start">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('aboutus')}}">About us</a></li>
                            <li><a href="">Classes & Services</a></li>
                            <li class="active"><a href="{{route('contact')}}">Contact</a></li>
                            <li><a href="{{route('product')}}">Products</a></li>
                            <li><a href="{{ route('login') }}">Log-in</a></li>
                        </ul>
                    </nav>
                    <div class="phone d-flex flex-row align-items-center justify-content-start ml-auto">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:+919716358881" style="color: #ec3642;">+91 9716358881</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Hamburger -->

<div class="hamburger_bar trans_400 d-flex flex-row align-items-center justify-content-start">
    <div class="hamburger">
        <div class="menu_toggle d-flex flex-row align-items-center justify-content-start">
            <span style="color: black;">menu</span>
            <div class="hamburger_container">
                <div class="menu_hamburger">
                    <div class="line_1 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
                    <div class="line_2 hamburger_lines" style="visibility: inherit; opacity: 1;"></div>
                    <div class="line_3 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu -->
<div class="menu trans_800">
    <div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About us</a></li>
            <li><a href="">Classes & Services</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Products</a></li>
            <li><a href="#">Log-in</a></li>
        </ul>
    </div>
    <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <a href="tel:+919716358881" style="color: #ec3642;">+91 9716358881</a>
    </div>
</div>
