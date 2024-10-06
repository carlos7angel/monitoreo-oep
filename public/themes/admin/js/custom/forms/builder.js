"use strict";

var KTFormsCreate = function () {

    var modalEl;
    var modal;
    var modalContent;
    var modalButton;
    var submitButton;
    var cancelButton;
    var validator;
    var form;
    var optionsRepeater;

    var _validationForm = function () {

        console.log('FORM INIT');

        validator = FormValidation.formValidation(
            document.querySelector('#kt_modal_form_field_edit_form'),
            {
                fields: {
                    // placeholder: {
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

        // modalButton.addEventListener('click', function (e) {
        //     e.preventDefault();
        //     form.reset();
        //     validator.resetForm(true);
        //     modal.show();
        // });

    }

    var _handleForm = function () {

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
                                    toastr.success(response.message, "Se actualizó satisfactoriamente");
                                    $('.kt_wrapper_form_builder_fields').html(response.render);
                                    modal.hide();
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

    var _handleCreateField = function () {

        $(document).on('click', '.kt_add_field_type_form', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var field_type_id = $(this).data('field-id');
            var blockUI = new KTBlockUI(document.querySelector('#kt_content'));
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: {
                    field_type_id: field_type_id
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function (response) {
                    blockUI.block();
                },
                success: function (response) {
                    if (response.success) {
                        $('.kt_wrapper_form_builder_fields').html(response.render);
                    } else {
                        toastr.error(response.message, "Ocurrio un problema");
                    }
                },
                complete: function (response) {
                    blockUI.release();
                    blockUI.destroy();
                },
                error: function (response) {
                    toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                }
            });
        });

    }

    var _handleEditField = function () {

        $(document).on('click', '.kt_edit_form_field', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var blockUI = new KTBlockUI(document.querySelector('#kt_content'));
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                data: {},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function (response) {
                    blockUI.block();
                },
                success: function (response) {
                    if (response.success) {

                        $(modalContent).html(response.render).promise().done(function () {

                            form = document.querySelector('#kt_modal_form_field_edit_form');
                            submitButton = document.getElementById('kt_modal_form_field_submit');
                            cancelButton = document.getElementById('kt_modal_form_field_cancel');
                            if(validator) {
                                console.log('DESTROY');
                                validator.destroy();
                            }
                            _validationForm();
                            _handleForm();
                            _initOptionsRepeater();
                            _handleSelectField();
                        });


                        modal.show();

                    } else {
                        toastr.error(response.message, "Ocurrio un problema");
                    }
                },
                complete: function (response) {
                    blockUI.release();
                    blockUI.destroy();
                },
                error: function (response) {
                    toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                }
            });
        });

    }

    var _initOptionsRepeater = function () {

        var el = $('#repeater_options');

        if(el.length) {
            optionsRepeater = el.repeater({
                initEmpty: false,
                defaultValues: {
                },
                show: function () {
                    $(this).slideDown();
                    // Init select2 on new repeated items
                    // initConditionsSelect2();
                },
                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

            // ASSIGN
            var default_options = document.querySelector('input[name="repeater_options_default"]');
            if (default_options && default_options.value) {
                var options =JSON.parse(default_options.value);
                var options_list = [];
                if(Array.isArray(options)) {
                    options.forEach(elem => {
                        options_list.push({
                            'field_option': elem.text,
                            'field_value': elem.value,
                            'field_selected': elem.selected ? [1] : null,
                        });
                    });
                    optionsRepeater.setList(options_list);
                }
            }
        }
    }

    var _handleSelectField = function () {

        var el = $('select[name="optionstype"]');

        if(el.length) {

            el.on('change', function() {

                var value = $(this).val();

                if (value === 'catalog') {
                    $('#kt_field_source_catalog').removeClass('d-none').addClass('d-block');
                    $('#kt_field_source_custom').removeClass('d-block').addClass('d-none');
                } else {
                    $('#kt_field_source_custom').removeClass('d-none').addClass('d-block');
                    $('#kt_field_source_catalog').removeClass('d-block').addClass('d-none');
                }

            });

        }

    }

    var _handleDeleteField = function () {

        $(document).on('click', '.kt_delete_form_field', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var blockUI = new KTBlockUI(document.querySelector('#kt_content'));
            $.ajax({
                type: 'POSt',
                url: url,
                dataType: 'json',
                data: {},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function (response) {
                    blockUI.block();
                },
                success: function (response) {
                    if (response.success) {
                        // toastr.success(response.message, "Se actualizó satisfactoriamente");
                        $('.kt_wrapper_form_builder_fields').html(response.render);
                    } else {
                        toastr.error(response.message, "Ocurrio un problema");
                    }
                },
                complete: function (response) {
                    blockUI.release();
                    blockUI.destroy();
                },
                error: function (response) {
                    toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                }
            });
        });

    }

    return {
        init: function () {
            modalEl = document.querySelector('#kt_modal_edit_form_field');
            if (!modalEl) {
                return;
            }
            modal = new bootstrap.Modal(modalEl);
            modalContent = document.querySelector('#kt_content_form_field_form');

            // form = document.querySelector('#kt_modal_form_field_edit_form');
            // modalButton = document.getElementById('kt_button_new_form');
            // submitButton = document.getElementById('kt_modal_form_field_submit');
            // cancelButton = document.getElementById('kt_modal_form_field_cancel');
            // initForm();

            _handleCreateField();

            _handleEditField();

            _handleDeleteField();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormsCreate.init();
});
