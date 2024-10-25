"use strict";

var KTMediaList = function () {

    var table = document.getElementById('kt_table_media_profiles');
    var datatable;
    var modalEl;
    var modal;
    var modalContent;

    var initFormsTable = function () {

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
                {data: 'email', name: "name"},
                {data: 'media_type_television', name: "media_type_television"},
                {data: 'registration_date', name: "registration_date"},
                {data: 'status', name: "status"},
                {data: null, responsivePriority: -1},
            ],

            // Order settings
            order: [
                [4, 'desc']
            ],

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
                        return `<div>
                                    <a class="text-gray-700 fs-6 fw-bold mb-1">${data}</a>
                                    <div class="text-muted fs-7 fw-bold">${full.business_name}</div>
                                </div>`;
                    },
                },
                {
                    targets: 2,
                    orderable: true,
                    searchable: true,
                    className: 'pe-0',
                    render: function (data, type, full, meta) {
                        return `${data}`;
                    },
                },
                {
                    targets: 3,
                    searchable: false,
                    orderable: false,
                    className: 'pe-0',
                    render: function (data, type, full, meta) {

                        console.log()

                        let types = ``;
                        if (full.media_type_television) {
                            types = types + `<div class="badge badge-secondary py-2 px-4 me-2">Televisivo</div>`
                        }
                        if (full.media_type_radio) {
                            types = types + `<div class="badge badge-secondary py-2 px-4 me-2">Radial</div>`
                        }
                        if (full.media_type_print) {
                            types = types + `<div class="badge badge-secondary py-2 px-4 me-2">Impreso</div>`
                        }
                        if (full.media_type_digital) {
                            types = types + `<div class="badge badge-secondary py-2 px-4 me-2">Digital</div>`
                        }
                        // let types = JSON.parse(data);
                        // let text = ``;
                        // types.forEach((el) => {
                        //     text = text + `<div class="badge badge-secondary py-2 px-4 me-2">${el}</div>`
                        // });
                        return `<span>${types}</span>`;
                    },
                },
                {
                    targets: 4,
                    orderable: true,
                    searchable: true,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        return `<span class="text-gray-900">${moment(data).format('DD/MM/YYYY HH:mm')}</span>`;
                    },
                },
                {
                    targets: 5,
                    orderable: false,
                    searchable: false,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        var status = {
                            'created': {'title': 'Nuevo', 'class': 'badge-info'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return `<span class="badge ${status[data].class} py-2 px-4">${status[data].title}</span>`;
                    },
                },
                {
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    className: 'text-end',
                    render: function (data, type, full, meta) {
                        return `<button class="btn btn-sm btn-icon btn-secondary kt_btn_media_profile_detail me-2" data-id="${full.id}" title="Detalle">
                                    <i class="las la-eye fs-2"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-secondary kt_btn_media_profile_enable me-0" data-id="${full.id}" title="Habilitar">
                                    <i class="ki-outline ki-rocket fs-2"></i>
                                </button>`;

                        // <button className="btn btn-sm btn-icon btn-secondary kt_btn_media_profile_archive me-2"
                        //         data-id="${full.id}" title="Archivar">
                        //     <i className="ki-outline ki-archive fs-2"></i>
                        // </button>
                    },
                },
            ],
        });

        $('#kt_search').on('click', function (e) {
            e.preventDefault();
            let search = $("input[name='dt_search_input']").val();
            datatable.search(search ? search : '', false, false);
            datatable.table().draw();
        });

        $('#kt_reset').on('click', function (e) {
            // single search
            e.preventDefault();
            $("input[name='dt_search_input']").val('')
            datatable.search('', false, false);
            datatable.table().draw();
        });
    }

    var _handleModalDetail = function () {

        $(document).on('click', '.kt_btn_media_profile_detail', function (e) {
            e.preventDefault();
            var url = '/admin/medios/nuevos/detalle/' + $(this).data('id');
            var blockUI = new KTBlockUI(document.querySelector('#kt_content'));
            $.ajax({
                type: 'GET',
                url: url,
                // contentType: false,
                // processData: false,
                // data: {},
                dataType: 'json',
                data: {},
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function (response) {
                    blockUI.block();
                },
                success: function (response) {
                    if (! response.success) {
                        $(modalContent).html('');
                        toastr.warning('Hubo un problema al cargar la información.');
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
        });

        // document.querySelector('.kt_btn_media_profile_detail').addEventListener('click', function (e) {
        //     e.preventDefault();
        //     alert(this);
        // });
    }

    var _handleEnableAccount = function () {

        $(document).on('click', '.kt_btn_media_profile_enable', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Activar cuenta',
                text: "Se procederá a activar la cuenta para el medio de comunicación. Se le enviará un correo con las credenciales para el acceso a la plataforma.",
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

                    var url = '/admin/medios/habilitar/'+id;

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
                                text: "Registro satisfactorio, se envió un correo al usuario.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false,
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function(result){
                                if (result.isConfirmed) {
                                    window.location.reload(); // = response.redirect;
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

    return {
        init: function () {
            if (!table) {
                return;
            }
            initFormsTable();

            modalEl = document.querySelector('#kt_modal_media_profile_detail');
            if (!modalEl) {
                return;
            }
            modal = new bootstrap.Modal(modalEl);

            modalContent = document.querySelector('#kt_media_profile_detail_content');

            _handleModalDetail();

            _handleEnableAccount();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTMediaList.init();
});
