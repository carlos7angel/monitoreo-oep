"use strict";

var KTAccreditationList = function () {

    var table = document.getElementById('kt_table_accreditations');
    var datatable;

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
                {data: 'code', name: "code"},
                {data: 'election_name', name: "elections.name"},
                {data: 'election_start_date_media_registration', name: "elections.start_date_media_registration"},
                {data: 'status', name: "status"},
                {data: 'submitted_at', name: "submitted_at"},
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
                    orderable: false,
                    searchable: false,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        return `<span>${data}</span>`;
                    },
                },
                {
                    targets: 2,
                    orderable: true,
                    searchable: true,
                    render: function (data, type, full, meta) {

                        let logo = '/storage/' + full.election_logo_image;
                        return `<div class="d-flex align-items-center">
                                    <a class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(${logo});"></span>
                                    </a>
                                    <div class="ms-3">
                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">${data}</div>
                                        <div class="text-muted fs-7">${full.election_code}</div>
                                    </div>
                                </div>`;
                    },
                },
                {
                    targets: 3,
                    orderable: true,
                    searchable: false,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        //return moment(data).format('DD/MM/YYYY HH:mm');
                        return `<span class="fs-7 pe-2">Del</span>
                                <div class="badge badge-secondary py-2 px-4">${moment(full.election_start_date_media_registration).format('DD/MM/YYYY')}</div>
                                <span class="fs-7 px-2">al</span>
                                <div class="badge badge-secondary py-2 px-4">${moment(full.election_end_date_media_registration).format('DD/MM/YYYY')}</div>`;
                    },
                },
                {
                    targets: 4,
                    searchable: false,
                    orderable: true,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        var status = {
                            'new': {'title': 'En progreso', 'class': 'badge-info'},
                            'observed': {'title': 'Observado', 'class': 'badge-warning'},
                            'rejected': {'title': 'Rechazado', 'class': 'badge-danger'},
                            'accredited': {'title': 'Acreditado', 'class': 'badge-success'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return `<span class="badge ${status[data].class} fs-8 fw-bold py-1 px-2">${status[data].title}</span>`;
                    },
                },
                {
                    targets: 5,
                    orderable: true,
                    searchable: false,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        //return moment(data).format('DD/MM/YYYY HH:mm');
                        return `<span class="text-gray-700">${data}</span>`;
                    },
                },
                {
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    className: 'text-end',
                    render: function (data, type, full, meta) {
                        switch (full.status) {
                            case 'new':
                            case 'accredited':
                            case 'archived':
                            case 'rejected':
                                var toUrl = "/medios/admin/acreditaciones/detalle/" + full.id;
                                return `<a href="${toUrl}" class="btn btn-sm btn-icon btn-secondary"><i class="ki-outline ki-eye fs-2"></i></a>`;
                                break;
                            case 'observed':
                                var toDetailUrl = "/medios/admin/acreditaciones/detalle/" + full.id;
                                var toEditUrl = "/medios/admin/acreditaciones/editar/" + full.id;
                                return `<a href="${toDetailUrl}" class="btn btn-sm btn-icon btn-secondary"><i class="ki-outline ki-eye fs-2"></i></a>
                                        <a href="${toEditUrl}" class="btn btn-sm btn-icon btn-secondary"><i class="ki-outline ki-pencil fs-2"></i></a>`;
                                break;
                            default:
                                return `-`;
                        }
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
            e.preventDefault();
            $("input[name='dt_search_input']").val('')
            datatable.search('', false, false);
            datatable.table().draw();
        });
    }

    return {
        init: function () {
            if (!table) {
                return;
            }
            initFormsTable();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTAccreditationList.init();
});
