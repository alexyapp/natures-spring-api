@extends('layouts.app')

@section('title')
    Events
@endsection

@push('styles')
    <style>
        .far.fa-calendar {
            font-size: 450px;
        }

        .calendar-of-activities-section p {
            font-size: 60px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* .modal.fade .modal-dialog {
            -webkit-transform: translate(0,25%);
            -ms-transform: translate(0,25%);
            -o-transform: translate(0,25%);
            transform: translate(0,25%);
        } */

        @media (min-width: 1024px) {
            .modal-dialog {
                max-width: 75%;
            }
        }

        .modal-dialog {
            min-height: 937px;
            height: fit-content;
        }

        .modal-header .close {
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #00AEEF;
            opacity: 1;
            text-shadow: unset;
            font-size: unset;
            font-weight: unset;
            margin: unset;
            width: 110px;
            height: 55px;
            border-bottom-left-radius: 55px;
            border-bottom-right-radius: 55px;
        }

        .modal-content {
            border-radius: 3rem;
            min-height: calc(937px - 1.75rem);
        }

        .modal-body {
            /* overflow-y: scroll; */
        }

        .loader {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: auto;
        }

        .career-info {
            border-bottom: 1px solid #dee2e6;
        }

        .event-pictures .row div {
            background-size: cover !important;
            background-position: center !important;
        }

        @media (max-width: 500px) {
            .calendar-of-activities-section p {
                font-size: 30px;
            }

            .far.fa-calendar {
                font-size: 300px;
            }
        }
    </style>
@endpush

@section('content')
    
    @include('partials.website.headline', ['headlineLabel' => 'Events'])

    <div style="background-color: #333; height: 800px;" class="container-fluid event-pictures">
        <div class="row h-100">
            <div style="background: url('../images/SinulogFestival-1.jpg');" class="col-md-3"></div>
            <div style="background: url('../images/pics_51.jpg');" class="col-md-3"></div>
            <div style="background: url('../images/RG-Masskara.jpg');" class="col-md-3"></div>
            <div style="background: url('../images/When-In-Manila-Philippines-AirAsia-Ati-Atihan-Kalibo-5.jpg');" class="col-md-3"></div>
        </div>
    </div>

    <div class="container-fluid calendar-of-activities-section">
        <div class="container">
            <div class="row text-center py-4 py-md-5">
                <div class="col-lg-6 position-relative mb-5 mb-lg-0">
                    <a class="event-calendar" href="#" data-date-range="jan-jun" data-year="{{ date('Y') }}">
                        <i class="far fa-calendar"></i>
                    <p class="position-absolute">JAN - JUN</p>
                    </a>
                </div>
                <div class="col-lg-6 position-relative">
                    <a class="event-calendar" href="#" data-date-range="jul-dec" data-year="{{ date('Y') }}">
                        <i class="far fa-calendar"></i>
                        <p class="position-absolute">JUL - DEC</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Events Modal -->
    <div class="modal fade" id="eventsModal" tabindex="-1" role="dialog" aria-labelledby="eventsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content h-100">
                <div class="modal-header py-5 position-relative border-bottom-0">
                    {{-- <h5 class="modal-title" id="eventsModalLabel">Modal title</h5> --}}
                    <button type="button" class="close position-absolute p-0" data-dismiss="modal" aria-label="Close">
                        CLOSE
                    </button>
                </div>
                <div class="modal-body position-relative p-0">
                    <img class="loader position-absolute" src="{{ asset('images/spinner.gif') }}" alt="">
                    <div class="container-fluid events-wrapper d-none">
                        <div class="jan-jun-wrapper d-none">
                            <div class="row">
                                <div class="col-12 col-lg-4 events-jan-wrapper">
                                    <h3 class="text-center">Jan</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 events-feb-wrapper">
                                    <h3 class="text-center">Feb</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 events-mar-wrapper">
                                    <h3 class="text-center">Mar</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-4 events-apr-wrapper">
                                    <h3 class="text-center">Apr</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 events-may-wrapper">
                                    <h3 class="text-center">May</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 events-jun-wrapper">
                                    <h3 class="text-center">Jun</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="jul-dec-wrapper d-none">
                            <div class="row">
                                <div class="col-12 col-lg-4 events-jul-wrapper">
                                    <h3 class="text-center">Jul</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 events-aug-wrapper">
                                    <h3 class="text-center">Aug</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 events-sep-wrapper">
                                    <h3 class="text-center">Sep</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-4 events-oct-wrapper">
                                    <h3 class="text-center">Oct</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 events-nov-wrapper">
                                    <h3 class="text-center">Nov</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 events-dec-wrapper">
                                    <h3 class="text-center">Dec</h3>
                                    <div style="height: 300px; overflow-y: scroll;" class="container-fluid">
                                        <div class="row"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer py-5"></div> --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var months = [
                'Jan', 
                'Feb', 
                'Mar', 
                'Apr', 
                'May', 
                'Jun', 
                'Jul', 
                'Aug', 
                'Sep', 
                'Oct', 
                'Nov', 
                'Dec'
            ];

            // helpers
            function showLoader() {
                $('.loader').addClass('d-block').removeClass('d-none');
            }

            function hideLoader() {
                $('.loader').addClass('d-none').removeClass('d-block');
            }

            $('#eventsModal').on('hidden.bs.modal', function() {
                $('.events-wrapper, .jan-jun-wrapper, .jul-dec-wrapper').addClass('d-none');
            });

            $('.event-calendar').click(function(e) {
                e.preventDefault();

                $('#eventsModal').modal('show');

                showLoader();

                var $this = $(this);
                var dates = $this.data('dateRange').split('-');
                var from = dates[0];
                var to = dates[1];
                var year = $this.data('year');

                to = to.substr(0, 1).toUpperCase() + to.substr(1); // capitalize first letter

                from = new Date(from + year);
                to = new Date(year, months.indexOf(to) + 1, 0);

                $.ajax({
                    url: '/api/v1/events',
                    type: 'GET',
                    data: {
                        from: from.toLocaleDateString(),
                        to: to.toLocaleDateString(),
                        all: true
                    },
                    dataType: 'json',
                    beforeSend: function() {

                    },
                    success: function(res) {
                        hideLoader();


                        res.data.forEach(function(value, index) {
                            var date = new Date(value.start_date);
                            var month = months[date.getMonth()];
                            $(`.events-${month.toLowerCase()}-wrapper .container-fluid .row`).append(`
                                    <div class="col-12 mb-md-2">
                                        <a style="font-size: 20px;" target="_blank" href="/events/${value.slug}">${value.name}</a>
                                    </div>
                                `)
                        });

                        $(`.${$this.data('dateRange')}-wrapper`).removeClass('d-none');
                        $('.events-wrapper').removeClass('d-none');
                    }
                });
            });
        });
    </script>
@endpush