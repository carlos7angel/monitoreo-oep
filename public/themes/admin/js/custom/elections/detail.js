"use strict";

var KTDetailElection = function () {



    var _handleUpdateStatus = function () {

        $(document).on('click', '.kt_change_election_status', function (e) {
            e.preventDefault();

            var newStatus = $(this).data('status');

            var url = $(this).data('url');
            var blockUI = new KTBlockUI(document.querySelector('#kt_content'));

            Swal.fire({
                title: '¿Esta seguro de continuar?',
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Si, continuar",
                cancelButtonText: 'Salir',
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-secondary'
                }
            }).then(function(result){
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'POST',
                        url: url,
                        dataType: 'json',
                        data: {
                            new_status: newStatus
                        },
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        beforeSend: function (response) {
                            blockUI.block();
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    text: "Actualización exitosa.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Aceptar",
                                    allowOutsideClick: false,
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function(result){
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                toastr.error(response.message, "Ocurrio un problema");
                            }
                        },
                        complete: function (response) {
                            blockUI.release();
                            blockUI.destroy();
                        },
                        error: function (response) {
                            toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                        }
                    });

                }
            });

        });

    }


    return {
        init: function () {
            _handleUpdateStatus();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTDetailElection.init();
});
