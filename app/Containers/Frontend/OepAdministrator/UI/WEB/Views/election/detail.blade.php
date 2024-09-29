@extends('vendor@template::admin.layouts.master', ['page' => 'election_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">PROCESO ELECTORAL</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Procesos Electorales</li>
            <li class="breadcrumb-item text-gray-500">Detalle</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card mb-5 mb-xxl-8">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-7 mb-4">
                        @php
                            if ($election->logo_image) {
                                $logo = asset('storage') . $election->logo_image ;
                            } else {
                                $logo = asset('themes/common/media/images/blank-image.jpg');
                            }
                        @endphp
                        <div class="w-100px h-100px w-lg-150px h-lg-150px position-relative border-1 "
                             style="background-image: url({{$logo}}); background-size: cover; background-position: center">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $election->name }}</a>
                                </div>
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <div class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                        <span class="me-3 fs-7">Estado:</span>
                                        @switch($election->status)
                                            @case('draft')
                                            <span class="badge badge-info py-1 px-4">Borrador</span>
                                            @break
                                            @case('active')
                                            <span class="badge badge-success py-1 px-4">Activo</span>
                                            @break
                                            @case('unpublished')
                                            <span class="badge badge-secondary py-1 px-4">Despublicado</span>
                                            @break
                                            @case('finished')
                                            <span class="badge badge-info py-1 px-4">Finalizado</span>
                                            @break
                                            @case('archived')
                                            <span class="badge badge-danger py-1 px-4">Archivado</span>
                                            @break
                                            @case('canceled')
                                            <span class="badge badge-danger py-1 px-4">Cancelado</span>
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex my-4">
                                @switch($election->status)
                                    @case('draft')
                                        <a href="javascript:void(0)" data-url="{{ route('oep_admin_elections_update_status', ['id' => $election->id]) }}" data-status="active" class="btn btn-sm btn-info kt_change_election_status">Publicar</a>
                                    @break
                                    @case('active')
                                        <a href="javascript:void(0)" data-url="{{ route('oep_admin_elections_update_status', ['id' => $election->id]) }}" data-status="unpublished" class="btn btn-sm btn-info kt_change_election_status me-1">Despublicar</a>
                                        <a href="javascript:void(0)" data-url="{{ route('oep_admin_elections_update_status', ['id' => $election->id]) }}" data-status="finished" class="btn btn-sm btn-info kt_change_election_status">Finalizar</a>
                                    @break
                                    @case('unpublished')
                                        <a href="javascript:void(0)" data-url="{{ route('oep_admin_elections_update_status', ['id' => $election->id]) }}" data-status="active" class="btn btn-sm btn-info kt_change_election_status me-1">Publicar</a>
                                        <a href="javascript:void(0)" data-url="{{ route('oep_admin_elections_update_status', ['id' => $election->id]) }}" data-status="archived" class="btn btn-sm btn-info kt_change_election_status">Archivar</a>
                                    @break
                                    @case('finished')
                                    @break
                                    @case('archived')
                                    @break
                                    @case('canceled')
                                    @break
                                @endswitch

                            </div>
                        </div>
                        <div class="d-flex flex-wrap flex-stack">
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <div class="d-flex flex-wrap">
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-5 fw-bold">{{ $election->election_date }}</div>
                                        </div>
                                        <div class="fw-semibold fs-7 text-gray-500">Fecha del Proceso</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-5 fw-bold">{{ $election->type }}</div>
                                        </div>
                                        <div class="fw-semibold fs-7 text-gray-500">Categoría</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-5 fw-bold">{{ $election->code }}</div>
                                        </div>
                                        <div class="fw-semibold fs-7 text-gray-500">Identificador</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-end flex-column mt-3">
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#kt_media_tab">Registro de Medios</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_monitoring_tab">Monitoreo de Propaganda</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_political_tab">Partidos Políticos</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="kt_media_tab" role="tab-panel">

                <div class="d-flex flex-column flex-lg-row">
                    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body">

                                <div class="d-flex flex-stack mb-5">
                                    <div class="fw-bold fs-2">Preferencias</div>
                                    @if($election->enable_for_media_registration)
                                        <span class="badge badge-info" >Activado</span>
                                    @else
                                        <span class="badge badge-secondary" >Desactivado</span>
                                    @endif
                                </div>

                                @if($election->enable_for_media_registration)
                                <div class="separator"></div>
                                <div class="pb-5 fs-6">
                                    <div class="fw-bold mt-5">Fecha de Inicio de Registro:</div>
                                    <div class="text-gray-600">{{ $election->start_date_media_registration }}</div>
                                    <div class="fw-bold mt-5">Fecha Límite de Registro:</div>
                                    <div class="text-gray-600">{{ $election->end_date_media_registration }}</div>
                                    <div class="fw-bold mt-5">Declaración Jurada:</div>
                                    <div class="text-gray-600">
                                        @if($election->fileAffidavitMediaRegistration)
                                            <a target="_blank" href="{{ $election->fileAffidavitMediaRegistration->url_file }}" class="text-primary text-hover-primary">Descargar</a>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </div>
{{--                                    <div class="fw-bold mt-5">Formato de Declaración Jurada:</div>--}}
{{--                                    <div class="text-gray-600">--}}
{{--                                        <a href="#" class="text-primary text-hover-primary">Descargar</a>--}}
{{--                                    </div>--}}
                                    <div class="fw-bold mt-5">Plazo para subir observaciones:</div>
                                    <div class="text-gray-600">{{ $election->due_days_observed_media_registration ? $election->due_days_observed_media_registration . ' días' : 'Ninguno' }}</div>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="flex-lg-row-fluid ms-lg-15">

                        @if($election->enable_for_media_registration)
                            <div class="card card-flush flex-row-fluid">

                                <div class="card-header">
                                    <div class="card-title">
                                        <span class="fw-bold fs-2">Últimos Registros/Acreditaciones</span>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <thead>
                                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-175px">Medio de Comunicación</th>
                                                <th class="min-w-100px text-center">Tipo de Medio</th>
                                                <th class="min-w-100px text-center">Documento</th>
                                                <th class="min-w-70px text-center">Registro</th>
                                                <th class="min-w-100px text-end">Estado</th>
                                            </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">

                                            @if(count($accreditations) > 0)
                                                @foreach($accreditations as $accreditation)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a class="symbol symbol-50px">
                                                                    <span class="symbol-label" style="background-image:url({{ asset('storage') . $accreditation->media->logo }});"></span>
                                                                </a>
                                                                <div class="ms-5">
                                                                    <a class="fw-bold text-gray-900">{{ $accreditation->media->name }}</a>
                                                                    <div class="fs-7 text-muted">{{ $accreditation->media->business_name }}</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            @php
                                                                $types = json_decode($accreditation->media->type);
                                                            @endphp
                                                            <span>
                                                        @foreach($types as $type)
                                                                    <div class="badge badge-secondary py-2 px-4 me-1">{{ $type }}</div>
                                                                @endforeach
                                                    </span>
                                                        </td>
                                                        <td class="text-end">#{{ $accreditation->code }}</td>
                                                        <td class="text-end">{{ $accreditation->submitted_at }}</td>
                                                        <td class="text-end">
                                                            @switch($accreditation->status)
                                                                @case('new')
                                                                <span class="badge badge-info py-1 px-4">Nuevo</span>
                                                                @break
                                                                @case('observed')
                                                                <span class="badge badge-secondary py-1 px-4">Observado</span>
                                                                @break
                                                                @case('accredited')
                                                                <span class="badge badge-success py-1 px-4">Acreditado</span>
                                                                @break
                                                                @case('archived')
                                                                <span class="badge badge-danger py-1 px-4">Archivado</span>
                                                                @break
                                                                @case('rejected')
                                                                <span class="badge badge-danger py-1 px-4">Rechazado</span>
                                                                @break
                                                            @endswitch
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td colspan="5" class="text-end"><a href="#" class="btn btn-sm btn-secondary">Ver más</a></td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center"><span class="text-muted">No existen registros</span></td>
                                                </tr>
                                            @endif

                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                        @else
                        <div class="notice d-flex bg-secondary rounded border-info border border-dashed mb-9 p-6">
                            <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">No existen datos para mostrar</div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade" id="kt_monitoring_tab" role="tab-panel">
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body">

                        En construccion... (MONITOREO)

                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade" id="kt_political_tab" role="tab-panel">
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body">

                        En construcción (PARTIDOS POLITICOS)

                    </div>
                </div>
            </div>
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
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/admin/js/custom/elections/detail.js') }}"></script>
@endsection