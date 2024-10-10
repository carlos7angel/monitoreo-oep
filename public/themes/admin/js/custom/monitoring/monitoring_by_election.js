"use strict";

var KTMonitoringList = function () {

    var table = document.getElementById('kt_table_monitoring_by_election');
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
                {data: 'media_name', name: "media_profiles.name"},
                {data: 'media_type', name: "media_type"},
                {data: 'registered_at', name: "registered_at"},
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
                        let logo = '/storage/' + full.media_logo;
                        /*
                        <a class="symbol symbol-50px">
                            <span class="symbol-label" style="background-image:url(${logo});"></span>
                        </a>
                        */
                        return `<div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">${data}</div>
                                        <div class="text-muted fs-7">${full.media_business_name}</div>
                                    </div>
                                </div>`;
                    },
                },
                {
                    targets: 2,
                    orderable: false,
                    searchable: false,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        var status = {
                            'TV': {'title': 'M. Radiales', 'class': 'badge-secondary'},
                            'RADIO': {'title': 'M. Radiales', 'class': 'badge-secondary'},
                            'PRINT': {'title': 'M. Impresos', 'class': 'badge-secondary'},
                            'DIGITAL': {'title': 'M. Digitales', 'class': 'badge-secondary'},
                            'RRSS': {'title': 'Redes Sociales', 'class': 'badge-secondary'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return `<span class="badge ${status[data].class} py-2 px-4">${status[data].title}</span>`;
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
                    className: 'dt-center pe-0',
                    render: function (data, type, full, meta) {
                        //return moment(data).format('DD/MM/YYYY HH:mm');
                        // return `<span class="fs-7 pe-2">Del</span>
                        //         <div class="badge badge-secondary py-2 px-4">${full.start_date_media_registration}</div>
                        //         <span class="fs-7 px-2">al</span>
                        //         <div class="badge badge-secondary py-2 px-4">${full.end_date_media_registration}</div>`;
                        return data;
                    },
                },
                {
                    targets: 5,
                    searchable: false,
                    orderable: true,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        var status = {
                            'CREATED': {'title': 'Nuevo', 'class': 'badge-info'},
                            'ANALYSIS': {'title': 'En análisis', 'class': 'badge-info'},
                            'ARCHIVED': {'title': 'Archivado', 'class': 'badge-danger'},
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
                        let detailUrl = `/admin/monitoreo/procesos-electorales/${full.fid_election}/registro-monitoreo/${full.id}/detalle`;
                        let editUrl = `/admin/monitoreo/procesos-electorales/${full.fid_election}/registro-monitoreo/${full.id}/editar`;
                        return `<a href="${detailUrl}" class="btn btn-sm btn-icon btn-secondary me-2">
                                    <i class="las la-arrow-circle-right fs-2"></i>
                                </a>
                                <a href="${editUrl}" class="btn btn-sm btn-icon btn-secondary">
                                    <i class="las la-edit fs-2"></i>
                                </a>`;
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
            // $('.datatable-input').each(function () {
            //     $(this).val('');
            //     datatable.column($(this).data('col-index')).search('', false, false);
            // });
            datatable.search('', false, false);
            datatable.table().draw();
        });

        $('.kt_btn_select_status').on('click', function (e) {
            e.preventDefault();

            let status = $(this).data('status');
            $('input[name="dt_search_by_status"]').val(status);

            $('.kt_btn_select_status').removeClass('active');
            $(this).addClass('active');

            $("input[name='dt_search_input']").val('');
            datatable.column(5).search(status, false, false);
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
    KTMonitoringList.init();
});
