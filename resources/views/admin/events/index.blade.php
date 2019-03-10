@extends('layouts.admin')

@section('content')
    <div class="row justify-content-end mb-3">
        <div class="col-12 col-md-4 text-right">
            <a class="btn btn-primary" href="{{ route('events.create') }}">
                <i class="fas fa-fw fa-plus"></i>
                Create Event
            </a>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
          Manage Events
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="events-table" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Event Info</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Event Info</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        
        @if (!empty($latestUpdatedEvent))
            <div class="card-footer small text-muted">Updated {{ $latestUpdatedEvent->updated_at->format('F d, Y g:i A') }}</div>
        @endif

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Delete Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this event?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger delete-confirm-button">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // Snackbar
            if (
                {!! json_encode(filter_var(app('request')->input('success'), FILTER_VALIDATE_BOOLEAN)) !!}
            ) {
                var action = {!! json_encode(app('request')->input('action'), JSON_HEX_TAG) !!};

                Snackbar.show({
                    pos: 'top-right',
                    text: `Event ${action}d successfully.`,
                    showAction: false
                });
            }

            $('#events-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('events.datatable') }}',
                columns: [
                    {
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'info'
                    },
                    {
                        data: 'start_date'
                    },
                    {
                        data: 'end_date'
                    },
                    {
                        data: 'user_id'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'updated_at'
                    }
                ],
                columnDefs: [
                    {
                        targets: 8,
                        data: null,
                        render: function(data, type, row) {
                            
                            return `
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="${window.location.pathname}/${data.slug}/edit">Edit</a>
                                        <a class="dropdown-item delete-button" href="#" data-event="${data.slug}">Delete</a>
                                    </div>
                                </div>
                            `;
                        }
                    }
                ]
            });


            // Delete Event
            var eventSlug = '';

            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                var slug = $(this).data('event');
                eventSlug = slug;
                $('#confirmModal').modal('show');
            });

            $('.delete-confirm-button').click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: `/api/v1/events/${eventSlug}`,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(res) {
                        if (res.data) {
                            window.location = '/admin/events?success=true&action=delete';
                        }
                    },
                    error: function(err) {
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
