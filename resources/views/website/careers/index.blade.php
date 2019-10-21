@extends('layouts.app')

@section('title')
    Careers
@endsection

@push('styles')
    <style>
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

        .come-work-with-us-section {
            background: url('../images/careers1.png') no-repeat;
            background-size: cover;
        }
    </style>
@endpush   

@section('content')

    @include('partials.website.headline', ['headlineLabel' => 'Careers'])

    <div class="container-fluid p-4 p-md-5 come-work-with-us-section" style="background-color: #333">
        <div class="container py-lg-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>COME WORK WITH US</h1>
                    <p class="mb-4">view openings in:</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <a class="btn btn-primary btn-custom" href="" data-location="luzon">
                        LUZON
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <a class="btn btn-primary btn-custom" href="" data-location="visayas">
                        VISAYAS
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <a class="btn btn-primary btn-custom" href="" data-location="mindanao">
                        MINDANAO
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4 py-md-5 why-join-us-section">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="mb-4">Why Join Us?</h3>
                <p>Now a leading purified bottled drinking water and enjoying an increasing market share, PHILIPPINE SPRING WATER RESOURCES, INC (PSWRI) has since addressed the increased product volume requirements by building three other production facilities. Two for Luzon area- one in Guiguinto, Bulacan and other in Calamba, Laguna. And also in Cagayan de Oro City and Davao City for the Mindanao market.</p>
            </div>
        </div>
    </div>

    <div class="container benefits-section">
        <div class="row text-center">
            <div class="col-md-6 col-lg-3 mb-4 mb-md-5">
                <div class="mb-3" style="height: 100px">
                    <img class="h-100" src="{{ asset('images/medical-icon.png') }}" alt="Medical Icon">
                </div>
                <p>MEDICAL</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-md-5">
                <div class="mb-3" style="height: 100px">
                    <img class="h-100" src="{{ asset('images/loans-icon.png') }}" alt="Loans Icon">
                </div>
                <p>LOANS</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-md-5">
                <div class="mb-3" style="height: 100px">
                    <img class="h-100" src="{{ asset('images/allowance-icon.png') }}" alt="Allowance Icon">
                </div>
                <p>ALLOWANCE</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-md-5">
                <div class="mb-3" style="height: 100px">
                    <img class="h-100" src="{{ asset('images/misc-icon.png') }}" alt="Misc Icon">
                </div>
                <p>MISCELLANEOUS</p>
            </div>
        </div>
    </div>

    <!-- Careers Modal -->
    <div class="modal fade" id="careersModal" tabindex="-1" role="dialog" aria-labelledby="careersModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content h-100">
                <div style="padding-top: calc(3rem + 55px) !important;" class="modal-header py-5 position-relative">
                    {{-- <h5 class="modal-title" id="careersModalLabel">Modal title</h5> --}}
                    <button type="button" class="close position-absolute p-0" data-dismiss="modal" aria-label="Close">
                        CLOSE
                    </button>
                    <form id="search-job-form" class="form-inline mx-auto">
                        <label for="" class="mr-2">Search Jobs:</label>
                        <input class="form-control" type="text" placeholder="Enter a province or city...">
                    </form>
                </div>
                <div class="modal-body position-relative p-0">
                    <img class="loader position-absolute" src="{{ asset('images/spinner.gif') }}" alt="">
                    <div class="container-fluid career-wrapper">

                    </div>
                </div>
                <div class="modal-footer py-5"></div>
            </div>
        </div>
    </div>

    @include('partials.website.footer')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var location,
                loader = $('.loader'),
                currentPage = 1,
                typingTimer,
                doneTypingInterval = 300,
                search = $('#search-job-form input');

            // helpers
            function hideLoader() {
                loader.addClass('d-none').removeClass('d-block');
            }

            function showLoader() {
                loader.addClass('d-block').removeClass('d-none');
            }

            function clearModal() {
                $('#careersModal .career-wrapper').html('');
            }

            function resetCurrentPage() {
                currentPage = 1;
            }

            function getJobs(all = false) {
                var url;

                if (all) {
                    url = `/api/v1/jobs?location=${location}`;
                } else {
                    url = `/api/v1/jobs?location=${location}&query=${search.val()}`;
                }

                if (currentPage > 1) {
                    url += `&page=${currentPage}`;
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        // show loader
                        showLoader();
                        
                        if (currentPage === 1) {
                            clearModal();
                            resetCurrentPage();
                        }
                    },
                    success: function(res) {
                        // hide loader
                        hideLoader();

                        if ($('.view-more-button').length) {
                            $('.view-more-button').text('View more...');
                        }

                        var html = '';
                        
                        if (res.data.length) {
                            res.data.forEach(function(career, index) {
                            html += `
                                <div class="row career-info text-center py-5">
                                    <div class="col-lg-4 career-title-wrapper mb-4 mb-lg-0">
                                        <h3>
                                            <a href="/careers/${career.slug}" target="_blank">JOB TITLE</a>
                                        </h3>
                                        <p>${career.title}</p>
                                        <a class="btn btn-primary apply-button" href="">
                                            APPLY
                                        </a>
                                    </div>
                                    <div class="col-lg-4 career-description-wrapper mb-4 mb-lg-0">
                                        <h3>
                                            <a href="/careers/${career.slug}" target="_blank">JOB DESCRIPTION</a>
                                        </h3>
                                        <p>${career.short_description}</p>
                                    </div>
                                    <div class="col-lg-4 career-location-wrapper">
                                        <h3>
                                            <a href="/careers/${career.slug}" target="_blank">JOB LOCATION</a>
                                        </h3>
                                        <p>${career.location}</p>
                                    </div>
                                </div>
                                `;
                            });
                        } else {
                            html += `
                                <p class="text-center mt-5">There are no job postings for this location.</p>
                            `;
                        }

                        if (currentPage === 1 && res.meta.current_page !== res.meta.last_page) {
                            html += `
                                <div class="text-center py-4 view-more-button-wrapper">
                                    <a class="view-more-button" href="#">View more...</a>    
                                </div>
                            `;
                        }

                        if (res.meta.current_page !== res.meta.last_page) { // has more pages to load...
                            currentPage += 1;
                        } else {
                            $('.view-more-button-wrapper').remove();
                        }

                        if (res.links.next === null) { // last page
                            $('.career-wrapper').append(html);
                        } else if (res.meta.current_page > 1) { // has more pages to load...
                            $(html).insertBefore('.view-more-button-wrapper');
                        } else { // first page
                            $('.career-wrapper').html(html);
                        }
                    },
                    error: function(err) {
                        // hide loader
                        hideLoader();
                    }
                });
            }

            // Pagination
            $(document).on('click', '.view-more-button', function(e) {
                e.preventDefault();

                $(this).text('Loading...');

                getJobs();
            });
            
            // Modal
            $('.btn-custom').click(function(e) {
                e.preventDefault();

                var $this = $(this);

                location = $this.data('location');

                loader.addClass('d-block').removeClass('d-none');

                $('#careersModal').modal('show');
            });

            // Search
            search.on('keyup', function(e) {
                clearTimeout(typingTimer);
                
                if (search.val()) {
                    typingTimer = setTimeout(function() {
                        resetCurrentPage();
                        getJobs();
                    }, doneTypingInterval);
                } else {
                    getJobs(true);
                }
            });

            // Clear modal and reset current page after modal is hidden
            $('#careersModal').on('hidden.bs.modal', function() {
                clearModal();
                resetCurrentPage();
                $('#search-job-form label').text('Search Jobs');
                $('#search-job-form input').val('');
            });

            // Fetch data when modal is shown
            $('#careersModal').on('shown.bs.modal', function() {
                getJobs(true);
                $('#search-job-form label').text('Search Jobs in ' + location.substr(0, 1).toUpperCase() + location.substr(1));
            });
        });
    </script>
@endpush