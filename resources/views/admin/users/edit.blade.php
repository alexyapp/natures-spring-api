@extends('layouts.admin')

@push('styles')
    
@endpush

@section('content')
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">All Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    Edit User
                </div>
                <div class="card-body p-3">
                    <form id="user-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input style="text-transform: capitalize;" id="name" class="form-control" type="text" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label for="">Roles</label>
                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" id="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $role->name }}">
                                      {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#user-form').submit(function(e) {
                e.preventDefault();

                var $this = $(this),
                    data = $this.serialize(),
                    submitButton = $this.find('button[type=submit]');

                $.ajaxSetup({
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: `/api/v1/users/${{!! json_encode($user->id, JSON_HEX_TAG) !!}}`,
                    type: 'PATCH',
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        submitButton.attr('disabled', true).text('Please Wait...');
                    },
                    success: function(res) {
                        submitButton.attr('disabled', false).text('Submit');

                        if (res.data) {
                            window.location = '/admin/users?success=true&action=update';
                        }
                    },
                    error: function(err) {
                        submitButton.attr('disabled', false).text('Submit');
                        
                        // Unauthorized
                        if (err.status === 401) {
                            alert(err.responseJSON.message);
                        }
                    }
                })
            });
        });
    </script>
@endpush