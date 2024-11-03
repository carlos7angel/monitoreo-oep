

<?php $__env->startSection('content'); ?>
    <!--begin:: Section-->
    <div class="mt-lg-15 mb-lg-15 position-relative z-index-2">
        <div class="container">
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <div class="card-body p-lg-15">

                    <div class="position-relative mb-17">
                        <div class="overlay overlay-show">
                            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px"
                                 style="background-image:url(<?php echo e(asset('storage') . $election->banner); ?>)">
                            </div>
                            <div class="overlay-layer rounded bg-black" style="opacity: 0.1"></div>
                        </div>
                        <div class="position-absolute text-white mb-8 ms-10 bottom-0">

                        </div>
                    </div>

                    <div class="row mb-17">

                        <div class="text-center mb-17">
                            <div class="fs-4 text-muted fw-bold">Lista de Partidos Políticos Habilitados<br/>
                            <h4 class="fs-2hx text-warning fw-bolder mb-1">Material Propaganda Electoral</h4>
                            </div>
                        </div>


                        <?php $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex flex-column flex-lg-row">
                            <div class="flex-column flex-lg-row-auto w-100 w-xl-275px w-lg-200px mb-10 me-xl-20 me-lg-10">
                                <div class="mb-15">
                                    <img src="<?php echo e(asset('storage') . $registration->politicalGroup->logo); ?>" class="w-100" style="max-width: 350px" alt="Logo Partido Político">
                                </div>
                            </div>
                            <div class="flex-lg-row-fluid">
                                <div class="mb-10">
                                    <div class="mb-12">
                                        <h4 class="fs-2x text-gray-800 w-bolder mb-1"><?php echo e($registration->politicalGroup->name); ?></h4>
                                        <p class="fw-semibold fs-4 text-muted mb-2">Material de Propaganda Electoral</p>
                                    </div>
                                    <div class="mb-0">

                                        <?php $__currentLoopData = $registration->materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        </div>
                        <div class="separator border-gray-400 my-5"></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>






















































                </div>
            </div>
        </div>
    </div>
    <!--end:: Section-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\Website/UI/WEB/Views//listMaterial.blade.php ENDPATH**/ ?>