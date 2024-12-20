@extends('vendor@template::admin.layouts.master', ['page' => 'monitoring_report_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">REPORTE DE MONITOREO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="{{ route('oep_admin_index') }}" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Reporte de Monitoreo</li>
            <li class="breadcrumb-item text-gray-500">Detalle</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">

                <div>
                    @switch($monitoring_report->status)
                        @case('SUBMITTED')
                            @if(auth()->user()->hasRole('analyst'))
                            <div class="mb-5">
                                <button type="button" data-url="{{ route('oep_admin_analysis_report_create', ['id' => $monitoring_report->id]) }}" class="kt_btn_analysis_report_create btn btn-primary w-100 mb-3 fs-8">
                                    <i class="ki-outline ki-document fs-3 me-1"></i>Crear Informe de Análisis
                                </button>
                                <button type="button" data-new-status="REJECTED" data-new-status-label="RECHAZADO" class="kt_change_monitoring_report_status btn btn-light-danger w-100 fs-8">
                                    <i class="ki-outline ki-archive fs-3 me-1"></i>Rechazar Reporte
                                </button>
                            </div>
                            @endif
                        @break
                    @endswitch
                </div>

                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">
                        <div class="d-flex flex-column py-5">
                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL PROCESO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Proceso Electoral:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $monitoring_report->election->name }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Código:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $monitoring_report->election->code }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Categoría:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $monitoring_report->election->type }}</div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha del Proceso:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $monitoring_report->election->election_date }}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Sidebar-->

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <div class="card card-flush mb-6 mb-xl-9">
                    <div class="card-header mt-6">
                        <div class="card-title flex-column">
                            <h2 class="mb-1 text-uppercase">Reporte de Monitoreo</h2>
                            {{--<div class="fs-6 fw-semibold text-muted">Registros reportados</div>--}}
                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    <div class="card-body p-9 pt-4">

                        <h6 class="mb-5 fw-bolder text-gray-600 text-hover-primary">DATOS GENERALES</h6>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Tipo de operación:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">Documento de Reporte de Monitoreo</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Nro Documento:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $monitoring_report->code }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Estado:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">
                                @switch($monitoring_report->status)
                                    @case('NEW')
                                    <span class="badge badge-info">Nuevo</span>
                                    @break

                                    @case('SUBMITTED')
                                    <span class="badge badge-info">Nuevo</span>
                                    @break

                                    @case('IN_PROGRESS')
                                    <span class="badge badge-success">En progreso</span>
                                    @break

                                    @case('REJECTED')
                                    <span class="badge badge-danger">Rechazado</span>
                                    @break

                                    @case('FINISHED')
                                    <span class="badge badge-info">Finalizado</span>
                                    @break

                                    @case('ARCHIVED')
                                    <span class="badge badge-danger">Archivado</span>
                                    @break

                                @endswitch
                                </p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        @if($monitoring_report->status !== 'NEW' && $monitoring_report->status !== 'ARCHIVED')
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Fecha de envío:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $monitoring_report->submitted_at}}</p>
                            </div>
                        </div>
                        <div class="separator separator-dashed border-muted"></div>
                        @else
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Fecha de creación:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $monitoring_report->created_at }}</p>
                            </div>
                        </div>
                        <div class="separator separator-dashed border-muted"></div>
                        @endif

                        <h2 class="mt-12 mb-12 text-uppercase">Ficha de Registro de Monitoreo</h2>

                        <div class="d-flex flex-aligns-center mb-5">
                            <img alt="" class="w-30px me-3" src="{{ asset('themes/common/media/svg/files/pdf.svg') }}">
                            <div class="ms-1 fw-semibold">
                                <a href="{{ route('oep_admin_media_monitoring_generate_pdf', ['id' => $monitoring_report->monitoringItem->id]) }}" target="_blank" rel="noopener" class="fs-6 text-hover-primary__ fw-bold">Descargar</a>
                            </div>
                        </div>

                        @php
                            [$form, $fields] = app(\App\Containers\CoreMonitoring\FormBuilder\Actions\GetFieldsFormByTypeAction::class)->run($monitoring_report->monitoringItem->media_type, $monitoring_report->election);
                            $monitoring = $monitoring_report->monitoringItem;
                        @endphp

                        @include('frontend@oepAdministrator::monitoring.partials.detailMonitoringItem')

                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>

    </div>
@endsection

@section('modals')
    <div class="modal fade" id="kt_modal_update_monitoring_report_status" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form id="kt_form_update_status_monitoring_status" class="form" method="post" autocomplete="off"
                          action="{{ route('oep_admin_monitoring_report_change_status', ['id' => $monitoring_report->id]) }}">
                        <div class="mb-10 text-center">
                            <h1 class="mb-3">Reporte de Monitoreo</h1>
                            <div class="text-muted fw-semibold fs-5">Actualizar el estado</div>
                        </div>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Cambiar estado a:</span>
                            </label>
                            <input type="text" class="form-control form-check-solid" name="readonly_monitoring_report_status" value="" readonly disabled />
                            <input type="hidden" name="monitoring_report_status" value="">
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Comentarios/Observaciones:</label>
                            <textarea class="form-control" rows="6" name="monitoring_report_observations" placeholder=""></textarea>
                        </div>
                        <div class="text-center">
                            <button type="button" id="kt_button_update_status_cancel" class="btn btn-light btn-sm me-3">Cancelar</button>
                            <button type="submit" id="kt_button_update_status_submit" class="btn btn-primary btn-sm">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css') }}" media="all" rel="stylesheet">
    <style>
        #kt_content .fileuploader {
            padding: 16px;
            padding-top: 0;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/admin/js/custom/monitoring_report/detail.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/monitoring_report/detail-monitoring_files.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/analysis_report/monitoring-detail.js') }}"></script>
@endsection