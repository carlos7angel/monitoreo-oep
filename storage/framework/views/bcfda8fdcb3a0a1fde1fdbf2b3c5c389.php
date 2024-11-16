

<?php $__env->startSection('content'); ?>

    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
        <div class="w-lg-500px p-10">
            <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="<?php echo e(route('ext_admin_post_forgot_password')); ?>" method="post" autocomplete="off">

                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="reseturl" value="<?php echo e($reseturl); ?>">

                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">¿Olvidaste tu contraseña?</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Ingresa tu correo para restablecer tu contraseña</div>
                </div>

                <?php if(session('error')): ?>
                <div class="alert alert-danger d-flex align-items-center p-5 mb-15">
                    <i class="ki-duotone ki-shield-cross fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i>
                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-danger">Advertencia</h4>
                        <span><?php echo e(session('error')); ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(session('success')): ?>
                <div class="alert alert-success d-flex align-items-center p-5 mb-15">
                    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-success">Restablecimiento satisfactorio</h4>
                        <span><?php echo e(session('success')); ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <div class="fv-row mb-8">
                    <input type="text" placeholder="Correo electrónico" name="email" value="<?php echo e(old('email')); ?>" autocomplete="off" class="form-control bg-transparent" />
                </div>

                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                        <span class="indicator-label">Enviar</span>
                        <span class="indicator-progress">Espere por favor...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <a href="<?php echo e(route('ext_admin_login')); ?>" class="btn btn-light">Cancelar</a>
                </div>

            </form>
        </div>
    </div>

    <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
        <div class="me-10">
        </div>
        <div class="d-flex fw-semibold text-primary fs-base gap-5">
            <a href="#" target="_blank">Términos y condiciones</a>
            <a href="#" target="_blank">Contáctanos</a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/external/js/custom/auth/forgot-password.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor@template::external.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//authentication/forgotPassword.blade.php ENDPATH**/ ?>