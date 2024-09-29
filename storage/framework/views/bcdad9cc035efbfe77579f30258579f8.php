

<?php $__env->startSection('content'); ?>
    <!--begin:: Section-->
    <div class="mt-10 mb-lg-n15 position-relative z-index-2">
        <div class="container">
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <div class="card-body p-lg-20">

                    <div class="d-flex flex-column flex-center flex-column-fluid">

                        <div class="mb-7">
                            <a class="">
                                <i class="las la-check-circle fs-5x text-success"></i>
                            </a>
                        </div>
                        <h1 class="fw-bolder text-gray-900 mb-5">Envío exitoso</h1>
                        <div class="fw-semibold text-center fs-6 text-gray-500 mb-7">
                            Su registró ha sido enviado satisfactoriamente. <br/>
                            Una vez que se revise y apruebe se le enviará una notificación a su correo electrónico <br/>
                            con los datos de acceso para ingresar a la plataforma.
                        </div>
                        <div class="mb-0">
                            <img src="<?php echo e(asset('themes/external/media/auth/welcome.png')); ?>" class="mw-100 mh-300px theme-light-show" alt="" />
                        </div>
                        <div class="mb-0">
                            <a href="#" class="btn btn-sm btn-primary">Volver al inicio</a>
                        </div>
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
    <script src="<?php echo e(asset('themes/external/js/landing/media-registration.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\Website/UI/WEB/Views//successMediaRegistration.blade.php ENDPATH**/ ?>