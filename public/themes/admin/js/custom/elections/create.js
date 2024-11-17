"use strict";

var KTFormsCreate = function () {

    var submitButton;
    var cancelButton;
    var validator;
    var form;

    var _handleForm = function () {

        const fieldStartDateMedia = jQuery(form.querySelector('[name="election_start_date_registration_media"]'));
        const fieldEndDateMedia = jQuery(form.querySelector('[name="election_end_date_registration_media"]'));

        validator = FormValidation.formValidation(
            form,
            {
                // locale: 'es_ES',
                // localization: FormValidation.locales.es_ES,
                fields: {
                    election_name: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                            stringLength: {
                                max: 100,
                                message: 'El campo no debe tener más de 100 caracteres'
                            }
                        }
                    },
                    election_date: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    election_code: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                            stringLength: {
                                max: 10,
                                message: 'El campo no debe tener más de 10 caracteres'
                            }
                        }
                    },
                    election_type: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    election_status: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    election_logo: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    election_banner: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    election_end_date_registration_media: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },

                    election_start_date_registration_media: {
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

    }

    var _initFileUploader = function () {

        var inputFile = $('#kt_election_affidavit_file_registration_media');
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

    var _initDatepicker = function () {

        $('.datepicker_flatpickr').flatpickr({
            dateFormat: "d/m/Y",
        });

    };

    var _handleSettings = function () {

        $(document).on('change', 'input[name="election_enable_registration_media"]', function (e) {
            e.preventDefault();
            var enable_media = $(this).is(':checked');
            if (enable_media) {
                $('#kt_wrapper_enable_media').removeClass('d-none').addClass('d-block');
                validator.enableValidator('election_start_date_registration_media');
                validator.enableValidator('election_end_date_registration_media');
            } else {
                $('#kt_wrapper_enable_media').addClass('d-none').removeClass('d-block');
                validator.disableValidator('election_start_date_registration_media');
                validator.disableValidator('election_end_date_registration_media');
            }
        });

        $(document).on('change', 'input[name="election_enable_monitoring"]', function (e) {
            e.preventDefault();
            var enable_monitoring = $(this).is(':checked');
            if (enable_monitoring) {
                $('#kt_wrapper_enable_monitoring').removeClass('d-none').addClass('d-block');
            } else {
                $('#kt_wrapper_enable_monitoring').addClass('d-none').removeClass('d-block');
            }
        });

        $(document).on('change', 'input[name="election_enable_political_registration"]', function (e) {
            e.preventDefault();
            var enable_registration = $(this).is(':checked');
            if (enable_registration) {
                $('#kt_wrapper_enable_political_registration').removeClass('d-none').addClass('d-block');
            } else {
                $('#kt_wrapper_enable_political_registration').addClass('d-none').removeClass('d-block');
            }
        });

    };

    return {
        init: function () {
            form = document.querySelector('#kt_add_election_form');
            submitButton = document.getElementById('kt_add_election_submit');
            cancelButton = document.getElementById('kt_add_election_cancel');
            _initFileUploader();
            _initDatepicker();
            _handleSettings();
            _handleForm();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormsCreate.init();
});
