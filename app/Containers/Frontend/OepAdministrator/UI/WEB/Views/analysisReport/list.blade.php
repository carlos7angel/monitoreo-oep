@extends('vendor@template::admin.layouts.master', ['page' => 'analysis_report_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">Informes de Análisis</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Informes</li>
            <li class="breadcrumb-item text-gray-500">Listado</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card mb-7">
            <div class="card-body p-5">
                <div class="d-flex align-items-center">
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" class="form-control form-control-sm form-control-solid ps-10" name="dt_search_input" value="" placeholder="Buscador" />
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" id="kt_search" class="btn btn-sm btn-secondary me-2">Buscar</button>
                        <button type="button" id="kt_reset" class="btn btn-sm btn-light-secondary me-5">Limpiar</button>
                        <a href="javascript:void(0)" id="kt_advanced_search" class="btn btn-link fs-7 link-info fw-bold" data-bs-toggle="collapse" data-bs-target="#kt_advanced_search_form">Búsqueda avanzada</a>
                    </div>
                </div>

                <div class="collapse" id="kt_advanced_search_form">
                    <div class="separator separator-dashed mt-5 mb-4"></div>
                    <div class="row g-8">
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">ID Documento</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="1" name="kt_search_code" />
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Proceso Electoral</label>
                            <select class="form-select form-select-solid datatable-input" data-col-index="2" name="kt_search_election" data-control="select2" data-placeholder="Seleccionar" data-hide-search="false">
                                <option value=""></option>
                                @foreach($elections as $election)
                                    <option value="{{ $election->id }}">{{ $election->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Estado</label>
                            <select class="form-select form-select-solid datatable-input" data-col-index="5" name="kt_search_status" data-control="select2" data-placeholder="Seleccionar" data-hide-search="true">
                                <option value=""></option>
                                <option value="NEW">Nuevos</option>
                                <option value="REJECTED">Rechazado</option>
                                <option value="UNTREATED">No Tratado</option>
                                <option value="IN_TREATMENT">En Tratamiento</option>
                                <option value="COMPLEMENTARY_REPORT">Con Informe Complementario</option>
                                <option value="UNTREATED_PLENARY">No Tratado (Sala Plena)</option>
                                <option value="IN_TREATMENT_PLENARY">En Tratamiento (Sala Plena)</option>
                                <option value="COMPLEMENTARY_REPORT_PLENARY">Informe Complementario (Sala Plena)</option>
                                <option value="SECOND_INSTANCE_RESOLUTION">Con Resolución en 2da Instancia</option>
                                <option value="FINALIZED">Con Resolución Final</option>
                                <option value="ARCHIVED">Archivado</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    LISTADO
                </div>
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_analysis_reports"
                       data-url="{{ route('oep_admin_analysis_report_list_json_dt') }}">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-70px">Nro Documento</th>
                        <th class="min-w-200px">Proceso Electoral</th>
                        <th class="min-w-10px">Medio de Comunicación</th>
                        <th class="text-center min-w-70px">Ubicación</th>
                        <th class="text-center min-w-70px">Estado</th>
                        <th class="text-center min-w-70px">Último Registro</th>
                        <th class="text-end min-w-70px">Opciones</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('styles')
    <link href="{{ asset('themes/common/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/analysis_report/list.js') }}"></script>
@endsection