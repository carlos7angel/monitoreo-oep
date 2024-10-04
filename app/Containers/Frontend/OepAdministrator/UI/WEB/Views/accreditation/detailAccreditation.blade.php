@extends('vendor@template::admin.layouts.master', ['page' => 'media_accreditations'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">ACREDITACIÓN</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Medios de Comunicación</li>
            <li class="breadcrumb-item text-gray-500">Nuevos</li>
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

                <div class="mb-5">
                    @switch($accreditation->status)
                        @case('new')
                            <button type="button" data-new-status="observed" data-new-status-label="OBSERVADO" class="kt_change_accreditation_status btn btn-primary btn-sm me-1 fs-8"><i class="ki-outline ki-lock fs-3 me-1"></i>Observar</button>
                            <button type="button" data-new-status="accredited" data-new-status-label="APROBADO/ACREDITADO" class="kt_change_accreditation_status btn btn-primary btn-sm me-1 fs-8"><i class="ki-outline ki-check fs-3 me-1"></i>Aprobar</button>
                        @break
                        @case('observed')
                            <button type="button" data-new-status="accredited" data-new-status-label="APROBADO/ACREDITADO" class="kt_change_accreditation_status btn btn-primary btn-sm me-1 fs-8"><i class="ki-outline ki-check fs-3 me-1"></i>Aprobar</button>
                            <button type="button" data-new-status="rejected" data-new-status-label="RECHAZADO" class="kt_change_accreditation_status btn btn-primary btn-sm me-1 fs-8"><i class="ki-outline ki-cross fs-3 me-1"></i>Rechazar</button>
                        @break
                        @case('accredited')
                            <button type="button" data-new-status="archived" data-new-status-label="ARCHIVADO" class="kt_change_accreditation_status btn btn-primary btn-sm me-1 fs-8"><i class="ki-outline ki-archive fs-3 me-1"></i>Archivar</button>
                        @break
                        @case('archived')
                        @break
                        @case('rejected')
                        @break
                    @endswitch
                </div>

                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">

                        <div class="d-flex flex-column py-5">

                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL DOCUMENTO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Tipo de Operación:</div>
                                <div class="fw-bold text-gray-800 fs-6">Acreditación de Medios de Comunicación</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Nro Documento:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->code }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Estado:</div>
                                <div class="fw-bold text-gray-800 fs-6">
                                    @switch($accreditation->status)
                                        @case('new')
                                        <span class="badge badge-info py-1 px-2">Nuevo</span>
                                        @break

                                        @case('observed')
                                        <span class="badge badge-warning py-1 px-2">Observado</span>
                                        @break

                                        @case('accredited')
                                        <span class="badge badge-success py-1 px-2">Acreditado</span>
                                        @break

                                        @case('archived')
                                        <span class="badge badge-secondary py-1 px-2">Archivado</span>
                                        @break

                                        @case('rejected')
                                        <span class="badge badge-danger py-1 px-2">Rechazado</span>
                                        @break
                                    {{ $accreditation->status }}
                                    @endswitch
                                </div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha de envío:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->submitted_at }}</div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">

                        <div class="d-flex flex-column py-5">

                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL PROCESO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Proceso Electoral:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->election->name }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Categoría:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->election->type }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha del Proceso:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->election->election_date }}</div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Plazo de acreditaciones:</div>
                                <div class="fw-bold text-gray-800 fs-6">
                                    <span class="fs-7 pe-2">Del</span>
                                    <div class="badge badge-secondary py-2 px-2">{{ $accreditation->election->start_date_media_registration }}</div>
                                    <span class="fs-7 px-2">al</span>
                                    <div class="badge badge-secondary py-2 px-2">{{ $accreditation->election->end_date_media_registration }}</div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!--end::Sidebar-->

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">

                @if(! empty($accreditation->observations))
                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-6 p-6">
                    <div class="d-flex flex-grow-1 flex-column">

                        <h6 class="mb-3 fw-bolder text-gray-900">Comentarios / Observaciones</h6>
                        <div class="fw-semibold">
                            <div class="fs-6 text-gray-700">{!! $accreditation->observations !!}</div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="card card-flush mb-6 mb-xl-9">
                    <div class="card-header mt-6">
                        <div class="card-title flex-column">
                            <h2 class="mb-1">Datos de la Postulación del Medio</h2>
                            <div class="fs-6 fw-semibold text-muted">Formulario de Registro</div>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body p-9 pt-4">

                        <div id="wrapper-summary-accreditation" class="wrapper_content_step_3">
                            @include('frontend@extAdministrator::accreditation.partials.summaryAccreditation')
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>

    </div>
@endsection

@section('modals')
    <div class="modal fade" id="kt_modal_update_accreditation_status" tabindex="-1" aria-hidden="true">
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
                    <form id="kt_form_update_status_accreditation" class="form" method="post" autocomplete="off" action="{{ route('oep_admin_media_accreditation_update_status', ['id' => $accreditation->id]) }}">
                        <div class="mb-10 text-center">
                            <h1 class="mb-3">Acreditación</h1>
                            <div class="text-muted fw-semibold fs-5">Actualizar el estado</div>
                        </div>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Cambiar estado a:</span>
                            </label>
                            <input type="text" class="form-control form-check-solid" name="readonly_accreditation_status" value="" readonly disabled />
                            <input type="hidden" name="accreditation_status" value="">
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Comentarios/Observaciones:</label>
                            <textarea class="form-control" rows="6" name="accreditation_observations" placeholder=""></textarea>
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
        .wrapper_content_step_3 .fileuploader {
            padding: 16px;
            padding-top: 0;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/admin/js/custom/accreditations/detail_accreditation.js') }}"></script>
@endsection