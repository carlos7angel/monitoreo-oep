"use strict";

var KTAnalysisReportList = function () {

    var table = document.getElementById('kt_table_analysis_reports');
    var datatable;
    // Modal
    var modalEl;
    var modal;
    var modalContent;

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
                {data: 'election_name', name: "elections.name"},
                {data: 'media_name', name: "monitoring_items.other_media"},
                {data: 'place', name: "place"},
                {data: 'status', name: "status"},
                {data: 'activity_date', name: "analysis_report_status_activity.registered_at"},
                // {data: 'activity_user', name: "users.name"},
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
                    className: 'pe-0',
                    render: function (data, type, full, meta) {
                        return `<span>${data}</span>`;
                    },
                },
                {
                    targets: 2,
                    orderable: true,
                    searchable: false,
                    render: function (data, type, full, meta) {

                        return `<div class="d-flex align-items-center">
                                <div class="ms-0">
                                    <a class="text-gray-700 fs-6 fw-bold mb-1">${data}</a>
                                    <div class="text-muted fs-7 fw-bold">${full.election_code}</div>
                                </div>
                            </div>`;
                    },
                },
                {
                    targets: 3,
                    orderable: true,
                    searchable: false,
                    className: 'pe-0',
                    render: function (data, type, full, meta) {
                        var content = '';
                        if (full.media_registered == 1) {
                            content = `<div class="d-flex align-items-center">
                                    <div class="ms-0">
                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">${data}</div>
                                        <div class="text-muted fs-7"></div>
                                    </div>
                                </div>`;
                        } else if (full.media_registered == 0) {
                            content = `<div class="d-flex align-items-center">
                                    <div class="ms-0">
                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">${data}</div>
                                        <div class="text-muted fs-7"><i>Medio no registrado</i></div>
                                    </div>
                                </div>`
                        }
                        return content;
                    },
                },
                {
                    targets: 4,
                    orderable: true,
                    searchable: false,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        var status = {
                            'IN_ANALYST': {'title': 'Comisión de Análisis', 'class': 'badge-secondary'},
                            'IN_SECRETARIAT': {'title': 'Secretaría de Cámara', 'class': 'badge-secondary'},
                            'IN_PLENARY': {'title': 'Sala Plena', 'class': 'badge-secondary'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return `<span class="badge ${status[data].class} fs-8 fw-bold px-4 py-2">${status[data].title}</span>`;
                    },
                },
                {
                    targets: 5,
                    orderable: true,
                    searchable: false,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        var status = {
                            'NEW': {'title': 'Nuevo', 'class': 'badge-info'},
                            'REJECTED': {'title': 'Rechazado', 'class': 'badge-danger'},
                            'UNTREATED': {'title': 'No Tratado', 'class': 'badge-primary'},
                            'IN_TREATMENT': {'title': 'En Tratamiento', 'class': 'badge-primary'},
                            'COMPLEMENTARY_REPORT': {'title': 'Informe Complementario', 'class': 'badge-primary'},
                            'UNTREATED_PLENARY': {'title': 'No Tratado', 'class': 'badge-primary'},
                            'IN_TREATMENT_PLENARY': {'title': 'En Tratamiento', 'class': 'badge-primary'},
                            'COMPLEMENTARY_REPORT_PLENARY': {'title': 'Informe Complementario', 'class': 'badge-primary'},
                            'FINALIZED': {'title': 'Con Resolución Final', 'class': 'badge-success'},
                            'ARCHIVED': {'title': 'Archivado', 'class': 'badge-danger'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return `<span class="badge ${status[data].class} fs-8 fw-bold px-4 py-2">${status[data].title}</span>`;
                    },
                },
                {
                    targets: 6,
                    orderable: false,
                    searchable: false,
                    className: 'text-center pe-0',
                    render: function (data, type, full, meta) {
                        return `<div class="ms-0">
                                    <a class="text-gray-700 fs-6 fw-bold mb-1">${full.activity_user}</a>
                                    <div class="text-muted fs-7 fw-bold">${moment(data).format('DD/MM/YYYY hh:mm A')}</div>
                                </div>`;
                    },
                },
                // {
                //     targets: 6,
                //     orderable: true,
                //     searchable: true,
                //     className: 'dt-center pe-0',
                //     render: function (data, type, full, meta) {
                //         if (data !== null && data !== '') {
                //             return `<span>${data}</span>`;
                //         }
                //         return `-`;
                //     },
                // },
                {
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    className: 'text-end',
                    render: function (data, type, full, meta) {
                        let toDetailUrl = "/admin/monitoreo/analisis/" + full.id + "/detalle";
                        return `<a href="${toDetailUrl}" class="btn btn-sm btn-icon btn-secondary me-2" title="Ver más"><i class="las la-eye fs-2"></i></a>`;
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

            // Modal
            modalEl = document.querySelector('#kt_modal_select_election');
            if (!modalEl) { return; }
            modal = new bootstrap.Modal(modalEl);
            modalContent = document.querySelector('#kt_modal_elections_search_content');

        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTAnalysisReportList.init();
});
