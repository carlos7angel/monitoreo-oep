@extends('vendor@template::admin.layouts.master', ['page' => 'monitoring_dashboard'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">REPORTE DE MONITOREO Y ANÁLISIS</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="{{ route('oep_admin_index') }}" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Monitoreo</li>
            <li class="breadcrumb-item text-gray-500">Reporte</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <select class="form-select form-select-solid" name="select_election" id="kt_select_election" data-control="select2" data-placeholder="" data-hide-search="true">
            @foreach($elections as $election)
                <option value="{{ $election->id }}" {{ $selected_election == $election->id ? 'selected' : '' }}>{{ $election->name }}</option>
            @endforeach
        </select>
    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="row gx-5 gx-xl-10">
            <div class="col-xl-4 mb-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px bg-primary">

                        <div class="pt-7 w-100">
                            <div class="d-flex flex-stack">
                                <h3 class="m-0 text-white fw-bold fs-3">Reportes de Monitoreo</h3>
                                <div class="ms-1"></div>
                            </div>
                            <div class="d-flex text-center flex-column text-white pt-8">
                                <span class="fw-semibold fs-7">Total</span>
                                <span class="fw-bold fs-2x pt-1" id="kt_data_monitoring_media_total">0</span>
                            </div>
                        </div>

                        <div class="card-toolbar pt-5">
                        </div>
                    </div>
                    <div class="card-body mt-n20">
                        <div class="mt-n20 position-relative">
                            <div class="row g-3 g-lg-6">
                                <div class="col-6">
                                    <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                        <div class="symbol symbol-30px me-5 mb-8">
                                            <span class="symbol-label">
                                                <i class="ki-duotone ki-technology fs-3x text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <div class="m-0">
                                            <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1" id="kt_data_monitoring_media_tv">0</span>
                                            <span class="text-gray-500 fw-semibold fs-6">M.Televisivos</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                        <div class="symbol symbol-30px me-5 mb-8">
                                            <span class="symbol-label">
                                                <i class="ki-duotone ki-electricity fs-3x text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <div class="m-0">
                                            <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1" id="kt_data_monitoring_media_radio">0</span>
                                            <span class="text-gray-500 fw-semibold fs-6">M.Radiales</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                        <div class="symbol symbol-30px me-5 mb-8">
                                            <span class="symbol-label">
                                                <i class="ki-duotone ki-book-open fs-3x text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <div class="m-0">
                                            <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1" id="kt_data_monitoring_media_print">0</span>
                                            <span class="text-gray-500 fw-semibold fs-6">M.Impresos</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                        <div class="symbol symbol-30px me-5 mb-8">
                                            <span class="symbol-label">
                                                <i class="ki-outline ki-facebook fs-3x text-primary"></i>
                                            </span>
                                        </div>
                                        <div class="m-0">
                                            <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1" id="kt_data_monitoring_media_digital">0</span>
                                            <span class="text-gray-500 fw-semibold fs-6">M.Dig. & RRSS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 mb-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header pt-7">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Reportes de Monitoreo</span>
                            <span class="text-gray-500 pt-2 fw-semibold fs-6">Registrados a nivel de TED o TSE</span>
                        </h3>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div id="kt_chart_monitoring_by_scope" class="min-h-auto ps-4 pe-6 mb-3 h-350px"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-5 gx-xl-10">
            <div class="col-xl-12 mb-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header pt-7">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Informes de Análisis</span>
                            <span class="text-gray-500 pt-2 fw-semibold fs-6">Registros por estado</span>
                        </h3>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div id="kt_chart_analysis_by_status" class="min-h-auto ps-4 pe-6 mb-3 h-350px"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-10">
            </div>
        </div>

        <div class="row gx-5 gx-xl-10">
            <div class="col-xl-9 mb-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header pt-7">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Reportes de Monitoreo</span>
                            <span class="text-gray-500 pt-2 fw-semibold fs-6">Registros por usuario</span>
                        </h3>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    <div class="card-body pt-5">

                        <div class="table-responsive">
                            <table class="table align-middle gs-0 gy-4" aria-describedby="table"><!-- //NOSONAR -->
                                <thead>
                                <tr class="fw-bold text-muted bg-light">
                                    <th class="ps-4 min-w-300px rounded-start">Usuario</th>
                                    <th class="min-w-125px">Nivel</th>
                                    <th class="min-w-200px text-end rounded-end pe-4">Total registros</th>
                                </tr>
                                </thead>
                                <tbody id="monitoring_table_users">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-10">
            </div>
        </div>

    </div>
@endsection

@section('modals')

@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>


    <script src="{{ asset('themes/admin/js/custom/monitoring/dashboard-chart-monitoring-scope.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/monitoring/dashboard-data-monitoring-summary.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/monitoring/dashboard-chart-monitoring-status.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/monitoring/dashboard-data-monitoring-users.js') }}"></script>
@endsection