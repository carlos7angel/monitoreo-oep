@extends('vendor@template::admin.layouts.master', ['page' => 'political_group_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">DETALLE PARTIDO POLÍTICO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="{{ route('oep_admin_index') }}" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">
                <a href="{{ route('oep_admin_political_group_list') }}" class="text-gray-600 text-hover-primary">Partidos Políticos</a>
            </li>
            <li class="breadcrumb-item text-gray-500">Detalle</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card mb-5 mb-xxl-8">
            <div class="card-body">
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-7 mb-4">
                        @php
                            if ($pp->logo) {
                                $logo = asset('storage') . $pp->logo ;
                            } else {
                                $logo = asset('themes/common/media/images/blank-image.jpg');
                            }
                        @endphp
                        <div class="w-100px h-100px w-lg-150px h-lg-150px position-relative border-1 "
                             style="background-image: url({{$logo}}); background-size: contain; background-position: center">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-4">
                                    <a class="text-gray-900 text-hover-primary fs-2 fw-bold me-2">{{ $pp->name }}</a>
                                    @switch($pp->status)
                                        @case('CREATED')
                                        <span class="badge badge-info py-1 px-4">Nuevo</span>
                                        @break
                                        @case('ACTIVE')
                                        <span class="badge badge-success py-1 px-4">Activo</span>
                                        @break
                                        @case('ARCHIVED')
                                        <span class="badge badge-danger py-1 px-4">Archivado</span>
                                        @break
                                    @endswitch
                                </div>

                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-3 pe-2">
                                    <div class="d-flex align-items-center text-hover-primary">
                                        <span class="me-3 text-gray-500 fs-7">Representate Legal:</span>
                                        <span class="fs-6 text-gray-900"> {{ $pp->rep_full_name }}</span>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-3 pe-2">
                                    <div class="d-flex align-items-center text-hover-primary">
                                        <span class="me-3 text-gray-500 fs-7">Documento Representate:</span>
                                        <span class="fs-6 text-gray-900"> {{ $pp->rep_document }} {{ $pp->rep_exp }}</span>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <div class="d-flex align-items-center text-hover-primary">
                                        <span class="me-3 text-gray-500 fs-7">Celular Contacto:</span>
                                        <span class="fs-6 text-gray-900"> {{ $pp->cellphone }}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex my-4">
                                @switch($pp->status)
                                    @case('draft')
                                        <a href="javascript:void(0)" data-url="" data-status="active" class="btn btn-sm btn-info kt_change_election_status">Publicar</a>
                                    @break
                                    @case('active')
                                        <a href="javascript:void(0)" data-url="" data-status="unpublished" class="btn btn-sm btn-info kt_change_election_status me-1">Despublicar</a>
                                        <a href="javascript:void(0)" data-url="" data-status="finished" class="btn btn-sm btn-info kt_change_election_status">Finalizar</a>
                                    @break
                                    @case('unpublished')
                                        <a href="javascript:void(0)" data-url="" data-status="active" class="btn btn-sm btn-info kt_change_election_status me-1">Publicar</a>
                                        <a href="javascript:void(0)" data-url="" data-status="archived" class="btn btn-sm btn-info kt_change_election_status">Archivar</a>
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
                                            <div class="fs-5 fw-bold">{{ $pp->initials }}</div>
                                        </div>
                                        <div class="fw-semibold fs-7 text-gray-500">Sigla</div>
                                    </div>

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-5 fw-bold">{{ $pp->foundation_date }}</div>
                                        </div>
                                        <div class="fw-semibold fs-7 text-gray-500">Fecha de Fundación</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-end flex-column mt-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">

                        <div class="d-flex flex-stack mb-5">
                            <div class="fw-bold fs-2">Cuenta</div>
                            @if($pp->fid_user && $pp->credentials_sent)
                                <span class="badge badge-info" >Habilitada</span>
                            @else
                                <span class="badge badge-secondary" >No habilitada</span>
                            @endif
                        </div>

                        @if($pp->user)
                        <div class="separator"></div>
                        <div class="pb-5 fs-6">
                            <div class="fw-bold mt-5">Correo electrónico:</div>
                            <div class="text-gray-600">{{ $pp->user->email }}</div>
                            <div class="fw-bold mt-5">Fecha de registro cuenta:</div>
                            <div class="text-gray-600">{{ $pp->user->created_at }}</div>

                        </div>
                        @else
                        <div class="separator"></div>
                        <div class="pt-5">
                            <a href="javascript:void(0)" data-url="{{ route('oep_admin_political_group_profile_enable_account', ['id' => $pp->id]) }}" data-status="active" class="btn btn-sm btn-info kt_enable_pp_account">Habilitar cuenta</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            @if ($pp->fid_user && $pp->credentials_sent)
            <div class="flex-lg-row-fluid ms-lg-15">
                <div class="card card-flush flex-row-fluid">
                    <div class="card-header">
                        <div class="card-title">
                            <span class="fw-bold fs-2">Procesos Electorales Registrados</span>
                        </div>
                        <div class="card-toolbar">
                            <button type="button" class="btn btn-sm btn-secondary kt_register_election_political_group">Inscribirse</button>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                               id="kt_table_elections_by_political_group"
                               data-url="{{ route('oep_admin_political_group_elections_json_dt', ['id' => $pp->id]) }}"> <!-- //NOSONAR -->
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">#</th>
                                <th class="min-w-200px">Proceso Electoral</th>
                                <th class="text-center min-w-70px">Fecha del Proceso</th>
                                <th class="text-center min-w-70px">Estado</th>
                                <th class="text-center min-w-70px">Material</th>
                                <th class="text-end min-w-70px">Detalle</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>
@endsection

@section('modals')
    <div class="modal fade" id="kt_modal_registration_pp" tabindex="-1">
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
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" id="kt_wrapper_registration_pp">
                    <form id="kt_registration_pp_form" class="form" method="post" action="{{ route('oep_admin_political_group_register_election', ['id' => $pp->id]) }}">
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Registrar a Proceso Electoral</h1>
                            <div class="text-muted fw-semibold fs-5">Inscribir al Partido Político a un Proceso Electoral</div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Proceso Electoral</label>
                            <select class="form-select" data-control="select2" data-dropdown-parent="#kt_modal_registration_pp" data-placeholder="Seleccionar" data-allow-clear="true" name="election_id">
                                <option></option>
                                @foreach($elections as $election)
                                <option value="{{ $election->id }}">{{ $election->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="button" id="kt_button_registration_pp_cancel" class="btn btn-sm btn-light me-3">Cancelar</button>
                            <button type="submit" id="kt_button_registration_pp_submit" class="btn btn-sm btn-primary">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
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
    <script src="{{ asset('themes/admin/js/custom/political_group_profiles/detail.js') }}"></script>
@endsection