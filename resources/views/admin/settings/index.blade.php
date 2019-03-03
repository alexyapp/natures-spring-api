@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            Profile Settings
        </div>
        <div class="card-body p-3">
            <form id="profile-settings-form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ auth()->user()->email }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="card-footer small text-muted">
            Updated {{ auth()->user()->updated_at->format('F d, Y H:i A') }}
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Security Settings
        </div>
        <div class="card-body p-3">
            <form id="security-settings-form">
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input id="old_password" class="form-control" type="password" name="old_password">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input id="new_password" class="form-control" type="password" name="new_password">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input id="new_password_confirmation" class="form-control" type="password" name="new_password_confirmation">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="card-footer small text-muted">
            Updated {{ auth()->user()->updated_at->format('F d, Y g:i A') }}
        </div>
    </div>

    <div class="modal fade" id="reEnterPasswordModal" tabindex="-1" role="dialog" aria-labelledby="reEnterPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reEnterPasswordModalLabel">Please Re-enter Your Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="re-enter-password-form">
                        <label for="re-enter-password-field">For your security, you must re-enter your password to continue.</label>
                        <input id="re-enter-password-field" class="form-control" type="password">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary re-enter-password-confirm-button">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Snackbar
            if (
                 {!! json_encode(filter_var(app('request')->input('success')), JSON_HEX_TAG) !!}
            ) {
                var action = {!! json_encode(app('request')->input('action'), JSON_HEX_TAG) !!};
                var target = {!! json_encode(app('request')->input('target'), JSON_HEX_TAG) !!};

                Snackbar.show({
                    pos: 'top-right',
                    text: `${target} ${action}d successfully.`,
                    showAction: false
                });
            }

            $.ajaxSetup({
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var name, email;

            $('#profile-settings-form').submit(function(e) {
                e.preventDefault();
                
                var $this = $(this);

                name = $this.find('input[name=name]').val();
                email = $this.find('input[name=email]').val();

                // show modal
                $('#reEnterPasswordModal').modal('show');
            });

            $('#reEnterPasswordModal').on('shown.bs.modal', function () {
                $('#re-enter-password-field').focus();
            });

            $('#re-enter-password-field').keydown(function(e) {
                if (e.keyCode === 13) { // enter key
                    e.preventDefault();
                    $('.re-enter-password-confirm-button').click();
                }
            });

            $('.re-enter-password-confirm-button').click(function(e) {
                e.preventDefault();

                var $this = $(this),
                    profileSettingsForm = $('#profile-settings-form');

                $.ajax({
                    url: '/api/v1/account/verify',
                    type: 'POST',
                    data: {
                        password: $('#re-enter-password-field').val()
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $this.attr('disabled', true).text('Please Wait...');
                    },
                    success: function(res) {
                        $this.attr('disabled', false).text('Submit');

                        if (res.success) {
                            // hide modal
                            $('#reEnterPasswordModal').modal('hide');

                            $.ajax({
                                url: '/api/v1/account/profile',
                                type: 'PATCH',
                                data: {
                                    name: name,
                                    email: email
                                },
                                dataType: 'json',
                                beforeSend: function() {
                                    profileSettingsForm.find('button[type=submit]').attr('disabled', true).text('Please Wait...');
                                },
                                success: function(res) {
                                    if (res.data) {
                                        window.location = '/admin/settings?success=true&action=update&target=profile'
                                    }
                                },
                                error: function(err) {
                                    if (err.status === 422) {
                                        var errors = err.responseJSON.errors;

                                        for (var k in errors) {
                                            $(`#${k}`).addClass('is-invalid').parent().find('.invalid-feedback').text(errors[k]);
                                        }
                                    }
                                }
                            });
                        }
                    },
                    error: function(err) {
                        $this.attr('disabled', false).text('Submit');

                        if (err.status === 401) {
                            alert(err.responseJSON.message);
                        }
                    }
                });
            });

            $('#security-settings-form').submit(function(e) {
                e.preventDefault();

                var $this = $(this),
                    data = $this.serialize();

                $.ajax({
                    url: '/api/v1/account/password',
                    type: 'PATCH',
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        $this.find('button[type=submit]').attr('disabled', true).text('Please Wait...');
                    },
                    success: function(res) {
                        $this.find('button[type=submit]').attr('disabled', false).text('Submit');

                        if (res.data) {
                            window.location = '/admin/settings?success=true&action=update&target=password';
                        }
                    },
                    error: function(err) {
                        $this.find('button[type=submit]').attr('disabled', false).text('Submit');

                        if (err.status === 422) {
                            var errors = err.responseJSON.errors;

                            for (var k in errors) {
                                $(`#${k}`).addClass('is-invalid').parent().find('.invalid-feedback').text(errors[k]);
                            }
                        }

                        if (err.status === 403) {
                            alert(err.responseJSON.message);
                        }
                    }
                })
            });
        });
    </script>
@endpush