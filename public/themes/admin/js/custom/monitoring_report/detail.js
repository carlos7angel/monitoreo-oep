"use strict";

var KTMonitoringReportList = function () {

    var blockUI;

    var modalDetailsEl;
    var modalDetails;
    var modalDetailsContent;

    var submitButtonStatus;
    var cancelButtonStatus;
    var validator;
    var formStatus;

    var modalEl;
    var modal;
    var modalContent;

    var _initStatusForm = function () {

        validator = FormValidation.formValidation(
            formStatus,
            {
                fields: {
                    monitoring_report_observations: {
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

        submitButtonStatus.addEventListener('click', function (e) {
            e.preventDefault();

            blockUI = new KTBlockUI(document.querySelector('#kt_form_update_status_monitoring_status'));

            if (validator) {
                validator.validate().then(function (status) {

                    if (status === 'Valid') {
                        submitButtonStatus.setAttribute('data-kt-indicator', 'on');
                        submitButtonStatus.disabled = true;

                        var formData = new FormData($(formStatus)[0]);
                        $.ajax({
                            type: 'POST',
                            url: formStatus.action,
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
                                        text: "Actualización satisfactoria.",
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
                                submitButtonStatus.removeAttribute('data-kt-indicator');
                                submitButtonStatus.disabled = false;

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

        cancelButtonStatus.addEventListener('click', function (e) {
            e.preventDefault();
            modal.hide();
        });
    }

    var _handleUpdateStatusModal = function () {

        $(document).on('click', '.kt_change_monitoring_report_status', function (e) {
            e.preventDefault();
            formStatus.reset();
            validator.resetForm(true);
            var new_status = $(this).data('new-status');
            var new_status_label = $(this).data('new-status-label');
            $('input[name="monitoring_report_status"]').val(new_status);
            $('input[name="readonly_monitoring_report_status"]').val(new_status_label);
            modal.show();
        });

    }


    var _initMonitoringFiles = function () {

        $('#kt_content').find('.kt_media_files').each(function (index, el) {

            var inputFile = $(this);

            var inputDefault = inputFile.parent().children('.file_default');

            var defaultFiles = [];
            if(inputDefault.length) {
                defaultFiles.push({
                    name: inputDefault.data('name'),
                    size: inputDefault.data('size'),
                    type: inputDefault.data('mimetype'),
                    file: inputDefault.data('path'),
                });
            }

            inputFile.fileuploader({
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

        });
    }

    return {
        init: function () {

            // Status
            formStatus = document.querySelector('#kt_form_update_status_monitoring_status');
            submitButtonStatus = document.getElementById('kt_button_update_status_submit');
            cancelButtonStatus = document.getElementById('kt_button_update_status_cancel');
            _initStatusForm();

            modalEl = document.querySelector('#kt_modal_update_monitoring_report_status');
            if (modalEl) {
                modal = new bootstrap.Modal(modalEl);
                _handleUpdateStatusModal();
            }

            _initMonitoringFiles();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTMonitoringReportList.init();
});
