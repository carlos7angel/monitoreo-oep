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
        <li class="breadcrumb-item text-white fw-bold lh-1">Lista</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Acreditaciones
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Listado de todas las acreditaciones del medio</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="card mb-7 border-0 shadow-none">
            <div class="card-body p-0">
                <div class="d-flex align-items-center">
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" class="form-control form-control-sm form-control-solid ps-10" name="dt_search_input" value="" placeholder="Buscador" />
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" id="kt_search" class="btn btn-secondary btn-sm fs-8 me-2">Buscar</button>
                        <button type="button" id="kt_reset" class="btn btn-light-secondary btn-sm fs-8 me-5">Limpiar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap flex-stack pb-7">
            <div class="d-flex flex-wrap align-items-center my-1">
                <h3 class="fw-bold me-5 my-1">Acreditaciones
                    <span class="text-gray-500 fs-6 ms-2"> Procesos Electorales ↓ </span>
                </h3>
            </div>
            <div class="d-flex flex-wrap my-1">
                <a href="{{ route('ext_admin_accreditations_new') }}" class="btn btn-primary"><i class="ki-outline ki-file-added fs-3 me-1"></i>Nueva Acreditación</a>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-body">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_accreditations" data-url="{{ route('ext_admin_accreditations_list_json_dt') }}">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="text-center min-w-100px">Documento</th>
                        <th class="min-w-200px">Proceso electoral</th>
                        <th class="text-center min-w-100px">Plazo acreditaciones</th>
                        <th class="text-center min-w-70px">Estado</th>
                        <th class="text-center min-w-70px">Fecha envío</th>
                        <th class="text-end min-w-70px">Opciones</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        <tr>
                            <td><span class="fw-bold">1</span></td>
                            <td class="text-center pe-0">D8A580-2024</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url();"></span>
                                    </a>
                                    <div class="ms-3">
                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">Elecciones Judiciales 2024</div>
                                        <div class="text-muted fs-7">EJUD24</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fs-7 pe-2">Del</span>
                                <div class="badge badge-secondary py-2 px-4">01/09/2024</div>
                                <span class="fs-7 px-2">al</span>
                                <div class="badge badge-secondary py-2 px-4">30/09/2024</div>
                            </td>
                            <td class="text-center pe-0">
                                <div class="badge badge-success py-1 px-2">Acreditado</div>
                            </td>
                            <td class="text-center pe-0"><span class="text-gray-700">02/10/2024 12:35 pm</span></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="ki-outline ki-gear fs-2"></i></a>
                            </td>
                        </tr>
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
    <script src="{{ asset('themes/external/js/custom/accreditation/list.js') }}"></script>
@endsection