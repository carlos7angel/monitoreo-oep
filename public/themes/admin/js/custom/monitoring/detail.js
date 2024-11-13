"use strict";

var KTMonitoringReportList = function () {

    var blockUI;

    var formToAnalysis;
    var validatorFormToAnalysis;
    var modalToAnalysis;
    var modalToAnalysisEl;
    var submitButtonToAnalysis;
    var cancelButtonToAnalysis;

    var _handleMonitoringModalToAnalysis = function () {
        $(document).on('click', '.kt_submit_monitoring_to_report', function (e) {
            e.preventDefault();
            // formToAnalysis.reset();
            // if (validatorFormToAnalysis) { validatorFormToAnalysis.resetForm(true); }
            modalToAnalysis.show();
        });
    }

    var _initMonitoringFormToAnalysis = function () {
        validatorFormToAnalysis = FormValidation.formValidation(
            formToAnalysis,
            {
                fields: {
                    'monitoring_scope': {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
    }

    var _handleMonitoringFormToAnalysis = function () {
        submitButtonToAnalysis.addEventListener('click', function (e) {

            e.preventDefault();
            if (validatorFormToAnalysis) {
                validatorFormToAnalysis.validate().then(function (status) {
                    if (status === 'Valid') {
                        submitButtonToAnalysis.setAttribute('data-kt-indicator', 'on');
                        submitButtonToAnalysis.disabled = true;
                        var formData = new FormData($(formToAnalysis)[0]);
                        blockUI = new KTBlockUI(document.querySelector('#kt_block_target_to_analysis'));
                        $.ajax({
                            type: 'POST',
                            url: formToAnalysis.action,
                            contentType: false,
                            processData: false,
                            data: formData,
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            beforeSend: function (response) {
                                blockUI.block();
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Registro actualizado satisfactoriamente',
                                        text: "En informe de análisis ha sido enviado.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false,
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result){
                                        if (result.isConfirmed) {
                                            modalToAnalysis.hide();
                                            setTimeout(function(){
                                                window.location = response.redirect;
                                            }, 350);
                                        }
                                    });
                                } else {
                                    toastr.error(response.message, "Ocurrio un problema");
                                }
                            },
                            complete: function (response) {
                                submitButtonToAnalysis.removeAttribute('data-kt-indicator');
                                submitButtonToAnalysis.disabled = false;
                                blockUI.release();
                                blockUI.destroy();
                            },
                            error: function (response) {
                                toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                            }
                        });
                    } else {
                        toastr.warning("Complete el formulario", "Advertencia");
                    }
                });
            }
        });

        cancelButtonToAnalysis.addEventListener('click', function (e) {
            e.preventDefault();
            modalToAnalysis.hide();
        });
    }

    var _handleSubmitMonitoring = function () {

        $(document).on('click', '.kt_submit_monitoring_to_report', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            blockUI = new KTBlockUI(document.querySelector('#kt_content'));
            Swal.fire({
                title: 'Enviar a comisión',
                text: "Se creará un reporte de monitoreo y se enviará a la Comisión de Análisis. ¿Esta seguro de continuar?",
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Si, enviar",
                cancelButtonText: 'Cancelar',
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
                        data: {},
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        beforeSend: function (response) {
                            blockUI.block();
                        },
                        success: function (response) {
                            if (! response.success) {
                                toastr.warning('Hubo un problema al procesar la solicitud.');
                                return;
                            }
                            toastr.success("Reporte enviado satisfactoriamente");
                            setTimeout(function(){
                                window.location = response.redirect;
                            }, 350);
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
            // _handleSubmitMonitoring();

            modalToAnalysisEl = document.querySelector('#kt_modal_monitoring_submit_to_analysis');
            if (modalToAnalysisEl) { modalToAnalysis = new bootstrap.Modal(modalToAnalysisEl); }
            formToAnalysis = document.querySelector('#kt_form_monitoring_submit_to_analysis');
            submitButtonToAnalysis = document.getElementById('kt_button_monitoring_to_analysis_submit');
            cancelButtonToAnalysis = document.getElementById('kt_button_monitoring_to_analysis_cancel');
            _handleMonitoringModalToAnalysis();
            _initMonitoringFormToAnalysis();
            _handleMonitoringFormToAnalysis();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTMonitoringReportList.init();
});
