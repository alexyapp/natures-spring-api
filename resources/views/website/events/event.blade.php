@extends('layouts.app')

@section('title')
    Events - {{ $event->name }}
@endsection

@push('styles')
    <style>
        .video-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            padding-top: 25px;
            height: 0;
        }
    </style>
@endpush

@section('content')
    @include('partials.website.headline', ['headlineLabel' => 'Events'])

    <div class="container">
        <div class="row">
            <div class="col">

                <h3 class="mb-2">{{ $event->name }}</h3>
                <p class="mb-0">From: {{ $event->start_date->format('F d, Y g:i A') }}</p>
                <p>To: {{ $event->end_date->format('F d, Y g:i A') }}</p>

                <!-- Cover Image -->
                @if (!is_null($event->cover_image))
                   <div class="mb-3 cover-image-wrapper">
                        <img class="w-100 cover-image" src="{{ asset('uploads') . '/' . $event->cover_image }}" alt="Cover Image"> 
                   </div>
                @endif

                {!! $event->info !!}
            </div>
        </div>
    </div>

    @include('partials.website.footer')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('iframe').addClass('video-wrapper').parent().addClass('video-container');
        });
    </script>
@endpush