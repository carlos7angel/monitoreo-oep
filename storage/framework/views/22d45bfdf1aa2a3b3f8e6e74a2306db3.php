

<?php $__env->startSection('content'); ?>

    <div id="kt_app_hero" class="app-hero  app-hero-home" >
        <div id="kt_app_hero_container" class="app-container  container-xxl ">
            <div class="app-hero-wrapper d-flex align-items-stretch py-5 py-lg-20 me-lg-n20">
                <div class="d-flex flex-column justify-content-center py-5 py-lg-10 ">
                    <h1 class="text-gray-700 fs-3x fw-bolder letter-spacing">
                        Informacion de
                    </h1>
                    <h1 class="d-flex text-warning fs-3x fw-bolder letter-spacing">
                        Procesos Electorales
                    </h1>
                    <h4 class="d-flex text-gray-500 fs-1 fw-bold letter-spacing">
                        <span class="ms-0 d-inline-flex position-relative">
                            <span class="px-0">Registro de Medios y Propaganda Electoral</span>
                        </span>
                    </h4>
                    <p class="text-gray-600 fs-4 lh-2 fw-semibold py-5 py-lg-6">

                        Sistema dónde podrás encontrar información de los Procesos
                        Electorales, Lista de Medios Habilitados y Material de Propaganda
                        Electoral de los Partidos Políticos.
                    </p>
                    <div class="d-flex align-items-center gap-4">
                        <a href="<?php echo e(route('web_form_media')); ?>" class="btn btn-outline fw-bolder">
                            Registro de Medios
                        </a>
                    </div>
                </div>
                <img src="" class="app-hero-img" alt=""/>
            </div>
        </div>
    </div>

    <div class="mt-lg-15 mt-15 mb-lg-20 position-relative z-index-2">
        <div class="container">

            <div class="text-center mb-17">
                <h4 class="fs-2hx text-muted mb-1">Lista de Procesos Electorales</h4>
                <div class="fs-4 text-warning fw-bold">Lista de todos los Procesos Electorales <br/>
                </div>
            </div>

            <?php if(count($elections)>0): ?>
            <?php $__currentLoopData = $elections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $election): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="card card-flush__ h-md-100__ mb-8" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <div class="card-body py-9__">
                    <div class="d-flex flex-column flex-lg-row row_ gx-9_ h-100">
                        <div class="flex-column flex-lg-row-auto w-lg-300px w-xl-300px me-10 mb-10_ order-1__ order-lg-2__ col-sm-6_ mb-10_ mb-sm-0_">
                            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px__ min-h-sm-100 h-100">
                                <img src="<?php echo e(asset('storage') . $election->logo_image); ?>" class="w-100" style="max-height: 160px" alt="Logo Proceso Electoral">

                            </div>
                        </div>
                        <div class="flex-lg-row-fluid me-lg-15 order-2__ order-lg-1__ mb-10 mb-lg-0 col-sm-6_">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-7">
                                    <div class="d-flex flex-stack mb-6">
                                        <div class="flex-shrink-0 me-5">
                                            <span class="text-gray-500 fs-7 fw-bold me-2 d-block lh-1 pb-1"><?php echo e($election->code); ?></span>
                                            <span class="text-gray-800 fs-1 fw-bold"><?php echo e($election->name); ?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                        <div class="d-flex align-items-center me-5 me-xl-13">
                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                <span class="symbol-label bg-secondary">
                                                    <i class="ki-outline ki-category fs-5"></i>
                                                </span>
                                            </div>
                                            <div class="m-0">
                                                <span class="fw-semibold text-gray-500 d-block fs-8">Categoría</span>
                                                <span class="fw-bold text-gray-800 fs-7"><?php echo e($election->type); ?></span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                <span class="symbol-label bg-secondary">
                                                    <i class="ki-outline ki-calendar fs-5"></i>
                                                </span>
                                            </div>
                                            <div class="m-0">
                                                <span class="fw-semibold text-gray-500 d-block fs-8">Fecha</span>
                                                <span class="fw-bold text-gray-800 fs-7"><?php echo e($election->election_date); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-stack mt-auto bd-highlight">
                                    <a href="<?php echo e(route('web_show_election', ['id' => $election->id, 'slug' => \Illuminate\Support\Str::slug($election->name)])); ?>" class="btn btn-sm btn-dark fw-bold">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="card mb-20" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                    <div class="card-body p-lg-20">
                        <div class="text-center mb-5">
                           Aún no existe información de Procesos Electorales para mostrar.
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .app-hero-home {
            display: flex;
            align-items: stretch;
            background-position-x: right;
            background-repeat: no-repeat;
            background-size: contain;
            position: relative;
            overflow: hidden
        }

        .app-hero-home {
            background-image: url(themes/common/media/images/bg_1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /*background-color: #f4f4f4*/
        }

        .app-hero-home .app-hero-img {
            position: absolute;
            top: 0;
            right: auto;
            bottom: 0;
            max-width: 100%;
            height: 100%
        }

        .app-hero-default {
            background-color: var(--bs-app-hero-default-bg-color);
            display: flex;
            align-items: stretch
        }

        @media (min-width: 992px) {
            .app-hero-home .app-hero-img {
                left:45%
            }
        }

        @media (min-width: 1200px) {
            .app-hero-home .app-hero-img {
                left:42.5%
            }
        }

        @media (min-width: 1400px) {
            .app-hero-home .app-hero-img {
                left:40%
            }
        }

        .app-hero-home .app-hero-img {
            left: 45%
        }

        @media (max-width: 991.98px) {
            .app-hero-home .app-hero-img {
                display:none
            }
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\Website/UI/WEB/Views//index.blade.php ENDPATH**/ ?>