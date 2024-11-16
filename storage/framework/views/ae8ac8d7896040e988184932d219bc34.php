

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
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Mi Perfil</li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('headline'); ?>
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Mi Perfil
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Información de la cuenta de usuario</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="kt_app_content" class="app-content">

        <div class="d-flex flex-column flex-lg-row">
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <div class="card mb-5 mb-xl-8">

                    <div class="card-body">

                        <div class="d-flex flex-center flex-column py-5">
                                <?php if($user->profile_data->logo): ?>
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <div class="w-100px h-100px rounded-circle" style="background-image: url(<?php echo e(asset('storage') . $user->profile_data->logo); ?>); background-size: cover; background-position: center"></div>
                                </div>
                                <?php else: ?>
                                <div class="symbol symbol-100px mb-7">
                                    <img src="<?php echo e(asset('themes/common/media/images/blank-user.jpg')); ?>" alt="Usuario" />
                                </div>
                                <?php endif; ?>
                            <a class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3"><?php echo e($user->name); ?></a>
                            <div class="mb-9">
                                <span class="text-muted">Rol:</span> <div class="badge badge-lg badge-light-primary d-inline"><?php echo e($user->roles->first()->display_name); ?></div>
                            </div>

                            <div class="py-5__ fs-6 text-center w-100">
                                <div class="fw-bold mt-5">Estado:</div>
                                <div>
                                    <?php if($user->active): ?>
                                        <div class="badge badge-lg badge-success d-inline">Activo</div>
                                    <?php else: ?>
                                        <div class="badge badge-lg badge-danger d-inline">Inactivo</div>
                                    <?php endif; ?>
                                </div>
                                <div class="fw-bold mt-5">Alta:</div>
                                <div class="text-gray-600"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d/m/Y H:i A')); ?></div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="flex-lg-row-fluid ms-lg-15">

                <div class="card pt-4 mb-6 mb-xl-9">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h2>Cuenta de usuario</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                <tr>
                                    <td>Nombre de usuario</td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td class="text-end">
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" id="kt_handle_modal_update_username">
                                            <i class="ki-duotone ki-pencil fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Correo</td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td class="text-end">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contraseña</td>
                                    <td>*******</td>
                                    <td class="text-end">
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" id="kt_handle_modal_update_password">
                                            <i class="ki-duotone ki-pencil fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rol</td>
                                    <td><?php echo e($user->roles->first()->display_name); ?></td>
                                    <td class="text-end">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content" id="kt_wrapper_modal_content_update_password">
                <div class="modal-header">
                    <h2 class="fw-bold">Actualizar Contraseña</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_update_password_form" class="form" method="post" action="<?php echo e(route('ext_admin_media_update_password_profile')); ?>" autocomplete="off">
                        <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label fw-semibold fs-6 mb-2">Nueva Contraseña</label>
                                <div class="position-relative mb-3">
                                    <input class="form-control" type="password" placeholder="" name="password" autocomplete="off" />
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="ki-duotone ki-eye-slash fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                        <i class="ki-duotone ki-eye d-none fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>
                            <div class="text-muted">Use 8 o más caracteres con una mezcla de letras, números y símbolos.</div>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Confirmar Contraseña</label>
                            <input class="form-control" type="password" placeholder="" name="confirm_password" autocomplete="off" />
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cerrar</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_update_username" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content" id="kt_wrapper_modal_content_update_username">
                <div class="modal-header">
                    <h2 class="fw-bold">Actualizar Nombre de Usuario</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_update_username_form" class="form" method="post" action="<?php echo e(route('ext_admin_media_update_username_profile')); ?>" autocomplete="off">
                        <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Nombre de Usuario</label>
                            <input class="form-control" type="text" placeholder="" name="username" autocomplete="off" />
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cerrar</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/external/js/custom/auth/my-profile.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::external.layouts.master', ['page' => 'my_profile'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//authentication/myProfile.blade.php ENDPATH**/ ?>