"use strict";

var KTElectionsList = function () {

    var table = document.getElementById('kt_table_elections');
    var datatable;

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
                {data: 'code', name: "code"},
                {data: 'name', name: "name"},
                {data: 'type', name: "type"},
                {data: 'election_date', name: "election_date"},
                {data: 'status', name: "status"},
                {data: 'created_at', name: "created_at"},
                {data: null, responsivePriority: -1},
            ],

            // Order settings
            order: [
                [6, 'desc']
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
                        return `<div class="d-flex align-items-center">
                                <a class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url('/storage${full.logo_image}');"></span>
                                </a>
                                <div class="ms-5">
                                    <a class="text-gray-700 fs-6 fw-bold mb-1">${data}</a>
                                    <div class="text-muted fs-7 fw-bold">${ moment(full.election_date).format('YYYY')}</div>
                                </div>
                            </div>`;
                    },
                },
                {
                    targets: 3,
                    orderable: true,
                    searchable: true,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        return `<span>${data}</span>`;
                    },
                },
                {
                    targets: 4,
                    orderable: true,
                    searchable: true,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        return `<span>${data}</span>`;
                    },
                },
                {
                    targets: 5,
                    searchable: false,
                    orderable: true,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        var status = {
                            'draft': {'title': 'Borrador', 'class': 'badge-info'},
                            'active': {'title': 'Activo', 'class': 'badge-success'},
                            'unpublished': {'title': 'Despublicado', 'class': 'badge-danger'},
                            'finished': {'title': 'Finalizado', 'class': 'badge-info'},
                            'archived': {'title': 'Archivado', 'class': 'badge-danger'},
                            'canceled': {'title': 'Cancelado', 'class': 'badge-danger'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return `<span class="badge ${status[data].class} fs-8 fw-bold px-4 py-2">${status[data].title}</span>`;
                    },
                },
                {
                    targets: 6,
                    orderable: true,
                    searchable: true,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        return moment(data).format('DD/MM/YYYY hh:mm A');
                    },
                },
                {
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    className: 'text-end',
                    render: function (data, type, full, meta) {
                        var toEditUrl = "/admin/elecciones/" + full.id + "/editar";
                        var toDetailUrl = "/admin/elecciones/" + full.id + "/detalle";
                        return `<a href="${toDetailUrl}" class="btn btn-sm btn-icon btn-secondary me-2" title="Ver más">
                                    <i class="ki-outline ki-arrow-right text-gray-600 fs-2"></i>
                                </a>
                                <a href="${toEditUrl}" class="btn btn-sm btn-icon btn-secondary" title="Editar">
                                    <i class="ki-outline ki-pencil text-gray-600 fs-2"></i>
                                </a>`;
                    },
                },
            ],
        });

        $('#kt_search').on('click', function (e) {
            e.preventDefault();
            var params = {};
            $('.datatable-input').each(function () {
                var i = $(this).data('col-index');
                if (params[i]) {
                    params[i] += '|' + $(this).val();
                } else {
                    params[i] = $(this).val();
                }
            });
            $.each(params, function (i, val) {
                datatable.column(i).search(val ? val : '', false, false);
            });

            let search = $("input[name='dt_search_input']").val();
            datatable.search(search ? search : '', false, false);

            datatable.table().draw();
        });

        $('#kt_reset').on('click', function (e) {
            e.preventDefault();

            $("input[name='dt_search_input']").val('')

            $('.datatable-input').each(function () {
                $(this).val('');
                datatable.column($(this).data('col-index')).search('', false, false);
            });

            datatable.table().draw();
        });
    }

    return {
        init: function () {
            if (!table) {
                return;
            }
            initTable();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTElectionsList.init();
});
