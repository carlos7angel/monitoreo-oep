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

                            @if($accreditation->status === 'observed')
                                <div class="d-flex flex-wrap mt-8">
                                    <a href="{{ route('ext_admin_accreditations_edit', ['id' => $accreditation->id]) }}" class="btn btn-sm btn-primary"><i class="ki-outline ki-pencil fs-3 me-1"></i>Editar</a>
                                </div>
                            @endif

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

                        <div class="flex-column wrapper_content_step_3">

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
                                    @if(count($rrss) > 0)
                                    <p class="form-control form-control-plaintext">
                                        @foreach($rrss as $red)
                                            <a href="{{ $red->rrss_value }}" target="_blank" class="fs-6">{{ $red->rrss_option }}</a><br>
                                        @endforeach
                                    </p>
                                    @else
                                        <span>-</span>
                                    @endif
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