"use strict";

var KTFormFiles = function () {

    var submitButton;
    var cancelButton;
    var validator;
    var form;
    var blockUI;

    var _handleForm = function () {

        validator = FormValidation.formValidation(
            form,
            {
                // locale: 'es_ES',
                // localization: FormValidation.locales.es_ES,
                fields: {
                    // media_file_rep_document: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'El campo es obligatorio'
                    //         }
                    //     }
                    // },
                    // media_file_nit: {
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

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {

                    if (status === 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;

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
                                        text: "Registro exitoso.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false,
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result){
                                        if (result.isConfirmed) {
                                            window.location = response.redirect;
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
                    } else {
                        toastr.warning("Complete el formulario", "Advertencia");
                    }
                });
            }
        });

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            // TODO: check if the form has been edited

        });
    }

    var _initFiles = function () {

        _initFileUploader('#kt_media_file_power_attorney', function () {
            return extractFileData('input[name="file_power_attorney"]')
        });

        _initFileUploader('#kt_media_file_rep_document', function () {
            return extractFileData('input[name="file_rep_document"]')
        });

        _initFileUploader('#kt_media_file_nit', function () {
            return extractFileData('input[name="file_nit"]')
        });

    };

    var extractFileData = function (element) {

        var files = [];
        var defaultFile = document.querySelector(element);
        if (defaultFile) {
            files.push({
                name: defaultFile.dataset.name,
                size: defaultFile.dataset.size,
                type: defaultFile.dataset.mimetype,
                file: defaultFile.dataset.path,
            });
        }
        return files;
    }

    var _initFileUploader = function (identifier, getDefaultFiles) {

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
            // enableApi: true,
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
            files: getDefaultFiles()

        });
    };

    return {
        init: function () {
            blockUI = new KTBlockUI(document.querySelector('#kt_app_content'));
            form = document.querySelector('#kt_media_profile_file_data_form');
            submitButton = document.getElementById('kt_media_profile_submit');
            cancelButton = document.getElementById('kt_media_profile_cancel');
            _handleForm();
            _initFiles();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormFiles.init();
});
