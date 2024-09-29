@extends('vendor@template::admin.layouts.master', ['page' => 'media_accreditations'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">ACREDITACIONES</h1>
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

        <div class="card mb-5">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-5">
                    <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                        <img class="mw-100px mw-lg-100px" src="{{ asset('storage') . $election->logo_image }}" alt="logo" />
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
                                <div class="d-flex flex-wrap fw-semibold mb-4 fs-6 text-gray-500">Categoria:
                                    <span class="badge badge-secondary ms-3 me-auto">{{ $election->type }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-start">
                            <div class="d-flex flex-wrap">
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-4 fw-bold">{{ $election->end_date_media_registration }}</div>
                                    </div>
                                    <div class="fw-semibold fs-6 text-gray-500">Plazo accreditaciones</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-3 fw-bold" data-kt-countup="true" data-kt-countup-value="-">-</div>
                                    </div>
                                    <div class="fw-semibold fs-6 text-gray-500">Total Registros</div>
                                </div>
{{--                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="fs-3 fw-bold" data-kt-countup="true" data-kt-countup-value="12">0</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="fw-semibold fs-6 text-gray-500">Acreditados</div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-6 fw-bold">
                    <li class="nav-item">
                        <button type="button" data-status="" class="nav-link text-active-primary py-5 me-6 kt_btn_select_status active">Todos</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" data-status="new" class="nav-link text-active-primary py-5 me-6 kt_btn_select_status">Nuevos</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" data-status="accredited" class="nav-link text-active-primary py-5 me-6 kt_btn_select_status">Acreditados</button>
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
                        <input type="hidden" name="dt_search_by_status" class="datatable-input" data-col-index="5" value="" />
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
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_accreditations_by_election"
                       data-url="{{ route('oep_admin_media_accreditations_by_election_json_dt', ['id' => $election->id]) }}">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-200px">Medio de Comunicación</th>
                        <th class="text-center min-w-100px">Tipo de Medio</th>
                        <th class="text-center min-w-70px">Documento</th>
                        <th class="text-center min-w-70px">Fecha de Registro</th>
                        <th class="text-center min-w-70px">Estado</th>
                        <th class="text-end min-w-70px">Opciones</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                    <tr>
                        <td>
                            <span class="fw-bold">1</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url({{ asset('themes/admin/media/stock/ecommerce/68.png') }});"></span>
                                </a>
                                <div class="ms-3">
                                    <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">Red Uno</div>
                                    <div class="text-muted fs-7">Comania Naranja SRL</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center pe-0">
                            <div class="badge badge-secondary py-2 px-4">Televisivo</div>
                            <div class="badge badge-secondary py-2 px-4">Radial</div>
                        </td>
                        <td class="text-center pe-0">H7VJ4L-2024</td>
                        <td class="text-center pe-0"><span class="text-black">12/11/2024 11:52 pm</span></td>
                        <td class="text-center pe-0">
                            <div class="badge badge-info py-2 px-4">Nuevo</div>
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="las la-arrow-circle-right fs-2"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('modals')
    <div class="modal fade" id="kt_modal_media_profile_detail" tabindex="-1" aria-hidden="true">
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
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" id="kt_media_profile_detail_content">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('themes/common/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/accreditations/accreditations_by_elections.js') }}"></script>
@endsection