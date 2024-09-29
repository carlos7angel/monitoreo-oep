@extends('vendor@template::external.layouts.master', ['page' => 'media_accreditations'])

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">
                <i class="ki-outline ki-home text-white fs-3"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">Acreditaciones</a>
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

                <div class="flex-column wrapper_content_step_3">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">

                        <div class="pb-10">
                            <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                <span>Registro de Medio para Acreditación</span>
                            </h2>
                        </div>

                        <h6 class="mb-5 fw-bolder text-gray-600 text-hover-primary">DATOS GENERALES</h6>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Nombre del Medio:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->name }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Razón Social:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->business_name }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">NIT:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->nit }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Representante Legal:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->rep_full_name }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Documento Representante Legal:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->rep_document }} {{ $profile->rep_exp }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">CLASIFICACIÓN DEL MEDIO</h6>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Tipo de Medio:</label>
                            </div>
                            @php
                                $types = json_decode($profile->type);
                            @endphp
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ implode(', ', $types) }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Cobertura General:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->coverage }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Alcance del Medio:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->scope }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">
                                    @switch($profile->scope)
                                        @case('Nacional')
                                        @php
                                            $states = [];
                                            if ($profile->scope_department) {
                                                $states = json_decode($profile->scope_department);
                                            }
                                            $scope_content = implode(', ', $states);
                                        @endphp
                                        <span>Departamentos:</span>
                                        @break
                                        @case('Departamental')
                                        @php
                                            $state = '';
                                            if ($profile->scope === 'Departamental' && $profile->scope_department) {
                                                $state = json_decode($profile->scope_department)[0];
                                            }
                                            $scope_content = $state;
                                        @endphp
                                        <span>Departamento:</span>
                                        @break
                                        @case('Municipal')
                                        @php
                                            $scope_content = $profile->scope_municipality;
                                        @endphp
                                        <span>Municipio:</span>
                                        @break
                                        @default
                                        <span>-</span>
                                    @endswitch
                                </label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $scope_content }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">DATOS DE CONTACTO</h6>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Domicilio Legal del Medio:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->legal_address }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Celular:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->cellphone }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Página web:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">{{ $profile->website ? $profile->website : '-' }}</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Redes Sociales:</label>
                            </div>
                            <div class="col-md-8">
                                @php
                                    $rrss = $profile->rrss ? json_decode($profile->rrss) : [];
                                @endphp
                                <p class="form-control form-control-plaintext">
                                    @if(count($rrss) > 0)
                                        @foreach($rrss as $red)
                                            <a href="{{ $red->rrss_value }}" target="_blank" class="fs-6">{{ $red->rrss_option }}</a><br>
                                        @endforeach
                                    @else
                                        <span>-</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">DOCUMENTOS ADJUNTOS</h6>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Carta de Solicitud:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="">
                                    @if($accreditation->fileRequestLetter)
                                        <input type="hidden" name="file_ro_request_letter" data-name="{{ $accreditation->fileRequestLetter->origin_name }}" data-size="{{ $accreditation->fileRequestLetter->size }}"
                                               data-mimetype="{{ $accreditation->fileRequestLetter->mime_type }}" data-path="{{ $accreditation->fileRequestLetter->url_file }}">
                                    @endif
                                    <input type="file" name="media_file_ro_request_letter" class="files" id="kt_media_file_ro_request_letter">
                                </div>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        @if($profile->fileLegalAttorney)
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Poder Notariado (Si corresponde):</label>
                            </div>
                            <div class="col-md-8">
                                <div class="">
                                    @if($profile->fileLegalAttorney)
                                        <input type="hidden" name="file_ro_legal_attorney" data-name="{{ $profile->fileLegalAttorney->origin_name }}" data-size="{{ $profile->fileLegalAttorney->size }}"
                                               data-mimetype="{{ $profile->fileLegalAttorney->mime_type }}" data-path="{{ $profile->fileLegalAttorney->url_file }}">
                                    @endif
                                    <input type="file" name="media_file_ro_legal_attorney" class="files" id="kt_media_file_ro_legal_attorney">
                                </div>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>
                        @endif

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Cédula de Identidad:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="">
                                    @if($profile->fileRepDocument)
                                        <input type="hidden" name="file_ro_rep_document" data-name="{{ $profile->fileRepDocument->origin_name }}" data-size="{{ $profile->fileRepDocument->size }}"
                                               data-mimetype="{{ $profile->fileRepDocument->mime_type }}" data-path="{{ $profile->fileRepDocument->url_file }}">
                                    @endif
                                    <input type="file" name="media_file_ro_rep_document" class="files" id="kt_media_file_ro_rep_document">
                                </div>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">NIT:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="">
                                    @if($profile->fileNit)
                                        <input type="hidden" name="file_ro_nit" data-name="{{ $profile->fileNit->origin_name }}" data-size="{{ $profile->fileNit->size }}"
                                               data-mimetype="{{ $profile->fileNit->mime_type }}" data-path="{{ $profile->fileNit->url_file }}">
                                    @endif
                                    <input type="file" name="media_file_ro_nit" class="files" id="kt_media_file_ro_nit">
                                </div>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Declaración Jurada:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="">
                                    @if($accreditation->fileAffidavit)
                                        <input type="hidden" name="file_ro_affidavit" data-name="{{ $accreditation->fileAffidavit->origin_name }}" data-size="{{ $accreditation->fileAffidavit->size }}"
                                               data-mimetype="{{ $accreditation->fileAffidavit->mime_type }}" data-path="{{ $accreditation->fileAffidavit->url_file }}">
                                    @endif
                                    <input type="file" name="media_file_ro_affidavit" class="files" id="kt_media_file_ro_affidavit">
                                </div>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Tarifario:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="">
                                    @if($accreditation->filePricingList)
                                        <input type="hidden" name="file_ro_pricing_list" data-name="{{ $accreditation->filePricingList->origin_name }}" data-size="{{ $accreditation->filePricingList->size }}"
                                               data-mimetype="{{ $accreditation->filePricingList->mime_type }}" data-path="{{ $accreditation->filePricingList->url_file }}">
                                    @endif
                                    <input type="file" name="media_file_ro_pricing_list" class="files" id="kt_media_file_ro_pricing_list">
                                </div>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

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