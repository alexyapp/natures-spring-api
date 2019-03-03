@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .trumbowyg-box.is-invalid {
            border: 1px solid #e3342f;
        }

        .form-control[readonly] {
            background-color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('events.index') }}">All Events</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Event</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    Edit Event
                </div>
                <div class="card-body p-3">
                    <form id="event-form">
                        <img style="width: 30px; height: auto;" id="loader" class="d-none mx-auto" src="{{ asset('images/spinner.gif') }}" alt="">
        
                        <div class="cover-image-wrapper {{ is_null($event->cover_image) ? 'd-none' : '' }}">
                            <img style="width: 100%; height: auto;" src="{{ is_null($event->cover_image) ? '' : asset('uploads') . '/' . $event->cover_image }}" alt="Cover Image">
                        </div>
        
                        <div class="form-group">
                            <label for="cover_image">Upload a cover image</label>
                            <input type="file" class="form-control-file" id="cover_image" name="cover_image">
                        </div>
        
                        <div class="form-group">
                            <label for="name">Event Name</label>
                            <input style="text-transform: capitalize;" id="name" class="form-control" type="text" name="name" value={{ $event->name }} required>
                            <div class="invalid-feedback"></div>
                        </div>
        
                        <div class="form-group">
                            <label for="info">Event Info</label>
                            <textarea id="info" class="form-control" name="info" required></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
        
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input id="start_date" class="form-control" type="text" name="start_date" value="{{ $event->start_date }}" required>
                            <div class="invalid-feedback"></div>
                        </div>
        
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input id="end_date" class="form-control" type="text" name="end_date" value="{{ $event->end_date }}" required>
                            <div class="invalid-feedback"></div>
                        </div>
        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                {{-- <div class="card-footer">

                </div> --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Image Upload
            var filename;

            $('#cover_image').change(function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                var loader = $('#loader');

                // show loader
                loader.removeClass('d-none').addClass('d-block');

                reader.onloadend = function() {
                    var formData = new FormData();

                    formData.append('file', file);

                    $.ajax({
                        processData: false,
                        contentType: false,
                        url: '/api/v1/images',
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(res) {
                            // hide loader
                            loader.addClass('d-none').removeClass('d-block');

                            if (res.filepath) {
                                $('#cover-image-wrapper').removeClass('d-none');
                                $('#cover-image').attr('src', res.filepath);
                                filename = res.filename;
                            }
                        },
                        error: function(err) {
                            // hide loader
                            loader.addClass('d-none').removeClass('d-block');
                        }
                    })
                }

                reader.readAsDataURL(file);
            });

            // Trumbowyg
            var eventInfo = {!! json_encode($event->info, JSON_HEX_TAG) !!};

            $('textarea').trumbowyg();

            if (eventInfo) {
                $('textarea').trumbowyg('html', eventInfo);
            }

            // Flatpickr
            $('input#start_date').flatpickr({
                altInput: true,
                altFormat: 'F j, Y h:i K',
                altInputClass: 'start_date',
                enableTime: true,
                dateFormat: 'Y-m-d H:i:S'
            });

            $('input#end_date').flatpickr({
                altInput: true,
                altFormat: 'F j, Y h:i K',
                altInputClass: 'end_date',
                enableTime: true,
                dateFormat: 'Y-m-d H:i:S'
            });

            // Event Form
            var eventSlug = {!! json_encode($event->slug, JSON_HEX_TAG) !!};

            $('#event-form').submit(function(e) {
                e.preventDefault();

                var $this = $(this),
                    submitButton = $this.find('button[type=submit]'),
                    data = $this.serialize();

                if (filename) {
                    data += '&cover_image=' + filename;
                }

                $.ajax({
                    url: `/api/v1/events/${eventSlug}`,
                    type: 'PATCH',
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        submitButton.attr('disabled', true).text('Please Wait...');
                    },
                    success: function(res) {
                        submitButton.attr('disabled', false).text('Submit');

                        if (res.data) {
                            window.location = '/admin/events?success=true&action=update';
                        }
                    },
                    error: function(err) {
                        submitButton.attr('disabled', false).text('Submit');
                        
                        if (err.status === 422) {
                            var errors = err.responseJSON.errors;

                            for (var k in errors) {
                                if (k === 'info') {
                                    $(`.trumbowyg-box`).addClass('is-invalid').parent().find('.invalid-feedback').text(errors[k]).css({ display: 'block' });
                                } else {
                                    $(`${k === 'start_date' || k === 'end_date' ? '.' : '#'}${k}`).addClass('is-invalid').parent().find('.invalid-feedback').text(errors[k]);
                                }
                            }
                        }

                        // Unauthorized
                        if (err.status === 401) {
                            alert(err.responseJSON.message);
                        }
                    }
                });
            });
        });
    </script>
@endpush