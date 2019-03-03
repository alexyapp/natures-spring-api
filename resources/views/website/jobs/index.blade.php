@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-md-center mb-3">
            <div class="col-md-12">
                <form class="form-inline" action="">
                    <div class="form-group">
                        <input id="search" class="form-control" type="text" name="search" placeholder="Search...">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Job Title</th>
                            <th scope="col">Location</th>
                            <th scope="col">Schedule</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr onclick="window.location.assign('{{ '/jobs/' . $job->slug }}')">
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->location }}</td>
                                <td>Full-time</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $jobs->links() }}
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

@endsection