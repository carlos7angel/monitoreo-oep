"use strict";

var KTMonitoringReportList = function () {

    var submitButton;
    var cancelButton;
    var blockUI;
    var form;

    var modalDetailsEl;
    var modalDetails;
    var modalDetailsContent;

    var modalListEl;
    var modalList;
    var modalListContent;

    var submitButtonStatus;
    var cancelButtonStatus;
    var validator;
    var formStatus;

    var modalEl;
    var modal;
    var modalContent;

    var _initFileUploader = function () {

        var inputFile = $('.kt_analysis_report_files');
        if (!inputFile.length) {
            return;
        }
        inputFile.fileuploader({
            limit: inputFile.data("maxfiles"),
            fileMaxSize: inputFile.data("maxsize"),
            addMore: true,
            //extensions: ['jpg', pdf', 'text/plain', 'audio/*'],
            changeInput: '<div class="fileuploader-input">' +
                '<div class="fileuploader-input-inner">' +
                '<div>${captions.feedback} ${captions.or} <span>${captions.button}</span></div>' +
                '</div>' +
                '</div>',
            theme: 'dropin',
            extensions: inputFile.data("accept").split(","),
            captions: {
                button: function (options) {
                    return 'Examinar';
                },
                feedback: function (options) {
                    return 'Seleccionar ' + (options.limit == 1 ? 'el archivo' : 'los archivos') + ' a subir.';
                },
                feedback2: function (options) {
                    return options.length + ' ' + (options.length > 1 ? 'archivos fueron seleccionados' : 'archivo fue seleccionado.');
                },
                errors: {
                    filesLimit: function (options) {
                        return 'Sólo ${limit} ' + (options.limit == 1 ? 'archivo' : 'archivos') + ' pueden ser cargados.'
                    },
                    filesType: 'Sólo se pueden cargar archivos ${extensions}.',
                    fileSize: '${name} es demasiado grande. Elija un archivo de hasta ${fileMaxSize}MB.',
                    filesSizeAll: 'Los archivos elegidos son demasiado grandes. Seleccione archivos de hasta ${maxSize} MB.',
                    fileName: 'Ya existe un archivo con el mismo nombre ${name}.',
                    remoteFile: 'No se permiten archivos remotos.',
                    folderUpload: 'No se permiten carpetas.',
                },
                removeConfirmation: '¿Esta seguro de remover el archivo?',
            },
        });

    };

    var _handleModalMonitoringItemDetails = function () {
        $(document).on('click', '.kt_btn_monitoring_item_show', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var blockUI = new KTBlockUI(document.querySelector('#kt_content'));
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                data: {},
                beforeSend: function (response) {
                    blockUI.block();
                },
                success: function (response) {
                    if (! response.success) {
                        $(modalDetailsContent).html('');
                        toastr.warning('Hubo un problema al cargar la información.');
                        return;
                    }
                    $(modalDetailsContent).html(response.render);
                    modalDetails.show();
                },
                complete: function (response) {
                    blockUI.release();
                    blockUI.destroy();
                },
                error: function (response) {
                    toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                }
            });
        });
    };

    var _handleModalAddMonitoringItems = function () {
        $(document).on('click', '#kt_btn_add_monitoring_items', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var blockUI = new KTBlockUI(document.querySelector('#kt_content'));
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                data: {},
                beforeSend: function (response) {
                    blockUI.block();
                },
                success: function (response) {
                    if (! response.success) {
                        $(modalListContent).html('');
                        toastr.warning('Hubo un problema al cargar la información.');
                        return;
                    }
                    $(modalListContent).html(response.render);
                    modalList.show();
                },
                complete: function (response) {
                    blockUI.release();
                    blockUI.destroy();
                },
                error: function (response) {
                    toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                }
            });
        });

        $(document).on('click', '#kt_button_add_items_submit', function (e) {

            e.preventDefault();

            blockUI = new KTBlockUI(document.querySelector('#kt_form_monitoring_report_add_items'));

            submitButton.setAttribute('data-kt-indicator', 'on');
            submitButton.disabled = true;

            form = document.querySelector('#kt_form_monitoring_report_add_items');
            var formData = new FormData($(form)[0]);

            $.ajax({
                type: 'POST',
                url: form.action,
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
                            text: "Registros actualizados satisfactoriamente",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Aceptar",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function(result){
                            if (result.isConfirmed) {
                                modalList.hide();
                                window.location.reload();
                            }
                        });
                    } else {
                        toastr.error(response.message, "Ocurrio un problema");
                    }
                },
                complete: function (response) {
                    submitButton.removeAttribute('data-kt-indicator');
                    submitButton.disabled = false;

                    blockUI.release();
                    blockUI.destroy();
                },
                error: function (response) {
                    toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                }
            });

        });

        $(document).on('click', '#kt_button_add_items_cancel', function (e) {
            e.preventDefault();
            modalList.hide();
        });
    }

    var _initStatusForm = function () {

        validator = FormValidation.formValidation(
            formStatus,
            {
                fields: {
                    monitoring_report_observations: {
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

        submitButtonStatus.addEventListener('click', function (e) {
            e.preventDefault();

            blockUI = new KTBlockUI(document.querySelector('#kt_form_update_status_monitoring_status'));

            if (validator) {
                validator.validate().then(function (status) {

                    if (status === 'Valid') {
                        submitButtonStatus.setAttribute('data-kt-indicator', 'on');
                        submitButtonStatus.disabled = true;

                        var formData = new FormData($(formStatus)[0]);
                        $.ajax({
                            type: 'POST',
                            url: formStatus.action,
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
                                        text: "Actualización satisfactoria.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false,
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result){
                                        if (result.isConfirmed) {
                                            modal.hide();
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error(response.message, "Ocurrio un problema");
                                }
                            },
                            complete: function (response) {
                                submitButtonStatus.removeAttribute('data-kt-indicator');
                                submitButtonStatus.disabled = false;

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

        cancelButtonStatus.addEventListener('click', function (e) {
            e.preventDefault();
            modal.hide();
        });
    }

    var _handleUpdateStatusModal = function () {

        $(document).on('click', '.kt_change_monitoring_report_status', function (e) {
            e.preventDefault();
            formStatus.reset();
            validator.resetForm(true);
            var new_status = $(this).data('new-status');
            var new_status_label = $(this).data('new-status-label');
            $('input[name="monitoring_report_status"]').val(new_status);
            $('input[name="readonly_monitoring_report_status"]').val(new_status_label);
            modal.show();
        });

    }

    return {
        init: function () {

            _initFileUploader();

            // Details
            modalDetailsEl = document.querySelector('#kt_modal_monitoring_report_item_details');
            if (modalDetailsEl) {
                modalDetails = new bootstrap.Modal(modalDetailsEl);
                modalDetailsContent = document.querySelector('#kt_modal_wrapper_monitoring_item');
                _handleModalMonitoringItemDetails();
            }

            // Status
            // formStatus = document.querySelector('#kt_form_update_status_monitoring_status');
            // submitButtonStatus = document.getElementById('kt_button_update_status_submit');
            // cancelButtonStatus = document.getElementById('kt_button_update_status_cancel');
            // _initStatusForm();
            // modalEl = document.querySelector('#kt_modal_update_monitoring_report_status');
            // if (modalEl) {
            //     modal = new bootstrap.Modal(modalEl);
            //     _handleUpdateStatusModal();
            // }
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTMonitoringReportList.init();
});
