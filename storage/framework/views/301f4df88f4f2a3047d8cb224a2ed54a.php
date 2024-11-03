

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

                    <div class="row">

                        <div class="text-center mb-17">
                            <h4 class="fs-2hx text-muted mb-1">Medios de Comunicación habilitados</h4>
                            <div class="fs-5 text-warning fw-bolder"><?php echo e($election->name); ?>

                            </div>
                        </div>

                        <!--begin::Accordion-->
                        <div class="accordion" id="kt_accordion_1">
                            <?php
                                $open = true;
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $scope): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $index = \Illuminate\Support\Str::slug($key);
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="kt_accordion_1_header_<?php echo e($index); ?>">
                                        <button class="accordion-button fs-4 fw-semibold <?php echo e($open ? '' : 'collapsed'); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_<?php echo e($index); ?>" aria-expanded="<?php echo e($open ? 'true' : 'false'); ?>" aria-controls="kt_accordion_1_body_<?php echo e($index); ?>">
                                            <span class="fs-2 fw-bolder text-uppercase"><?php echo e($key); ?></span>
                                        </button>
                                    </h2>
                                    <div id="kt_accordion_1_body_<?php echo e($index); ?>" class="accordion-collapse collapse <?php echo e($open ? 'show' : ''); ?>" aria-labelledby="kt_accordion_1_header_<?php echo e($index); ?>" data-bs-parent="#kt_accordion_1">
                                        <div class="accordion-body">

                                            <div class="mx-auto w-100 mw-700px pt-10 pb-10">
                                                <div class="mt-n1">
                                                    <div class="d-flex flex-stack_ pb-10">
                                                        <img alt="Logo" src="<?php echo e(asset('themes/common/media/logos/logo_oep.png')); ?>" class="h-100px" />
                                                        <div class="text-sm-end fw-semibold fs-7 ms-5 text-muted">
                                                            <img alt="Logo Proceso Electoral" src="<?php echo e(asset('storage') . $election->logo_image); ?>" class="h-100px mb-2" />
                                                        </div>
                                                        <div class="fw-bold fs-2 ms-5 text-gray-500 text-start" style="line-height: 1.3">
                                                            Publicación de la lista de medios de comunicación habilitados para la difusión de méritos y/o propaganda
                                                        </div>
                                                    </div>
                                                    <div class="m-0">

                                                        <div class="text-center mb-17">
                                                            <div class="fs-4 text-muted fw-bold">Registro de Medios de Comunicación<br/>
                                                            <h4 class="fs-2hx text-warning fw-bolder mb-1">Alcance <?php echo e($key); ?></h4>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <?php $__currentLoopData = ['Televisivo','Radial','Impreso','Digital']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $items = isset($scope[$media_type]) ? $scope[$media_type] : [];
                                                                    $count = 0;
                                                                ?>
                                                                <?php if(is_array($items) && count($items) > 0): ?>
                                                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="d-flex align-items-center mb-3 mt-10">
                                                                        <span class="bullet bullet-vertical h-30px bg-primary me-3"></span>
                                                                        <div class="flex-grow-1">
                                                                            <a class="text-primary fw-bold fs-6">
                                                                                <?php switch($media_type):
                                                                                    case ('Televisivo'): ?>
                                                                                    <span>Medios Televisivos</span>
                                                                                    <?php break; ?>
                                                                                    <?php case ('Radial'): ?>
                                                                                    <span>Medios Radiales</span>
                                                                                    <?php break; ?>
                                                                                    <?php case ('Impreso'): ?>
                                                                                    <span>Medios Impresos</span>
                                                                                    <?php break; ?>
                                       m                                             <?php case ('Digital'): ?>
                                                                                    <span>Medios Digitales</span>
                                                                                    <?php break; ?>
                                                                                <?php endswitch; ?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="table-responsive">
                                                                        <table class="table border-x align-middle gs-0 gy-2 mb-3">
                                                                            <thead>
                                                                                <tr class="bg-warning fs-6 fw-bold text-white">
                                                                                    <th class="ps-4 rounded-start__ min-w-20px text-center">#</th>
                                                                                    <th class="min-w-70px text-start">Medio</th>
                                                                                    <th class="pe-4 min-w-70px text-start rounded-end__">Documento</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="border-bottom border-dashed border-dark">
                                                                                <tr class="fw-bold text-gray-700 fs-7">
                                                                                    <td class="text-center"><?php echo e($count + 1); ?></td>
                                                                                    <td class="text-start">
                                                                                        <div class="ms-0">
                                                                                            <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">
                                                                                                <?php echo e($item->accreditation->media->name); ?>

                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="text-start">
                                                                                        <a target="_blank" href="<?php echo e($item->fileRate->url_file); ?>" class="">Descargar</a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $open = false;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <!--end::Accordion-->

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
<?php echo $__env->make('vendor@template::landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\Website/UI/WEB/Views//listAccreditationRates.blade.php ENDPATH**/ ?>