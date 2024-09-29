"use strict";

var KTMediaList = function () {

    var table = document.getElementById('kt_table_media_profiles');
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
                {data: 'email', name: "name"},
                {data: 'type', name: "active"},
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
                        let media_logo = '/storage'+ full.logo;
                        return `<div class="d-flex align-items-center">
                                    <a class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(${media_logo});"></span>
                                    </a>
                                    <div class="ms-3">
                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-1">${data}</div>
                                        <div class="text-muted fs-7">${full.business_name}</div>
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
                        return `<span>${data}<span>`;
                    },
                },
                {
                    targets: 3,
                    searchable: false,
                    orderable: false,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        let types = JSON.parse(data);
                        let text = ``;
                        types.forEach((el) => {
                            text = text + `<div class="badge badge-secondary py-2 px-4 me-2">${el}</div>`
                        });
                        return `${text}`;
                    },
                },
                {
                    targets: 4,
                    orderable: true,
                    searchable: true,
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        //return `<span class="text-gray-900">${data}<span>`;
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
                            'active': {'title': 'Activo', 'class': 'badge-success'},
                            'archived': {'title': 'Archivado', 'class': 'badge-secondary'},
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
                        let url = `/admin/medios/${full.id}/detalle`;
                        return `<a href="${url}" class="btn btn-sm btn-icon btn-secondary me-2" title="Ver más">
                                    <i class="ki-outline ki-arrow-right fs-2"></i>
                                </a>`;
                    },
                },
            ],
        });

        $('#kt_search').on('click', function (e) {
            e.preventDefault();

            // if($('#kt_advanced_search_form').hasClass('show')) {
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
            // } else {
                let search = $("input[name='dt_search_input']").val();
                datatable.search(search ? search : '', false, false);
            // }
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
            initFormsTable();

        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTMediaList.init();
});
