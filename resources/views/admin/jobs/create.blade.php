@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">All Jobs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Job</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    Create Job
                </div>
                <div class="card-body p-3">
                    <form id="job-form">
                        <div class="form-group">
                            <label for="title">Job Title</label>
                            <input style="text-transform: capitalize;" id="title" class="form-control" type="text" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Job Description</label>
                            <textarea id="description" class="form-control" name="description" value={{ old('description') }} required></textarea>
                        </div>
                        <h3>Job Location</h3>
                        <div id="island-group-wrapper" class="form-group">
                            <label for="island-group">Island Group</label>
                            <select class="form-control" name="island_group_id" id="island-group" required>
                                <option value="" disabled selected></option>
                                @foreach ($islandGroups as $islandGroup)
                                    <option data-slug="{{ $islandGroup->slug }}" value="{{ $islandGroup->id }}">{{ $islandGroup->name }}</option>
                                @endforeach
                            </select>
                            <img style="width: 30px; height: auto;" class="d-none mx-auto mt-3" src="{{ asset('images/spinner.gif') }}" alt="">
                        </div>
                        <div id="province-wrapper" class="form-group d-none"></div>
                        <div id="city-wrapper" class="form-group d-none"></div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('textarea').trumbowyg();

            $('body').on('change', 'select[name=island_group_id], select[name=province_id]', function() {
                var $this = $(this),
                    spinner = $this.parent().find('img'),
                    url;

                switch ($this.attr('id')) {
                    case 'island-group':
                        url = '/api/v1/locations/' + $this.children(':selected').data('slug');
                        break;
                    case 'province':
                        url = '/api/v1/locations/' + $('#island-group').children(':selected').data('slug') + '/' + $this.children(':selected').data('slug');
                        break;
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        switch ($this.attr('id')) {
                            case 'island-group':
                                $('#province-wrapper').addClass('d-none');
                                $('#city-wrapper').addClass('d-none');
                                break;
                            case 'province':
                                $('#city-wrapper').addClass('d-none');
                                break;
                        }
                       spinner.removeClass('d-none').addClass('d-block');
                    },
                    success: function(res) {
                        switch ($this.attr('id')) {
                            case 'island-group':
                                var provinceOptions;

                                res.data.provinces.forEach(function(province) {
                                    provinceOptions += `
                                        <option data-slug="${province.slug}" value="${province.id}">${province.name}</option>
                                    `;
                                });

                                $('#province-wrapper').html(`
                                    <label for="province">Province</label>
                                    <select class="form-control" name="province_id" id="province" required>
                                        <option disabled selected></option>
                                        ${provinceOptions}    
                                    </select>
                                    <img style="width: 30px; height: auto;" class="d-none mx-auto mt-3" src="{{ asset('images/spinner.gif') }}" alt="">
                                `).removeClass('d-none');
                                break;
                            case 'province':
                                var cityOptions;

                                res.data.cities.forEach(function(city) {
                                    cityOptions += `
                                        <option data-slug="${city.slug}" value="${city.id}">${city.name}</option>
                                    `;
                                });

                                $('#city-wrapper').html(`
                                    <label for="city">City</label>
                                    <select class="form-control" name="city_id" id="city" required>
                                        <option disabled selected></option>
                                        ${cityOptions}    
                                    </select>
                                    <img style="width: 30px; height: auto;" class="d-none mx-auto mt-3" src="{{ asset('images/spinner.gif') }}" alt="">
                                `).removeClass('d-none');
                                break;
                        }

                        spinner.addClass('d-none').removeClass('d-block');
                    },
                    error: function(err) {
                        // display error message
                        
                    }
                });
            });

            $('#job-form').submit(function(e) {
                e.preventDefault();

                var $this = $(this),
                    submitButton = $this.find('button[type=submit]'),
                    data = $this.serialize();

                $.ajaxSetup({
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/api/v1/jobs',
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        submitButton.attr('disabled', true).text('Please Wait...');
                    },
                    success: function(res) {
                        submitButton.attr('disabled', false).text('Submit');
                        
                        if (res.data) {
                            window.location = '/admin/jobs?success=true&action=create';
                        }
                    },
                    error: function(err) {
                        submitButton.attr('disabled', false).text('Submit');
                        
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
