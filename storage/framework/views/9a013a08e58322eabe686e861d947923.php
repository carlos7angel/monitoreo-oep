

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">Logs de Actividad</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Logs</li>
            <li class="breadcrumb-item text-gray-500">Lista</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card mb-7">
            <div class="card-body p-5">
                <div class="collapse__" id="kt_advanced_search_form">
                    <div class="row g-8 mb-5">
                        <div class="col-xxl-5">
                            <label class="fs-6 form-label fw-bold text-gray-900">Tipo</label>
                            <select class="form-select form-select-solid datatable-input" data-col-index="1" name="kt_search_type" >
                                <option value=""></option>
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->log_name); ?>"><?php echo e($type->log_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-xxl-7">
                            <label class="fs-6 form-label fw-bold text-gray-900">Descripción</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="2" name="kt_search_name" value="" />
                        </div>
                    </div>
                    <div class="row g-8 mb-5">
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Fecha inicial</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="4" placeholder="dd/mm/yyyy" name="kt_search_start_date" />
                        </div>
                        <div class="col-xxl-4">
                            <label class="fs-6 form-label fw-bold text-gray-900">Fecha fin</label>
                            <input type="text" class="form-control form-control form-control-solid datatable-input" data-col-index="5" placeholder="dd/mm/yyyy" name="kt_search_end_date" />
                        </div>
                        <div class="col-xxl-4">
                        </div>
                    </div>
                    <div class="separator separator-dashed mt-5 mb-4"></div>
                    <div class="row g-8">
                        <div class="col-xxl-12">
                            <div class="text-right">
                                <div class="d-flex align-items-center">
                                    <button type="submit" id="kt_search" class="btn btn-sm btn-secondary me-2">Buscar</button>
                                    <button type="button" id="kt_reset" class="btn btn-sm btn-light-secondary me-5">Limpiar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    [Activity Logs]
                </div>
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_logs" data-url="<?php echo e(route('oep_admin_activity_logs_json_dt')); ?>">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-70px">Tipo</th>
                        <th class="min-w-200px">Descripción</th>
                        <th class="text-center min-w-70px">Usuario</th>
                        <th class="text-center min-w-70px">Fecha</th>
                        <th class="text-center min-w-70px">IP</th>
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
    <div class="modal fade" id="kt_modal_log_detail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" id="kt_media_log_content">

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
    <script src="<?php echo e(asset('themes/admin/js/custom/activity_log/list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'log_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//activityLog/list.blade.php ENDPATH**/ ?>