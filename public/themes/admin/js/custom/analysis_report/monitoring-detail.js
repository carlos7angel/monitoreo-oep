"use strict";

var KTAnalysisReport = function () {

    var _handleCreateAnalysis = function () {

        var blockUI = new KTBlockUI(document.querySelector('body'));

        $(document).on('click', '.kt_btn_analysis_report_create', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            Swal.fire({
                title: 'Informe de Análisis',
                text: "Se creará un informe de análisis. ¿Esta seguro de continuar?",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Si, continuar",
                allowOutsideClick: false,
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-secondary"
                }
            }).then(function(result){
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: url,
                        dataType: 'json',
                        data: {},
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        beforeSend: function (response) {
                            blockUI.block();
                        },
                        success: function (response) {
                            if (response.success) {
                                toastr.success("Registro creado satisfactoriamente");
                                setTimeout(function (){
                                    window.location = response.redirect;
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
    }

    return {
        init: function () {

            _handleCreateAnalysis();

        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTAnalysisReport.init();
});
