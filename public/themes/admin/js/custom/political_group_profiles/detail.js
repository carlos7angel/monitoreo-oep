"use strict";

var KTPPDetail = function () {

    var table = document.getElementById('kt_table_elections_by_political_group');
    var datatable;
    var modalEl;
    var modal;
    var submitButton;
    var cancelButton;
    var validator;
    var form;
    var blockUI;

    var initTable = function () {

        datatable = $(table).DataTable({
            //responsive: true,
            responsive: {
                details: {
                    type: 'column'
                }
            },
            // responsivePriority: 1,
            // dom: `<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            filter: true,
            sortable: true,
            pagingType: 'full_numbers',
            pagination: true,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 10,
            layout: {
                scroll: false,
                footer: false,
            },
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No existen registros.",
                "sInfo": "Mostrando _START_ al _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar: ",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            ajax: {
                url: table.dataset.url,
                type: 'POST',
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {},
            },
            data: null,
            columns: [
                {data: 'id', name: "id"},
                {data: 'name', name: "name"},
                {data: 'election_date', name: "election_date"},
                {data: 'status', name: "status"},
                {data: 'count', name: "count"},
                {data: null, responsivePriority: -1},
            ],

            // Order settings
            // order: [
            //     [4, 'desc']
            // ],

            columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    searchable: false,
                    className: 'dtr-control',
                    render: function (data, type, full, meta) {
                        return ``;
                    },
                },
                {
                    targets: 1,
                    orderable: true,
                    searchable: true,
                    className: 'pe-0',
                    render: function (data, type, full, meta) {
                        let logo = '/storage/' + full.logo_image;
                        return `<div class="d-flex align-items-center">
                                    <a class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(${logo});"></span>
                                    </a>
                                    <div class="ms-3">
                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">${data}</div>
                                        <div class="text-muted fs-7">${full.code}</div>
                                    </div>
                                </div>`;
                    },
                },
                {
                    targets: 2,
                    orderable: true,
                    searchable: true,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        return `<span>${moment(data).format('DD/MM/YYYY')}</span>`;
                    },
                },
                {
                    targets: 3,
                    searchable: false,
                    orderable: true,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        var status = {
                            'active': {'title': 'Activo', 'class': 'badge-info'},
                            'finished': {'title': 'Finalizado', 'class': 'badge-info'},
                            'unpublished': {'title': 'Despublicado', 'class': 'badge-info'},
                            'archived': {'title': 'Archivado', 'class': 'badge-danger'},
                            'canceled': {'title': 'Cancelado', 'class': 'badge-danger'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return `<span class="badge ${status[data].class} py-2 px-4">${status[data].title}</span>`;
                    },
                },
                {
                    targets: 4,
                    orderable: true,
                    searchable: true,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        return `<span>0</span>`;
                        // return `<span>${data}</span>`;

                    },
                },
                {
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    className: 'text-end',
                    render: function (data, type, full, meta) {
                        let url = '/admin/partidos-politicos/' + full.id + '/eleccion/' + full.id + '/material'
                        return `<a href="${url}" class="btn btn-sm btn-icon btn-secondary">
                                    <i class="las la-arrow-circle-right fs-2"></i>
                                </a>`;
                    },
                },
            ],
        });

    }

    var _handleEnableAccount = function () {

        $(document).on('click', '.kt_enable_pp_account', function (e) {
            e.preventDefault();
            var url = $(this).data('url');

            Swal.fire({
                title: 'Activar cuenta',
                text: "Se procederá a habilitar la cuenta para este registro. Se le enviará un correo con las credenciales para el acceso a la plataforma.",
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Habilitar",
                cancelButtonText: 'Salir',
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-secondary'
                }
            }).then(function(result){
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'POST',
                        url: url,
                        // contentType: false,
                        // processData: false,
                        // data: {},
                        dataType: 'json',
                        data: {},
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        beforeSend: function (response) {
                            // blockUI.block();
                        },
                        success: function (response) {
                            if (! response.success) {
                                toastr.warning('Hubo un problema al procesar la solicitud.');
                                return;
                            }
                            Swal.fire({
                                title: 'Cuenta habilitada',
                                text: "Se envió un correo al usuario.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false,
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function(result){
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });

                        },
                        complete: function (response) {
                            // blockUI.release();
                            // blockUI.destroy();
                        },
                        error: function (response) {
                            toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
                        }
                    });
                }
            });

        });

    }

    var _handleRegistrationModal = function () {

        $(document).on('click', '.kt_register_election_political_group', function (e) {
            e.preventDefault();
            form.reset();
            validator.resetForm(true);
            $('select[name="election_id"]').val("").trigger('change');
            modal.show();
        });

    }

    var initForm = function () {

        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    election_id: {
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

            blockUI = new KTBlockUI(document.querySelector('#kt_wrapper_registration_pp'));

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
                                        text: "Registro satisfactorio",
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
            modal.hide();
        });
    }

    return {
        init: function () {

            _handleEnableAccount();

            if (!table) {
                return;
            }
            initTable();


            modalEl = document.querySelector('#kt_modal_registration_pp');
            if (!modalEl) { return; }
            modal = new bootstrap.Modal(modalEl);

            form = document.querySelector('#kt_registration_pp_form');
            submitButton = document.getElementById('kt_button_registration_pp_submit');
            cancelButton = document.getElementById('kt_button_registration_pp_cancel');

            initForm();

            _handleRegistrationModal();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTPPDetail.init();
});
