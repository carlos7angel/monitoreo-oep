@extends('vendor@template::admin.layouts.master', ['page' => 'analysis_report_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">INFORME DE ANÁLISIS</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="{{ route('oep_admin_index') }}" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Informes de Análisis</li>
            <li class="breadcrumb-item text-gray-500">Detalle</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card">
            <div class="card-body p-lg-15">
                <div class="d-flex flex-column flex-xl-row">

                    <div class="m-0">

                        <div>
                            @if(auth()->user()->hasRole('analyst'))
                                @switch($analysis_report->status)
                                    @case('NEW')
                                    <div class="mb-5">
                                        <button type="button" data-new-status="" data-new-status-label="" class="kt_change_analysis_report_submit_to_secretariat btn btn-primary w-100 mb-3 fs-8">
                                            <i class="ki-outline ki-send fs-3 me-1"></i>Enviar a Secretaría de Cámara
                                        </button>
                                        <button type="button" data-new-status="" data-new-status-label="" class="kt_change_analysis_report_status_rejected btn btn-light-danger w-100 mb-0 fs-8">
                                            <i class="ki-outline ki-archive fs-3 me-1"></i>Rechazar
                                        </button>
                                    </div>
                                    @break
                                @endswitch
                            @endif

                            @if(auth()->user()->hasRole('secretariat'))
                                @switch($analysis_report->status)
                                    @case('UNTREATED')
                                    <div class="mb-5">
                                        <button type="button" data-new-status="IN_TREATMENT" data-new-status-label="En Tratamiento" class="kt_change_analysis_report_status_generic_direct btn btn-primary w-100 mb-3 fs-8"
                                        data-url="{{ route('oep_admin_analysis_report_in_treatment', ['id' => $analysis_report->id]) }}">
                                            <i class="ki-outline ki-notepad-edit fs-3 me-1"></i>Iniciar Tratamiento
                                        </button>
                                    </div>
                                    @break
                                    @case('IN_TREATMENT')
                                    <div class="mb-5">
                                        <button type="button" data-new-status="COMPLEMENTARY_REPORT" class="kt_change_analysis_report_status_complementary btn btn-primary w-100 mb-3 fs-8">
                                            <i class="ki-outline ki-file-left fs-3 me-1"></i>Informe Complementario
                                        </button>
                                        <button type="button" class="kt_change_analysis_report_status_first_resolution btn btn-primary w-100 mb-3 fs-8">
                                            <i class="ki-outline ki-file-right fs-3 me-1"></i>Resolución en 1ra Instancia
                                        </button>
                                        <button type="button" class="kt_change_analysis_report_status_final_resolution btn btn-primary w-100 mb-0 fs-8">
                                            <i class="ki-outline ki-file-added fs-3 me-1"></i>Resolución Final
                                        </button>
                                    </div>
                                    @break
                                    @case('COMPLEMENTARY_REPORT')
                                    <div class="mb-5">
                                        <button type="button" class="kt_change_analysis_report_status_first_resolution btn btn-primary w-100 mb-3 fs-8">
                                            <i class="ki-outline ki-file-right fs-3 me-1"></i>Resolución en 1ra Instancia
                                        </button>
                                        <button type="button" class="kt_change_analysis_report_status_final_resolution btn btn-primary w-100 mb-0 fs-8">
                                            <i class="ki-outline ki-file-added fs-3 me-1"></i>Resolución Final
                                        </button>
                                    </div>
                                    @break
                                @endswitch
                            @endif

                            @if(auth()->user()->hasRole('plenary'))
                                @switch($analysis_report->status)
                                    @case('UNTREATED_PLENARY')
                                    <div class="mb-5">
                                        <button type="button" data-new-status="IN_TREATMENT_PLENARY" data-new-status-label="En Tratamiento" class="kt_change_analysis_report_status_generic_direct btn btn-primary w-100 mb-3 fs-8"
                                                data-url="{{ route('oep_admin_analysis_report_in_treatment', ['id' => $analysis_report->id]) }}">
                                            <i class="ki-outline ki-notepad-edit fs-3 me-1"></i>Iniciar Tratamiento
                                        </button>
                                    </div>
                                    @break
                                    @case('IN_TREATMENT_PLENARY')
                                    <div class="mb-5">
                                        <button type="button" data-new-status="COMPLEMENTARY_REPORT_PLENARY" class="kt_change_analysis_report_status_complementary btn btn-primary w-100 mb-3 fs-8">
                                            <i class="ki-outline ki-file-left fs-3 me-1"></i>Informe Complementario
                                        </button>
                                        <button type="button" class="kt_change_analysis_report_status_second_resolution btn btn-primary w-100 mb-3 fs-8">
                                            <i class="ki-outline ki-file-right fs-3 me-1"></i>Resolución en 2da Instancia
                                        </button>
                                        <button type="button" class="kt_change_analysis_report_status_final_resolution btn btn-primary w-100 mb-0 fs-8">
                                            <i class="ki-outline ki-file-added fs-3 me-1"></i>Resolución Final
                                        </button>
                                    </div>
                                    @break
                                    @case('COMPLEMENTARY_REPORT_PLENARY')
                                    <div class="mb-5">
                                        <button type="button" class="kt_change_analysis_report_status_second_resolution btn btn-primary w-100 mb-3 fs-8">
                                            <i class="ki-outline ki-file-right fs-3 me-1"></i>Resolución en 2da Instancia
                                        </button>
                                        <button type="button" class="kt_change_analysis_report_status_final_resolution btn btn-primary w-100 mb-0 fs-8">
                                            <i class="ki-outline ki-file-added fs-3 me-1"></i>Resolución Final
                                        </button>
                                    </div>
                                    @break
                                    @case('SECOND_INSTANCE_RESOLUTION')
                                    <div class="mb-5">
                                        <button type="button" class="kt_change_analysis_report_status_final_resolution btn btn-primary w-100 mb-0 fs-8">
                                            <i class="ki-outline ki-file-added fs-3 me-1"></i>Resolución Final
                                        </button>
                                    </div>
                                    @break
                                @endswitch
                            @endif
                        </div>


                        <div class="d-print-none border border-dashed border-primary__ border-gray-300 card-rounded h-lg-100__ min-w-md-350px p-9 bg-lighten mb-20">
                            <div class="mb-8">
                                @switch($analysis_report->place)
                                    @case('IN_ANALYST')
                                    <span class="text-muted"></span> <span class="badge badge-light-info">Comisión de Análisis</span>
                                    @break
                                    @case('IN_SECRETARIAT')
                                    <span class="text-muted"></span> <span class="badge badge-light-success">Secretaría de Cámara</span>
                                    @break
                                    @case('IN_PLENARY')
                                    <span class="text-muted"></span> <span class="badge badge-light-success">Sala Plena</span>
                                    @break
                                @endswitch
                            </div>
                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DETALLE DOCUMENTO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Tipo de operación:</div>
                                <div class="fw-bold text-gray-800 fs-6">Informe de Análisis</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Nro Documento:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $analysis_report->code }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Estado:</div>
                                @switch($analysis_report->status)
                                    @case('NEW')
                                    <span class="badge badge-info">Nuevo</span>
                                    @break
                                    @case('REJECTED')
                                    <span class="badge badge-danger">Rechazado</span>
                                    @break
                                    @case('UNTREATED')
                                    <span class="badge badge-info">No Tratado</span>
                                    @break
                                    @case('IN_TREATMENT')
                                    <span class="badge badge-info">En Tratamiento</span>
                                    @break
                                    @case('COMPLEMENTARY_REPORT')
                                    <span class="badge badge-info">Informe Complementario</span>
                                    @break
                                    @case('UNTREATED_PLENARY')
                                    <span class="badge badge-info">No Tratado</span>
                                    @break
                                    @case('IN_TREATMENT_PLENARY')
                                    <span class="badge badge-info">En Tratamiento</span>
                                    @break
                                    @case('COMPLEMENTARY_REPORT_PLENARY')
                                    <span class="badge badge-info">Informe Complementario</span>
                                    @break
                                    @case('SECOND_INSTANCE_RESOLUTION')
                                    <span class="badge badge-info">Con Resolución en 2da Instancia</span>
                                    @break
                                    @case('FINALIZED')
                                    <span class="badge badge-info">Con Resolución Final</span>
                                    @break
                                    @case('ARCHIVED')
                                    <span class="badge badge-info">Archivado</span>
                                    @break
                                @endswitch
                            </div>
                            @if($analysis_report->status == 'FINALIZED')
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Final:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $analysis_report->final_status ?? '' }}</div>
                            </div>
                            @endif
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha de Registro:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $analysis_report->lastStatusActivity->registered_at }}</div>
                            </div>
                            <div class="mb-15">
                                <div class="fw-semibold text-gray-600 fs-7">Registrado por:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $analysis_report->lastStatusActivity->user->name }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-lg-row-fluid ms-xl-18 mb-10 mb-xl-0">
                        <div class="mt-n1">
                            <div class="d-flex d-flex justify-content-between flex-stack__ pb-10__">
                                <img alt="Logo" src="{{ asset('themes/common/media/logos/logo_oep.png') }}" class="h-100px" />
                                <div class="fw-bolder fs-3 text-warning text-center pt-2 mx-5 px-5 d-md-block d-none" style="line-height: 1.1">
                                    Informe de Análisis al Reporte de Monitoreo de Vulneraciones
                                    al Reglamento de Difusión de Propaganda
                                    y Campaña Electoral
                                </div>
                                <div class="text-sm-end fw-semibold fs-7 text-muted">
                                    <img alt="Logo Proceso Electoral" src="{{ asset('storage') . $analysis_report->election->logo_image }}" class="h-100px mb-2" />
                                    {{--<div>{{ $analysis_report->election->name }}</div>--}}
                                    {{--<div>{{ $analysis_report->election->election_date }}</div>--}}
                                </div>
                            </div>
                            <div class="m-0">
                                <div class="fw-bolder fs-3 text-warning text-center mb-20 d-md-none">
                                    Informe de Análisis al Reporte de Monitoreo de Vulneraciones<br>
                                    al Reglamento de Difusión de Propaganda<br>
                                    y Campaña Electoral </div>

                                @if($analysis_report->fileAnalysisReport || $analysis_report->fileAnalysisComplementaryReport ||
                                    $analysis_report->fileAnalysisComplementaryReportPlenary || $analysis_report->fileAnalysisResolutionFirstInstance ||
                                    $analysis_report->fileAnalysisResolutionFinalInstance)

                                <h4 class="mt-12 mb-12 text-uppercase">Documentos de Análisis</h4>
                                <div class="pb-5 wrapper_content_files_ro">

                                    @if($analysis_report->fileAnalysisReport)
                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                            <label class="fw-semibold fs-7 text-gray-600">Informe de Análisis:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="hidden" name="hdn_analysis_file_report" class="file_default"
                                                   data-name="{{ $analysis_report->fileAnalysisReport->origin_name }}" data-size="{{ $analysis_report->fileAnalysisReport->size }}"
                                                   data-mimetype="{{ $analysis_report->fileAnalysisReport->mime_type }}" data-path="{{ $analysis_report->fileAnalysisReport->url_file }}">
                                            <input type="file" name="ro_analysis_file_report" class="files kt_analysis_report_files" id="kt_ro_analysis_file_report">
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed border-muted my-2"></div>
                                    @endif

                                    @if($analysis_report->fileAdditionalAttachment)
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                                <label class="fw-semibold fs-7 text-gray-600">Otros adjuntos:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden" name="hdn_analysis_file_additional" class="file_default"
                                                       data-name="{{ $analysis_report->fileAdditionalAttachment->origin_name }}" data-size="{{ $analysis_report->fileAdditionalAttachment->size }}"
                                                       data-mimetype="{{ $analysis_report->fileAdditionalAttachment->mime_type }}" data-path="{{ $analysis_report->fileAdditionalAttachment->url_file }}">
                                                <input type="file" name="ro_analysis_file_additional" class="files kt_analysis_report_files" id="kt_ro_analysis_file_additional">
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed border-muted my-2"></div>
                                    @endif

                                    @if($analysis_report->fileAnalysisComplementaryReport)
                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                            <label class="fw-semibold fs-7 text-gray-600">Informe Complementario:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="hidden" name="hdn_analysis_file_complementary_report" class="file_default"
                                                   data-name="{{ $analysis_report->fileAnalysisComplementaryReport->origin_name }}" data-size="{{ $analysis_report->fileAnalysisComplementaryReport->size }}"
                                                   data-mimetype="{{ $analysis_report->fileAnalysisComplementaryReport->mime_type }}" data-path="{{ $analysis_report->fileAnalysisComplementaryReport->url_file }}">
                                            <input type="file" name="ro_analysis_file_complementary_report" class="files kt_analysis_report_files" id="kt_ro_analysis_file_complementary_report">
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed border-muted my-2"></div>
                                    @endif

                                    @if($analysis_report->fileAnalysisComplementaryReportPlenary)
                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                            <label class="fw-semibold fs-7 text-gray-600">Informe Complementario (Sala Plena):</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="hidden" name="hdn_analysis_file_complementary_report" class="file_default"
                                                   data-name="{{ $analysis_report->fileAnalysisComplementaryReportPlenary->origin_name }}" data-size="{{ $analysis_report->fileAnalysisComplementaryReportPlenary->size }}"
                                                   data-mimetype="{{ $analysis_report->fileAnalysisComplementaryReportPlenary->mime_type }}" data-path="{{ $analysis_report->fileAnalysisComplementaryReportPlenary->url_file }}">
                                            <input type="file" name="ro_analysis_file_complementary_report_plenary" class="files kt_analysis_report_files" id="ro_kt_analysis_file_complementary_report_plenary">
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed border-muted my-2"></div>
                                    @endif

                                    @if($analysis_report->fileAnalysisResolutionFirstInstance)
                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                            <label class="fw-semibold fs-7 text-gray-600">Resolución 1ra Instancia:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="hidden" name="hdn_analysis_file_complementary_report" class="file_default"
                                                   data-name="{{ $analysis_report->fileAnalysisResolutionFirstInstance->origin_name }}" data-size="{{ $analysis_report->fileAnalysisResolutionFirstInstance->size }}"
                                                   data-mimetype="{{ $analysis_report->fileAnalysisResolutionFirstInstance->mime_type }}" data-path="{{ $analysis_report->fileAnalysisResolutionFirstInstance->url_file }}">
                                            <input type="file" name="ro_analysis_file_first_resolution" class="files kt_analysis_report_files" id="ro_kt_analysis_file_first_resolution">
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed border-muted my-2"></div>
                                    @endif

                                    @if($analysis_report->fileAnalysisResolutionSecondInstance)
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                                <label class="fw-semibold fs-7 text-gray-600">Resolución 2da Instancia:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="hidden" name="hdn_analysis_file_second_resolution" class="file_default"
                                                       data-name="{{ $analysis_report->fileAnalysisResolutionSecondInstance->origin_name }}" data-size="{{ $analysis_report->fileAnalysisResolutionSecondInstance->size }}"
                                                       data-mimetype="{{ $analysis_report->fileAnalysisResolutionSecondInstance->mime_type }}" data-path="{{ $analysis_report->fileAnalysisResolutionSecondInstance->url_file }}">
                                                <input type="file" name="ro_analysis_file_second_resolution" class="files kt_analysis_report_files" id="ro_kt_analysis_file_second_resolution">
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed border-muted my-2"></div>
                                    @endif

                                    @if($analysis_report->fileAnalysisResolutionFinalInstance)
                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                            <label class="fw-semibold fs-7 text-gray-600">Resolución Final:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="hidden" name="hdn_analysis_file_complementary_report" class="file_default"
                                                   data-name="{{ $analysis_report->fileAnalysisResolutionFinalInstance->origin_name }}" data-size="{{ $analysis_report->fileAnalysisResolutionFinalInstance->size }}"
                                                   data-mimetype="{{ $analysis_report->fileAnalysisResolutionFinalInstance->mime_type }}" data-path="{{ $analysis_report->fileAnalysisResolutionFinalInstance->url_file }}">
                                            <input type="file" name="ro_analysis_file_final_resolution" class="files kt_analysis_report_files" id="ro_kt_analysis_file_final_resolution">
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed border-muted my-2"></div>
                                    @endif
                                </div>
                                @endif

                                <h4 class="mt-12 mb-12 text-uppercase">Ficha de Registro de Monitoreo</h4>

                                <div class="d-flex flex-aligns-center mb-5">
                                    <img alt="" class="w-30px me-3" src="{{ asset('themes/common/media/svg/files/pdf.svg') }}">
                                    <div class="ms-1 fw-semibold">
                                        <a href="{{ route('oep_admin_media_monitoring_generate_pdf', ['id' => $analysis_report->monitoringReport->monitoringItem->id]) }}" target="_blank" rel="noopener" class="fs-6 text-hover-primary__ fw-bold">Descargar</a>
                                    </div>
                                </div>

                                @php
                                    [$form, $fields] = app(\App\Containers\CoreMonitoring\FormBuilder\Actions\GetFieldsFormByTypeAction::class)->run($analysis_report->monitoringReport->monitoringItem->media_type, $analysis_report->election);
                                    $monitoring = $analysis_report->monitoringReport->monitoringItem;
                                @endphp

                                <div class="mb-10 border border-dashed border-gray-400 card-rounded p-10 bg-lighten">
                                @include('frontend@oepAdministrator::monitoring.partials.detailMonitoringItem')
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>



        <div class="d-flex flex-column flex-xl-row mt-10">
            <div class="min-w-md-350px">
            </div>
            <div class="flex-lg-row-fluid ms-xl-18 mb-10 mb-xl-0">

                <div class="card">
                    <div class="card-header pt-10 px-lg-15 border-bottom-0">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Actividad</span>
                            <span class="text-gray-500 pt-2 fw-semibold fs-6">Registro de estados</span>
                        </h3>
                        <div class="card-toolbar">
                        </div>
                    </div>

                    <div class="card-body pt-6 p-lg-15">
                        <div class="timeline-label">

                            @foreach($activities as $activity)
                            <div class="timeline-item">
                                <div class="timeline-label fw-bold text-gray-800 fs-6 min-w-175px">
                                    {{ $activity->registered_at }}
                                </div>
                                <div class="timeline-badge">
                                    <i class="ki-duotone ki-abstract-8 text-gray-600 fs-3">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-gray-700 ps-3 fs-7">
                                    <span class="text-primary">{{ $activity->user->name }}</span>
                                    @switch($activity->status)
                                        @case('NEW')
                                        <span> ha creado el informe de análisis, en estado </span>
                                        <span class="text-primary">Nuevo</span>
                                        @break
                                        @case('REJECTED')
                                        <span> ha registrado el informe de análisis como </span>
                                        <span class="text-primary">Rechazado</span>
                                        @break
                                        @case('UNTREATED')
                                        <span> ha enviado el informe de análisis a Secretaría de Cámara, en estado </span>
                                        <span class="text-primary">No Tratado</span>
                                        @break
                                        @case('IN_TREATMENT')
                                        <span> ha registrado el informe de análisis como </span>
                                        <span class="text-primary">En Tratamiento</span> en Secretaría de Cámara
                                        @break
                                        @case('COMPLEMENTARY_REPORT')
                                        <span> ha registrado el informe de análisis con </span>
                                        <span class="text-primary">Informe Complementario</span> en Secretaría de Cámara
                                        @break
                                        @case('UNTREATED_PLENARY')
                                        <span> ha enviado el informe de análisis a Sala Plena, en estado </span>
                                        <span class="text-primary">No Tratado</span>
                                        @break
                                        @case('IN_TREATMENT_PLENARY')
                                        <span> ha registrado el informe de análisis como </span>
                                        <span class="text-primary">En Tratamiento</span> en Sala Plena
                                        @break
                                        @case('COMPLEMENTARY_REPORT_PLENARY')
                                        <span> ha registrado el informe de análisis con </span>
                                        <span class="text-primary">Informe Complementario</span> en Sala Plena
                                        @break
                                        @case('SECOND_INSTANCE_RESOLUTION')
                                        <span> ha registrado el informe de análisis con </span>
                                        <span class="text-primary">Resolución den 2da Instancia</span> en Sala Plena
                                        @break
                                        @case('FINALIZED')
                                        <span> ha finalizado el informe de análisis con </span>
                                        <span class="text-primary">Resolución Final</span>
                                        @break
                                        @case('ARCHIVED')
                                        <span> ha registrado el informe de análisis como </span>
                                        <span class="text-primary">Archivado</span>
                                        @break
                                    @endswitch
                                    <span></span>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection

@section('modals')
    <div class="modal fade" id="kt_modal_analysis_report_rejected" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded" id="kt_block_target_rejected">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form id="kt_form_analysis_report_rejected" class="form" method="post" autocomplete="off" action="{{ route('oep_admin_analysis_report_reject', ['id' => $analysis_report->id]) }}">
                        <div class="mb-10 text-center">
                            <h1 class="mb-3">Informe de Análisis</h1>
                            <div class="text-muted fw-semibold fs-5">Rechazar</div>
                        </div>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Nuevo estado:</span>
                            </label>
                            <input type="text" class="form-control form-check-solid" name="readonly_rejected_status" value="RECHAZADO" readonly disabled />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Justificación y/o Comentarios:</label>
                            <textarea class="form-control" rows="6" name="analysis_rejected_observations" placeholder=""></textarea>
                        </div>
                        <div class="text-center">
                            <button type="button" id="kt_submit_button_analysis_report_rejected" class="btn btn-light btn-sm me-3">Cancelar</button>
                            <button type="submit" id="kt_cancel_button_analysis_report_rejected" class="btn btn-primary btn-sm">
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

    <div class="modal fade" id="kt_modal_analysis_report_submit_to_secretariat" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded" id="kt_block_target_to_secretariat">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7 pt-0 pb-15">
                    <div class="mb-10 text-center">
                        <h1 class="mb-3">Informe de Análisis</h1>
                        <div class="text-muted fw-semibold fs-5">Enviar a Secretaría de Cámara</div>
                    </div>
                    <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-9 p-6">
                        <i class="ki-duotone ki-information fs-2tx text-info me-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        <div class="d-flex flex-stack flex-grow-1">
                            <div class="fw-semibold">
                                <div class="fs-6 text-gray-700">
                                    Debe subir el informe correspondiente de análisis, una vez que presione el boton guardar, se enviará el presente informe a la Secreatría de Cámara
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="kt_form_analysis_report_submit_to_secretariat" class="form" method="post" autocomplete="off" action="{{ route('oep_admin_analysis_report_to_secretariat', ['id' => $analysis_report->id]) }}">
                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Informe:</label>
                            <input type="file" name="analysis_file_report" class="files kt_analysis_report_files"
                                   id="kt_analysis_file_report" data-maxsize="5" data-maxfiles="1" data-accept="doc,docx,pdf">
                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF, WORD</div>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Comentarios:</label>
                            <textarea class="form-control" rows="3" name="analysis_observations" placeholder=""></textarea>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 mb-2">Otros adjuntos (opcional):</label>
                            <input type="file" name="analysis_file_additional" class="files kt_analysis_report_files"
                                   id="kt_analysis_file_additional" data-maxsize="10" data-maxfiles="1" data-accept="doc,docx,pdf,mp3,mp4,png,jpeg,jpg,">
                            <div class="text-muted fs-7">Máximo de tamaño permitido 10MB.</div>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Enviado a:</label>
                            @if($analysis_report->scope_type === 'TED')
                                <input type="text" class="form-control form-control-solid" name="analysis_scope" value=" TED {{ $analysis_report->scope_department }}" readonly />
                            @else
                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="" name="analysis_scope">
                                <option value="Nacional" {{ $analysis_report->scope_department == 'Nacional' ? 'selected="selected"' : '' }}>TSE Nacional</option>
                                <option value="La Paz" {{ $analysis_report->scope_department == 'La Paz' ? 'selected="selected"' : '' }}>TED La Paz</option>
                                <option value="Oruro" {{ $analysis_report->scope_department == 'Oruro' ? 'selected="selected"' : '' }}>TED Oruro</option>
                                <option value="Potosí" {{ $analysis_report->scope_department == 'Potosí' ? 'selected="selected"' : '' }}>TED Potosí</option>
                                <option value="Pando" {{ $analysis_report->scope_department == 'Pando' ? 'selected="selected"' : '' }}>TED Pando</option>
                                <option value="Beni" {{ $analysis_report->scope_department == 'Beni' ? 'selected="selected"' : '' }}>TED Beni</option>
                                <option value="Santa Cruz" {{ $analysis_report->scope_department == 'Santa Cruz' ? 'selected="selected"' : '' }}>TED Santa Cruz</option>
                                <option value="Cochabamba" {{ $analysis_report->scope_department == 'Cochabamba' ? 'selected="selected"' : '' }}>TED Cochabamba</option>
                                <option value="Chuquisaca" {{ $analysis_report->scope_department == 'Chuquisaca' ? 'selected="selected"' : '' }}>TED Chuquisaca</option>
                                <option value="Tarija" {{ $analysis_report->scope_department == 'Tarija' ? 'selected="selected"' : '' }}>TED Tarija</option>
                            </select>
                            @endif
                        </div>

                        <div class="text-center pt-15">
                            <button type="button" id="kt_cancel_button_analysis_report_to_secretariat" class="btn btn-light me-3">Cancelar</button>
                            <button type="button" id="kt_submit_button_analysis_report_to_secretariat" class="btn btn-primary">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_analysis_report_complementary" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded" id="kt_block_target_complementary">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7 pt-0 pb-15">
                    <div class="mb-10 text-center">
                        <h1 class="mb-3">Informe de Análisis</h1>
                        <div class="text-muted fw-semibold fs-5">Registrar Informe Complementario</div>
                    </div>
                    <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-9 p-6">
                        <i class="ki-duotone ki-information fs-2tx text-info me-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        <div class="d-flex flex-stack flex-grow-1">
                            <div class="fw-semibold">
                                <div class="fs-6 text-gray-700">
                                    Debe subir el informe complementario
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="kt_form_analysis_report_complementary" class="form" method="post" autocomplete="off" action="{{ route('oep_admin_analysis_report_complementary', ['id' => $analysis_report->id]) }}">
                        <input type="hidden" name="new_status" value="">
                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Informe</label>
                            <input type="file" name="analysis_file_complementary" class="files kt_analysis_report_files"
                                   id="kt_analysis_file_complementary" data-maxsize="5" data-maxfiles="1" data-accept="doc,docx,pdf">
                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF, WORD</div>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Comentarios</label>
                            <textarea class="form-control" rows="3" name="analysis_observations" placeholder=""></textarea>
                        </div>

                        <div class="text-center pt-15">
                            <button type="button" id="kt_cancel_button_analysis_report_complementary" class="btn btn-light me-3">Cancelar</button>
                            <button type="button" id="kt_submit_button_analysis_report_complementary" class="btn btn-primary">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_analysis_report_first_resolution" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded" id="kt_block_target_first_resolution">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7 pt-0 pb-15">
                    <div class="mb-10 text-center">
                        <h1 class="mb-3">Informe de Análisis</h1>
                        <div class="text-muted fw-semibold fs-5">Enviar a Sala Plena</div>
                    </div>
                    <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-9 p-6">
                        <i class="ki-duotone ki-information fs-2tx text-info me-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        <div class="d-flex flex-stack flex-grow-1">
                            <div class="fw-semibold">
                                <div class="fs-6 text-gray-700">
                                    Debe subir la Resolción en 1ra Instancia, una vez que presione el boton guardar, se enviará el presente documento a Sala Plena
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="kt_form_analysis_report_first_resolution" class="form" method="post" autocomplete="off" action="{{ route('oep_admin_analysis_report_first_resolution', ['id' => $analysis_report->id]) }}">
                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Resolución 1ra Instancia:</label>
                            <input type="file" name="analysis_file_first_resolution" class="files kt_analysis_report_files"
                                   id="kt_analysis_file_first_resolution" data-maxsize="5" data-maxfiles="1" data-accept="doc,docx,pdf">
                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF, WORD</div>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Comentarios:</label>
                            <textarea class="form-control" rows="3" name="analysis_observations" placeholder=""></textarea>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Enviado a:</label>
                            <input type="text" class="form-control form-control-solid" name="analysis_scope" value="TSE Nacional" readonly disabled/>
                        </div>

                        <div class="text-center pt-15">
                            <button type="button" id="kt_cancel_button_analysis_report_first_resolution" class="btn btn-light me-3">Cancelar</button>
                            <button type="button" id="kt_submit_button_analysis_report_first_resolution" class="btn btn-primary">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_analysis_report_second_resolution" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded" id="kt_block_target_second_resolution">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7 pt-0 pb-15">
                    <div class="mb-10 text-center">
                        <h1 class="mb-3">Informe de Análisis</h1>
                        <div class="text-muted fw-semibold fs-5">Resolución en 2da Instancia</div>
                    </div>
                    <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-9 p-6">
                        <i class="ki-duotone ki-information fs-2tx text-info me-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        <div class="d-flex flex-stack flex-grow-1">
                            <div class="fw-semibold">
                                <div class="fs-6 text-gray-700">
                                    Registrar Resolución en 2da Instancia
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="kt_form_analysis_report_second_resolution" class="form" method="post" autocomplete="off"
                          action="{{ route('oep_admin_analysis_report_second_resolution', ['id' => $analysis_report->id]) }}">
                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Resolución 2da Instancia:</label>
                            <input type="file" name="analysis_file_second_resolution" class="files kt_analysis_report_files"
                                   id="kt_analysis_file_second_resolution" data-maxsize="5" data-maxfiles="1" data-accept="doc,docx,pdf">
                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF, WORD</div>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Comentarios:</label>
                            <textarea class="form-control" rows="3" name="analysis_observations" placeholder=""></textarea>
                        </div>

                        <div class="text-center pt-15">
                            <button type="button" id="kt_cancel_button_analysis_report_second_resolution" class="btn btn-light me-3">Cancelar</button>
                            <button type="button" id="kt_submit_button_analysis_report_second_resolution" class="btn btn-primary">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_analysis_report_final_resolution" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded" id="kt_block_target_final_resolution">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7 pt-0 pb-15">
                    <div class="mb-10 text-center">
                        <h1 class="mb-3">Informe de Análisis</h1>
                        <div class="text-muted fw-semibold fs-5">Resolución Final</div>
                    </div>
                    <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-9 p-6">
                        <i class="ki-duotone ki-information fs-2tx text-info me-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        <div class="d-flex flex-stack flex-grow-1">
                            <div class="fw-semibold">
                                <div class="fs-6 text-gray-700">
                                    Debe subir la Resolución Final.
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="kt_form_analysis_report_final_resolution" class="form" method="post" autocomplete="off" action="{{ route('oep_admin_analysis_report_final_resolution', ['id' => $analysis_report->id]) }}">

                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Informe Resolución Final:</label>
                            <input type="file" name="analysis_file_final_resolution" class="files kt_analysis_report_files"
                                   id="kt_analysis_file_final_resolution" data-maxsize="5" data-maxfiles="1" data-accept="doc,docx,pdf">
                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF, WORD</div>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Resolución:</label>
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                    name="analysis_final_status">
                                <option></option>
                                <option value="Suspención">Suspención</option>
                                <option value="Sanción">Sanción</option>
                                <option value="Desestimación">Desestimación</option>
                            </select>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Comentarios:</label>
                            <textarea class="form-control" rows="3" name="analysis_observations" placeholder=""></textarea>
                        </div>

                        <div class="text-center pt-15">
                            <button type="button" id="kt_cancel_button_analysis_report_final_resolution" class="btn btn-light me-3">Cancelar</button>
                            <button type="button" id="kt_submit_button_analysis_report_final_resolution" class="btn btn-primary">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
        #kt_content .fileuploader,
        .wrapper_content_files_ro .fileuploader {
            padding: 16px;
            padding-top: 0;
        }
        .wrapper_content_files_ro .fileuploader-item {
            padding: 10px !important;
        }
    </style>
    <style>
        .timeline-label:before {
            content: "";
            position: absolute;
            left: 177px;
            width: 3px;
            top: 0;
            bottom: 0;
            background-color: var(--bs-gray-200);
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/admin/js/custom/analysis_report/detail.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/monitoring_report/detail-monitoring_files.js') }}"></script>
@endsection