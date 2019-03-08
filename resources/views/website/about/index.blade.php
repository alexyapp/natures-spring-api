@extends('layouts.app')

@push('styles')
    <style>
        .mission-vision-section h1,
        .mission-vision-section h5,
        .pswri-section h1,
        .pswri-section h5 {
            color: #fff;
        }

        .pswri-section {
            background: url('../images/about3.png');
        }

        @media (min-width: 768px) {
            .mission-wrapper,
            .vision-wrapper {
                height: 600px;
            }
        }

        .mission {
            background: url('../images/about1.png');
            background-size: cover;
        }

        .vision {
            background: url('../images/about2.png');
            background-size: cover;
        }

        .back-to-top-button {
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 75px;
            border-top-left-radius: 75px;
            border-top-right-radius: 75px;
            background: #fff;
            line-height: 75px;
        }
    </style>
@endpush

@section('content')
    @include('partials.website.headline', ['headlineLabel' => 'Our Story'])

    <div class="container-fluid mission-vision-section mb-3">
        <div class="row">
            <div class="col-md-6 mission-wrapper pr-md-2 pl-md-0">
                <div class="mission h-100 w-100 d-table p-md-5">
                    <div class="d-table-cell align-middle py-md-5">
                        <h1 class="text-center mb-3">MISSION</h1>
                        <h5>To provide high quality and diversified drinking products using world class equipment and machineries duly supported by competent employees.</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 vision-wrapper pl-md-2 pr-md-0">
                <div class="vision h-100 w-100 d-table p-md-5">
                    <div class="d-table-cell align-middle p-md-5">
                        <h1 class="text-center mb-3">VISION</h1>
                        <h5>We are the #1 Provider of safe and affordable bottled drinking water that is readily available to the Filipino Community anytime, and anywhere.</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pswri-section text-center py-5 position-relative">
        <div class="row py-5 justify-content-md-center">
            <div class="col-12 col-md-6">
                <h1 class="mb-5">Philippine Spring Water Resources, Inc. (PSWRI),</h1>

                <h5 class="mb-4">a 100% Filipino owned and managed company, is the manufacturer and distributor of NATURE'S SPRING bottled drinking water products nationwide.</h5>
                
                <h5 class="mb-4">PSWRI is the Philippines' overall market leader in the bottled water industry. Over the years, the company has expanded its business offerings</h5>
                
                <h5 class="mb-4">and further entered in diversifying its product lines through continuous innovation, state-of-the-art facilities and competent employees.</h5>
                
                <a class="mb-5 text-white" style="font-size: 1.125rem;" href=""><u>NATURE'S SPRING TIMELINE</u></a>
            </div>
        </div>
        <a class="back-to-top-button position-absolute" href="">back to top</a>
    </div>
@endsection

@push('scripts')
    
@endpush