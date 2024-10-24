"use strict";

var KTFormFiles = function () {

    var _deleteMaterial = function () {

        $(document).on('click', '.kt_btn_material_delete', function (e) {
            e.preventDefault();
            var url = $(this).data('url');

            Swal.fire({
                text: "¿Esta seguro de eliminar el registro?",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Si, eliminar",
                allowOutsideClick: false,
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-secondary"
                }
            }).then(function(result){

                if (result.isConfirmed) {

                    var blockUI = new KTBlockUI(document.querySelector('#kt_app_content'));
                    $.ajax({
                        type: 'POST',
                        url: url,
                        contentType: false,
                        processData: false,
                        data: {},
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        beforeSend: function (response) {
                            blockUI.block();
                        },
                        success: function (response) {
                            if (response.success) {
                                toastr.success(response.message, "El registro se eliminó satisfactoriamente");
                                setTimeout(function(){
                                    window.location.reload();
                                }, 350);
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

    };

    return {
        init: function () {

            _deleteMaterial();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormFiles.init();
});
