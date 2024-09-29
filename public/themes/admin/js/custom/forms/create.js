"use strict";

var KTFormsCreate = function () {

    var modalEl;
    var modal;
    var modalButton;
    var submitButton;
    var cancelButton;
    var validator;
    var form;

    var initForm = function () {

        validator = FormValidation.formValidation(
            form,
            {
                // locale: 'es_ES',
                // localization: FormValidation.locales.es_ES,
                fields: {
                    form_name: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                            stringLength: {
                                max: 50,
                                message: 'El campo no debe tener más de 50 caracteres'
                            }
                        }
                    },
                    form_type: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    form_code: {
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

        modalButton.addEventListener('click', function (e) {
            e.preventDefault();
            form.reset();
            validator.resetForm(true);
            modal.show();
        });

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
                                            modal.hide();
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

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();
            modal.hide();
        });
    }

    return {
        init: function () {
            modalEl = document.querySelector('#kt_modal_new_form');
            if (!modalEl) {
                return;
            }
            modal = new bootstrap.Modal(modalEl);

            form = document.querySelector('#kt_form_new_form');
            modalButton = document.getElementById('kt_button_new_form');
            submitButton = document.getElementById('kt_button_new_form_submit');
            cancelButton = document.getElementById('kt_button_new_form_cancel');

            initForm();

        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormsCreate.init();
});
