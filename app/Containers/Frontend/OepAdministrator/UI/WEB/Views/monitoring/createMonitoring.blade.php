@extends('vendor@template::admin.layouts.master', ['page' => 'monitoring_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">NUEVO REGISTRO DE MONITOREO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Monitoreo</li>
            <li class="breadcrumb-item text-gray-500">Procesos Electorales</li>
            <li class="breadcrumb-item text-gray-500">Nuevo</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <div class="d-flex justify-content-end">
            <button type="submit" id="kt_create_monitoring_submit" class="btn btn-primary">
                <span class="indicator-label">Guardar</span>
                <span class="indicator-progress">
                    Espere por favor...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">
        <form id="kt_create_monitoring_form" class="form d-flex flex-column flex-lg-row" method="post" autocomplete="off"
              action="{{ route('oep_admin_media_monitoring_store', ['id' => $election->id, 'media' => $media_type]) }}">

            <input type="hidden" name="oep_election_id" value="{{ $election->id }}">
            <input type="hidden" name="oep_media_type" value="{{ $media_type }}">

            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

                <div class="card card-flush mb-5 mb-xl-8">

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
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha del Proceso:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $election->election_date }}</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 mb-10">

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>NUEVO REGISTRO
                                @switch($media_type)
                                    @case('TV')
                                    <span class="text-info">MEDIO TELEVISIVO</span>
                                    @break
                                    @case('RADIO')
                                    <span class="text-info">MEDIO RADIAL</span>
                                    @break
                                    @case('PRINT')
                                    <span class="text-info">MEDIO IMPRESO</span>
                                    @break
                                    @case('DIGITAL')
                                    <span class="text-info">MEDIO DIGITAL</span>
                                    @break
                                    @case('RRSS')
                                    <span class="text-info">REDES SOCIALES</span>
                                    @break
                                @endswitch
                            </h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Tipo de Medio:</label>
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="" name="oep_media_type_text" readonly disabled>
                                <option value="TV" {{ $media_type === 'TV' ? 'selected="selected"' : '' }}>MEDIO TELEVISIVO</option>
                                <option value="RADIO" {{ $media_type === 'RADIO' ? 'selected="selected"' : '' }}>MEDIO RADIAL</option>
                                <option value="PRINT" {{ $media_type === 'PRINT' ? 'selected="selected"' : '' }}>MEDIO IMPRESO</option>
                                <option value="DIGITAL" {{ $media_type === 'DIGITAL' ? 'selected="selected"' : '' }}>MEDIO DIGITAL</option>
                                <option value="RRSS" {{ $media_type === 'RRSS' ? 'selected="selected"' : '' }}>REDES SOCIALES</option>
                            </select>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Medio de Comunicación:</label>
                            <select class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Seleccione un medio" name="media_profile"
                                    data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio">
                                <option value=""></option>
                                @foreach($medias as $media)
                                    <option value="{{ $media->id }}" >{{ $media->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @include('frontend@oepAdministrator::monitoring.partials.dynamicForm')

                    </div>
                </div>

            </div>



        </form>

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
    <script src="{{ asset('themes/admin/js/custom/monitoring/create.js') }}"></script>
@endsection