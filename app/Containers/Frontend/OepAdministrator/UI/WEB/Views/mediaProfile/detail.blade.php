@extends('vendor@template::admin.layouts.master', ['page' => 'media_list_all'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">MEDIO DE COMUNICACIÓN</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Medios de Comunicación</li>
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

                        <div class="d-flex flex-center flex-column py-5">

                            <div class="symbol symbol-175px mb-7">
                                <div class="h-175px w-175px" style="background-image: url({{ asset('storage') . $profile->logo  }}); background-size: cover; background-position: center"></div>
{{--                                <img src="{{ asset('storage') . $profile->logo  }}" alt="image" />--}}
                            </div>

                            <a class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $profile->name }}</a>

                            <div class="mb-9">
                                @switch($profile->status)
                                    @case('created')
                                    <span class="badge badge-info">Nuevo</span>
                                    @break

                                    @case('active')
                                    <span class="badge badge-success">Activo</span>
                                    @break

                                    @case('archived')
                                    <span class="badge badge-danger">Archivado</span>
                                    @break
                                @endswitch
                            </div>

                            <div class="d-flex flex-wrap flex-center">
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bold text-gray-700">
                                        <span class="w-75px">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $profile->registration_date)->format('d/m/Y H:i')  }}</span>
                                    </div>
                                    <div class="fw-semibold text-center text-muted">Fecha de Registro</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                    <div class="fs-4 fw-bold text-gray-700">
                                        <span class="w-50px">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $profile->updated_at)->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <div class="fw-semibold text-center text-muted">Última Actualización</div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 text-center fs-7">Correo:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $profile->email }}</div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--end::Sidebar-->

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">

                <div class="card card-flush mb-6 mb-xl-9">
                    <div class="card-body px-lg-18 py-lg-15">

                        <div class="m-0 pb-5">
                            <div class="fw-bold fs-3 text-primary mb-8">Datos Generales</div>
                            <div class="row g-5 mb-11">
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Razón Social:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $profile->business_name }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">NIT:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $profile->nit }}</div>
                                </div>
                            </div>
                            <div class="row g-5 mb-12">
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Representante Legal:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $profile->rep_full_name }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Documento del Representante:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $profile->rep_document }} {{ $profile->rep_exp }}</div>
                                    {{--<div class="fw-semibold fs-7 text-gray-600"></div>--}}
                                </div>
                            </div>
                        </div>

                        <div class="m-0 pb-5">
                            <div class="fw-bold fs-3 text-primary mb-8">Clasificación</div>
                            <div class="row g-5 mb-11">
                                <div class="col-sm-6">
                                    @php
                                        $types = json_decode($profile->type);
                                    @endphp
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Tipo de Medio:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ implode(', ', $types) }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Cobertura:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $profile->coverage }}</div>
                                </div>
                            </div>
                            <div class="row g-5 mb-12">
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Alcance:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $profile->scope }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">
                                        @switch($profile->scope)
                                            @case('Nacional')
                                            @php
                                                $states = [];
                                                if ($profile->scope_department) {
                                                    $states = json_decode($profile->scope_department);
                                                }
                                                $scope_content = implode(', ', $states);
                                            @endphp
                                            <span>Departamentos:</span>
                                            @break
                                            @case('Departamental')
                                            @php
                                                $state = '';
                                                if ($profile->scope === 'Departamental' && $profile->scope_department) {
                                                    $state = json_decode($profile->scope_department)[0];
                                                }
                                                $scope_content = $state;
                                            @endphp
                                            <span>Departamento:</span>
                                            @break
                                            @case('Municipal')
                                            @php
                                                $scope_content = $profile->municipality;
                                            @endphp
                                            <span>Municipio:</span>
                                            @break
                                            @default
                                            <span>-</span>
                                        @endswitch
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $scope_content }}</div>
                                    {{--<div class="fw-semibold fs-7 text-gray-600"></div>--}}
                                </div>
                            </div>
                        </div>

                        <div class="m-0">
                            <div class="fw-bold fs-3 text-primary mb-8">Datos de Contacto</div>
                            <div class="row g-5 mb-11">
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Domicilio Legal del Medio:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $profile->legal_address }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Celular:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $profile->cellphone }}</div>
                                </div>
                            </div>
                            <div class="row g-5">
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Página web:</div>
                                    <div class="fw-bold fs-6 text-gray-800">{{ $profile->website ? $profile->website : '-' }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Redes Sociales:</div>
                                    <div class="fw-bold fs-6 text-gray-800">
                                        @php
                                            $rrss = $profile->rrss ? json_decode($profile->rrss) : [];
                                        @endphp
                                        <p class="form-control form-control-plaintext">
                                            @if(count($rrss)>0)
                                                @foreach($rrss as $red)
                                                    <a href="{{ $red->rrss_value }}" target="_blank" class="fs-6">{{ $red->rrss_option }}</a><br>
                                                @endforeach
                                            @else
                                                <span>-</span>
                                            @endif

                                        </p>
                                    </div>
                                    {{--<div class="fw-semibold fs-7 text-gray-600"></div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card pt-4 mb-6 mb-xl-9">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h2>Procesos Electorales</h2>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                    <tr class="text-start text-muted text-uppercase gs-0">
                                        <th class="text-start min-w-70px">Documento</th>
                                        <th>Proceso Electoral</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center min-w-70px">Fecha de envío</th>
                                        <th class="text-end min-w-70px">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="fs-6 fw-semibold text-gray-600">

                                    @foreach($accreditations as $accreditation)
                                    <tr>
                                        <td>{{ $accreditation->code }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a class="symbol symbol-50px">
                                                    <span class="h-50px w-50px symbol-label" style="background-image:url({{ asset('storage') . $accreditation->election->logo_image }});
                                                            background-size: cover; background-position: center"></span>
                                                </a>
                                                <div class="ms-3">
                                                    <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-1">
                                                        {{ $accreditation->election->name }}</div>
                                                    <div class="text-muted fs-7">{{ $accreditation->election->code }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @switch($accreditation->status)
                                                @case('new')
                                                <span class="badge badge-info py-2 px-4">Nuevo</span>
                                                @break

                                                @case('observed')
                                                <span class="badge badge-warning py-2 px-4">Observado</span>
                                                @break

                                                @case('accredited')
                                                <span class="badge badge-success py-2 px-4">Acreditado</span>
                                                @break

                                                @case('archived')
                                                <span class="badge badge-secondary py-2 px-4">Archivado</span>
                                                @break

                                                @case('rejected')
                                                <span class="badge badge-danger py-2 px-4">Rechazado</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="text-center">{{ $accreditation->submitted_at }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('oep_admin_media_accreditation_detail', ['id' => $accreditation->id]) }}" class="btn btn-sm btn-icon btn-secondary">
                                                <i class="ki-outline ki-arrow-right fs-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
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

@endsection

@section('scripts')
    <script src="{{ asset('themes/admin/js/custom/media/detail.js') }}"></script>
@endsection