@extends('vendor@template::admin.layouts.master', ['page' => 'monitoring_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">REGISTRO DE MONITOREO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Monitoreo</li>
            <li class="breadcrumb-item text-gray-600">Procesos Electorales</li>
            <li class="breadcrumb-item text-gray-500">Detalle</li>

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

                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">

                        <div class="d-flex flex-column py-5">

                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL DOCUMENTO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Operación:</div>
                                <div class="fw-bold text-gray-800 fs-6">Registro de Monitoreo</div>
                            </div>

                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Tipo de medio:</div>
                                <div class="fw-bold text-gray-800 fs-6">
                                    @switch($monitoring->media_type)
                                        @case('TV')
                                        <span>MEDIO TELEVISIVO</span>
                                        @break
                                        @case('RADIO')
                                        <span>MEDIO RADIAL</span>
                                        @break
                                        @case('PRINT')
                                        <span>MEDIO IMPRESO</span>
                                        @break
                                        @case('DIGITAL')
                                        <span>MEDIO DIGITAL</span>
                                        @break
                                        @case('RRSS')
                                        <span>REDES SOCIALES</span>
                                        @break
                                    @endswitch
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Nro Documento:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $monitoring->code }}</div>
                            </div>

                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Estado:</div>
                                <div class="fw-bold text-gray-800 fs-6">
                                    @switch($monitoring->status)
                                        @case('CREATED')
                                        <span class="badge badge-info py-1 px-2">Nuevo</span>
                                        @break
                                        @case('ANALYSIS')
                                        <span class="badge badge-info py-1 px-2">En análisis</span>
                                        @break
                                        @case('ARCHIVED')
                                        <span class="badge badge-secondary py-1 px-2">Archivado</span>
                                        @break
                                    @endswitch
                                </div>
                            </div>

                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha de registro:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $monitoring->registered_at }}</div>
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
                                <div class="fw-bold text-gray-800 fs-6">{{ $election->name }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Categoría:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $election->type }}</div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha del Proceso:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $election->election_date }}</div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!--end::Sidebar-->

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">

                <div class="card card-flush mb-6 mb-xl-9">
                    <div class="card-header mt-6">
                        <div class="card-title flex-column">
                            <h2 class="mb-1 text-uppercase">Datos del Registro de Monitoreo</h2>
                            <div class="fs-6 fw-semibold text-muted"></div>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body p-9 pt-4">

                        <h6 class="mb-5 fw-bolder text-gray-600 text-hover-primary">MEDIO DE COMUNICACIÓN</h6>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Nombre del Medio:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">RED UNO {{ $monitoring->fid_media_profile }} (TODO:)</p>
                            </div>
                        </div>
                        <div class="separator separator-dashed border-muted"></div>

                        <div id="wrapper-summary-accreditation" class="wrapper_content_step_3">
                            @include('frontend@oepAdministrator::monitoring.partials.summaryFormMonitoring')
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>

    </div>
@endsection

@section('modals')

@endsection

@section('styles')
    <!-- fileuploader -->
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css') }}" media="all" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
    <script src="{{ asset('themes/admin/js/custom/monitoring/detail_monitoring.js') }}"></script>
@endsection