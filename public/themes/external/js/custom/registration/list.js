"use strict";

var KTRegistrationList = function () {

    var table = document.getElementById('kt_table_registrations');
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
                {data: 'name', name: "name"},
                {data: 'election_date', name: "election_date"},
                {data: 'status', name: "status"},
                {data: 'end_date_material_registration', name: "elections.end_date_material_registration"},
                {data: 'material_count', name: "material_count"},
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
                    searchable: false,
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
                    searchable: false,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        // return `<span>${data}</span>`;
                        return moment(data).format('DD/MM/YYYY');
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
                            'unpublished': {'title': 'Despublicado', 'class': 'badge-secondary'},
                            'finished': {'title': 'Finalizado', 'class': 'badge-info'},
                            'archived': {'title': 'Archivado', 'class': 'badge-danger'},
                            'canceled': {'title': 'Cancelado', 'class': 'badge-danger'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return `<span class="badge ${status[data].class} fs-8 fw-bold py-1 px-4">${status[data].title}</span>`;
                    },
                },
                {
                    targets: 4,
                    orderable: true,
                    searchable: false,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        //return moment(data).format('DD/MM/YYYY HH:mm');
                        return `<span class="fs-7 pe-2">Hasta</span>
                                <div class="badge badge-secondary py-2 px-4">${moment(data).format('DD/MM/YYYY')}</div>`;
                    },
                },
                {
                    targets: 5,
                    orderable: false,
                    searchable: false,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {

                        return `<span class="text-gray-700">${data}</span>`;
                    },
                },
                {
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    className: 'text-end',
                    render: function (data, type, full, meta) {
                        var toUrl = `/medios/admin/registros/elecciones/${full.registration_id}/material-propaganda`;
                        return `<a href="${toUrl}" class="btn btn-sm btn-icon btn-secondary"><i class="ki-outline ki-eye fs-2"></i></a>`;
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
    KTRegistrationList.init();
});
