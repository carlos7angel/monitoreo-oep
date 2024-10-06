"use strict";

var KTFormsList = function () {

    var table = document.getElementById('kt_table_forms');
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
                {data: 'unique_code', name: "unique_code"},
                {data: 'name', name: "name"},
                {data: 'active', name: "active"},
                {data: 'updated_at', name: "updated_at"},
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
                        return `<span class="text-gray-800 text-hover-primary-x fs-5 fw-bold">${data}</span>`;
                    },
                },
                {
                    targets: 3,
                    searchable: false,
                    orderable: true,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        var status = {
                            '1': {'title': 'Activo', 'class': 'badge-light-success'},
                            '0': {'title': 'Inactivo', 'class': 'badge-light-danger'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return `<span class="badge ${status[data].class} fs-8 fw-bold">${status[data].title}</span>`;
                    },
                },
                {
                    targets: 4,
                    orderable: true,
                    searchable: true,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        return moment(data).format('DD/MM/YYYY HH:mm');
                    },
                },
                {
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    className: 'text-end',
                    render: function (data, type, full, meta) {
                        var toDetailUrl = "/admin/formularios/" + full.id + "/";
                        var toBuilderUrl = "/admin/formularios/" + full.id + "/constructor";
                        return `<a href="${toBuilderUrl}" class="btn btn-sm btn-icon btn-secondary"><i class="las la-edit fs-2"></i></a>`;
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

        // $('#kt_reset').on('click', function (e) {
        //     e.preventDefault();
        //     $('.datatable-input').each(function () {
        //         $(this).val('');
        //         datatable.column($(this).data('col-index')).search('', false, false);
        //     });
        //     datatable.table().draw();
        // });
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
    KTFormsList.init();
});
