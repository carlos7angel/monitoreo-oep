@extends('vendor@template::external.layouts.master', ['page' => 'media_accreditations'])

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="{{ route('ext_admin_index') }}" class="text-white text-hover-secondary">
                <i class="ki-outline ki-home text-white fs-3"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="{{ route('ext_admin_accreditations_list') }}" class="text-white text-hover-secondary">Acreditaciones</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Detalle</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Solicitud de Acreditación
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Información enviada</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="d-flex flex-column flex-xl-row flex-row-fluid gap-10">

            <div class="d-flex flex-column justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                <div class="card border border-dashed border-gray-300 mb-7">
                    <div class="card-body">
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
                                    <span class="badge badge-info py-1 px-2">En progreso</span>
                                    @break

                                    @case('observed')
                                    <span class="badge badge-warning py-1 px-2">Observado</span>
                                    <a href="javascript:void(0)" id="kt_button_modal_observations" class="ms-2 fs-8">Ver detalles</a>
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
                                @endswitch
                            </div>
                        </div>
                        @if($accreditation->status === 'observed')
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Plazo límite de envío:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->due_date_observed }}</div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha anterior de envío:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->submitted_at }}</div>
                            </div>
                        @else
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha de envío:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->submitted_at }}</div>
                            </div>
                        @endif

                        @if($accreditation->status === 'observed')
                            <div class="d-flex flex-wrap mt-8">
                                <a href="{{ route('ext_admin_accreditations_edit', ['id' => $accreditation->id]) }}" class="btn btn-sm btn-primary"><i class="ki-outline ki-pencil fs-3 me-1"></i>Editar</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="w-100">

                <div class="current flex-column">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body py-20__xx p-12 w-100 mw-xl-700px__xx">

                            <div class="d-flex flex-column flex-xl-row">
                                <div class="flex-lg-row-fluid me-xl-18__xx mb-10 mb-xl-0">
                                    <div class="mt-n1">
                                        <div class="pb-10">
                                            <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                                <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                                <span>Datos del Proceso</span>
                                            </h2>
                                        </div>
                                        <div class="m-0">
                                            <div class="row g-5 mb-6">
                                                <div class="col-sm-4">
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Nombre del Proceso Electoral:</div>
                                                    <div class="fw-bold fs-6 text-gray-800 kt_data_election_name">{{ $accreditation->election->name }}</div>
                                                </div>
                                            </div>
                                            <div class="row g-5 mb-2">
                                                <div class="col-sm-4">
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Categoría:</div>
                                                    <div class="fw-bold fs-6 text-gray-800 kt_data_election_type">{{ $accreditation->election->type }}</div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha del Proceso:</div>
                                                    <div class="fw-bold fs-6 text-gray-800 kt_data_election_date">{{ $accreditation->election->election_date }}</div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha Limite de acreditación:</div>
                                                    <div class="fw-bold fs-6 text-gray-800 kt_data_election_end_date">{{ $accreditation->election->end_date_media_registration }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="flex-column" id="kt_election_accreditation_summary">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">

                            <div class="pb-10 pb-lg-12">
                                <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                    <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                    <span>Proceso de Acreditación</span>
                                </h2>
                                <div class="text-muted fw-semibold fs-7"></div>
                            </div>

                            <div id="wrapper-summary-accreditation">
                                @include('frontend@extAdministrator::accreditation.partials.summaryAccreditation')
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('modals')

    <div class="modal fade" id="kt_modal_observations_accreditation" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h3 class="mb-3 text-uppercase">Observaciones</h3>
                        <div class="text-muted fw-semibold fs-7">
                            Su proceso ha sido observado.<br>
                            A continuación se listan las observaciones/recomendaciones.
                        </div>
                    </div>
                    <div>
                        <div class="py-5">
                            <div class="text-center px-5">
                                {!!  $accreditation->observations !!}
                            </div>
                        </div>
                        <div class="d-flex flex-center mt-15">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary me-3">Aceptar</button>
                        </div>
                    </div>
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
    <script src="{{ asset('themes/external/js/custom/accreditation/detail.js') }}"></script>
@endsection