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

            if (stepperObj.getCurrentStepIndex() === 3) { //4
                formSubmitButton.classList.remove('d-none');
                formSubmitButton.classList.add('d-inline-block');
                formContinueButton.classList.add('d-none');
            } else if (stepperObj.getCurrentStepIndex() === 4) { //5
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
                        stepper.goNext();
                        KTUtil.scrollTop();
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
            // Validate form before change stepper step
            var validator = validations[2]; // 3 get validator for last form

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
                    'media_file_pricing_list': {
                        validators: {
                            notEmpty: {
                                message: 'El Tarifario es obligatorio'
                            }
                        }
                    }
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

        _initFileUploader('#kt_media_file_pricing_list', function () {
            return extractFileData('input[name="file_pricing_list"]')
        });

    };

    var _initFilesReadOnly = function () {

        var default_legal_attorney = extractFileData('input[name="file_ro_legal_attorney"]');
        _initFileUploaderNoInput('#kt_media_file_ro_legal_attorney', default_legal_attorney);

        var default_rep_document = extractFileData('input[name="file_ro_rep_document"]');
        _initFileUploaderNoInput('#kt_media_file_ro_rep_document', default_rep_document);

        var default_nit = extractFileData('input[name="file_ro_nit"]');
        _initFileUploaderNoInput('#kt_media_file_ro_nit', default_nit);

        _initFileUploaderNoInput('#kt_media_file_ro_request_letter', []);
        _initFileUploaderNoInput('#kt_media_file_ro_affidavit', []);
        _initFileUploaderNoInput('#kt_media_file_ro_pricing_list', []);

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

            onSelect: function(item, listEl, parentEl, newInputEl, inputEl) {

                if ($(inputEl).attr('id') === 'kt_media_file_request_letter') {
                    var tmppath = URL.createObjectURL(document.getElementById("kt_media_file_request_letter").files[0]);
                    var api =  file_input_element['#kt_media_file_ro_request_letter'];
                    api.reset();
                    api.append({
                        name: item.name,
                        size: item.size,
                        type: item.type,
                        file: tmppath,
                    });
                }

                if ($(inputEl).attr('id') === 'kt_media_file_affidavit') {
                    var tmppath2 = URL.createObjectURL(document.getElementById("kt_media_file_affidavit").files[0]);
                    var api2 =  file_input_element['#kt_media_file_ro_affidavit'];
                    api2.reset();
                    api2.append({
                        name: item.name,
                        size: item.size,
                        type: item.type,
                        file: tmppath2,
                    });
                    // console.log(api);
                }

                if ($(inputEl).attr('id') === 'kt_media_file_pricing_list') {
                    var tmppath3 = URL.createObjectURL(document.getElementById("kt_media_file_pricing_list").files[0]);
                    var api3 =  file_input_element['#kt_media_file_ro_pricing_list'];
                    api3.reset();
                    api3.append({
                        name: item.name,
                        size: item.size,
                        type: item.type,
                        file: tmppath3,
                    });
                }

            },

        });



    };

    var _initFileUploaderNoInput = function (identifier, defaultFiles) {

        var inputFile = $(identifier);
        if (!inputFile.length) {
            return;
        }

        var fileInputUploader = inputFile.fileuploader({
            limit: 1,
            fileMaxSize: 1,
            addMore: true,
            enableApi: true,
            changeInput: '<div></div>',
            // changeInput: '<div class="fileuploader-input">' +
            //     '<div class="fileuploader-input-inner">' +
            //     '<div>${captions.feedback} ${captions.or} <span>${captions.button}</span></div>' +
            //     '</div>' +
            //     '</div>',
            theme: 'dropin',
            //extensions: '.pdf',
            thumbnails: {
                // thumbnails list HTML {String, Function}
                // example: '<ul></ul>'
                // example: function(options) { return '<ul></ul>'; }
                box: '<div class="fileuploader-items">' +
                    '<ul class="fileuploader-items-list"></ul>' +
                    '</div>',

                // append thumbnails list to selector {null, String, jQuery Object}
                // example: 'body'
                boxAppendTo: null,

                // thumbnails for the choosen files {String, Function}
                // example: '<li>${name}</li>'
                // example: function(item) { return '<li>' + item.name + '</li>'; }
                item: '<li class="fileuploader-item">' +
                    '<div class="columns">' +
                    '<div class="column-thumbnail">${image}<span class="fileuploader-action-popup"></span></div>' +
                    '<div class="column-title">' +
                    '<div title="${name}">${name}</div>' +
                    '<span>${size2}</span>' +
                    '</div>' +
                    '<div class="column-actions">' +
                    '' +
                    '</div>' +
                    '</div>' +
                    '<div class="progress-bar2">${progressBar}<span></span></div>' +
                    '</li>',

                // thumbnails for the preloaded files {String, Function}
                // example: '<li>${name}</li>'
                // example: function(item) { return '<li>' + item.name + '</li>'; }
                item2: '<li class="fileuploader-item">' +
                    '<div class="columns">' +
                    '<div class="column-thumbnail">${image}<span class="fileuploader-action-popup"></span></div>' +
                    '<div class="column-title">' +
                    '<a href="${file}" target="_blank">' +
                    '<div title="${name}">${name}</div>' +
                    '<span>${size2}</span>' +
                    '</a>' +
                    '</div>' +
                    '<div class="column-actions">' +
                    '' +
                    '' +
                    '</div>' +
                    '</div>' +
                    '</li>',

                // thumbnails selectors
                _selectors: {
                    list: '.fileuploader-items-list',
                    item: '.fileuploader-item',
                    start: '.fileuploader-action-start',
                    retry: '.fileuploader-action-retry',
                    remove: '.fileuploader-action-remove',
                    sorter: '.fileuploader-action-sort',
                    popup: '.fileuploader-popup-preview',
                    popup_open: '.fileuploader-action-popup'
                },

                // insert the thumbnail's item at the begining of the list? {Boolean}
                itemPrepend: false,

                // show a confirmation dialog by removing a file? {Boolean}
                // it will not be shown in upload mode by canceling an upload
                // you can call your own dialog box using dialogs option
                removeConfirmation: true,

                // render the image thumbnail? {Boolean}
                // if false, it will generate an icon(you can also hide it with css)
                // if false, you can use the API method item.renderThumbnail() to render it (check thumbnails example)
                startImageRenderer: true,

                // render the images synchron {Boolean}
                // used to improve the browser speed
                synchronImages: true,

                // read image using URL createObjectURL method {Boolean}
                // if false, it will use readAsDataURL
                useObjectUrl: false,

                // render the image in a canvas element {Boolean, Object}
                // if true, it will generate an image with the css sizes from the parent element of ${image}
                // you can also set the width and the height in the object {width: 96, height: 96}
                canvasImage: true,

                // render thumbnail for video files? {Boolean}
                videoThumbnail: false,

                // fix exif orientation {Boolean}
                exif: true,

                // Callback fired before adding the list element
                beforeShow: null,

                // Callback fired after adding the item element
                onItemShow: null,

                // Callback fired after removing the item element
                // by default we will animate the removing action
                onItemRemove: function(html) {
                    html.children().animate({'opacity': 0}, 200, function() {
                        setTimeout(function() {
                            html.slideUp(200, function() {
                                html.remove();
                            });
                        }, 100);
                    });
                },

                // Callback fired after the item image was loaded or a image file is invalid
                // default - null
                onImageLoaded: function(item, listEl, parentEl, newInputEl, inputEl) {
                    // invalid image?
                    if (item.image.hasClass('fileuploader-no-thumbnail')) {
                        // callback goes here
                    }

                    // check image size and ratio?
                    if (item.reader.node && item.reader.width > 1920 && item.reader.height > 1080 && item.reader.ratio != '16:9') {
                        // callback goes here
                    }
                },

                // item popup preview {Object}
                popup: {
                    // popup append to container {String, jQuery Object}
                    container: 'body',

                    // enable arrows {Boolean}
                    arrows: true,

                    // loop the arrows {Boolean}
                    loop: true,

                    // popup HTML {String, Function}
                    template: function(data) { return '<div class="fileuploader-popup-preview">' +
                        '<button class="fileuploader-popup-move" data-action="prev"><i class="fileuploader-icon-arrow-left"></i></button>' +
                        '<div class="fileuploader-popup-node ${format}">' +
                        '${reader.node}' +
                        '</div>' +
                        '<div class="fileuploader-popup-content">' +
                        '<div class="fileuploader-popup-footer">' +
                        '<ul class="fileuploader-popup-tools">' +
                        (data.format == 'image' && data.reader.node && data.editor ? (data.editor.cropper ? '<li>' +
                                '<button data-action="crop">' +
                                '<i class="fileuploader-icon-crop"></i> ${captions.crop}' +
                                '</button>' +
                                '</li>' : '') +
                                (data.editor.rotate ? '<li>' +
                                    '<button data-action="rotate-cw">' +
                                    '<i class="fileuploader-icon-rotate"></i> ${captions.rotate}' +
                                    '</button>' +
                                    '</li>' : '') : ''
                        ) +
                        (data.format == 'image' ?
                                '<li class="fileuploader-popup-zoomer">' +
                                '<button data-action="zoom-out">&minus;</button>' +
                                '<input type="range" min="0" max="100">' +
                                '<button data-action="zoom-in">&plus;</button>' +
                                '<span></span> ' +
                                '</li>' : ''
                        ) +
                        (data.data.url ? '<li>' +
                                '<a href="'+ data.file +'" data-action target="_blank">' +
                                '<i class="fileuploader-icon-external"></i> ${captions.open}' +
                                '</a>' +
                                '</li>' : ''
                        ) +
                        '</ul>' +
                        '</div>' +
                        '<div class="fileuploader-popup-header">' +
                        '<ul class="fileuploader-popup-meta">' +
                        '<li>' +
                        '<span>${captions.name}:</span>' +
                        '<h5>${name}</h5>' +
                        '</li>' +
                        '<li>' +
                        '<span>${captions.type}:</span>' +
                        '<h5>${extension.toUpperCase()}</h5>' +
                        '</li>' +
                        '<li>' +
                        '<span>${captions.size}:</span>' +
                        '<h5>${size2}</h5>' +
                        '</li>' +
                        (data.reader && data.reader.width ? '<li>' +
                                '<span>${captions.dimensions}:</span>' +
                                '<h5>${reader.width}x${reader.height}px</h5>' +
                                '</li>' : ''
                        ) +
                        (data.reader && data.reader.duration ? '<li>' +
                                '<span>${captions.duration}:</span>' +
                                '<h5>${reader.duration2}</h5>' +
                                '</li>' : ''
                        ) +
                        '</ul>' +
                        '<div class="fileuploader-popup-info"></div>' +
                        '<ul class="fileuploader-popup-buttons">' +
                        '<li><button class="fileuploader-popup-button" data-action="cancel">${captions.cancel}</a></li>' +
                        (data.editor ? '<li><button class="fileuploader-popup-button button-success" data-action="save">${captions.confirm}</button></li>' : ''
                        ) +
                        '</ul>' +
                        '</div>' +
                        '</div>' +
                        '<button class="fileuploader-popup-move" data-action="next"><i class="fileuploader-icon-arrow-right"></i></button>' +
                        '</div>'; },

                    // Callback fired after creating the popup
                    // we will trigger by default buttons with custom actions
                    onShow: function(item) {
                        item.popup.html.on('click', '[data-action="remove"]', function(e) {
                            item.popup.close();
                            item.remove();
                        }).on('click', '[data-action="cancel"]', function(e) {
                            item.popup.close();
                        }).on('click', '[data-action="save"]', function(e) {
                            if (item.editor)
                                item.editor.save();
                            if (item.popup.close)
                                item.popup.close();
                        });
                    },

                    // Callback fired after closing the popup
                    onHide: null
                }
            },
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
            files: defaultFiles,
        });

        file_input_element[identifier] = $.fileuploader.getInstance(fileInputUploader);
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

    }

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
            _initFilesReadOnly();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccreditationElection.init();
});