

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">Reportes de Monitoreo</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Reportes de Monitoreo</li>
            <li class="breadcrumb-item text-gray-500">Listado</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <a href="javascript:void(0)" data-url="<?php echo e(route('ext_admin_monitoring_report_show_active_elections_partial')); ?>" class="btn btn-primary px-5" id="kt_btn_select_election"><i class="ki-outline ki-add-files me-2 fs-3"></i> Generar Nuevo Reporte</a>
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
                    <div class="row g-8">
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">ID Documento</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="1" name="kt_search_code" />
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Proceso Electoral</label>
                            <select class="form-select form-select-solid datatable-input" data-col-index="2" name="kt_search_election" data-control="select2" data-placeholder="Seleccionar" data-hide-search="false">
                                <option value=""></option>
                                <?php $__currentLoopData = $elections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $election): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($election->id); ?>"><?php echo e($election->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Estado</label>
                            <select class="form-select form-select-solid datatable-input" data-col-index="4" name="kt_search_status" data-control="select2" data-placeholder="Seleccionar" data-hide-search="true">
                                <option value=""></option>
                                <option value="NEW">Nuevos</option>
                                <option value="SUBMITTED">Enviados a análisis</option>
                                <option value="IN_PROGRESS">En progreso</option>
                                <option value="REJECTED">Rechazados</option>
                                <option value="FINISHED">Finalizados</option>
                                <option value="ARCHIVED">Archivados</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    LISTADO
                </div>
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_monitoring_reports" data-url="<?php echo e(route('oep_admin_monitoring_report_list_json_dt')); ?>">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-70px">ID Documento</th>
                        <th class="min-w-200px">Proceso Electoral</th>
                        <th class="text-center min-w-70px">Registros</th>
                        <th class="text-center min-w-70px">Estado</th>
                        <th class="text-center min-w-70px">Fecha de envío</th>
                        <th class="text-center min-w-70px">Creación</th>
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
    <div class="modal fade" id="kt_modal_select_election" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-8">
                        <h4 class="mb-3 text-uppercase">Procesos Electorales Habilitados</h4>
                    </div>
                    <div id="kt_modal_users_search_handler">
                        <div class="py-5" id="kt_modal_elections_search_content">
                        </div>
                        <div class="d-flex flex-center mt-15">
                            <button type="button" id="kt_button_select_election_cancel" data-bs-dismiss="modal" class="btn btn-secondary me-3">Cancelar</button>
                        </div>
                    </div>
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
    <script src="<?php echo e(asset('themes/admin/js/custom/monitoring_report/list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'monitoring_report_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoringReport/list.blade.php ENDPATH**/ ?>