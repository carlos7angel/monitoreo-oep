@extends('vendor@template::admin.layouts.master', ['page' => 'monitoring_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">REGISTROS DE MONITOREO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="{{ route('oep_admin_index') }}" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">
                <a href="{{ route('oep_admin_media_elections_list_for_monitoring') }}" class="text-gray-600 text-hover-primary">Monitoreo</a>
            </li>
            <li class="breadcrumb-item text-gray-600">{{ $election->name }}</li>
            <li class="breadcrumb-item text-gray-500">Registros</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Nuevo
            <i class="ki-duotone ki-down fs-2 me-0"></i>
        </a>
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
            @if($election->fid_form_tv_media)
            <div class="menu-item px-5"><a href="{{ route('oep_admin_media_monitoring_create', ['id' => $election->id, 'media' => 'TV']) }}" class="menu-link px-5">M. Televisivos</a></div>
            @endif
            @if($election->fid_form_radio_media)
            <div class="menu-item px-5"><a href="{{ route('oep_admin_media_monitoring_create', ['id' => $election->id, 'media' => 'RADIO']) }}" class="menu-link px-5">M. Radiales</a></div>
            @endif
            @if($election->fid_form_print_media)
            <div class="menu-item px-5"><a href="{{ route('oep_admin_media_monitoring_create', ['id' => $election->id, 'media' => 'PRINT']) }}" class="menu-link px-5">M. Impresos</a></div>
            @endif
            @if($election->fid_form_digital_media)
            <div class="menu-item px-5"><a href="{{ route('oep_admin_media_monitoring_create', ['id' => $election->id, 'media' => 'DIGITAL']) }}" class="menu-link px-5">M. Digitales</a></div>
            @endif
            @if($election->fid_form_rrss_media)
            <div class="menu-item px-5"><a href="{{ route('oep_admin_media_monitoring_create', ['id' => $election->id, 'media' => 'RRSS']) }}" class="menu-link px-5">Redes Sociales</a></div>
            @endif
        </div>
    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card mb-5">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-5">
                    <div class="me-7 mb-4">
                        @php
                            if ($election->logo_image) {
                                $logo = asset('storage') . $election->logo_image ;
                            } else {
                                $logo = asset('themes/common/media/images/blank-image.jpg');
                            }
                        @endphp
                        <div class="w-100px h-100px w-lg-120px h-lg-120px position-relative border-1 "
                             style="background-image: url({{$logo}}); background-size: contain; background-repeat: no-repeat; background-position: center">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-1">
                                    <a class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{ $election->name }}</a>
                                    @switch($election->status)
                                        @case('active')
                                            <span class="badge badge-success me-auto">Activo</span>
                                        @break
                                        @case('finished')
                                            <span class="badge badge-info me-auto">Finalizado</span>
                                        @break
                                        @default
                                            <span>-</span>
                                        @break
                                    @endswitch
                                </div>
                                <div class="d-flex flex-wrap fw-semibold mb-4 fs-7 text-gray-500">Categoria:
                                    <span class="badge badge-secondary ms-3 me-auto">{{ $election->type }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-start">
                            <div class="d-flex flex-wrap">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator"></div>

                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-6 fw-bold">
                    <li class="nav-item">
                        <button type="button" data-status="" class="nav-link text-active-primary py-5 me-6 kt_btn_select_media active">Todos</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" data-status="TV" class="nav-link text-active-primary py-5 me-6 kt_btn_select_media">M. TELEVISIVOS</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" data-status="RADIO" class="nav-link text-active-primary py-5 me-6 kt_btn_select_media">M. RADIALES</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" data-status="PRINT" class="nav-link text-active-primary py-5 me-6 kt_btn_select_media">M. IMPRESOS</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" data-status="DIGITAL" class="nav-link text-active-primary py-5 me-6 kt_btn_select_media">M. DIGITALES</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" data-status="RRSS" class="nav-link text-active-primary py-5 me-6 kt_btn_select_media">M. REDES SOCIALES</button>
                    </li>
                </ul>

            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" class="form-control form-control-sm form-control-solid ps-10" name="dt_search_input" value="" placeholder="Buscador" />
                        <input type="hidden" name="dt_search_by_media_type" class="datatable-input" data-col-index="3" value="" />
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
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_monitoring_by_election"
                       data-url="{{ route('oep_admin_media_monitoring_by_election_json_dt', ['id' => $election->id]) }}" aria-describedby="table"><!-- //NOSONAR -->
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-70px">Registro</th>
                        <th class="min-w-200px">Medio de Comunicación</th>
                        <th class="text-center min-w-100px">Tipo de Medio</th>
                        <th class="text-center min-w-70px">Fecha de Registro</th>
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
    <script src="{{ asset('themes/admin/js/custom/monitoring/monitoring_by_election.js') }}"></script>
@endsection