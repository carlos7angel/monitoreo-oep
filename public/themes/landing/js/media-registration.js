"use strict";

var KTMediaSignUp = function () {

    var submitButton;
    var validator;
    var form;

    var _handleForm = function () {

        validator = FormValidation.formValidation(
            form,
            {
                // locale: 'es_ES',
                // localization: FormValidation.locales.es_ES,
                fields: {
                    media_name: {
                        validators: {
                            notEmpty: {
                                message: 'El nombre del medio es obligatorio'
                            },
                            stringLength: {
                                max: 100,
                                message: 'El nombre del medio no debe exceder los 100 caracteres'
                            }
                        }
                    },
                    media_business_name: {
                        validators: {
                            notEmpty: {
                                message: 'La razón social del medio es obligatorio'
                            },
                        }
                    },
                    media_nit: {
                        validators: {
                            notEmpty: {
                                message: 'El NIT del medio es obligatorio'
                            },
                        }
                    },
                    'media_type[]': {
                        validators: {
                            notEmpty: {
                                message: 'Debe seleccionar al menos un tipo'
                            }
                        }
                    },
                    media_rep_name: {
                        validators: {
                            notEmpty: {
                                message: 'El nombre del representante legal es obligatorio'
                            },
                            stringLength: {
                                max: 100,
                                message: 'El nombre del representante legal no debe exceder los 100 caracteres'
                            }
                        }
                    },
                    media_cellphone: {
                        validators: {
                            notEmpty: {
                                message: 'El número de celular es obligatorio'
                            },
                        }
                    },
                    media_email: {
                        validators: {
                            notEmpty: {
                                message: 'El correo electrónico es obligatorio'
                            },
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: 'Debe ingresar un correo electrónico válido',
                            },
                            blank: {},
                        }
                    },
                    media_terms: {
                        validators: {
                            choice: {
                                min: 1,
                                message: 'Debe aceptar los términos y condiciones'
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
                                        text: "Formulario enviado satisfactoriamente.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Aceptar",
                                        allowOutsideClick: false,
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function(result){
                                        if (result.isConfirmed) {
                                            $('#form_media_content').html(response.render);
                                        }
                                    });
                                } else {
                                    if (response.fields) {
                                        for (const field in response.fields) {
                                            validator
                                                .updateValidatorOption(field, 'blank', 'message', response.fields[field])
                                                .updateFieldStatus(field, 'Invalid', 'blank');
                                        }
                                    } else {
                                        toastr.error(response.message, "Ocurrio un problema");
                                    }
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
                        // toastr.warning("Complete el formulario", "Advertencia");
                    }
                });
            }
        });
    }

    return {
        init: function () {
            form = document.querySelector('#form_media_register');
            submitButton = document.getElementById('submit_media_register');
            _handleForm();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTMediaSignUp.init();
});
