@extends('layouts.app')

@section('title')
    Careers - {{ $career->title }}
@endsection

@push('styles')
    
@endpush

@section('content')
    @include('partials.website.headline', ['headlineLabel' => 'Careers'])

    <div class="container">
        <div class="row">
            <div class="col">

                <h3 class="mb-2">{{ $career->title }}</h3>
                <p class="mb-4">{{ $career->location }}</p>
                <p class="mb-4">{!! $career->description !!}</p>

                <a class="btn btn-primary" href="">Apply Now</a>
            </div>
        </div>
    </div>

    @include('partials.website.footer')
@endsection

@push('scripts')
    
@endpush