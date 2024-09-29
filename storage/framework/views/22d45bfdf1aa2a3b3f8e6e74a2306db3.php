

<?php $__env->startSection('content'); ?>

    <div id="kt_app_hero" class="app-hero  app-hero-home" style="background-color: #f4f4f4">
        <div id="kt_app_hero_container" class="app-container  container-xxl ">
            <div class="app-hero-wrapper d-flex align-items-stretch py-5 py-lg-20 me-lg-n20">
                <div class="d-flex flex-column justify-content-center py-5 py-lg-10 ">
                    <h1 class="text-gray-900 fs-3x fw-bolder letter-spacing">
                        Órgano Electoral
                    </h1>
                    <h3 class="d-flex text-gray-900 fs-1 fw-bold letter-spacing">
                        Sistema de Monitoreo
                    </h3>
                    <h4 class="d-flex text-gray-900 fs-1 fw-bold letter-spacing">
                        de
                        <span class="ms-3 d-inline-flex position-relative">
                            <span class="px-1">Propaganda Electoral</span>
                        </span>
                    </h4>
                    <p class="text-gray-600 fs-4 lh-2 fw-semibold py-5 py-lg-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br/>
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br/>
                        Ut enim ad minim veniam.
                    </p>
                    <div class="d-flex align-items-center gap-4">
                        <a href="#" class="btn btn-dark fw-bolder">
                            Ingresar
                        </a>
                        <a href="#" class="btn btn-outline fw-bolder">
                            Más información
                        </a>
                    </div>
                </div>
                <img src="<?php echo e(asset('themes/external/media/misc/hero.png')); ?>" class="app-hero-img" alt=""/>
            </div>
        </div>
    </div>

    <!--begin:: Section-->
    <div class="mt-lg-15 mb-lg-15 position-relative z-index-2">
        <div class="container">
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <div class="card-body p-lg-20">
                    <div class="text-center mb-5 mb-lg-10">
                        <h3 class="fs-2hx text-gray-900 mb-5" id="portfolio" data-kt-scroll-offset="{default: 100, lg: 250}">INICIO</h3>
                    </div>
                    <div class="d-flex flex-center mb-5 mb-lg-15">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end:: Section-->


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