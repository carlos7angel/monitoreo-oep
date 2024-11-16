

<?php $__env->startSection('content'); ?>

    <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
        <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
            <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="<?php echo e(route('oep_admin_login_reset_password_post')); ?>" method="post">

                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="token" value="<?php echo e(isset($_GET['token']) ? $_GET['token'] : ""); ?>">

                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">Restablecer contraseña</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Ingresa tu nueva contraseña</div>
                </div>

                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Correo electrónico</label>
                    <input class="form-control form-control-lg" type="text" name="email" autocomplete="off" value="<?php echo e(isset($_GET['email']) ? $_GET['email'] : ""); ?>" />
                </div>

                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <div class="mb-1">
                        <label class="form-label fw-bold text-dark fs-6">Contraseña</label>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg" type="password" placeholder="" name="password" autocomplete="off" tabindex="1" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                        </div>
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                    </div>
                    <div class="text-muted">Use 6 o más caracteres con una combinación de letras, números & símbolos.</div>
                </div>

                <div class="fv-row mb-10">
                    <label class="form-label fw-bold text-dark fs-6">Confirmar contraseña</label>
                    <input class="form-control form-control-lg" type="password" placeholder="" name="confirm_password" autocomplete="off" tabindex="2" />
                </div>

                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                        <span class="indicator-label">Enviar</span>
                        <span class="indicator-progress">Espere por favor...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <a href="<?php echo e(route('oep_admin_login')); ?>" class="btn btn-light">Cancelar</a>
                </div>

            </form>
        </div>
        <div class="px-lg-10">
            <div class="fw-semibold text-primary text-center fs-base gap-5">
                <a href="#" target="_blank">¿Tienes problemas? Contáctate con soporte</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/admin/js/custom/auth/reset-password.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor@template::admin.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//authentication/resetPassword.blade.php ENDPATH**/ ?>