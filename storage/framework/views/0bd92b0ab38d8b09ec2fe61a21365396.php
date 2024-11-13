

<?php $__env->startSection('breadcrumbs'); ?>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">
                <i class="ki-outline ki-home text-white fs-3"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">Procesos Electorales</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Lista</li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('headline'); ?>
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Procesos Electorales Registrados
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Listado de los Procesos Electorales registrados</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="kt_app_content" class="app-content">

        <div class="card mb-7 border-0 shadow-none">
            <div class="card-body p-0">
                <div class="d-flex align-items-center">
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" class="form-control form-control-sm form-control-solid ps-10" name="dt_search_input" value="" placeholder="Buscador" />
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" id="kt_search" class="btn btn-secondary btn-sm fs-8 me-2">Buscar</button>
                        <button type="button" id="kt_reset" class="btn btn-light-secondary btn-sm fs-8 me-5">Limpiar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap flex-stack pb-7">
            <div class="d-flex flex-wrap align-items-center my-1">
                <h3 class="fw-bold me-5 my-1">Registros
                    <span class="text-gray-500 fs-6 ms-2"> Procesos Electorales ↓ </span>
                </h3>
            </div>
            <div class="d-flex flex-wrap my-1">
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-body">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_registrations"
                       data-url="<?php echo e(route('ext_admin_registration_elections_list_json_dt')); ?>">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">#</th>
                        <th class="min-w-200px">Proceso Electoral</th>
                        <th class="text-center min-w-70px">Fecha del Proceso</th>
                        <th class="text-center min-w-70px">Estado</th>
                        <th class="text-center min-w-70px">Plazo Material</th>
                        <th class="text-center min-w-70px">Material subido</th>
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
    <script src="<?php echo e(asset('themes/external/js/custom/registration/list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::external.layouts.master', ['page' => 'political_group_registrations'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//registration/listRegistrations.blade.php ENDPATH**/ ?>