@extends('layouts.app')

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
    </style>
@endpush   

@section('content')

    @include('partials.website.headline', ['headlineLabel' => 'Careers'])

    <div class="container-fluid p-4 p-md-5 come-work-with-us-section" style="background-color: #333">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Come Work With Us</h1>
                    <p class="mb-0">view openings in:</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <a class="btn btn-primary btn-custom" href="" data-location="luzon">
                        Luzon
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <a class="btn btn-primary btn-custom" href="" data-location="visayas">
                        Visayas
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <a class="btn btn-primary btn-custom" href="" data-location="mindanao">
                        Mindanao
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4 py-md-5 why-join-us-section">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="mb-md-4">Why Join Us?</h3>
                <p>Now a leading purified bottled drinking water and enjoying an increasing market share, PHILIPPINE SPRING WATER RESOURCES, INC (PSWRI) has since addressed the increased product volume requirements by building three other production facilities. Two for Luzon area- one in Guiguinto, Bulacan and other in Calamba, Laguna. And also in Cagayan de Oro City and Davao City for the Mindanao market.</p>
            </div>
        </div>
    </div>

    <div class="container benefits-section">
        <div class="row text-center">
            <div class="col-md-3">
                <img src="" alt="">
                <p>Medical</p>
            </div>
            <div class="col-md-3">
                <img src="" alt="">
                <p>Loans</p>
            </div>
            <div class="col-md-3">
                <img src="" alt="">
                <p>Allowance</p>
            </div>
            <div class="col-md-3">
                <img src="" alt="">
                <p>Miscellaneous</p>
            </div>
        </div>
    </div>

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
                        {{-- <div class="row career-info text-center">
                            <div class="col-md-4 career-title-wrapper">
                                <h3>JOB TITLE</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at luctus quam.</p>
                                <a class="btn btn-primary apply-button" href="">
                                    APPLY
                                </a>
                            </div>
                            <div class="col-md-4 career-description-wrapper">
                                <h3>JOB RESPONSIBILITIES</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at luctus leo. Maecenas efficitur, elit eget tempus vehicula, risus quam mollis turpis, vel egestas massa nibh vehicula nunc. Phasellus ac augue vehicula, rutrum risus ut, aliquam quam. </p>
                            </div>
                            <div class="col-md-4 career-location-wrapper">
                                <h3>JOB LOCATION</h3>
                                <p>Cebu City, Cebu</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer py-5"></div>
            </div>
        </div>
    </div>
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
                                    <div class="col-md-4 career-title-wrapper mb-4 mb-md-0">
                                        <h3>
                                            <a href="/careers/${career.slug}" target="_blank">JOB TITLE</a>
                                        </h3>
                                        <p>${career.title}</p>
                                        <a class="btn btn-primary apply-button" href="">
                                            APPLY
                                        </a>
                                    </div>
                                    <div class="col-md-4 career-description-wrapper mb-4 mb-md-0">
                                        <h3>
                                            <a href="/careers/${career.slug}" target="_blank">JOB DESCRIPTION</a>
                                        </h3>
                                        <p>${career.short_description}</p>
                                    </div>
                                    <div class="col-md-4 career-location-wrapper">
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
            });

            // Fetch data when modal is shown
            $('#careersModal').on('shown.bs.modal', function() {
                getJobs(true);
                $('#search-job-form label').text('Search Jobs in ' + location.substr(0, 1).toUpperCase() + location.substr(1));
            });
        });
    </script>
@endpush