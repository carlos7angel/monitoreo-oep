"use strict";

var KTAnalysisReportList = function () {

    var blockUI;
    var blockUI_2;

    var formRejected;
    var validatorFormRejected;
    var modalRejected;
    var modalRejectedEl;
    var submitButtonRejected;
    var cancelButtonRejected;

    var formToSecretariat;
    var validatorFormToSecretariat;
    var modalToSecretariat;
    var modalToSecretariatEl;
    var submitButtonToSecretariat;
    var cancelButtonToSecretariat;

    var formComplementary;
    var validatorFormComplementary;
    var modalComplementary;
    var modalComplementaryEl;
    var submitButtonComplementary;
    var cancelButtonComplementary;

    var formFirstResolution;
    var validatorFormFirstResolution;
    var modalFirstResolution;
    var modalFirstResolutionEl;
    var submitButtonFirstResolution;
    var cancelButtonFirstResolution;

    var formSecondResolution;
    var validatorFormSecondResolution;
    var modalSecondResolution;
    var modalSecondResolutionEl;
    var submitButtonSecondResolution;
    var cancelButtonSecondResolution;

    var formFinalResolution;
    var validatorFormFinalResolution;
    var modalFinalResolution;
    var modalFinalResolutionEl;
    var submitButtonFinalResolution;
    var cancelButtonFinalResolution;

    var _initFileUploader = function (identifier, defaultFiles) {

        var inputFile = $(identifier);
        if (!inputFile.length) {
            return;
        }
        $(identifier).fileuploader({
            limit: inputFile.data("maxfiles"),
            fileMaxSize: inputFile.data("maxsize"),
            addMore: true,
            //extensions: ['jpg', pdf', 'text/plain', 'audio/*'],
            // changeInput: ' ',
            enableApi: true,
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
            files: defaultFiles

        });
    };

    var _initFiles = function () {
        _initFileUploader('#kt_analysis_file_report', []);
        _initFileUploader('#kt_analysis_file_additional', []);
        _initFileUploader('#kt_analysis_file_complementary', []);
        _initFileUploader('#kt_analysis_file_first_resolution', []);
        _initFileUploader('#kt_analysis_file_second_resolution', []);
        _initFileUploader('#kt_analysis_file_final_resolution', []);
    };

    var _handleRejectAnalysisReportModal = function () {
        $(document).on('click', '.kt_change_analysis_report_status_rejected', function (e) {
            e.preventDefault();
            formRejected.reset();
            if (validatorFormRejected) { validatorFormRejected.resetForm(true); }
            modalRejected.show();
        });
    }

    var _initAnalysisReportRejectedForm = function () {
        validatorFormRejected = FormValidation.formValidation(
            formRejected,
            {
                fields: {
                    analysis_rejected_observations: {
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

    var _handleAnalysisReportRejectedForm = function () {
        submitButtonRejected.addEventListener('click', function (e) {
            e.preventDefault();
            blockUI = new KTBlockUI(document.querySelector('#kt_block_target_rejected'));
            if (validatorFormRejected) {
                validatorFormRejected.validate().then(function (status) {
                    if (status === 'Valid') {
                        submitButtonRejected.setAttribute('data-kt-indicator', 'on');
                        submitButtonRejected.disabled = true;
                        var formData = new FormData($(formRejected)[0]);
                        $.ajax({
                            type: 'POST',
                            url: formRejected.action,
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
                                        text: "En informe de análisis ha sido rechazado.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false,
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result){
                                        if (result.isConfirmed) {
                                            modalRejected.hide();
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error(response.message, "Ocurrio un problema");
                                }
                            },
                            complete: function (response) {
                                submitButtonRejected.removeAttribute('data-kt-indicator');
                                submitButtonRejected.disabled = false;
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

        cancelButtonRejected.addEventListener('click', function (e) {
            e.preventDefault();
            modalRejected.hide();
        });
    }


    var _handleToSecretariatAnalysisReportModal = function () {
        $(document).on('click', '.kt_change_analysis_report_submit_to_secretariat', function (e) {
            e.preventDefault();
            // formToSecretariat.reset();
            // if (validatorFormToSecretariat) { validatorFormToSecretariat.resetForm(true); }
            modalToSecretariat.show();
        });
    }

    var _initAnalysisReportToSecretariatForm = function () {
        validatorFormToSecretariat = FormValidation.formValidation(
            formToSecretariat,
            {
                fields: {
                    'analysis_file_report': {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    // 'analysis_scope': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'El campo es obligatorio'
                    //         }
                    //     }
                    // },
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

    var _handleAnalysisReportToSecretariatForm = function () {
        submitButtonToSecretariat.addEventListener('click', function (e) {

            e.preventDefault();
            if (validatorFormToSecretariat) {
                validatorFormToSecretariat.validate().then(function (status) {
                    if (status === 'Valid') {
                        submitButtonToSecretariat.setAttribute('data-kt-indicator', 'on');
                        submitButtonToSecretariat.disabled = true;
                        var formData = new FormData($(formToSecretariat)[0]);
                        var blockUI_2 = new KTBlockUI(document.querySelector('#kt_block_target_to_secretariat'));
                        $.ajax({
                            type: 'POST',
                            url: formToSecretariat.action,
                            contentType: false,
                            processData: false,
                            data: formData,
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            beforeSend: function (response) {
                                blockUI_2.block();
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
                                            modalToSecretariat.hide();
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error(response.message, "Ocurrio un problema");
                                }
                            },
                            complete: function (response) {
                                submitButtonToSecretariat.removeAttribute('data-kt-indicator');
                                submitButtonToSecretariat.disabled = false;
                                blockUI_2.release();
                                blockUI_2.destroy();
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

        cancelButtonToSecretariat.addEventListener('click', function (e) {
            e.preventDefault();
            modalToSecretariat.hide();
        });
    }


    var _handleAnalysisChangeStatusGenericDirect = function () {

        $(document).on('click', '.kt_change_analysis_report_status_generic_direct', function (e) {
            var newStatus = $(this).data('new-status');
            var url = $(this).data('url');
            var blockUI = new KTBlockUI(document.querySelector('#kt_content'));
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
                            title: 'Registro actualizado satisfactoriamente',
                            text: "En informe de análisis ha sido actualizado al nuevo estado.",
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
        });
    }


    var _handleComplementaryAnalysisReportModal = function () {
        $(document).on('click', '.kt_change_analysis_report_status_complementary', function (e) {
            e.preventDefault();
            $('#kt_form_analysis_report_complementary input[name="new_status"]').val($(this).data('new-status'));
            // formComplementary.reset();
            // if (validatorFormComplementary) { validatorFormComplementary.resetForm(true); }
            modalComplementary.show();
        });
    }

    var _initAnalysisReportComplementaryForm = function () {
        validatorFormComplementary = FormValidation.formValidation(
            formComplementary,
            {
                fields: {
                    'analysis_file_complementary': {
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

    var _handleAnalysisReportComplementaryForm = function () {
        submitButtonComplementary.addEventListener('click', function (e) {

            e.preventDefault();
            if (validatorFormComplementary) {
                validatorFormComplementary.validate().then(function (status) {
                    if (status === 'Valid') {
                        submitButtonComplementary.setAttribute('data-kt-indicator', 'on');
                        submitButtonComplementary.disabled = true;
                        var formData = new FormData($(formComplementary)[0]);
                        var blockUI_2 = new KTBlockUI(document.querySelector('#kt_block_target_complementary'));
                        $.ajax({
                            type: 'POST',
                            url: formComplementary.action,
                            contentType: false,
                            processData: false,
                            data: formData,
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            beforeSend: function (response) {
                                blockUI_2.block();
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Registro actualizado satisfactoriamente',
                                        text: "En informe complementario ha sido registrado.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false,
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result){
                                        if (result.isConfirmed) {
                                            modalComplementary.hide();
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error(response.message, "Ocurrio un problema");
                                }
                            },
                            complete: function (response) {
                                submitButtonComplementary.removeAttribute('data-kt-indicator');
                                submitButtonComplementary.disabled = false;
                                blockUI_2.release();
                                blockUI_2.destroy();
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

        cancelButtonComplementary.addEventListener('click', function (e) {
            e.preventDefault();
            modalComplementary.hide();
        });
    }


    var _handleFirstResolutionAnalysisReportModal = function () {
        $(document).on('click', '.kt_change_analysis_report_status_first_resolution', function (e) {
            e.preventDefault();
            // formFirstResolution.reset();
            // if (validatorFormFirstResolution) { validatorFormFirstResolution.resetForm(true); }
            modalFirstResolution.show();
        });
    }

    var _initAnalysisReportFirstResolutionForm = function () {
        validatorFormFirstResolution = FormValidation.formValidation(
            formFirstResolution,
            {
                fields: {
                    'analysis_file_first_resolution': {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    // 'analysis_scope': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'El campo es obligatorio'
                    //         }
                    //     }
                    // },
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

    var _handleAnalysisReportFirstResolutionForm = function () {
        submitButtonFirstResolution.addEventListener('click', function (e) {

            e.preventDefault();
            if (validatorFormFirstResolution) {
                validatorFormFirstResolution.validate().then(function (status) {
                    if (status === 'Valid') {
                        submitButtonFirstResolution.setAttribute('data-kt-indicator', 'on');
                        submitButtonFirstResolution.disabled = true;
                        var formData = new FormData($(formFirstResolution)[0]);
                        var blockUI_2 = new KTBlockUI(document.querySelector('#kt_block_target_first_resolution'));
                        $.ajax({
                            type: 'POST',
                            url: formFirstResolution.action,
                            contentType: false,
                            processData: false,
                            data: formData,
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            beforeSend: function (response) {
                                blockUI_2.block();
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Registro actualizado satisfactoriamente',
                                        text: "La resolución en 1ra Instancia ha sido enviada.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false,
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result){
                                        if (result.isConfirmed) {
                                            modalFirstResolution.hide();
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error(response.message, "Ocurrio un problema");
                                }
                            },
                            complete: function (response) {
                                submitButtonFirstResolution.removeAttribute('data-kt-indicator');
                                submitButtonFirstResolution.disabled = false;
                                blockUI_2.release();
                                blockUI_2.destroy();
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

        cancelButtonFirstResolution.addEventListener('click', function (e) {
            e.preventDefault();
            modalFirstResolution.hide();
        });
    }


    var _handleSecondResolutionAnalysisReportModal = function () {
        $(document).on('click', '.kt_change_analysis_report_status_second_resolution', function (e) {
            e.preventDefault();
            // formSecondResolution.reset();
            // if (validatorFormSecondResolution) { validatorFormSecondResolution.resetForm(true); }
            modalSecondResolution.show();
        });
    }

    var _initAnalysisReportSecondResolutionForm = function () {
        validatorFormSecondResolution = FormValidation.formValidation(
            formSecondResolution,
            {
                fields: {
                    'analysis_file_second_resolution': {
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

    var _handleAnalysisReportSecondResolutionForm = function () {
        submitButtonSecondResolution.addEventListener('click', function (e) {

            e.preventDefault();
            if (validatorFormSecondResolution) {
                validatorFormSecondResolution.validate().then(function (status) {
                    if (status === 'Valid') {
                        submitButtonSecondResolution.setAttribute('data-kt-indicator', 'on');
                        submitButtonSecondResolution.disabled = true;
                        var formData = new FormData($(formSecondResolution)[0]);
                        var blockUI_2 = new KTBlockUI(document.querySelector('#kt_block_target_second_resolution'));
                        $.ajax({
                            type: 'POST',
                            url: formSecondResolution.action,
                            contentType: false,
                            processData: false,
                            data: formData,
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            beforeSend: function (response) {
                                blockUI_2.block();
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Registro actualizado satisfactoriamente',
                                        text: "La resolución en 2da Instancia ha sido registrada.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false,
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result){
                                        if (result.isConfirmed) {
                                            modalSecondResolution.hide();
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error(response.message, "Ocurrio un problema");
                                }
                            },
                            complete: function (response) {
                                submitButtonSecondResolution.removeAttribute('data-kt-indicator');
                                submitButtonSecondResolution.disabled = false;
                                blockUI_2.release();
                                blockUI_2.destroy();
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

        cancelButtonSecondResolution.addEventListener('click', function (e) {
            e.preventDefault();
            modalSecondResolution.hide();
        });
    }


    var _handleFinalResolutionAnalysisReportModal = function () {
        $(document).on('click', '.kt_change_analysis_report_status_final_resolution', function (e) {
            e.preventDefault();
            // formFinalResolution.reset();
            // if (validatorFormFinalResolution) { validatorFormFinalResolution.resetForm(true); }
            modalFinalResolution.show();
        });
    }

    var _initAnalysisReportFinalResolutionForm = function () {
        validatorFormFinalResolution = FormValidation.formValidation(
            formFinalResolution,
            {
                fields: {
                    'analysis_file_final_resolution': {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    'analysis_final_status': {
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

    var _handleAnalysisReportFinalResolutionForm = function () {
        submitButtonFinalResolution.addEventListener('click', function (e) {

            e.preventDefault();
            if (validatorFormFinalResolution) {
                validatorFormFinalResolution.validate().then(function (status) {
                    if (status === 'Valid') {
                        submitButtonFinalResolution.setAttribute('data-kt-indicator', 'on');
                        submitButtonFinalResolution.disabled = true;
                        var formData = new FormData($(formFinalResolution)[0]);
                        var blockUI_2 = new KTBlockUI(document.querySelector('#kt_block_target_final_resolution'));
                        $.ajax({
                            type: 'POST',
                            url: formFinalResolution.action,
                            contentType: false,
                            processData: false,
                            data: formData,
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            beforeSend: function (response) {
                                blockUI_2.block();
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Registro actualizado satisfactoriamente',
                                        text: "La Resolución Final ha sido guardada.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false,
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result){
                                        if (result.isConfirmed) {
                                            modalFinalResolution.hide();
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error(response.message, "Ocurrio un problema");
                                }
                            },
                            complete: function (response) {
                                submitButtonFinalResolution.removeAttribute('data-kt-indicator');
                                submitButtonFinalResolution.disabled = false;
                                blockUI_2.release();
                                blockUI_2.destroy();
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

        cancelButtonFinalResolution.addEventListener('click', function (e) {
            e.preventDefault();
            modalFinalResolution.hide();
        });
    }


    var _initAnalysisFiles = function () {

        var container = document.querySelector('#kt_content');
        $(container).find('.kt_analysis_report_files').each(function (index, el) {

            var inputFile = $(this);

            var inputDefault = inputFile.parent().children('.file_default');

            var defaultFiles = [];
            if(inputDefault.length) {
                defaultFiles.push({
                    name: inputDefault.data('name'),
                    size: inputDefault.data('size'),
                    type: inputDefault.data('mimetype'),
                    file: inputDefault.data('path'),
                });
            }

            inputFile.fileuploader({
                limit: 1,
                fileMaxSize: 1,
                addMore: true,
                enableApi: true,
                changeInput: '<div></div>',
                // changeInput: '<div class="fileuploader-input">' +
                //     '<div class="fileuploader-input-inner">' +
                //     '<div>${captions.feedback} ${captions.or} <span>${captions.button}</span></div>' +
                //     '</div>' +
                //     '</div>',
                theme: 'dropin',
                //extensions: '.pdf',
                thumbnails: {
                    // thumbnails list HTML {String, Function}
                    // example: '<ul></ul>'
                    // example: function(options) { return '<ul></ul>'; }
                    box: '<div class="fileuploader-items">' +
                        '<ul class="fileuploader-items-list"></ul>' +
                        '</div>',

                    // append thumbnails list to selector {null, String, jQuery Object}
                    // example: 'body'
                    boxAppendTo: null,

                    // thumbnails for the choosen files {String, Function}
                    // example: '<li>${name}</li>'
                    // example: function(item) { return '<li>' + item.name + '</li>'; }
                    item: '<li class="fileuploader-item">' +
                        '<div class="columns">' +
                        '<div class="column-thumbnail">${image}<span class="fileuploader-action-popup"></span></div>' +
                        '<div class="column-title">' +
                        '<div title="${name}">${name}</div>' +
                        '<span>${size2}</span>' +
                        '</div>' +
                        '<div class="column-actions">' +
                        '' +
                        '</div>' +
                        '</div>' +
                        '<div class="progress-bar2">${progressBar}<span></span></div>' +
                        '</li>',

                    // thumbnails for the preloaded files {String, Function}
                    // example: '<li>${name}</li>'
                    // example: function(item) { return '<li>' + item.name + '</li>'; }
                    item2: '<li class="fileuploader-item">' +
                        '<div class="columns">' +
                        '<div class="column-thumbnail">${image}<span class="fileuploader-action-popup"></span></div>' +
                        '<div class="column-title">' +
                        '<a href="${file}" target="_blank">' +
                        '<div title="${name}">${name}</div>' +
                        '<span>${size2}</span>' +
                        '</a>' +
                        '</div>' +
                        '<div class="column-actions">' +
                        '' +
                        '' +
                        '</div>' +
                        '</div>' +
                        '</li>',

                    // thumbnails selectors
                    _selectors: {
                        list: '.fileuploader-items-list',
                        item: '.fileuploader-item',
                        start: '.fileuploader-action-start',
                        retry: '.fileuploader-action-retry',
                        remove: '.fileuploader-action-remove',
                        sorter: '.fileuploader-action-sort',
                        popup: '.fileuploader-popup-preview',
                        popup_open: '.fileuploader-action-popup'
                    },

                    // insert the thumbnail's item at the begining of the list? {Boolean}
                    itemPrepend: false,

                    // show a confirmation dialog by removing a file? {Boolean}
                    // it will not be shown in upload mode by canceling an upload
                    // you can call your own dialog box using dialogs option
                    removeConfirmation: true,

                    // render the image thumbnail? {Boolean}
                    // if false, it will generate an icon(you can also hide it with css)
                    // if false, you can use the API method item.renderThumbnail() to render it (check thumbnails example)
                    startImageRenderer: true,

                    // render the images synchron {Boolean}
                    // used to improve the browser speed
                    synchronImages: true,

                    // read image using URL createObjectURL method {Boolean}
                    // if false, it will use readAsDataURL
                    useObjectUrl: false,

                    // render the image in a canvas element {Boolean, Object}
                    // if true, it will generate an image with the css sizes from the parent element of ${image}
                    // you can also set the width and the height in the object {width: 96, height: 96}
                    canvasImage: true,

                    // render thumbnail for video files? {Boolean}
                    videoThumbnail: false,

                    // fix exif orientation {Boolean}
                    exif: true,

                    // Callback fired before adding the list element
                    beforeShow: null,

                    // Callback fired after adding the item element
                    onItemShow: null,

                    // Callback fired after removing the item element
                    // by default we will animate the removing action
                    onItemRemove: function(html) {
                        html.children().animate({'opacity': 0}, 200, function() {
                            setTimeout(function() {
                                html.slideUp(200, function() {
                                    html.remove();
                                });
                            }, 100);
                        });
                    },

                    // Callback fired after the item image was loaded or a image file is invalid
                    // default - null
                    onImageLoaded: function(item, listEl, parentEl, newInputEl, inputEl) {
                        // invalid image?
                        if (item.image.hasClass('fileuploader-no-thumbnail')) {
                            // callback goes here
                        }

                        // check image size and ratio?
                        if (item.reader.node && item.reader.width > 1920 && item.reader.height > 1080 && item.reader.ratio != '16:9') {
                            // callback goes here
                        }
                    },

                    // item popup preview {Object}
                    popup: {
                        // popup append to container {String, jQuery Object}
                        container: 'body',

                        // enable arrows {Boolean}
                        arrows: true,

                        // loop the arrows {Boolean}
                        loop: true,

                        // popup HTML {String, Function}
                        template: function(data) { return '<div class="fileuploader-popup-preview">' +
                            '<button class="fileuploader-popup-move" data-action="prev"><i class="fileuploader-icon-arrow-left"></i></button>' +
                            '<div class="fileuploader-popup-node ${format}">' +
                            '${reader.node}' +
                            '</div>' +
                            '<div class="fileuploader-popup-content">' +
                            '<div class="fileuploader-popup-footer">' +
                            '<ul class="fileuploader-popup-tools">' +
                            (data.format == 'image' && data.reader.node && data.editor ? (data.editor.cropper ? '<li>' +
                                    '<button data-action="crop">' +
                                    '<i class="fileuploader-icon-crop"></i> ${captions.crop}' +
                                    '</button>' +
                                    '</li>' : '') +
                                    (data.editor.rotate ? '<li>' +
                                        '<button data-action="rotate-cw">' +
                                        '<i class="fileuploader-icon-rotate"></i> ${captions.rotate}' +
                                        '</button>' +
                                        '</li>' : '') : ''
                            ) +
                            (data.format == 'image' ?
                                    '<li class="fileuploader-popup-zoomer">' +
                                    '<button data-action="zoom-out">&minus;</button>' +
                                    '<input type="range" min="0" max="100">' +
                                    '<button data-action="zoom-in">&plus;</button>' +
                                    '<span></span> ' +
                                    '</li>' : ''
                            ) +
                            (data.data.url ? '<li>' +
                                    '<a href="'+ data.file +'" data-action target="_blank">' +
                                    '<i class="fileuploader-icon-external"></i> ${captions.open}' +
                                    '</a>' +
                                    '</li>' : ''
                            ) +
                            '</ul>' +
                            '</div>' +
                            '<div class="fileuploader-popup-header">' +
                            '<ul class="fileuploader-popup-meta">' +
                            '<li>' +
                            '<span>${captions.name}:</span>' +
                            '<h5>${name}</h5>' +
                            '</li>' +
                            '<li>' +
                            '<span>${captions.type}:</span>' +
                            '<h5>${extension.toUpperCase()}</h5>' +
                            '</li>' +
                            '<li>' +
                            '<span>${captions.size}:</span>' +
                            '<h5>${size2}</h5>' +
                            '</li>' +
                            (data.reader && data.reader.width ? '<li>' +
                                    '<span>${captions.dimensions}:</span>' +
                                    '<h5>${reader.width}x${reader.height}px</h5>' +
                                    '</li>' : ''
                            ) +
                            (data.reader && data.reader.duration ? '<li>' +
                                    '<span>${captions.duration}:</span>' +
                                    '<h5>${reader.duration2}</h5>' +
                                    '</li>' : ''
                            ) +
                            '</ul>' +
                            '<div class="fileuploader-popup-info"></div>' +
                            '<ul class="fileuploader-popup-buttons">' +
                            '<li><button class="fileuploader-popup-button" data-action="cancel">${captions.cancel}</a></li>' +
                            (data.editor ? '<li><button class="fileuploader-popup-button button-success" data-action="save">${captions.confirm}</button></li>' : ''
                            ) +
                            '</ul>' +
                            '</div>' +
                            '</div>' +
                            '<button class="fileuploader-popup-move" data-action="next"><i class="fileuploader-icon-arrow-right"></i></button>' +
                            '</div>'; },

                        // Callback fired after creating the popup
                        // we will trigger by default buttons with custom actions
                        onShow: function(item) {
                            item.popup.html.on('click', '[data-action="remove"]', function(e) {
                                item.popup.close();
                                item.remove();
                            }).on('click', '[data-action="cancel"]', function(e) {
                                item.popup.close();
                            }).on('click', '[data-action="save"]', function(e) {
                                if (item.editor)
                                    item.editor.save();
                                if (item.popup.close)
                                    item.popup.close();
                            });
                        },

                        // Callback fired after closing the popup
                        onHide: null
                    }
                },
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
                files: defaultFiles,
            });

        });
    }

    return {
        init: function () {

            _initFiles();

            modalRejectedEl = document.querySelector('#kt_modal_analysis_report_rejected');
            if (modalRejectedEl) { modalRejected = new bootstrap.Modal(modalRejectedEl); }
            formRejected = document.querySelector('#kt_form_analysis_report_rejected');
            submitButtonRejected = document.getElementById('kt_cancel_button_analysis_report_rejected');
            cancelButtonRejected = document.getElementById('kt_submit_button_analysis_report_rejected');
            _handleRejectAnalysisReportModal();
            _initAnalysisReportRejectedForm();
            _handleAnalysisReportRejectedForm();

            modalToSecretariatEl = document.querySelector('#kt_modal_analysis_report_submit_to_secretariat');
            if (modalToSecretariatEl) { modalToSecretariat = new bootstrap.Modal(modalToSecretariatEl); }
            formToSecretariat = document.querySelector('#kt_form_analysis_report_submit_to_secretariat');
            submitButtonToSecretariat = document.getElementById('kt_submit_button_analysis_report_to_secretariat');
            cancelButtonToSecretariat = document.getElementById('kt_cancel_button_analysis_report_to_secretariat');
            _handleToSecretariatAnalysisReportModal();
            _initAnalysisReportToSecretariatForm();
            _handleAnalysisReportToSecretariatForm();


            _handleAnalysisChangeStatusGenericDirect();

            modalComplementaryEl = document.querySelector('#kt_modal_analysis_report_complementary');
            if (modalComplementaryEl) { modalComplementary = new bootstrap.Modal(modalComplementaryEl); }
            formComplementary = document.querySelector('#kt_form_analysis_report_complementary');
            submitButtonComplementary = document.getElementById('kt_submit_button_analysis_report_complementary');
            cancelButtonComplementary = document.getElementById('kt_cancel_button_analysis_report_complementary');
            _handleComplementaryAnalysisReportModal();
            _initAnalysisReportComplementaryForm();
            _handleAnalysisReportComplementaryForm();

            modalFirstResolutionEl = document.querySelector('#kt_modal_analysis_report_first_resolution');
            if (modalFirstResolutionEl) { modalFirstResolution = new bootstrap.Modal(modalFirstResolutionEl); }
            formFirstResolution = document.querySelector('#kt_form_analysis_report_first_resolution');
            submitButtonFirstResolution = document.getElementById('kt_submit_button_analysis_report_first_resolution');
            cancelButtonFirstResolution = document.getElementById('kt_cancel_button_analysis_report_first_resolution');
            _handleFirstResolutionAnalysisReportModal();
            _initAnalysisReportFirstResolutionForm();
            _handleAnalysisReportFirstResolutionForm();

            modalSecondResolutionEl = document.querySelector('#kt_modal_analysis_report_second_resolution');
            if (modalSecondResolutionEl) { modalSecondResolution = new bootstrap.Modal(modalSecondResolutionEl); }
            formSecondResolution = document.querySelector('#kt_form_analysis_report_second_resolution');
            submitButtonSecondResolution = document.getElementById('kt_submit_button_analysis_report_second_resolution');
            cancelButtonSecondResolution = document.getElementById('kt_cancel_button_analysis_report_second_resolution');
            _handleSecondResolutionAnalysisReportModal();
            _initAnalysisReportSecondResolutionForm();
            _handleAnalysisReportSecondResolutionForm();

            modalFinalResolutionEl = document.querySelector('#kt_modal_analysis_report_final_resolution');
            if (modalFinalResolutionEl) { modalFinalResolution = new bootstrap.Modal(modalFinalResolutionEl); }
            formFinalResolution = document.querySelector('#kt_form_analysis_report_final_resolution');
            submitButtonFinalResolution = document.getElementById('kt_submit_button_analysis_report_final_resolution');
            cancelButtonFinalResolution = document.getElementById('kt_cancel_button_analysis_report_final_resolution');
            _handleFinalResolutionAnalysisReportModal();
            _initAnalysisReportFinalResolutionForm();
            _handleAnalysisReportFinalResolutionForm();

            _initAnalysisFiles();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTAnalysisReportList.init();
});
