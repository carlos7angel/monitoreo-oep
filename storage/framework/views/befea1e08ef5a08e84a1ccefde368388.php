

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
            <a href="/" class="text-white text-hover-secondary">Acreditaciones</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Detalle</li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('headline'); ?>
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Material de Propaganda Electoral
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Información enviada</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="kt_app_content" class="app-content">



            <div class="card mb-5 mb-xl-8">
                <div class="card-body p-12">

                    <div class="d-flex flex-column flex-xl-row">
                        <div class="flex-lg-row-fluid me-xl-18__xx mb-10 mb-xl-0">
                            <div class="mt-n1">
                                <div class="pb-10">
                                    <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                        <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                        <span>Datos del Proceso</span>
                                    </h2>
                                </div>
                                <div class="m-0">
                                    <div class="row g-5 mb-6">
                                        <div class="col-sm-4">
                                            <div class="fw-semibold fs-7 text-gray-600 mb-1">Nombre del Proceso Electoral:</div>
                                            <div class="fw-bold fs-6 text-gray-800 kt_data_election_name"><?php echo e($registration->election->name); ?></div>
                                        </div>
                                    </div>
                                    <div class="row g-5 mb-2">
                                        <div class="col-sm-4">
                                            <div class="fw-semibold fs-7 text-gray-600 mb-1">Categoría:</div>
                                            <div class="fw-bold fs-6 text-gray-800 kt_data_election_type"><?php echo e($registration->election->type); ?></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha del Proceso:</div>
                                            <div class="fw-bold fs-6 text-gray-800 kt_data_election_date"><?php echo e($registration->election->election_date); ?></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha límite para subir material:</div>
                                            <div class="fw-bold fs-6 text-gray-800 kt_data_election_end_date"><?php echo e($registration->election->end_date_political_registration); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Material publicado</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">Lista de todos los recursos</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="<?php echo e(route('ext_admin_propaganda_material_create', ['id' => $registration->id])); ?>" class="btn btn-sm btn-primary"><i class="ki-outline ki-plus fs-2"></i>Nuevo Material</a>
                    </div>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table align-middle gs-0 gy-4">
                            <thead>
                            <tr class="fw-bold text-muted bg-light">
                                <th class="ps-4 min-w-325px rounded-start">Archivo</th>
                                <th class="min-w-125px">Fecha creación</th>
                                <th class="min-w-125px">Tipo</th>
                                <th class="min-w-200px">Enlace al archivo</th>
                                <th class="pe-4 min-w-200px text-end rounded-end">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($registration->materials) > 0): ?>
                                <?php $__currentLoopData = $registration->materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-45px me-5">
                                                <span class="symbol-label bg-light-info text-info fw-bold">
                                                    <?php if($material->type == 'FILE'): ?>
                                                        <span class="text-uppercase">
                                                            <?php echo e(array_reverse(explode(".", $material->fileMaterial->name))[0]); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                    <?php if($material->type == 'LINK'): ?>
                                                        <span>LINK</span>
                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6"><?php echo e($material->name); ?></a>
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-muted fw-semibold text-end"><?php echo e($material->created_at); ?></span>
                                    </td>
                                    <td>
                                        <?php if($material->type == 'FILE'): ?>
                                            <span class="badge badge-secondary fs-7 fw-bold">Archivo</span>
                                        <?php endif; ?>
                                        <?php if($material->type == 'LINK'): ?>
                                            <span class="badge badge-secondary fs-7 fw-bold">Enlace</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($material->type == 'FILE'): ?>
                                            <a href="<?php echo e($material->fileMaterial->url_file); ?>" target="_blank" class="text-gray-900 fw-bold text-hover-info d-block mb-1 fs-7"><?php echo e($material->fileMaterial->url_file); ?></a>
                                        <?php endif; ?>
                                        <?php if($material->type == 'LINK'): ?>
                                            <a href="<?php echo e($material->link_material); ?>" target="_blank" class="text-gray-900 fw-bold text-hover-info d-block mb-1 fs-7"><?php echo e($material->link_material); ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo e(route('ext_admin_propaganda_material_edit', ['registration_id' => $registration->id, 'id' => $material->id])); ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <i class="ki-outline ki-pencil fs-2"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-url="<?php echo e(route('ext_admin_propaganda_material_delete', ['registration_id' => $registration->id, 'id' => $material->id])); ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm kt_btn_material_delete">
                                            <i class="ki-outline ki-trash fs-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php else: ?>
                                <tr>
                                    <td>NO HAY NADA</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>

    <div class="modal fade" id="kt_modal_observations_accreditation" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h3 class="mb-3 text-uppercase">Observaciones</h3>
                        <div class="text-muted fw-semibold fs-7">
                            Su proceso ha sido observado.<br>
                            A continuación se listan las observaciones/recomendaciones.
                        </div>
                    </div>
                    <div>
                        <div class="py-5">
                            <div class="text-center px-5">

                            </div>
                        </div>
                        <div class="d-flex flex-center mt-15">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary me-3">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css')); ?>" media="all" rel="stylesheet">
    <style>
        .wrapper_content_step_3 .fileuploader {
            padding: 16px;
            padding-top: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('themes/external/js/custom/propaganda-material/list.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::external.layouts.master', ['page' => 'political_group_registrations'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//propagandaMaterial/listMaterial.blade.php ENDPATH**/ ?>