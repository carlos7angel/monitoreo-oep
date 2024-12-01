@extends('vendor@template::admin.layouts.master', ['page' => 'form_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">Formularios Dinámicos</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">form_list
                <a href="{{ route('oep_admin_index') }}" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Formularios</li>
            <li class="breadcrumb-item text-gray-500">Listado</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <a href="javascript:void(0)" class="btn btn-primary px-5" id="kt_button_new_form"><i class="ki-outline ki-add-files me-2 fs-3"></i> Nuevo Formulario</a>
    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card mb-7">
            <div class="card-body p-5">
                <div class="d-flex align-items-center">
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" class="form-control form-control-sm form-control-solid ps-10" name="dt_search_input" value="" placeholder="Buscador" />
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" id="kt_search" class="btn btn-sm btn-secondary me-5">Buscar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-flush">

            <div class="card-body">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_forms"
                       data-url="{{ route('oep_admin_forms_json_dt') }}" aria-describedby="table"><!-- //NOSONAR -->
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="text-center min-w-100px">Código</th>
                        <th class="text-start min-w-200px">Formulario</th>
                        <th class="text-center min-w-70px">Estado</th>
                        <th class="text-center min-w-70px">Última actualización</th>
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
    <div class="modal fade" id="kt_modal_new_form" tabindex="-1" aria-hidden="true">
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
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form id="kt_form_new_form" class="form" method="post" autocomplete="off" action="{{ route('oep_admin_forms_store') }}">
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Nuevo Formulario</h1>
                            <div class="text-muted fw-semibold fs-5">Ingrese los datos para crear un nuevo formulario dinámico.</div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Nombre</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Especifique un nombre único para el formulario">
										<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
										</i>
									</span>
                            </label>
                            <input type="text" class="form-control" placeholder="" name="form_name" />
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tipo</label>
                                <select class="form-select" data-control="select2" data-hide-search="false" data-placeholder="" name="form_type">
                                    <option value="form">Formulario dinámico</option>
                                </select>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Código</label>
                                <input type="text" class="form-control" placeholder="" name="form_code" />
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Descripción</label>
                            <textarea class="form-control" rows="2" name="form_description" placeholder=""></textarea>
                        </div>
                        <div class="text-center">
                            <button type="reset" id="kt_button_new_form_cancel" class="btn btn-light me-3">Cancelar</button>
                            <button type="submit" id="kt_button_new_form_submit" class="btn btn-primary">
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
    <script src="{{ asset('themes/admin/js/custom/forms/list.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/forms/create.js') }}"></script>
@endsection