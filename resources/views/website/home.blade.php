<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        @media (max-width: 768px) {
            .event-pictures-wrapper {
                height: 1200px;
            }

            .event-pictures-wrapper > div {
                height: 300px !important;
            }
        }

        @media (min-width: 768px) and (max-width: 1170px) {
            .event-pictures-wrapper {
                height: 300px;
            }
        }

        @media (min-width: 1170px) {
            .event-pictures-wrapper {
                height: 800px;
            }
        }

        #events .row .col-md-3:first-child {
            background: url('../images/SinulogFestival-1.jpg');
        }

        #events .row .col-md-3:nth-child(2) {
            background: url('../images/pics_51.jpg');
        }

        #events .row .col-md-3:nth-child(3) {
            background: url('../images/RG-Masskara.jpg');
        }

        #events .row .col-md-3:last-child {
            background: url('../images/When-In-Manila-Philippines-AirAsia-Ati-Atihan-Kalibo-5.jpg');
        }
    </style>

    @stack('styles')
</head>
<body>
    <div id="app">
        <section id="hero">
            <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="{{ route('website.about') }}">ABOUT US <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.events') }}">EVENTS</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.products') }}">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.careers') }}">CAREERS</a>
                    </li>
                </ul>
                </div>
            </nav>
            <div id="atf" class="text-center">
                <div id="heading">
                <img id="logo" class="d-block mx-auto" src="images/logo.png" alt="Nature's Spring Logo">
                </div>
                <div id="subheading">
                <p>Since 1991, Nature’s Spring brings you  safe and affordable drinking water that is</p>
                <p>readily available to the community anytime and anywhere.</p>
                </div>
            </div>
            <div class="slider-nav">
                <div class="active"></div>
                <div></div>
                <div></div>
            </div>
        </section>
        <section id="about-us" class="my-5">
            <div class="container-fluid">
                <h6>02</h6>
                <div class="row">
                <div class="col-md-6 my-5 offset-md-2">
                    <div class="mb-3">
                    <h1>PROVIDING SAFE AND</h1>
                    <h1>AFFORDABLE WATER</h1>
                    </div>
                    <div class="mb-5">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at luctus leo. Maecenas efficitur, elit eget tempus vehicula, risus quam mollis turpis, vel egestas massa nibh vehicula nunc. Phasellus ac augue vehicula, rutrum risus ut, aliquam quam.
                    </p>
                    </div>
                    <div class="text-center">
                    <a class="btn btn-primary d-inline-block" href="#">LEARN MORE</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="w-100" src="images/DST.png" alt="Water Bottle">
                </div>
                </div>
            </div>
        </section>
        <section id="events">
            <h6>03</h6>
            <div class="container-fluid h-100">
                <div class="row m-4">
                <div class="col-md-6">
                    <span class="divider"></span>
                </div>
                <div class="col-md-6">
                    <h1>EVENTS</h1>
                </div>
                </div>
                <div class="row event-pictures-wrapper">
                    <div class="col-md-3 h-100">
                        <h5>January</h5>
                    </div>
                    <div class="col-md-3 h-100">
                        <h5>August</h5>
                    </div>
                    <div class="col-md-3 h-100">
                        <h5>October</h5>
                    </div>
                    <div class="col-md-3 h-100">
                        <h5>November</h5>
                    </div>
                </div>
                <div class="row m-5">
                <div class="col">
    
                </div>
                <div class="col text-center">
                    <a class="btn btn-primary d-inline-block" href="#">LEARN MORE</a>
                </div>
                <div class="col clearfix">
                    <span class="divider float-right"></span>
                </div>
                </div>
            </div>
        </section>
        <section id="our-products">
            <div class="container-fluid">
                <h6>04</h6>
                <div class="row my-3">
                <div class="col-6 offset-md-3">
                    <h1 class="mb-0">OUR PRODUCTS</h1>
                </div>
                </div>
                <div class="row text-center mb-5">
                <div class="col-md-4">
                    <img class="w-100" src="images/DST.png" alt="Nature's Spring Purified Water">
                    <p>Nature's Spring Purified Water</p>
                </div>
                <div class="col-md-4">
                    <img class="w-100" src="images/DST.png" alt="Nature's Spring Distilled Bottled Water">
                    <p>Nature's Spring Distilled Water</p>
                </div>
                <div class="col-md-4">
                    <img class="w-100" src="images/DST.png" alt="Nature's Spring PH9 Bottled Water">
                    <p>Nature's Spring PH9 Water</p>
                </div>
                </div>
                <div class="row mb-5">
                <div class="col text-center">
                    <a class="btn btn-primary d-inline-block" href="#">LEARN MORE</a>
                </div>
                </div>
            </div>
        </section>
        <section id="careers" class="pb-5">
            <div class="container pb-5">
                <div class="row">
                <div class="col text-right py-5">
                    <h1>CAREERS</h1>
                </div>
                </div>
                <div class="row text-center">
                <div class="col">
                    <h6 class="py-5">COME WORK WITH US</h6>
                    <div class="pb-5">
                    <a class="btn btn-primary d-inline-block" href="#">LEARN MORE</a>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <section id="contact-us" class="my-5">
            <h6>06</h6>
            <div class="container py-5">
                <div class="row">
                <div class="col-md-6 text-center">
                    <h1>CONTACT US</h1>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                    <div class="col-1">
                        <img src="images/facebook-logo-button.png" alt="Facebook Logo">
                    </div>
                    <div class="col">
                        <p class="mb-0 ml-2">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-1">
                        <img src="images/instagram-logo.png" alt="Instagram Logo">
                    </div>
                    <div class="col">
                        <p class="mb-0 ml-2">adipiscing elit. Nullam at luctus leo. Maecenas </p>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-1">
                        <img src="images/twitter-logo-button.png" alt="Twitter Logo">
                    </div>
                    <div class="col">
                        <p class="mb-0 ml-2">efficitur, elit eget tempus vehicula, risus quam.</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <section id="footer" class="py-3 px-5">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6">
                    &copy; 2015 Philippine Spring Water Resources, Inc. All Rights Reserved
                </div>
                <div class="col-md-6 clearfix">
                    <div class="float-right">
                    <a class="back-to-top back-to-top-button" href="#">
                        <i class="fas fa-chevron-up"></i> BACK TO TOP
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
