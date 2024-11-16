"use strict";

// Class definition
var KTForgotPassword = function () {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleValidation = function (e) {
        // Init form validation rules.
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'email': {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: 'Ingrese un correo electrónico válido',
                            },
                            notEmpty: {
                                message: 'El correo electrónico es obligatorio'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
                }
            }
        );
    }

    var handleSubmit = function (e) {
        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

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
                            form.reset();
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

            handleValidation();

            handleSubmit();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTForgotPassword.init();
});
