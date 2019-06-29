@extends('layouts.app')

@section('title')
    Products
@endsection

@push('styles')
    <style>
        .classic-section,
        .ice-tea-section {
            height: 800px;
        }

        @media (min-width: 992px) {
            .flavored-water-section {
                height: 800px;
            }
        }

        @media (max-width: 992px) {
            .flavored-water-section {
                height: 3200px;
            }
        }

        @media (max-width: 1170px) {
            .classic-section img {
                left: 50%;
                bottom: -180px;
                width: 90%;
                transform: translateX(-50%);
            }

            .classic-section h1 {
                top: 10%;
                left: 50%;
                transform: translateX(-50%);
                font-size: 60px;
                text-align: center;
            }

            .flavored-water-section h1 {
                margin-top: 30px;
                left: 0;
                font-size: 60px;
            }

            .fiber-water-section h1 {
                font-size: 60px;
            }

            .ice-tea-section {
                height: 400px;
                background-position-x: 55% !important;
            }
        }

        @media (min-width: 1170px) {
            .classic-section img {
                height: 125%;
                bottom: -350px;
            }

            .classic-section h1 {
                top: 10%;
                right: 5%;
            }
        }

        @media (min-width: 500px) and (max-width: 992px) {
            .classic-section {
                height: 600px;
            }
        }

        @media (max-width: 500px) {
            .classic-section {
                height: 400px;
            }

            .fiber-water-section h1 {
                left: 50% !important;
                transform: translateX(-50%);
            }

            .fiber-water-section img {
                width: 100%;
                height: auto !important;
                left: 0;
                bottom: 0;
                position: absolute;
            }
        }

        .fiber-water-section {
            height: 600px;
        }

        .fiber-water-section {
            background-color: #84522D;
        }

        .ice-tea-section {
            background-color: #B51F1F;
            background-size: cover !important;
        }

        .classic-section {
            background-color: #00AEEF;
        }

        .grapes-wrapper {
            background-color: #963075;
            background: url('../images/grapes-bkg.png');
            background-size: cover;
        }

        .apple-wrapper {
            background-color: #CE4357;
            background: url('../images/apple-bkg.png');
            background-size: cover;
        }

        .honeydew-wrapper {
            background-color: #E5B345;
            background: url('../images/honey-bkg.png');
            background-size: cover;
        }

        .calamansi-wrapper {
            background-color: #46A301;
            background: url('../images/kalamansi-bkg.png');
            background-size: cover;
        }

        .grapes-wrapper,
        .apple-wrapper,
        .honeydew-wrapper,
        .calamansi-wrapper {
            height: 800px;
        }

        .modal-custom {
            background: rgba(250, 250, 250, .9);
            transition: all .3s ease-in-out;
        }

        .modal-custom.origin-left,
        .modal-custom.origin-right {
            height: 80%;
            width: 50%;
        }

        .modal-custom.origin-right {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            right: -100%;
        }

        .modal-custom.origin-left {
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            left: -100%;
        }

        .modal-custom.origin-bottom {
            border-top-right-radius: 30px;
            border-top-left-radius: 30px;
            bottom: -100%;
            width: 50%;
            height: 80%;
        }

        .modal-custom.v-center {
            top: 50%;
            transform: translateY(-50%);
        }

        .modal-custom.h-center {
            left: 50%;
            transform: translateX(-50%);
        }

        .show-right {
            right: 0 !important;
        }

        .show-left {
            left: 0 !important;
        }

        .show-bottom {
            bottom: 0 !important;
        }

        .flavored-water-picture {
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .fiber-water-section {
            background: url('../images/fiber-bkg.png');
            background-size: cover;
        }

        .sparkling-section {
            height: 800px;
        }

        .ice-tea-section {
            background: url('../images/icetea.png');
        }

        .sparkling-section {
            background: url('../images/sparkling-bkg.png');
            background-size: cover;
            background-color: #fff;
        }

        @media (max-width: 768px) {
            .sparkling-section {
                height: 600px;
            }
        }

        @media (min-width: 1170px) {
            .sparkling-section img {
                max-width: unset;
                object-position: 0 10px;
            }

            h1 {
                font-size: 100px;
            }
        }

        h1 {
            font-family: 'Poppins', 'sans-serif';
            font-weight: 600;
        }

        .fiber-water-section h1 {
            top: 15%;
            left: 30%;
        }

        .ice-tea-section h1 {
            left: 5%;
            bottom: 30%;
        }

        .sparkling-section img {
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endpush

@section('content')
    
    @include('partials.website.headline', ['headlineLabel' => 'Products'])

    <section>
        <div class="container-fluid position-relative classic-section mb-md-4 overflow-hidden">
            <img class="img-fluid position-absolute" src="{{ asset('images/classic-water.png') }}" alt="">
            <h1 class="position-absolute text-white-50">CLASSIC WATER</h1>
            <div class="modal-custom origin-right v-center position-absolute p-5" data-origin="right">
                <div class="mb-3">
                    <h3>PURIFIED WATER</h3>
                    <p class="mb-2">NATURE'S SPRING PURIFIED Drinking Water is a quality yet affordable brand for daily consumption of clean, and safe bottled water.</p>
                    <p>NATURE'S SPRING PURIFIED Drinking Water is available in 350 mL, 500mL, 1L, 1.5L, 4L, 6.6L, and 10L.</p>
                </div>

                <div class="mb-3">
                    <h3>DISTILLED</h3>
                    <p class="mb-2">NATURE'S SPRING PURIFIED Distilled Drinking Water is the mothers' goto water brand and recommended by Pediatricians due to its quality, purity, safety and affordability</p>
                    <p class="mb-2">NATURE'S SPRING PURIFIED Distilled Drinking Water undergoes 12-stage process with different levels of filtration, purification and distillation process to remove impurities using state-of-the-art facilities.</p>
                    <p>It is available in 350mL, 500mL, 1L, 1.5L, 4L, 6.6L and 10L.</p>
                </div>

                <div>
                    <h3>PH9</h3>
                    <p>NATURE'S SPRING pH9 Drinking Water comes with the highest pH level (Alkaline) that helps neutralize acid build-up in the body.</p>
                    <p>NATURE'S SPRING pH9 Drinking Water is available in 350mL, 500mL, 1L, 1.5L, 4L, 6.6L and 10L.</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid position-relative flavored-water-section mb-md-4 overflow-hidden">
            <h1 style="z-index: 9999;" class="position-absolute text-white-50 w-100 text-center">FLAVORED WATER</h1>
            <div class="row h-100">
                <div class="col-lg-3 position-relative grapes-wrapper">
                    <img class="position-absolute flavored-water-picture" src="{{ asset('images/flavored1.png') }}" alt="">
                </div>
                <div class="col-lg-3 position-relative apple-wrapper">
                    <img class="position-absolute flavored-water-picture" src="{{ asset('images/flavored2.png') }}" alt="">
                </div>
                <div class="col-lg-3 position-relative honeydew-wrapper">
                    <img class="position-absolute flavored-water-picture" src="{{ asset('images/flavored3.png') }}" alt="">
                </div>
                <div class="col-lg-3 position-relative calamansi-wrapper">
                    <img class="position-absolute flavored-water-picture" src="{{ asset('images/flavored4.png') }}" alt="">
                </div>
            </div>

            <div class="modal-custom origin-bottom h-center position-absolute p-5" data-origin="bottom">
                <div class="modal-body-custom container-fluid">
                    <div class="row justify-content-md-center">
                        <div class="col-md-9">
                            <h3 class="text-center">NATURE’S SPRING FLAVORED WATER</h3>
                            <p class="mb-2">
                                NATURE'S SPRING Flavored Water Drink is a water-based drink with 100% fruit concentrate, no sugar added, and no added preservatives. It is also packed with B Vitamins such as B1, B3, B6 and B12.
                            </p>
                            <p>
                                NATURE'S SPRING Flavored Water Drink fulfills your thirst for a #FlavorPaMore taste with #FruityKipg twist of Apple, Grapes, Calamansi, and Honeydew. Available in 350mL, and 500mL.
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid position-relative fiber-water-section mb-md-4 overflow-hidden">
            <h1 style="z-index: 9999;" class="position-absolute text-white-50 text-center">FIBER WATER</h1>
            <img class="h-100" src="{{ asset('images/fiber.png') }}" alt="">
            <div class="modal-custom origin-right v-center position-absolute p-5" data-origin="right">
                <div class="modal-body-custom container-fluid">
                    <div class="row justify-content-md-center">
                        <div class="col-md-9">
                            <h3 class="text-center">NATURE’S SPRING FIBER WATER</h3>
                            <p class="mb-2">Tastes like water but with added benefits. NATURE'S SPRING Fiber Water is infused with soluble dietary fiber that helps with your digestion.</p>
                            <p class="mb-2">NATURE'S SPRING Fiber Water made healthy lifestyle hassle free and even more convenient - Water + Fiber in a bottle. It contains prebiotics that feeds probiotics and keeps your gut in perfect shape.</p>
                            <p>NATURE'S SPRING Fiber Water is available in 500mL.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid position-relative ice-tea-section mb-md-4 overflow-hidden">
            <h1 class="position-absolute text-white-50">ICE TEA</h1>
            <div class="modal-custom origin-left v-center position-absolute p-5" data-origin="left">
                <div class="modal-body-custom container-fluid">
                    <div class="row justify-content-md-center">
                        <div class="col-md-9">
                            <h3 class="text-center">NATURE’S SPRING ICE TEA</h3>
                            <p class="mb-2">NATURE'S SPRING Ice Tea is a ready-to-drink (RTD) product made from 100% real green tea extract that contains antioxidants. It has no sugar added, no added preservatives, and free from artificial coloring.</p>
                            <p class="mb-2">Enjoy a chilled #TealiciouslyGood bottle of NATURE'S SPRING Ice Tea Apple flavor. Available in 220mL, 350mL, and 500mL.</p>
                            <p>Some settlings and color change naturally occur because of green tea extract oxidation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid position-relative sparkling-section mb-md-4 overflow-hidden">
            <img class="img-fluid position-absolute" src="{{ asset('images/sparkling.png') }}" alt="">
            <div class="modal-custom origin-bottom h-center position-absolute p-5" data-origin="bottom">
                <div class="modal-body-custom container-fluid">
                    <div class="row justify-content-md-center">
                        <div class="col-md-9">
                            <h3 class="text-center">NATURE’S SPRING SPARKLING FLAVORED WATER</h3>
                            <p class="mb-2">Flavored Sparkling Water by Nature's Spring is a healthier alternative to sugar soda due to its minimal calories content. It comes with 3 different #SparklyTwist flavors, namely: Lime, Apple and Pineapple that has no sugar added, with 100% fruit concentrate, and no added preservatives. Available in 330mL.</p>
                            <p class="mb-2">For those who seek the good kind of pleasure without a guilt may have a Sparkling Water by Nature's Spring.</p>
                            <p>Sparkling Water is a variation of water infused with carbon dioxide gas, where carbon dioxide gas has been dissolved under pressure and is a healthier alternative to sugar soda due to its zero calorie content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('section').hover(function() {
                var $this = $(this),
                    modalCustom = $this.find('.modal-custom'),
                    origin = modalCustom.data('origin');

                modalCustom.toggleClass(`show-${origin}`);
            });
        });
    </script>
@endpush