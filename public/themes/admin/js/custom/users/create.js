"use strict";

var KTUserCreate = function () {

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
                    user_name: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                        }
                    },
                    user_email: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: 'Ingrese un correo electrónico válido',
                            },
                        }
                    },
                    user_password: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                            stringLength: {
                                min: 8,
                                message: 'El campo no debe tener menos de 8 caracteres'
                            }
                        }
                    },
                    user_type: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                        }
                    },
                    user_department: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
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

        $('input[name="user_role"]').on('change', function (e) {
            e.preventDefault();
            var el = $(this).val();
            if (el === 'plenary') {
                $('#kt_type_select_for_user_admin').removeClass('d-block').addClass('d-none');
                validator.disableValidator('user_type');
                validator.disableValidator('user_department');
            } else {
                $('#kt_type_select_for_user_admin').removeClass('d-none').addClass('d-block');
                validator.enableValidator('user_type');
            }
        });

        $('select[name="user_type"]').on('change', function (e) {
            e.preventDefault();
            var el = $(this).val();
            if (el === 'TED') {
                $('#kt_department_select_for_user_admin').removeClass('d-none').addClass('d-block');
                validator.enableValidator('user_department');
            }
            if (el === 'TSE') {
                $('#kt_department_select_for_user_admin').removeClass('d-block').addClass('d-none');
                validator.disableValidator('user_department');
            }
        });
    }

    return {
        init: function () {
            modalEl = document.querySelector('#kt_modal_new_user');
            if (!modalEl) {
                return;
            }
            modal = new bootstrap.Modal(modalEl);

            form = document.querySelector('#kt_form_new_user');
            modalButton = document.getElementById('kt_button_new_user');
            submitButton = document.getElementById('kt_button_new_user_submit');
            cancelButton = document.getElementById('kt_button_new_user_cancel');

            initForm();

        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTUserCreate.init();
});
