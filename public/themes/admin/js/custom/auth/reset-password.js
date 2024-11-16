"use strict";

// Class definition
var KTResetPassword = function () {
    // Elements
    var form;
    var submitButton;
    var validator;
    var passwordMeter;

    // Handle form
    var handleValidation = function (e) {
        // Init form validation rules.
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                            stringLength: {
                                mi: 6,
                                max: 50,
                                message: 'La contrseña debe tener mínimo 6 caracteres'
                            },
                            callback: {
                                message: 'Ingrese una contraseña válida',
                                callback: function(input) {
                                    if (input.value.length > 0) {
                                        return validatePassword();
                                    }
                                }
                            }
                        }
                    },
                    'confirm_password': {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'La contraseña nueva debe ser la misma'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: false
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
                }
            }
        );

        form.querySelector('input[name="password"]').addEventListener('input', function() {
            if (this.value.length > 0) {
                validator.updateFieldStatus('password', 'NotValidated');
            }
        });
    }

    var validatePassword = function() {
        return  (passwordMeter.getScore() > 65);
    }

    var handleSubmit = function (e) {
        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            validator.revalidateField('password');

            // Validate form
            validator.validate().then(function (status) {
                if (status === 'Valid') {

                    // Get Form Data
                    var formData = new FormData($(form)[0]);

                    // Submit form - Ajax request
                    $.ajax({
                        type: 'POST',
                        url: form.action,
                        contentType: false,
                        processData: false,
                        data: formData,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        beforeSend: function (response) {
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            submitButton.disabled = true;
                        },
                        success: function (response) {
                            if (!response.success) {
                                toastr.error(response.message);
                                return;
                            }
                            toastr.success(response.message);
                            setTimeout(function(){
                                form.reset();
                                window.location = response.redirect;
                            }, 350);
                        },
                        complete: function (response) {
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                        },
                        error: function (response) {
                            toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "");
                        }
                    });

                }
            });
        });
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#kt_password_reset_form');
            submitButton = document.querySelector('#kt_password_reset_submit');
            passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));
            handleValidation();
            handleSubmit();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTResetPassword.init();
});
