"use strict";

var KTFormGeneral = function () {

    var submitButton;
    var cancelButton;
    var validator;
    var form;
    var blockUI;


    var _handleForm = function () {

        const fieldCoverage = jQuery(form.querySelector('[name="media_coverage"]'));
        const fieldScope = jQuery(form.querySelector('[name="media_scope"]'));
        const fieldScopeStates = jQuery(form.querySelector('[name="media_scope_states"]'));
        const fieldScopeState = jQuery(form.querySelector('[name="media_scope_state"]'));

        validator = FormValidation.formValidation(
            form,
            {
                // locale: 'es_ES',
                // localization: FormValidation.locales.es_ES,
                fields: {
                    'media_type[]': {
                        validators: {
                            choice: {
                                min: 1,
                                message: 'Debe seleccionar al menos una opción'
                            }
                        }
                    },
                    media_coverage: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    media_scope: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },

                    'media_scope_states[]': {
                        validators: {
                            choice: {
                                min: 2,
                                message: 'Debe seleccionar al menos 2 opciones'
                            }
                            // notEmpty: {
                            //     message: 'El campo es obligatorio'
                            // }
                        }
                    },

                    media_scope_state: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },

                    media_scope_municipality: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },

                    // media_rep_document: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'El campo es obligatorio'
                    //         }
                    //     }
                    // },
                    // media_rep_ext: {
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

        fieldCoverage.select2().on('change.select2', function () { validator.revalidateField('media_coverage'); });
        fieldScope.select2().on('change.select2', function () { validator.revalidateField('media_scope'); });
        fieldScopeStates.select2().on('change.select2', function () { validator.revalidateField('media_scope_states[]'); });
        fieldScopeState.select2().on('change.select2', function () { validator.revalidateField('media_scope_state'); });
    }

    var _changeScope = function() {

        $(document).on('change', 'select[name="media_scope"]', function () {
            let scope_type = $(this).val();
            // getPdas('select[name="pda"]', state_id);
            _selectScope(scope_type);
        });
    };

    var _selectScope = function (scope_type) {

        if (scope_type === 'Nacional') {
            $('#kt_wrapper_media_profile_scope_national').removeClass('d-none').addClass('d-block');
            $('#kt_wrapper_media_profile_scope_state').removeClass('d-block').addClass('d-none');
            $('#kt_wrapper_media_profile_scope_municipality').removeClass('d-block').addClass('d-none');

            validator.enableValidator('media_scope_states[]');
            validator.disableValidator('media_scope_state');
            validator.disableValidator('media_scope_municipality');

            return;
        }

        if (scope_type === 'Departamental') {
            $('#kt_wrapper_media_profile_scope_state').removeClass('d-none').addClass('d-block');
            $('#kt_wrapper_media_profile_scope_national').removeClass('d-block').addClass('d-none');
            $('#kt_wrapper_media_profile_scope_municipality').removeClass('d-block').addClass('d-none');

            validator.enableValidator('media_scope_state');
            validator.disableValidator('media_scope_states[]');
            validator.disableValidator('media_scope_municipality');

            return;
        }

        if (scope_type === 'Municipal') {
            $('#kt_wrapper_media_profile_scope_municipality').removeClass('d-none').addClass('d-block');
            $('#kt_wrapper_media_profile_scope_state').removeClass('d-block').addClass('d-none');
            $('#kt_wrapper_media_profile_scope_national').removeClass('d-block').addClass('d-none');

            validator.enableValidator('media_scope_municipality');
            validator.disableValidator('media_scope_state');
            validator.disableValidator('media_scope_states[]');

            return;
        }

        validator.disableValidator('media_scope_states[]');
        validator.disableValidator('media_scope_state');
        validator.disableValidator('media_scope_municipality');
    }

    var _initScope = function () {
        let scope_default = $('select[name="media_scope"]').val();
        _selectScope(scope_default);
    }

    return {
        init: function () {
            blockUI = new KTBlockUI(document.querySelector('#kt_app_content'));
            form = document.querySelector('#kt_media_profile_category_data_form');
            submitButton = document.getElementById('kt_media_profile_submit');
            cancelButton = document.getElementById('kt_media_profile_cancel');
            _handleForm();
            _changeScope();
            _initScope();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormGeneral.init();
});
