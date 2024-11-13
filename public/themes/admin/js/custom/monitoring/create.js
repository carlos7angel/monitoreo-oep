"use strict";

var KTFormBuilder = function () {

    var validator;
    var form;

    var _validateForm = function () {

        validator = FormValidation.formValidation(
            form,
            {
                fields: {

                },
                plugins: {
                    declarative: new FormValidation.plugins.Declarative({
                        html5Input: true,
                    }),
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

    var _submitForm = function () {

        const submitButton = document.getElementById('kt_create_monitoring_submit');
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
                                        text: "Registro guardado satisfactoriamente",
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
                        toastr.warning("Complete el formulario debidamente", "Advertencia");
                    }
                });
            }
        });

    }

    var _initDatepicker = function () {

        $('.kt_form_field_date').flatpickr({
            enableTime: false,
            dateFormat: "d/m/Y",
        });

    }

    var _initTimepicker = function () {

        $('.kt_form_field_time').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

    }

    var _initFileuploader = function () {

        var inputFile = $('.kt_form_field_fileupload');
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

    }

    var _handleChangeRegistered = function () {

        $(document).on('change', 'input[name="media_registered"]', function (e) {
            e.preventDefault();
            var el = $(this).val();
            if (el === "1") {
                $('.kt_select_media_input').removeClass('d-none').addClass('d-block');
                $('.kt_text_media_input').removeClass('d-block').addClass('d-none');
                validator.enableValidator('media_profile');
                validator.disableValidator('media_profile_text');
            } else {
                $('.kt_text_media_input').removeClass('d-none').addClass('d-block');
                $('.kt_select_media_input').removeClass('d-block').addClass('d-none');
                validator.enableValidator('media_profile_text');
                validator.disableValidator('media_profile');
            }
        });

    };

    return {

        init: function () {

            _initDatepicker();
            _initTimepicker();
            _initFileuploader();

            form = document.querySelector('#kt_create_monitoring_form');
            _validateForm();
            _submitForm();

            _handleChangeRegistered();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormBuilder.init();
});
