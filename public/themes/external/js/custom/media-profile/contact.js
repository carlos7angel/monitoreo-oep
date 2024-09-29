"use strict";

var KTFormGeneral = function () {

    var submitButton;
    var cancelButton;
    var validator;
    var form;
    var blockUI;
    var rrssRepeater;

    var _handleForm = function () {

        validator = FormValidation.formValidation(
            form,
            {
                // locale: 'es_ES',
                // localization: FormValidation.locales.es_ES,
                fields: {
                    media_legal_address: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            },
                        }
                    },
                    media_contact_full_name: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },
                    media_cellphone: {
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

    const initFormRepeater = () => {
        rrssRepeater = $('#kt_media_profile_add_rrss_options').repeater({
            initEmpty: false,

            defaultValues: {

            },

            show: function () {
                $(this).slideDown();

                // Init select2 on new repeated items
                initConditionsSelect2();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }

    const initConditionsSelect2 = () => {
        // Tnit new repeating condition types
        const allConditionTypes = document.querySelectorAll('[data-kt-media-profile-add-product="media_rrss_option"]');
        allConditionTypes.forEach(type => {
            if ($(type).hasClass("select2-hidden-accessible")) {
                return;
            } else {
                $(type).select2({
                    minimumResultsForSearch: -1
                });
            }
        });
    }

    const initRRSS = () => {
        var defaultRRSS = document.querySelector('input[name="media_rrss"]');
        if (defaultRRSS) {
            var rrss =JSON.parse(defaultRRSS.value);
            var rrss_list = [];
            if(Array.isArray(rrss)) {
                rrss.forEach(elem => {
                    rrss_list.push({
                        'media_rrss_option': elem.rrss_option,
                        'media_rrss_value': elem.rrss_value,
                    });
                });
                rrssRepeater.setList(rrss_list);
            }
        }
    }

    return {
        init: function () {
            blockUI = new KTBlockUI(document.querySelector('#kt_app_content'));
            form = document.querySelector('#kt_media_profile_contact_data_form');
            submitButton = document.getElementById('kt_media_profile_submit');
            cancelButton = document.getElementById('kt_media_profile_cancel');
            _handleForm();

            initFormRepeater();
            initConditionsSelect2();

            initRRSS();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormGeneral.init();
});
