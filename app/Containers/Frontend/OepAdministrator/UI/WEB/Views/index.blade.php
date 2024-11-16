@extends('vendor@template::admin.layouts.master', ['page' => 'dashboard'])

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="overflow-auto pb-0">
            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                <i class="ki-duotone ki-graph-up fs-3tx text-primary me-4">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                    <span class="path6"></span>
                </i>
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <div class="mb-3 mb-md-0 fw-semibold">
                        <h4 class="text-gray-900 fw-bold">¡Bienvenido al Sistema de Monitoreo de Campaña y Propaganda Electoral!</h4>
                        <h5 class="text-muted fw-bold">Tu plataforma centralizada para la gestión eficiente de registros de medios de comunicación.</h5>
                        <div class="fs-6 text-gray-600 pe-7">
                            Nos complace darte la bienvenida a este sistema, diseñado específicamente para facilitar la administración, organización y seguimiento
                            de los registros de monitoreo y acreditaciónes a medios de comunicación, entre otras características.
                            Aquí podrás gestionar de manera integral y dinámica toda la información, asegurando que cada detalle esté al alcance de tu mano
                            y que el flujo de trabajo sea más ágil y efectivo.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($election)
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-0">
            <div class="col-xl-9">
                <div class="card card-flush h-md-100">
                    <div class="card-body py-9">
                        <div class="d-flex flex-column flex-lg-row  gx-9_ h-100">
                            <div class="flex-column flex-lg-row-auto w-lg-300px w-xl-300px me-lg-15">
                                <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-w-300px h-100">
                                    <img src="{{ asset('storage') . $election->logo_image }}" class="w-100" style="max-height: 200px" alt="Logo Proceso Electoral">
                                </div>
                            </div>
                            <div class="flex-lg-row-fluid mb-10 mb-lg-0">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-7">
                                        <div class="d-flex flex-stack mb-6">
                                            <div class="flex-shrink-0 me-5">
                                                <span class="text-gray-500 fs-7 fw-bold me-2 d-block lh-1 pb-1">Proceso Electoral activo</span>
                                                <span class="text-gray-800 fs-2 fw-bold">{{ $election->name }}</span>
                                            </div>
                                            <span class="badge badge-light-success flex-shrink-0 align-self-center py-3 px-4 fs-7">Activo</span>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                            <div class="d-flex align-items-center me-5 me-xl-13">
                                                <div class="symbol symbol-30px symbol-circle me-3">
                                                <span class="symbol-label bg-secondary">
                                                    <i class="ki-outline ki-category fs-5"></i>
                                                </span>
                                                </div>
                                                <div class="m-0">
                                                    <span class="fw-semibold text-gray-500 d-block fs-8">Categoría</span>
                                                    <span class="fw-bold text-gray-800 fs-7">{{ $election->type }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-30px symbol-circle me-3">
                                                <span class="symbol-label bg-secondary">
                                                    <i class="ki-outline ki-calendar fs-5"></i>
                                                </span>
                                                </div>
                                                <div class="m-0">
                                                    <span class="fw-semibold text-gray-500 d-block fs-8">Fecha</span>
                                                    <span class="fw-bold text-gray-800 fs-7">{{ $election->election_date }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                                            {{ substr($election->description, 0, 200) . "..." }}
                                        </span>
                                    </div>
                                    <div class="d-flex flex-stack mt-auto bd-highlight">
                                        <div></div>
                                        <a href="" class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">
                                            Ver más
                                            <i class="ki-duotone ki-exit-right-corner fs-4 ms-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #F1416C;background-image:url('assets/media/svg/shapes/wave-bg-red.svg')">
                    <div class="card-header pt-5 mb-3">
                        <div class="d-flex flex-center rounded-circle h-60px w-60px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
                            <i class="ki-duotone ki-user text-white fs-2qx lh-0">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                                <span class="path7"></span>
                                <span class="path8"></span>
                            </i>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-end mb-3">

                        <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-5">
                            <span class="fs-2hx text-white fw-bold me-6">{{ $count_users_media }}</span>
                            <div class="fw-bold fs-6 text-gray-400">
                                <span class="d-block">Cuentas de</span>
                                <span class="">Medios de Comunicación</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <span class="fs-2hx text-white fw-bold me-6">{{ $count_users_political }}</span>
                            <div class="fw-bold fs-6 text-gray-400">
                                <span class="d-block">Cuentas de</span>
                                <span class="">Partidos Políticos</span>
                            </div>
                        </div>
                        </div>

                    </div>
{{--                    <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">--}}
{{--                        <div class="fw-bold text-white py-2">--}}
{{--                            <span class="fs-1 d-block"></span>--}}
{{--                            <span class="opacity-50"></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <div class="row g-5 g-xl-10 mb-xl-10">

            <div class="col-sm-6 col-xl-3">
                <div class="card h-100">
                    <div class="card-header flex-nowrap border-0 pt-9">
                        <div class="card-title m-0">
                            <i class="ki-duotone ki-chart-line fs-3hx text-gray-400">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="card-toolbar m-0">
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                        <div class="fs-2tx fw-bold mb-3">{{ $count_accreditations }}</div>
                        <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                            <i class="ki-duotone ki-Up-right fs-3 me-1 text-danger"></i>
                            <div class="fw-semibold text-gray-500">Medios acreditados/registrados</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card h-100">
                    <div class="card-header flex-nowrap border-0 pt-9">
                        <div class="card-title m-0">
                            <i class="ki-duotone ki-chart-line fs-3hx text-gray-400">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="card-toolbar m-0">
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                        <div class="fs-2tx fw-bold mb-3">{{ $count_registrations }}</div>
                        <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                            <i class="ki-duotone ki-Up-right fs-3 me-1 text-danger"></i>
                            <div class="fw-semibold text-gray-500">Partidos Políticos registrados</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card h-100">
                    <div class="card-header flex-nowrap border-0 pt-9">
                        <div class="card-title m-0">
                            <i class="ki-duotone ki-chart-line fs-3hx text-gray-400">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="card-toolbar m-0">
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                        <div class="fs-2tx fw-bold mb-3">{{ $count_monitoring }}</div>
                        <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                            <i class="ki-duotone ki-Up-right fs-3 me-1 text-danger"></i>
                            <div class="fw-semibold text-gray-500">Registros de monitoreo</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card h-100">
                    <div class="card-header flex-nowrap border-0 pt-9">
                        <div class="card-title m-0">
                            <i class="ki-duotone ki-chart-line fs-3hx text-gray-400">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="card-toolbar m-0">
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                        <div class="fs-2tx fw-bold mb-3">{{ $count_analysis }}</div>
                        <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                            <i class="ki-duotone ki-Up-right fs-3 me-1 text-danger"></i>
                            <div class="fw-semibold text-gray-500">Informes de Análisis</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection