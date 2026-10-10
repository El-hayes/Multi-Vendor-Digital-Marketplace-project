'use strict';

// Add CSRF token to all AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const notyf = new Notyf();

$(function () {

    $('.delete-item').on('click', function (e) {
        e.preventDefault();

        const url = $(this).attr('href');

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            scrollbarPadding: false,
            heightAuto: false,
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: url,
                    method: 'DELETE',

                    success: function (data) {

                        if (data.status === 'success') {
                            window.location.reload();
                        }

                    },

                    error: function (xhr) {

                        const errorMessage =
                            xhr.responseJSON?.message ||
                            'An unexpected error occurred!';

                        notyf.error(errorMessage);
                    }
                });

            }
        });

    });

});
