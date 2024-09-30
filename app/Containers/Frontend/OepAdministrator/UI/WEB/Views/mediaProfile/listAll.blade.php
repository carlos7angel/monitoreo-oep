@extends('vendor@template::admin.layouts.master', ['page' => 'media_list_all'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">MEDIOS DE COMUNICACIÓN</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Medios de Comunicación</li>
            <li class="breadcrumb-item text-gray-500">Todos</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card mb-7">
            <div class="card-body p-5">
                <div class="d-flex align-items-center">
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" class="form-control form-control-sm form-control-solid ps-10" name="dt_search_input" value="" placeholder="Buscador" />
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" id="kt_search" class="btn btn-sm btn-secondary fs-7 me-2">Buscar</button>
                        <button type="button" id="kt_reset" class="btn btn-sm btn-light-secondary fs-7 me-5">Limpiar</button>
                        <a href="javascript:void(0)" id="kt_advanced_search" class="btn btn-link link-info fs-7" data-bs-toggle="collapse" data-bs-target="#kt_advanced_search_form">Búsqueda avanzada</a>
                    </div>
                </div>

                <div class="collapse" id="kt_advanced_search_form">
                    <div class="separator separator-dashed mt-5 mb-4"></div>
                    <div class="row g-8 mb-5">
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Nombre del Medio</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="1" value="" />
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Correo</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="2" value="" />
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Fecha de Registro</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="4" placeholder="dd/mm/yyyy" />

                        </div>
                    </div>
                    <div class="row g-8">
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Tipo de Medio</label>
                            <select class="form-select form-select-solid datatable-input" data-col-index="3" data-control="select2" data-placeholder="Seleccionar" data-hide-search="true">
                                <option value=""></option>
                                <option value="televisivo">Televisivo</option>
                                <option value="radial">Radial</option>
                                <option value="digital">Digital</option>
                                <option value="impreso">Impreso</option>
                            </select>
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Departamento/Municipio de Alcance</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="6" />
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Estado</label>
                            <select class="form-select form-select-solid datatable-input" data-col-index="5" data-control="select2" data-placeholder="Seleccionar" data-hide-search="true">
                                <option value=""></option>
                                <option value="active">Activos</option>
                                <option value="archived">Archivados</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    TODOS LOS MEDIOS
                </div>
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_media_profiles" data-url="{{ route('oep_admin_media_profiles_json_dt') }}">
                    <thead>
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">#</th>
                            <th class="min-w-100px">Medio de Comunicación</th>
                            <th class="text-center min-w-70px">Correo</th>
                            <th class="text-center min-w-70px">Tipo</th>
                            <th class="text-center min-w-70px">Fecha de Registro</th>
                            <th class="text-center min-w-70px">Estado</th>
                            <th class="text-end min-w-70px">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
{{--                        <tr>--}}
{{--                            <td><span class="fw-bold">1</span></td>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <a class="symbol symbol-50px">--}}
{{--                                        <span class="symbol-label" style="background-image:url();"></span>--}}
{{--                                    </a>--}}
{{--                                    <div class="ms-3">--}}
{{--                                        <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-1">Radio Palenque TV</div>--}}
{{--                                        <div class="text-muted fs-7">Radio Televisión Popular S.R.L.</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td class="text-center pe-0"><span>palenque-television@gmail.com</span></td>--}}
{{--                            <td class="text-center pe-0">--}}
{{--                                <div class="badge badge-secondary py-2 px-4">Televisivo</div>--}}
{{--                                <div class="badge badge-secondary py-2 px-4">Radial</div>--}}
{{--                            </td>--}}
{{--                            <td class="text-center pe-0"><span class="text-gray-700">02/10/2024 12:35 pm</span></td>--}}
{{--                            <td class="text-center pe-0">--}}
{{--                                <div class="badge badge-success py-1 px-2">Activo</div>--}}
{{--                            </td>--}}
{{--                            <td class="text-end">--}}
{{--                                <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="ki-outline ki-arrow-right fs-2"></i></a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('modals')
@endsection

@section('styles')
    <link href="{{ asset('themes/common/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/media_profiles/list_all.js') }}"></script>
@endsection