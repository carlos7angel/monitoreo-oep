

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">PROCESOS ELECTORALES</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Medios de Comunicación</li>
            <li class="breadcrumb-item text-gray-500">Nuevos</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card mb-7">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" class="form-control form-control-sm form-control-solid ps-10" name="dt_search_input" value="" placeholder="Buscador" />
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" id="kt_search" class="btn btn-sm btn-secondary fs-7 me-2">Buscar</button>
                        <button type="button" id="kt_reset" class="btn btn-sm btn-light-secondary fs-7 me-5">Limpiar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-body">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_elections_accreditation" data-url="<?php echo e(route('oep_admin_media_elections_list_for_accreditation_json_dt')); ?>">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-200px">Proceso Electoral</th>
                        <th class="text-center min-w-70px">Fecha del Proceso</th>
                        <th class="text-center min-w-70px">Estado</th>
                        <th class="text-center min-w-70px">Plazo de Acreditaciones</th>
                        <th class="text-end min-w-70px">Opciones</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                    <tr>
                        <td>
                            <span class="fw-bold">1</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(<?php echo e(asset('themes/admin/media/stock/ecommerce/68.png')); ?>);"></span>
                                </a>
                                <div class="ms-3">
                                    <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">Elecciones Judiciales 2024</div>
                                    <div class="text-muted fs-7">ABC-123</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center pe-0__">12 de Junio de 2024</td>
                        <td class="text-center pe-0__">
                            <div class="badge badge-info py-2 px-4">Activo</div>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fs-7 pe-2">Del</span>
                            <div class="badge badge-secondary py-2 px-4">10/12/2024</div>
                            <span class="fs-7 px-2">al</span>
                            <div class="badge badge-secondary py-2 px-4">30/12/2024</div>
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="las la-arrow-circle-right fs-2"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <div class="modal fade" id="kt_modal_media_profile_detail" tabindex="-1" aria-hidden="true">
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
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" id="kt_media_profile_detail_content">

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
    <script src="<?php echo e(asset('themes/admin/js/custom/accreditations/list_elections.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'media_accreditations'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//accreditation/listElections.blade.php ENDPATH**/ ?>