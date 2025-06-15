@extends('portal.layout.app')
@section('title', 'Skill List')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="mb-5">
                <h3 class="mb-0">Skill List</h3>
            </div>
        </div>
    </div>
    <div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-md-flex align-items-center border-bottom-0">
                        <div class="ms-auto mt-3 mt-md-0">
                            <a href="javascript:void(0)" class="btn btn-primary add-item">+ Add Skill</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <x-pre-loader />
                            <table id="skillsTable" class="table text-nowrap table-centered mt-0" style="width: 100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="skillModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <form id="skillForm" style="position: relative;">
            <x-pre-loader />
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add/Edit Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="skill_id">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" />
                        <small class="text-danger error-name"></small>
                    </div>
                    <div class="mb-3">
                        <label>Level</label>
                        <input type="number" name="level" class="form-control" />
                        <small class="text-danger error-level"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <form id="deleteItemForm" method="POST" style="position: relative;">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="model-title">Delete Confirmation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div id="model-content">Are you sure you want to delete this item?</div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- popper js -->
<script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>

<script>
    $('document').ready(function() {
        var table = $('#skillsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('skills.index') }}",
                beforeSend: function() {
                    $('.pre-loader').show();
                },
                complete: function() {
                    $('.pre-loader').fadeOut();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'level',
                    name: 'level'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Show Modal - Add
        $(document).on('click', '.add-item', function() {
            $('#skillForm')[0].reset();
            $('#skillForm').find('small.text-danger').text('');
            $('#skill_id').val('');
            $('#skillModal').modal('show');
        });

        // Show Modal - Edit
        $(document).on('click', '.edit-item', function() {
            let id = $(this).data('id');
            console.log("Edit ID =>", id);

            $('#skillModal').modal('show');
            $('#skillForm')[0].reset(); // Clear previous data
            $('#skillForm').find('small.text-danger').text('');
            const url = "{{ route('skills.edit', ':id') }}".replace(':id', id);
            $.ajax({
                type: 'GET',
                url: url,
                beforeSend: function() {
                    $('.pre-loader').show();
                },
                complete: function() {
                    $('.pre-loader').fadeOut();
                },
                success: function(res) {
                    if (res.status) {
                        $('#skill_id').val(res.data.id);
                        $('input[name="name"]').val(res.data.name);
                        $('input[name="level"]').val(res.data.level);
                        showSuccess(res.message);
                    } else {
                        showError("Failed to load skill data.");
                    }
                },
                error: function(err) {
                    console.error(err);
                    showError("Something went wrong while fetching data.");
                }
            });
        });


        // Submit Form
        $('#skillForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            var itemId = $('#skill_id').val();
            let update = "{{ route('skills.update', ':id') }}".replace(':id', itemId);
            var create = "{{ route('skills.store') }}";
            if (itemId) {
                formData.append('_method', 'PUT'); // 🔥 Required for update
            }

            $.ajax({
                type: 'POST',
                url: itemId ? update : create,
                data: formData,
                processData: false,
                contentType: false,

                beforeSend: function() {
                    $('#skillForm').find('small.text-danger').text('');
                    $('.pre-loader').show();
                    $('#skillForm').find('small.text-danger').text('');
                },
                complete: function() {
                    $('.pre-loader').fadeOut();
                },
                success: function(res) {
                    $('#skillModal').modal('hide');
                    $('#skillForm')[0].reset();
                    if (res.status) {
                        showSuccess(res.message);
                        table.ajax.reload();
                    }
                },
                error: function(err) {
                    if (err.status === 422) {
                        let errors = err.responseJSON.errors;
                        let message = err.responseJSON.message;
                        showError(message)
                        $.each(errors, function(key, value) {
                            $('.error-' + key).text(value[0]);
                        });
                    } else {
                        showError('Something went wrong!')
                    }
                }
            });
        });

        // Delete
        $(document).on('click', '.deleteBtn', function() {
            if (!confirm('Are you sure to delete?')) return;
            let id = $(this).data('id');
            $.ajax({
                url: "{{ url('skills') }}/" + id,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    table.ajax.reload();
                    alert(res.success);
                }
            });
        });

        $(document).on('change', '.toggle-status', function() {
            let checkbox = $(this);
            let id = checkbox.data('id');
            let url = checkbox.data('action');
            let status = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
                },
                success: function(res) {
                    if (res.status) {
                        toastr.success(res.message || 'Status updated successfully.');
                    } else {
                        toastr.error(res.message || 'Failed to update status.');
                    }
                },
                error: function(err) {
                    toastr.error('Something went wrong.');
                }
            });
        });

    });
</script>
@endsection