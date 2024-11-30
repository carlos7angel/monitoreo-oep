@extends('vendor@template::external.layouts.master', ['page' => 'political_group_registrations'])

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
            <a href="{{ route('ext_admin_registration_elections_list') }}" class="text-white text-hover-secondary">Lista por elecciones</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="{{ route('ext_admin_propaganda_material_by_election_list', ['id' => $registration->election->id]) }}"
               class="text-white text-hover-secondary">Lista Material ({{ $registration->election->name }})</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Nuevo</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Nuevo Material
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Material de Propaganda Electoral</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="row g-7">
            <div class="col-lg-6 col-xl-4">
                <div class="card card-flush">
                    <div class="card-header pt-7">
                        <div class="card-title">
                            <h2>Proceso Electoral</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">

                        <div class="d-flex flex-column py-5">

                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Proceso Electoral:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $registration->election->name }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Código:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $registration->election->code }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Categoría:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $registration->election->type }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha del Proceso:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $registration->election->election_date }}</div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Plazo límite de registro:</div>
                                <div class="fw-bold text-gray-800 fs-6">
                                    @if($registration->election->end_date_political_registration)
                                        <span class="fs-7 pe-2">hasta</span>
                                        <div class="badge badge-secondary py-2 px-2">{{ $registration->election->end_date_political_registration }}</div>
                                    @else
                                        <span class="fs-7"><i>Sin límite</i></span>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card card-flush h-lg-100" style="border: none !important; box-shadow: unset !important;">

                    @if($registration->election->description_for_political_registration)
                        <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-10 p-4 mx-10">
                            <i class="ki-outline ki-information-5 fs-1 text-info me-4"></i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">{!! $registration->election->description_for_political_registration !!}</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card-header pt-0">
                        <div class="card-title">
                            <i class="ki-outline ki-badge fs-1 me-2"></i>
                            <h2>Material Propaganda Electoral</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">

                        <form id="kt_propaganda_material_form_create" class="form" action="{{ route('ext_admin_propaganda_material_store', ['id' => $registration->id]) }}" method="post" autocomplete="off">

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Título</span>
                                </label>
                                <input type="text" class="form-control" name="material_name" value="" />
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Descripción</span>
                                </label>
                                <textarea class="form-control" rows="3" name="material_description"></textarea>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Tipo</span>
                                </label>
                                <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Selecciona una opción" name="material_genre">
                                    <option value="PROPAGANDA">Propaganda</option>
                                    <option value="DIFFUSION_PLAN">Plan de Difusión</option>
                                </select>
                            </div>

                            <div class="mb-7 fv-row">
                                <label class="required fw-semibold fs-6 mb-5">Archivo fuente</label>
                                <div class="d-flex __fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="material_type" type="radio" value="LINK" id="kt_type_option_0" />
                                        <label class="form-check-label" for="kt_type_option_0">
                                            <div class="fw-bold text-gray-800">Link o enlace al recurso</div>
                                        </label>
                                    </div>
                                </div>
                                <div class='my-5'></div>
                                <div class="d-flex __fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="material_type" type="radio" value="FILE" id="kt_type_option_1" />
                                        <label class="form-check-label" for="kt_type_option_1">
                                            <div class="fw-bold text-gray-800">Subir archivo como recurso</div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="kt_material_wrapper_input_file d-none">
                                <div class="fv-row mb-7">
                                    @if($registration->fileLegalAttorney)
                                        <input type="hidden" name="file_power_attorney" data-name="{{ $profile->fileLegalAttorney->origin_name }}" data-size="{{ $profile->fileLegalAttorney->size }}"
                                               data-mimetype="{{ $profile->fileLegalAttorney->mime_type }}" data-path="{{ $profile->fileLegalAttorney->url_file }}">
                                    @endif
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Archivo</span>
                                    </label>
                                    <input type="file" name="material_file" class="files" id="kt_material_file" data-maxsize="{{ $registration->election->max_size_for_political_registration ? (int) $registration->election->max_size_for_political_registration : '3' }}" data-maxfiles="1"
                                           data-accept="{{ $registration->election->mime_types_for_political_registration ? implode(',', json_decode($registration->election->mime_types_for_political_registration)) : '' }}">
                                    <div class="text-muted fs-7">Máximo de tamaño permitido {{ $registration->election->max_size_for_political_registration ? (int) $registration->election->max_size_for_political_registration : '3' }}MB. Formatos aceptados: {{ $registration->election->mime_types_for_political_registration ? implode(',', json_decode($registration->election->mime_types_for_political_registration)) : '-' }}</div>
                                </div>
                            </div>

                            <div class="kt_material_wrapper_input_link d-none">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Enlace al material</span>
                                    </label>
                                    <input type="text" class="form-control" name="material_link" value="" />
                                </div>
                            </div>

                            <div class="separator mb-6"></div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('ext_admin_propaganda_material_by_election_list', ['id' => $registration->election->id]) }}" class="btn btn-light me-3">Cancelar</a>
                                <button type="button" id="kt_propaganda_material_submit" class="btn btn-primary">
                                    <span class="indicator-label">Guardar</span>
                                    <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>

                        </form>
                        <!--end::Form-->
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
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/external/js/custom/propaganda-material/create.js') }}"></script>
@endsection