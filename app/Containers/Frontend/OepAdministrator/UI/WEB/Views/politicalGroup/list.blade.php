@extends('vendor@template::admin.layouts.master', ['page' => 'political_group_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">PARTIDOS POLÍTICOS</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="{{ route('oep_admin_index') }}" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-500">Partidos Políticos</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <a href="{{ route('oep_admin_political_group_create') }}" class="btn btn-primary px-5" id="kt_button_new_form"><i class="ki-outline ki-add-files me-2 fs-3"></i> Nuevo Partido</a>
    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card mb-7">
            <div class="card-body">
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
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-body">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_political_group_profiles"
                       data-url="{{ route('oep_admin_political_group_list_json_dt') }}" aria-describedby="table"> <!-- //NOSONAR -->
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-175px">Partido Político</th>
                        <th class="text-center min-w-70px">Correo electrónico</th>
                        <th class="text-center min-w-70px">Cuenta de Usuario</th>
                        <th class="text-center min-w-70px">Fecha Registro</th>
                        <th class="text-center min-w-70px">Estado</th>
                        <th class="text-end min-w-70px">Opciones</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">

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
    <script src="{{ asset('themes/admin/js/custom/political_group_profiles/list.js') }}"></script>
@endsection