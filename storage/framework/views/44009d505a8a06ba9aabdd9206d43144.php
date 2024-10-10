

<?php $__env->startSection('content'); ?>

    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
        <div class="w-lg-500px p-10">
            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="<?php echo e(route('ext_admin_post_login')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">INGRESO</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Sistema de Registro de Medios</div>
                </div>
                <div class="fv-row mb-8">
                    <input type="text" placeholder="Correo electrónico" name="email" value="media@oep.com" autocomplete="off" class="form-control bg-transparent" />
                </div>
                <div class="fv-row mb-3">
                    <input type="password" placeholder="Contraseña" name="password" value="admin" autocomplete="off" class="form-control bg-transparent" />
                </div>
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <div></div>
                    <a href="#" class="link-primary">¿Olvidaste tu contraseña ?</a>
                </div>
                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                        <span class="indicator-label">Ingresar</span>
                        <span class="indicator-progress">Espere por favor...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
                <div class="text-gray-500 text-center fw-semibold fs-6">¿No tienes una cuenta?
                    <a href="#" class="link-primary">Regístrate</a></div>
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
    <script src="<?php echo e(asset('themes/external/js/custom/auth/login.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor@template::external.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//authentication/login.blade.php ENDPATH**/ ?>