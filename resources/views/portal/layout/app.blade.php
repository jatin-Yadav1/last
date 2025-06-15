<!DOCTYPE html>
<html lang="en">

<head>
    @include('portal.layout.partials.head')
</head>

<body>
    <main id="main-wrapper" class="main-wrapper">

        @include('portal.layout.partials.header')
        @include('portal.layout.partials.sidebar')
        <div id="app-content">
            <div class="app-content-area">
                @yield('content')
            </div>
        </div>
    </main>

    <!-- Libs JS -->

    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/feather-icons/dist/feather.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>

    <!-- jsvectormap -->
    <script src="../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="../assets/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/js/vendors/chart.js"></script>

    <script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="../assets/js/vendors/tooltip.js"></script>

    <script src="../assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/js/vendors/datatable.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        function showSuccess(message, title = 'Success') {
            toastr.success(message, {
                closeButton: true,
                progressBar: true,
                timeOut: 5000,
            });
        }

        function showError(message, title = 'Error') {
            toastr.error(message, {
                closeButton: true,
                progressBar: true,
                timeOut: 5000,
            });
        }

        function showWarning(message, title = 'Warning') {
            toastr.warning(message, title, {
                closeButton: true,
                progressBar: true,
                timeOut: 5000,
            });
        }

        function showInfo(message, title = 'Info') {
            toastr.info(message, title, {
                closeButton: true,
                progressBar: true,
                timeOut: 5000,
            });
        }
        let currentTableId = null;
        $(document).on('click', '.delete-item', function() {
            console.log("delete-item clicked");
            currentTableId = $(this).data('table-id');

            const modal = $('#deleteItemModal');
            const content = $(this).data('content') || 'Are you sure you want to delete this item?';
            const title = $(this).data('title') || 'Delete Confirmation';
            const action = $(this).data('action');

            $('#model-content').html(content);
            $('#model-title').html(title);
            $('#deleteItemForm').attr('action', action);

            modal.modal('show');
        });
        $(document).on('submit', '#deleteItemForm', function(e) {
            e.preventDefault();

            const form = $(this);
            const actionUrl = form.attr('action');
            const token = $('input[name="_token"]').val();

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: token
                },
                beforeSend: function() {
                    $('.btn-danger').prop('disabled', true).text('Deleting...');
                },
                success: function(res) {
                    $('#deleteItemModal').modal('hide');
                    showSuccess(res.message || 'Deleted successfully.');
                    $('.btn-danger').prop('disabled', false).text('Yes, Delete');
                    console.log("table==>", currentTableId);

                    if (currentTableId && $.fn.DataTable.isDataTable('#' + currentTableId)) {
                        $('#' + currentTableId).DataTable().ajax.reload(null, false); // 👈 stay on same page
                    }
                    // if (currentTableId && $.fn.DataTable.isDataTable('#' + currentTableId)) {
                    //     let table = $('#' + currentTableId).DataTable();

                    //     let currentPage = table.page(); // Get current page index

                    //     table.ajax.reload(function() {
                    //         let info = table.page.info();

                    //         if (info.recordsDisplay === 0 && currentPage !== 0) {
                    //             table.page(currentPage - 1).draw('page');
                    //         } else {
                    //             table.page(currentPage).draw('page');
                    //         }
                    //     }, false); // false = keep current paging
                    // }

                },
                error: function(err) {
                    var message = err.responseJSON.message;
                    $('#deleteItemModal').modal('hide');
                    showError(message || 'Something went wrong!');
                    $('.btn-danger').prop('disabled', false).text('Yes, Delete');
                }
            });
        });
    </script>
</body>

</html>