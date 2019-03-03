@extends('layouts.admin')

@section('content')
    <div class="row justify-content-end mb-3">
        <div class="col-12 col-md-4 text-right">
            <a class="btn btn-primary" href="{{ route('jobs.create') }}">
                <i class="fas fa-fw fa-plus"></i>
                Create Job
            </a>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
          Manage Jobs
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="jobs-table" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated {{ $lastUpdated }}</div>

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
                        Are you sure you want to delete this job?
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
                    text: `Job ${action}d successfully.`,
                    showAction: false
                });
            }

            $('#jobs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('jobs.datatable') }}',
                columns: [
                    {
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'location'
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
                        targets: 7,
                        data: null,
                        render: function(data, type, row) {
                            
                            return `
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="${window.location.pathname}/${data.slug}/edit">Edit</a>
                                        <a class="dropdown-item delete-button" href="#" data-job="${data.slug}">Delete</a>
                                    </div>
                                </div>
                            `;
                        }
                    }
                ]
            });

            // Delete Job
            var jobSlug = '';

            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                var slug = $(this).data('job');
                jobSlug = slug;
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
                    url: `/api/v1/jobs/${jobSlug}`,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(res) {
                        if (res.data) {
                            window.location = '/admin/jobs?success=true&action=delete';
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
