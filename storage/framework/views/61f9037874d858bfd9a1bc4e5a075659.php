

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">Usuarios</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Usuarios</li>
            <li class="breadcrumb-item text-gray-500">Listado</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <a href="javascript:void(0)" class="btn btn-primary px-5" id="kt_button_new_user"><i class="ki-outline ki-add-files me-2 fs-3"></i> Nuevo Usuario</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                        <button type="submit" id="kt_search" class="btn btn-sm btn-secondary me-3">Buscar</button>
                        <button type="submit" id="kt_reset" class="btn btn-sm btn-light-secondary">Limpiar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    TODOS LOS REGISTROS
                </div>
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users" data-url="<?php echo e(route('oep_admin_users_json_dt')); ?>">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-100px">Usuario</th>
                        <th class="text-center min-w-200px">Rol</th>
                        <th class="text-center min-w-70px">Estado</th>
                        <th class="text-center min-w-70px">Registro</th>
                        <th class="text-end min-w-70px">Opciones</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <div class="modal fade" id="kt_modal_new_user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header" id="kt_modal_add_user_header">
                    <h2 class="fw-bold">Nuevo Usuario</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y__ my-7 px-5 px-lg-10 pt-0 pb-15">
                    <form id="kt_form_new_user" class="form" action="<?php echo e(route('oep_admin_users_store')); ?>" method="post" autocomplete="off">
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Nombre:</label>
                                <input type="text" name="user_name" class="form-control mb-3 mb-lg-0" placeholder="" />
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Correo Electrónico:</label>
                                <input type="email" name="user_email" class="form-control mb-3 mb-lg-0" placeholder="" />
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Contraseña:</label>
                                <input type="email" name="user_password" class="form-control mb-3 mb-lg-0" placeholder="" />
                            </div>

                            <div class="mb-7">
                                <label class="required fw-semibold fs-6 mb-5">Rol:</label>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="media" id="kt_modal_update_role_option_0" />
                                        <label class="form-check-label" for="kt_modal_update_role_option_0">
                                            <div class="fw-bold text-gray-800">Usuario gestor de Medios</div>
                                            <div class="text-gray-600">Usuario encargado de la Gestión de los Medios de Comunicación</div>
                                        </label>
                                    </div>
                                </div>
                                <div class='separator separator-dashed my-5'></div>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="monitor" id="kt_modal_update_role_option_1" />
                                        <label class="form-check-label" for="kt_modal_update_role_option_1">
                                            <div class="fw-bold text-gray-800">Usuario Monitor</div>
                                            <div class="text-gray-600">Usuario encargado del registro y monitoreo de propaganda electoral</div>
                                        </label>
                                    </div>
                                </div>
                                <div class='separator separator-dashed my-5'></div>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="analyst" id="kt_modal_update_role_option_2" />
                                        <label class="form-check-label" for="kt_modal_update_role_option_2">
                                            <div class="fw-bold text-gray-800">Usuario Comisión de Análisis</div>
                                            <div class="text-gray-600">Usuario encargado del análisis de los registros de monitoreo</div>
                                        </label>
                                    </div>
                                </div>
                                <div class='separator separator-dashed my-5'></div>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="secretariat" id="kt_modal_update_role_option_3" />
                                        <label class="form-check-label" for="kt_modal_update_role_option_3">
                                            <div class="fw-bold text-gray-800">Usuario Secretaría de Cámara</div>
                                            <div class="text-gray-600">Usuario encargado del análisis y gestión de informe de vulneraciones</div>
                                        </label>
                                    </div>
                                </div>
                                <div class='separator separator-dashed my-5'></div>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="plenary" id="kt_modal_update_role_option_4" />
                                        <label class="form-check-label" for="kt_modal_update_role_option_4">
                                            <div class="fw-bold text-gray-800">Usuario Sala Plena</div>
                                            <div class="text-gray-600">Usuario encargado del análisis y gestión de informe de vulneraciones</div>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div id="kt_type_select_for_user_admin" class="d-none">
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Tipo:</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Seleccionar" name="user_type">
                                        <option value=""></option>
                                        <option value="TED">TED</option>
                                        <option value="TSE">TSE</option>
                                    </select>
                                </div>
                            </div>

                            <div id="kt_department_select_for_user_admin" class="d-none">
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Departamento:</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Seleccionar" name="user_department">
                                        <option value="La Paz">La Paz</option>
                                        <option value="Oruro">Oruro</option>
                                        <option value="Potosí">Potosí</option>
                                        <option value="Cochabamba">Cochabamba</option>
                                        <option value="Chuquisaca">Chuquisaca</option>
                                        <option value="Tarija">Tarija</option>
                                        <option value="Pando">Pando</option>
                                        <option value="Beni">Beni</option>
                                        <option value="Santa Cruz">Santa Cruz</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="text-center pt-10">
                            <button type="reset" id="kt_button_new_user_cancel" class="btn btn-light me-3">Cancelar</button>
                            <button type="submit" id="kt_button_new_user_submit" class="btn btn-primary">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('themes/common/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/common/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/admin/js/custom/users/list.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/admin/js/custom/users/create.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'user_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//userManagement/list.blade.php ENDPATH**/ ?>