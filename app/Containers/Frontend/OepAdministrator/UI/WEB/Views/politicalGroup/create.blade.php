@extends('vendor@template::admin.layouts.master', ['page' => 'political_group_create'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">NUEVO REGISTRO PARTIDO POLÍTICO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Partidos Políticos</li>
            <li class="breadcrumb-item text-gray-500">Nuevo</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <div class="d-flex justify-content-end">
            <button type="submit" id="kt_add_political_group_submit" class="btn btn-primary">
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
        <form id="kt_add_political_group_form" class="form d-flex flex-column flex-lg-row" method="post" action="{{ route('oep_admin_political_group_store') }}" autocomplete="off">
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 me-lg-10 mb-10">

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>General</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Nombre del Partido Político</label>
                            <input type="text" name="pp_name" class="form-control mb-2" placeholder="" value="" />
                        </div>
                        <div class="mb-10 row g-9">
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Sigla</label>
                                <input type="text" class="form-control" name="pp_initials" placeholder="" />
                            </div>
                            <div class="col-md-6 fv-row">

                            </div>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" rows="3" name="pp_description" placeholder=""></textarea>
                        </div>
                        <div class="mb-0 row g-9">
                            <div class="col-md-6 fv-row">
                                <label class="form-label">Fecha de fundación</label>
                                <input class="form-control datepicker_flatpickr" name="pp_foundation_date" placeholder="Seleccione una fecha" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="form-label">Celular</label>
                                <input type="text" class="form-control" name="pp_cellphone" placeholder="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Cuenta</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="fv-row mb-10">
                            <label class="required form-label">Correo electrónico</label>
                            <input type="text" name="pp_email" class="form-control mb-2" placeholder="" value="" />
                        </div>
                    </div>
                </div>

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Representante</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Nombre del Representante Legal</label>
                            <input type="text" name="pp_rep_full_name" class="form-control mb-2" placeholder="" value="" />
                        </div>
                        <div class="mb-0 row g-9">
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Documento de identidad</label>
                                <input type="text" class="form-control" name="pp_rep_document" value="" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Expedido en</label>
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Selecciona un departamento"
                                        id="kt_pp_rep_exp_select" name="pp_rep_exp">
                                    <option></option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="Cochabamba">Cochabamba</option>
                                    <option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Chuquisaca">Chuquisaca</option>
                                    <option value="Tarija">Tarija</option>
                                    <option value="Oruro">Oruro</option>
                                    <option value="Potosí">Potosí</option>
                                    <option value="Beni">Beni</option>
                                    <option value="Pando">Pando</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 ">

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Logo</h2>
                        </div>
                    </div>
                    <div class="card-body text-center pt-0">
                        <style>
                            .image-input-placeholder { background-image: url("{{ asset('themes/common/media/svg/files/blank-image.svg') }}"); }
                        </style>
                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3 fv-row"  data-kt-image-input="true">
                            <div class="image-input-wrapper w-200px h-200px"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Cambiar">
                                <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                                <input type="hidden" name="pp_remove" />
                                <input type="file" name="pp_logo" accept=".png, .jpg, .jpeg" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancelar">
                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                            </span>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remover">
                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                            </span>
                        </div>
                        <div class="text-muted fs-7">Logo del partido político. Formatos aceptados *.png, *.jpg y *.jpeg</div>
                    </div>
                </div>

            </div>

        </form>

    </div>
@endsection

@section('modals')

@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('themes/admin/js/custom/political_group_profiles/create.js') }}"></script>
@endsection