

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">Procesos Electorales</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="<?php echo e(route('oep_admin_index')); ?>" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-500">Elecciones</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <a href="<?php echo e(route('oep_admin_elections_create')); ?>" class="btn btn-primary px-5" id="kt_button_new_form"><i class="ki-outline ki-add-files me-2 fs-3"></i> Nuevo Proceso</a>
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
                        <button type="submit" id="kt_search" class="btn btn-sm btn-secondary me-2">Buscar</button>
                        <button type="button" id="kt_reset" class="btn btn-sm btn-light-secondary me-5">Limpiar</button>
                        <a href="javascript:void(0)" id="kt_advanced_search" class="btn btn-link fs-7 link-info fw-bold" data-bs-toggle="collapse" data-bs-target="#kt_advanced_search_form">Búsqueda avanzada</a>
                    </div>
                </div>

                <div class="collapse" id="kt_advanced_search_form">
                    <div class="separator separator-dashed mt-5 mb-4"></div>
                    <div class="row g-8 mb-5">
                        <div class="col-xxl-7">
                            <label class="fs-6 form-label fw-bold text-gray-900">Nombre</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="2" name="kt_search_name" value="" />
                        </div>
                        <div class="col-xxl-5">
                            <label class="fs-6 form-label fw-bold text-gray-900">Tipo de Proceso</label>
                            <select class="form-select form-select-solid datatable-input" data-col-index="3" name="kt_search_type" data-control="select2" data-placeholder="Seleccionar" data-hide-search="true">
                                <option value=""></option>
                                <option value="Generales">Elecciones Generales</option>
                                <option value="Subnacionales">Elecciones Subnacionales</option>
                                <option value="Primarias">Elecciones Primarias </option>
                                <option value="Judiciales">Elecciones Judiciales</option>
                                <option value="Referendos">Referendos</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-8">
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Identificador</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="1" name="kt_search_code" />
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Estado</label>
                            <select class="form-select form-select-solid datatable-input" data-col-index="5" name="kt_search_status" data-control="select2" data-placeholder="Seleccionar" data-hide-search="true">
                                <option value=""></option>
                                <option value="draft">Borrador</option>
                                <option value="published">Activo</option>
                                <option value="archived">Archivado</option>
                            </select>
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Fecha</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="4" placeholder="dd/mm/yyyy" name="kt_search_date" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    TODOS LOS PROCESOS
                </div>
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_elections" data-url="<?php echo e(route('oep_admin_elections_json_dt')); ?>">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-70px">Código</th>
                        <th class="min-w-200px">Proceso Electoral</th>
                        <th class="text-center min-w-70px">Tipo</th>
                        <th class="text-center min-w-70px">Fecha</th>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('themes/common/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/common/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/admin/js/custom/elections/list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'election_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//election/list.blade.php ENDPATH**/ ?>