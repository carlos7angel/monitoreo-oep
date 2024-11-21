"use strict";

// Class definition
var KTAccreditationElection = function () {

    // Modal
    var modalEl;
    var modal;
    var modalContent;

    var modalButton;
    // var submitButton;

    // Elements
    var stepper;
    var form;
    var formSubmitButton;
    var formContinueButton;
    var formPreviousButton;

    // Variables
    var stepperObj;
    var validations = [];

    var file_input_element = [];

    // Private Functions
    var initStepper = function () {
        // Initialize Stepper
        stepperObj = new KTStepper(stepper);

        // Stepper change event
        stepperObj.on('kt.stepper.changed', function (stepper) {

            if (stepperObj.getCurrentStepIndex() === 4) {
                formSubmitButton.classList.remove('d-none');
                formSubmitButton.classList.add('d-inline-block');
                formContinueButton.classList.add('d-none');
            } else if (stepperObj.getCurrentStepIndex() === 5) {
                formSubmitButton.classList.add('d-none');
                formContinueButton.classList.add('d-none');
                formPreviousButton.classList.add('d-none');
            } else {
                formSubmitButton.classList.remove('d-inline-block');
                formSubmitButton.classList.remove('d-none');
                formContinueButton.classList.remove('d-none');
            }
        });

        // Validation before going to next page
        stepperObj.on('kt.stepper.next', function (stepper) {

            // Validate form before change stepper step
            var validator = validations[stepper.getCurrentStepIndex() - 1]; // get validator for current step

            if (validator) {
                validator.validate().then(function (status) {

                    if (status === 'Valid') {

                        if ((stepper.getCurrentStepIndex() - 1) === 2) {

                            let formData = new FormData($(form)[0]);
                            var blockUI = new KTBlockUI(document.querySelector('#kt_app_content'));

                            $.ajax({
                                type: 'POST',
                                url: form.action,
                                contentType: false,
                                processData: false,
                                data: formData,
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                beforeSend: function (response) {
                                    blockUI.block();
                                    formContinueButton.disabled = true;
                                    formContinueButton.setAttribute('data-kt-indicator', 'on');
                                },
                                success: function (response) {
                                    if (response.success) {

                                        window.location = response.redirect;

                                    } else {
                                        toastr.error(response.message, "Ocurrio un problema");
                                    }
                                },
                                complete: function (response) {
                                    formContinueButton.removeAttribute('data-kt-indicator');
                                    formContinueButton.disabled = false;
                                    blockUI.release();
                                    blockUI.destroy();
                                },
                                error: function (response) {
                                    toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                                }
                            });

                        } else {
                            stepper.goNext();
                            KTUtil.scrollTop();
                        }
                    } else {
                        Swal.fire({
                            text: "Debe completar los campos requeridos antes de continuar",
                            icon: "warning",
                            buttonsStyling: false,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        }).then(function () {
                            // KTUtil.scrollTop();
                        });
                    }
                });
            } else {
                stepper.goNext();

                KTUtil.scrollTop();
            }
        });

        // Prev event
        stepperObj.on('kt.stepper.previous', function (stepper) {

            stepper.goPrevious();
            KTUtil.scrollTop();
        });
    }

    var handleForm = function() {

        formSubmitButton.addEventListener('click', function (e) {
            // SUBMIT
            // Validate form before change stepper step
            var validator = validations[3]; // get validator for last form
            validator.validate().then(function (status) {

                if (status === 'Valid') {
                    // Prevent default button action
                    e.preventDefault();

                    Swal.fire({
                        text: "¿Esta seguro de enviar la información?",
                        icon: "info",
                        buttonsStyling: false,
                        confirmButtonText: "Aceptar",
                        allowOutsideClick: false,
                        cancelButtonText: 'Cancelar',
                        showCancelButton: true,
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-secondary"
                        }
                    }).then(function(result){

                        if (result.isConfirmed) {
                            // Submit form
                            let formData = new FormData($(form)[0]);
                            var blockUI = new KTBlockUI(document.querySelector('#kt_app_content'));

                            $.ajax({
                                type: 'POST',
                                url: form.action,
                                contentType: false,
                                processData: false,
                                data: formData,
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                beforeSend: function (response) {
                                    blockUI.block();
                                    formSubmitButton.disabled = true;
                                    formSubmitButton.setAttribute('data-kt-indicator', 'on');
                                },
                                success: function (response) {
                                    if (response.success) {
                                        stepperObj.goNext();

                                        $('.kt_data_accreditation_code').html(response.accreditation.code);
                                        $('.kt_data_accreditation_status').html('ENVIADO');
                                        $('.kt_data_accreditation_submitted_at').html(response.accreditation.submitted_at);

                                    } else {
                                        toastr.error(response.message, "Ocurrio un problema");
                                    }
                                },
                                complete: function (response) {
                                    formSubmitButton.removeAttribute('data-kt-indicator');
                                    formSubmitButton.disabled = false;
                                    blockUI.release();
                                    blockUI.destroy();
                                },
                                error: function (response) {
                                    toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                                }
                            });
                        }

                    });

                } else {
                    Swal.fire({
                        text: "Debe completar el formulario",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Acptar",
                        customClass: {
                            confirmButton: "btn btn-light"
                        }
                    }).then(function () {
                        // KTUtil.scrollTop();
                    });
                }
            });

        });

    }

    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Step 1
        validations.push(FormValidation.formValidation(
            form,
            {
                fields: {
                    'media_election': {
                        validators: {
                            notEmpty: {
                                message: 'Seleccione el proceso electoral'
                            }
                        }
                    }
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
        ));

        // Step 2
        validations.push(FormValidation.formValidation(
            form,
            {
                fields: {
                    'media_file_request_letter': {
                        validators: {
                            notEmpty: {
                                message: 'La Carta de Solicitud es obligatorio'
                            }
                        }
                    },
                    'media_file_affidavit': {
                        validators: {
                            notEmpty: {
                                message: 'La Declaración Jurada es obligatorio'
                            }
                        }
                    },
                    // 'media_file_pricing_list': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'El Tarifario es obligatorio'
                    //         }
                    //     }
                    // }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        ));

        // Step 3
        validations.push(FormValidation.formValidation(
            form,
            {
                fields: {
                    // 'media_file_pricing_list': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'El Tarifario es obligatorio'
                    //         }
                    //     }
                    // }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        ));

        // Step 4
        validations.push(FormValidation.formValidation(
            form,
            {
                fields: {

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        ));

    }

    var _initFiles = function () {

        _initFileUploader('#kt_media_file_request_letter', function () {
            return extractFileData('input[name="file_request_letter"]')
        });

        _initFileUploader('#kt_media_file_affidavit', function () {
            return extractFileData('input[name="file_affidavit"]')
        });

    };

    var extractFileData = function (element) {

        var files = [];
        var defaultFile = document.querySelector(element);
        if (defaultFile) {
            files.push({
                name: defaultFile.dataset.name,
                size: defaultFile.dataset.size,
                type: defaultFile.dataset.mimetype,
                file: defaultFile.dataset.path,
            });
        }
        return files;
    }

    var _initFileUploader = function (identifier, getDefaultFiles) {

        var inputFile = $(identifier);
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
            files: getDefaultFiles(),

        });



    };

    var _handleModalSelectElection = function () {

        modalButton.addEventListener('click', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var blockUI = new KTBlockUI(document.querySelector('#kt_app_content'));
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                data: {},
                beforeSend: function (response) {
                    blockUI.block();
                },
                success: function (response) {
                    if (! response.success) {
                        $(modalContent).html('');
                        toastr.warning('Hubo un problema al cargar la información.');
                        return;
                    }
                    $(modalContent).html(response.render);
                    modal.show();
                },
                complete: function (response) {
                    blockUI.release();
                    blockUI.destroy();
                },
                error: function (response) {
                    toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                }
            });


            // form.reset();
            // validator.resetForm(true);
            // modal.show();
        });


        $(document).on('click', '.kt_btn_select_election', function (e) {
            e.preventDefault();
            var el = $(this).parent().parent();
            var blockUI = new KTBlockUI(document.querySelector('#kt_modal_users_search_handler'));
            blockUI.block();

            var election_id = el.data('id');
            var election_name = el.data('name');
            var election_date = el.data('date');
            var election_type = el.data('category');
            // var election_logo = el.data('logo');
            var election_end_date = el.data('end-date');

            $('input[name="media_election"]').val(election_id);
            validations[0].revalidateField('media_election');

            // if (election_logo) {
            //     $('.kt_data_election_logo').attr('src', election_logo);
            //     $('.kt_data_election_logo').removeClass('d-none').addClass('d-block');
            // }
            $('.kt_data_election_name').text(election_name);
            $('.kt_data_election_type').text(election_type);
            $('.kt_data_election_date').text(election_date);
            $('.kt_data_election_end_date').text(election_end_date);

            modal.hide();
            blockUI.release();
            blockUI.destroy();
        });

    };

    // RATES
    var _initRateFiles = function () {
        _initFileUploader('.kt_media_file_rates', function () {
            return [];
        });
    };

    return {
        // Public Functions
        init: function () {

            // Elements
            stepper = document.querySelector('#kt_create_accreditation_stepper');
            if ( !stepper ) { return; }

            // Modal
            modalEl = document.querySelector('#kt_modal_elections_search');
            if (!modalEl) { return; }
            modal = new bootstrap.Modal(modalEl);

            form = stepper.querySelector('#kt_election_accreditation_form');
            formSubmitButton = stepper.querySelector('[data-kt-stepper-action="submit"]');
            formPreviousButton = stepper.querySelector('[data-kt-stepper-action="previous"]');
            formContinueButton = stepper.querySelector('[data-kt-stepper-action="next"]');

            modalButton = document.getElementById('kt_button_select_election_new');
            modalContent = document.querySelector('#kt_modal_elections_search_content');

            initStepper();

            initValidation();
            handleForm();
            _handleModalSelectElection();
            _initFiles();
            //_initFilesReadOnly();

            _initRateFiles();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccreditationElection.init();
});