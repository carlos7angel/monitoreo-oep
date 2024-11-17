"use strict";

var KTFormGeneral = function () {

    var submitButton;
    var validator;
    var form;
    var blockUI;
    var typeModal;
    var table;
    var subform;
    var subValidator;
    var subSubmitButton;
    var subCancelButton;

    const checkMediaType = function () {
        return {
            validate: function (input) {
                const value = input.value;

                var numRows = $('#table_media_types').find('tbody tr:not(#empty)').length;

                if (numRows <= 0) {
                    return {
                        valid: false,
                    };
                }

                var numRowsCompleted = $('#table_media_types').find('tbody tr[data-valid="1"]').length;
                console.log("VAL:IDOS", numRowsCompleted);

                if (numRows !== numRowsCompleted ) {
                    return {
                        valid: false,
                    };
                }

                return {
                    valid: true,
                };
            },
        };
    };

    var _handleForm = function () {

        const fieldCoverage = jQuery(form.querySelector('[name="media_coverage"]'));
        const fieldScope = jQuery(form.querySelector('[name="media_scope"]'));
        const fieldScopeStates = jQuery(form.querySelector('[name="media_scope_states"]'));
        const fieldScopeState = jQuery(form.querySelector('[name="media_scope_state"]'));

        FormValidation.validators.checkMediaType = checkMediaType;

        validator = FormValidation.formValidation(
            form,
            {
                // locale: 'es_ES',
                // localization: FormValidation.locales.es_ES,
                fields: {

                    media_types: {
                        validators: {
                            checkMediaType: {
                                message: 'Debe completar la información de cada Tipo de Medio'
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

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            if (! _checkDataMediaTypeTable()) {
                toastr.warning("Debe completar la informacion de cobertura y alcance", "Advertencia");
                return;
            }

            if (validator) {
                validator.validate().then(function (status) {

                    if (status === 'Valid') {

                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;

                        // collect media_type data
                        var media_type_list = _getDataMediaType();
                        var formData = new FormData($(form)[0]);

                        var object = Object.fromEntries(formData);
                        object.media_type_list = media_type_list;
                        var json = JSON.stringify(object);

                        // formData.append("media_types_list", media_type_list);

                        $.ajax({
                            type: 'POST',
                            url: form.action,

                            //contentType: false,
                            //processData: false,
                            //data: formData,

                            dataType: "json",
                            contentType: "application/json; charset=utf-8",
                            data: json,

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


        fieldCoverage.select2().on('change.select2', function () { validator.revalidateField('media_coverage'); });
        fieldScope.select2().on('change.select2', function () { validator.revalidateField('media_scope'); });
        fieldScopeStates.select2().on('change.select2', function () { validator.revalidateField('media_scope_states[]'); });
        fieldScopeState.select2().on('change.select2', function () { validator.revalidateField('media_scope_state'); });
    }

    var _checkDataMediaTypeTable = function () {

        var table = document.getElementById('table_media_types');
        var check = true;
        const rows = table.querySelectorAll('tbody tr');
        for (let index = 0; index < rows.length; index++) {
            const row = rows[index];
            const dataType = row.getAttribute('data-type');
            const coverageText = row.querySelector('.d_coverage') ? row.querySelector('.d_coverage').textContent : '';
            if (dataType === null || dataType === '' || coverageText === null || coverageText === '') {
                check = false;
                break;
            }
        }
        return check;
    }

    var _getDataMediaType = function () {

        var table = $('#table_media_types');
        var data = [];

        table.find('tbody tr').each(function (index, el) {
            var row = $(this);

            var data_row = {
                identifier: row.attr('data-type'),
                coverage: row.children('.d_coverage').text(),
                scope: row.children('.d_scope').text(),
                departments: row.children('.d_department').attr('data-val'),
                area: row.children('.d_area').attr('data-val')
            };

            data.push(data_row);
        });
        return data;
    }

    var _handleSubform = function () {

        const fieldCoverage = jQuery(subform.querySelector('[name="media_coverage"]'));
        const fieldScope = jQuery(subform.querySelector('[name="media_scope"]'));
        const fieldScopeStates = jQuery(subform.querySelector('[name="media_scope_states"]'));
        const fieldScopeState = jQuery(subform.querySelector('[name="media_scope_state"]'));

        subValidator = FormValidation.formValidation(
            subform,
            {
                // locale: 'es_ES',
                // localization: FormValidation.locales.es_ES,
                fields: {
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
                        }
                    },

                    media_scope_state: {
                        validators: {
                            notEmpty: {
                                message: 'El campo es obligatorio'
                            }
                        }
                    },

                    media_scope_area: {
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

        subSubmitButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (subValidator) {
                subValidator.validate().then(function (status) {

                    if (status === 'Valid') {
                        subSubmitButton.setAttribute('data-kt-indicator', 'on');
                        subSubmitButton.disabled = true;

                        var formData = new FormData($(subform)[0]);
                        const data = Object.fromEntries(formData.entries());
                        data.media_scope_states = formData.getAll("media_scope_states[]");

                        console.log(data);

                        var row = table.find('tr[data-type="'+data.media_type_id+'"]');

                        console.log(row);
                        console.log(row.length);

                        if (row.length) {

                            // row.children('.d_label').text();
                            row.children('.d_coverage').text(data.media_coverage);
                            row.children('.d_scope').text(data.media_scope);
                            if (data.media_scope === 'Municipal' || data.media_scope === 'Regional' || data.media_scope === 'AIOC') {
                                row.children('.d_area').text(data.media_scope_area);
                                row.children('.d_area').attr('data-val', data.media_scope_area);
                            } else {
                                row.children('.d_area').text('-');
                                row.children('.d_area').attr('data-val', '');
                            }
                            var states = "-";
                            if (data.media_scope === 'Nacional') {
                                states = (data.media_scope_states).join(', ');
                            } else {
                                states = data.media_scope_state;
                            }
                            row.children('.d_department').attr('data-val', states);
                            row.children('.d_department').text(states);

                            row.attr('data-valid', 1);

                        }

                        subSubmitButton.removeAttribute('data-kt-indicator');
                        subSubmitButton.disabled = false;

                        typeModal.hide();
                    } else {
                        toastr.warning("Complete el formulario", "Advertencia");
                    }
                });
            }
        });

        subCancelButton.addEventListener('click', function (e) {
            e.preventDefault();
            typeModal.hide();
        });

        fieldCoverage.select2().on('change.select2', function () { subValidator.revalidateField('media_coverage'); });
        fieldScope.select2().on('change.select2', function () { subValidator.revalidateField('media_scope'); });
        fieldScopeStates.select2().on('change.select2', function () { subValidator.revalidateField('media_scope_states[]'); });
        fieldScopeState.select2().on('change.select2', function () { subValidator.revalidateField('media_scope_state'); });
    }

    var _changeScope = function() {

        $(document).on('change', 'select[name="media_scope"]', function () {
            let scope_type = $(this).val();
            _selectScope(scope_type);
        });
    };

    var _selectScope = function (scope_type) {

        if (scope_type === 'Nacional') {
            $('#kt_wrapper_media_profile_scope_national').removeClass('d-none').addClass('d-block');
            $('#kt_wrapper_media_profile_scope_state').removeClass('d-block').addClass('d-none');
            $('#kt_wrapper_media_profile_scope_area').removeClass('d-block').addClass('d-none');

            subValidator.enableValidator('media_scope_states[]');
            subValidator.disableValidator('media_scope_state');
            subValidator.disableValidator('media_scope_area');

            return;
        }

        if (scope_type === 'Departamental') {
            $('#kt_wrapper_media_profile_scope_state').removeClass('d-none').addClass('d-block');
            $('#kt_wrapper_media_profile_scope_national').removeClass('d-block').addClass('d-none');
            $('#kt_wrapper_media_profile_scope_area').removeClass('d-block').addClass('d-none');

            subValidator.enableValidator('media_scope_state');
            subValidator.disableValidator('media_scope_states[]');
            subValidator.disableValidator('media_scope_area');

            return;
        }

        if (scope_type === 'Regional') {
            $('#kt_wrapper_media_profile_scope_national').removeClass('d-block').addClass('d-none');
            $('#kt_wrapper_media_profile_scope_state').removeClass('d-none').addClass('d-block');
            $('#kt_wrapper_media_profile_scope_area').removeClass('d-none').addClass('d-block');

            subValidator.disableValidator('media_scope_states[]');
            subValidator.enableValidator('media_scope_state');
            subValidator.enableValidator('media_scope_area');

            return;
        }

        if (scope_type === 'Municipal') {
            $('#kt_wrapper_media_profile_scope_national').removeClass('d-block').addClass('d-none');
            $('#kt_wrapper_media_profile_scope_state').removeClass('d-none').addClass('d-block');
            $('#kt_wrapper_media_profile_scope_area').removeClass('d-none').addClass('d-block');

            subValidator.disableValidator('media_scope_states[]');
            subValidator.enableValidator('media_scope_state');
            subValidator.enableValidator('media_scope_area');

            return;
        }

        if (scope_type === 'AIOC') {
            $('#kt_wrapper_media_profile_scope_national').removeClass('d-block').addClass('d-none');
            $('#kt_wrapper_media_profile_scope_state').removeClass('d-none').addClass('d-block');
            $('#kt_wrapper_media_profile_scope_area').removeClass('d-none').addClass('d-block');

            subValidator.disableValidator('media_scope_states[]');
            subValidator.enableValidator('media_scope_state');
            subValidator.enableValidator('media_scope_area');

            return;
        }

        $('#kt_wrapper_media_profile_scope_national').removeClass('d-block').addClass('d-none');
        $('#kt_wrapper_media_profile_scope_state').removeClass('d-block').addClass('d-none');
        $('#kt_wrapper_media_profile_scope_area').removeClass('d-block').addClass('d-none');
        subValidator.disableValidator('media_scope_states[]');
        subValidator.disableValidator('media_scope_state');
        subValidator.disableValidator('media_scope_area');
    }

    var _initScope = function () {
        let scope_default = $(subform).find('select[name="media_scope"]').val();
        _selectScope(scope_default);
    }

    // var _handleMediaTypeModal = function () {
    //
    //     $(document).on('click', '.kt_trigger_media_type_modal', function (e) {
    //         e.preventDefault();
    //         // form.reset();
    //         // validator.resetForm(true);
    //         // var new_status = $(this).data('new-status');
    //         // var new_status_label = $(this).data('new-status-label');
    //         // $('input[name="accreditation_status"]').val(new_status);
    //         // $('input[name="readonly_accreditation_status"]').val(new_status_label);
    //         typeModal.show();
    //     });
    //
    // }

    var _handleMediaTypeCheckbox = function () {

        $(document).on('change', '.media_type_checkbox', function (e) {
            var media_status = $(this).is(':checked');
            var media_type = $(this).val();
            var media_label = $(this).data('label');

            var row = table.find('tr[data-type="'+media_type+'"]');

            if (media_status === true) {
                if (!row.length) {
                    var row_html = `<tr data-type="${media_type}" data-valid="0">
                                        <td class="text-center">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-primary kt_trigger_media_type_modal">
                                                <i class="ki-outline ki-pencil fs-2"></i>
                                            </a>
                                        </td>
                                        <td class="d_label">${media_label.toUpperCase()}</td>
                                        <td class="d_coverage"></td>
                                        <td class="d_scope"></td>
                                        <td class="d_department" data-val=""></td>
                                        <td class="d_area" data-val=""></td>
                                    </tr>`;
                    table.children('tbody').append(row_html);
                }
            } else {
                row.remove();
            }
            console.log(row.length);
        });

    }

    var _editMediaTypeRow = function () {

        $(document).on('click', '.kt_trigger_media_type_modal', function (e) {
            e.preventDefault();

            subform.reset();
            $(subform).find('select').select2({ allowClear: true });

            var row = $(this).parents('tr');
            var data_row = {
                identifier: row.attr('data-type'),
                label: row.children('.d_label').text(),
                coverage: row.children('.d_coverage').text(),
                scope: row.children('.d_scope').text(),
                departments: row.children('.d_department').attr('data-val'),
                area: row.children('.d_area').attr('data-val')
            };

            console.log("EDIT DATA", data_row);

            $(subform).find('input[name="media_type_id"]').val(data_row.identifier);
            $(subform).find('input[name="media_type_name"]').val(data_row.label.toUpperCase());

            if (data_row.coverage) {
                $(subform).find('select[name="media_coverage"]').val(data_row.coverage).trigger('change');
            }

            if (data_row.scope) {
                $(subform).find('select[name="media_scope"]').val(data_row.scope).trigger('change');
            }
            _initScope();

            if (data_row.departments) {
                var states = (data_row.departments).split(", ");
                console.log(states);
                if (data_row.scope === 'Nacional') {
                    states.forEach(function(value, key){
                        $(subform).find('#kt_media_scope_states_select > option[value="'+value+'"]').prop("selected","selected");
                    });
                    $(subform).find('#kt_media_scope_states_select').trigger('change');
                } else {
                    $(subform).find('select[name="media_scope_state"]').val(states[0]).trigger('change');
                }
            }

            if (data_row.scope === 'Municipal' || data_row.scope === 'Regional' || data_row.scope === 'AIOC') {
                if (data_row.area) {
                    $(subform).find('input[name="media_scope_area"]').val(data_row.area).trigger('change');
                }
            }

            subValidator.resetForm(true);

            typeModal.show();
        });

    }


    return {
        init: function () {
            blockUI = new KTBlockUI(document.querySelector('#kt_app_content'));
            form = document.querySelector('#kt_media_profile_category_data_form');
            submitButton = document.getElementById('kt_media_profile_submit');
            _handleForm();

            // _initScope();


            subform = document.querySelector('#kt_form_media_type');
            subSubmitButton = document.getElementById('kt_button_media_type_submit');
            subCancelButton = document.getElementById('kt_button_media_type_cancel');
            _handleMediaTypeCheckbox();
            table = $('#table_media_types');
            typeModal = new bootstrap.Modal(document.querySelector('#kt_modal_media_type'));
            //_handleMediaTypeModal();


            _handleSubform();
            _changeScope();
            _editMediaTypeRow();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormGeneral.init();
});
