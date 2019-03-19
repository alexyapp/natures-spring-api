@extends('layouts.app')

@section('title')
    Home
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">

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

        .slick-dots li button:before {
            font-size: 1.125rem;
            color: rgba(250, 250, 250, .3);
        }

        .slick-dots li.slick-active button:before {
            color: rgba(250, 250, 250, 1);
        }

        .slick-dots {
            bottom: 27px;
        }

        video {
            width: 100%;
        }
    </style>
@endpush

@section('content')
        <section>
            <div class="slider">
                    <div>
                        <video autoplay muted loop>
                            <source src="{{ asset('videos/NS_10s_ONLINE_070318.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div>
                        <video autoplay muted loop>
                            <source src="{{ asset('videos/Sparkling_10s.mp4') }}" type="video/mp4">
                        </video>
                    </div>
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
                    <a class="btn btn-primary d-inline-block" href="{{ url('about-us') }}">LEARN MORE</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="mx-auto d-block" style="height: 600px;" src="{{ asset('images/purified-500ml.png') }}" alt="Nature's Spring Purified Water">
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
                    <a class="btn btn-primary d-inline-block" href="{{ url('events') }}">LEARN MORE</a>
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
                    <img class="mb-3" style="height: 600px;" src="{{ asset('images/purified-500ml.png') }}" alt="Nature's Spring Purified Water">
                    <p>Nature's Spring Purified Water</p>
                </div>
                <div class="col-md-4">
                    <img class="mb-3" style="height: 600px;" src="{{ asset('images/distilled-500ml.png') }}" alt="Nature's Spring Distilled Bottled Water">
                    <p>Nature's Spring Distilled Water</p>
                </div>
                <div class="col-md-4">
                    <img class="mb-3" style="height: 600px;" src="{{ asset('images/PH9-500ml.png') }}" alt="Nature's Spring PH9 Bottled Water">
                    <p>Nature's Spring PH9 Water</p>
                </div>
                </div>
                <div class="row mb-5">
                <div class="col text-center">
                    <a class="btn btn-primary d-inline-block" href="{{ url('products') }}">LEARN MORE</a>
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
                        <a class="btn btn-primary d-inline-block" href="{{ url('careers') }}">LEARN MORE</a>
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
                        <a href="https://www.facebook.com/naturespring/" target="_blank">
                            <img src="images/facebook-logo-button.png" alt="Facebook Logo">
                        </a>
                    </div>
                    <div class="col">
                        <p class="mb-0 ml-2">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-1">
                        <a href="https://www.instagram.com/naturespring_official/">
                            <img src="images/instagram-logo.png" alt="Instagram Logo">
                        </a>
                    </div>
                    <div class="col">
                        <p class="mb-0 ml-2">adipiscing elit. Nullam at luctus leo. Maecenas </p>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-1">
                        <a href="https://twitter.com/natures_spring">
                            <img src="images/twitter-logo-button.png" alt="Twitter Logo">
                        </a>
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
@endsection

    
    @push('scripts')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.slider').slick({
                    arrows: false,
                    dots: true
                });
            });
        </script>
    @endpush
