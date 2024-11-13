

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">MATERIAL POR PARTIDO POLÍTICO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600"><?php echo e($election->name); ?></li>
            <li class="breadcrumb-item text-gray-600"><?php echo e($political_group->name); ?></li>
            <li class="breadcrumb-item text-gray-500">Material</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content flex-row-fluid" id="kt_content">

        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">

                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">

                        <div class="d-flex flex-column py-5">

                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL PARTIDO POLÍTICO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Nombre:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($political_group->name); ?></div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Sigla:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($political_group->initials); ?></div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha de fundación:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($political_group->foundation_date); ?></div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">

                        <div class="d-flex flex-column py-5">

                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL PROCESO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Proceso Electoral:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($election->name); ?></div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Categoría:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($election->type); ?></div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha del Proceso:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($election->election_date); ?></div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!--end::Sidebar-->

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">

                <div class="card card-flush mb-6 mb-xl-9">
                    <div class="card-header mt-6">
                        <div class="card-title flex-column">
                            <h2 class="mb-1">Lista de Material de Propaganda Electoral</h2>
                            <div class="fs-6 fw-semibold text-muted"></div>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body p-9 pt-4">

                        <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="overflow-auto pb-5">
                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded p-5">
                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                        <img alt="" class="w-30px me-3" src="<?php echo e(asset('themes/admin/media/svg/files/upload.svg')); ?>" />
                                        <div class="ms-1 fw-semibold">
                                            <?php if($material->type == 'FILE'): ?>
                                                <a href="<?php echo e($material->fileMaterial->url_file); ?>" target="_blank" class="fs-6 text-hover-primary fw-bold"><?php echo e($material->name); ?></a>
                                                <div class="text-gray-500"><?php echo e($material->fileMaterial->mime_type); ?></div>
                                            <?php endif; ?>
                                            <?php if($material->type == 'LINK'): ?>
                                                <a href="<?php echo e($material->link_material); ?>" target="_blank" class="fs-6 text-hover-primary fw-bold"><?php echo e($material->name); ?></a>
                                                <div class="text-gray-500">Enlace externo</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'political_group_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//politicalGroup/listMaterial.blade.php ENDPATH**/ ?>