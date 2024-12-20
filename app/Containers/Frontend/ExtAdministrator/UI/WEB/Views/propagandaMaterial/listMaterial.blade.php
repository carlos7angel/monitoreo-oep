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
        <li class="breadcrumb-item text-white fw-bold lh-1">Lista Material ({{ $registration->election->name }})</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Material de Propaganda Electoral
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3"></span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">



            <div class="card mb-5 mb-xl-8">
                <div class="card-body p-12">

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
                                            <div class="fw-bold fs-6 text-gray-800 kt_data_election_name">{{ $registration->election->name }}</div>
                                        </div>
                                    </div>
                                    <div class="row g-5 mb-2">
                                        <div class="col-sm-4">
                                            <div class="fw-semibold fs-7 text-gray-600 mb-1">Categoría:</div>
                                            <div class="fw-bold fs-6 text-gray-800 kt_data_election_type">{{ $registration->election->type }}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha del Proceso:</div>
                                            <div class="fw-bold fs-6 text-gray-800 kt_data_election_date">{{ $registration->election->election_date }}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha límite para subir material:</div>
                                            <div class="fw-bold fs-6 text-gray-800 kt_data_election_end_date">{{ $registration->election->end_date_political_registration }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Material publicado</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">Lista de todos los recursos</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('ext_admin_propaganda_material_create', ['id' => $registration->id]) }}" class="btn btn-sm btn-primary"><i class="ki-outline ki-plus fs-2"></i>Nuevo Material</a>
                    </div>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table align-middle gs-0 gy-4" aria-describedby="table"><!-- //NOSONAR -->
                            <thead>
                            <tr class="fw-bold text-muted bg-light">
                                <th class="ps-4 min-w-325px rounded-start">Archivo</th>
                                <th class="min-w-125px">Fecha creación</th>
                                <th class="min-w-125px">Tipo</th>
                                <th class="min-w-200px">Enlace al archivo</th>
                                <th class="pe-4 min-w-200px text-end rounded-end">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($registration->materials) > 0)
                                @foreach($registration->materials as $material)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-45px me-5">
                                                <span class="symbol-label bg-light-info text-info fw-bold">
                                                    @if($material->type == 'FILE')
                                                        <span class="text-uppercase">
                                                            {{ array_reverse(explode(".", $material->fileMaterial->name))[0] }}
                                                        </span>
                                                    @endif
                                                    @if($material->type == 'LINK')
                                                        <span>LINK</span>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">{{ $material->name }}</a>
                                                {{-- <span class="text-muted fw-semibold text-muted d-block fs-7">-</span>--}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-muted fw-semibold text-end">{{ $material->created_at }}</span>
                                    </td>
                                    <td>
                                        @if($material->type == 'FILE')
                                            <span class="badge badge-secondary fs-7 fw-bold">Archivo</span>
                                        @endif
                                        @if($material->type == 'LINK')
                                            <span class="badge badge-secondary fs-7 fw-bold">Enlace</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($material->type == 'FILE')
                                            <a href="{{ $material->fileMaterial->url_file }}" target="_blank" rel="noopener" class="text-gray-900 fw-bold text-hover-info d-block mb-1 fs-7">{{ $material->fileMaterial->url_file }}</a>
                                        @endif
                                        @if($material->type == 'LINK')
                                            <a href="{{ $material->link_material }}" target="_blank" rel="noopener" class="text-gray-900 fw-bold text-hover-info d-block mb-1 fs-7">{{ $material->link_material }}</a>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('ext_admin_propaganda_material_edit', ['registration_id' => $registration->id, 'id' => $material->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <i class="ki-outline ki-pencil fs-2"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-url="{{ route('ext_admin_propaganda_material_delete', ['registration_id' => $registration->id, 'id' => $material->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm kt_btn_material_delete">
                                            <i class="ki-outline ki-trash fs-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td colspan="5" class="text-center"><span class="text-muted">Aún no existen registros</span></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
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
    <script src="{{ asset('themes/external/js/custom/propaganda-material/list.js') }}"></script>
@endsection