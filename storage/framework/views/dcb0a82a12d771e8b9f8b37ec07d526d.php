

<?php $__env->startSection('breadcrumbs'); ?>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="<?php echo e(route('ext_admin_index')); ?>" class="text-white text-hover-secondary">
                <i class="ki-outline ki-home text-white fs-3"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a class="text-white text-hover-secondary">Medio</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Datos Generales</li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('headline'); ?>
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Medio de Comunicación
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Información del Medio de Comunicación</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="kt_app_content" class="app-content">

        <div class="row g-7">
            <div class="col-lg-6 col-xl-3">
                <div class="card card-flush">
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <div class="card-title">
                            <h2>Menú</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div class="d-flex flex-column gap-5">
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_general_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">Datos Generales</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_category_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary">Tipo y Alcance</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_contact_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary">Datos de Contacto</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_file_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary">Archivos</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>




                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9">
                <div class="card card-flush h-lg-100" style="border: none !important; box-shadow: unset !important;">
                    <?php if(session('validation_profile')): ?>
                        <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-10 p-4 mx-10">
                            <i class="ki-outline ki-information-5 fs-1 text-info me-4"></i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">Complete los campos obligatorios del formulario antes de continuar.</div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-header pt-0">
                        <div class="card-title">
                            <i class="ki-outline ki-badge fs-1 me-2"></i>
                            <h2>Datos Generales</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_media_profile_general_data_form" class="form" action="<?php echo e(route('ext_admin_media_profile_general_data_store')); ?>" method="post" autocomplete="off">

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Nombre del medio</span>
                                </label>
                                <input type="text" class="form-control" name="media_name" value="<?php echo e($profile->name); ?>" />
                                <div class="text-muted fs-7 mt-1">Ingrese el nombre comercial del medio de comunicación.</div>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Razón Social</span>
                                </label>
                                <input type="text" class="form-control" name="media_business_name" value="<?php echo e($profile->business_name); ?>" />
                            </div>

                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">NIT</span>
                                        </label>
                                        <input type="text" class="form-control" name="media_nit" value="<?php echo e($profile->nit); ?>" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-7">

                                    </div>
                                </div>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Nombre del Representante Legal</span>
                                </label>
                                <input type="text" class="form-control" name="media_rep_full_name" value="<?php echo e($profile->rep_full_name); ?>" />
                                <div class="text-muted fs-7 mt-1">Nombre del representante legal o propietario.</div>
                            </div>

                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Documento de Identidad</span>
                                        </label>
                                        <input type="text" class="form-control" name="media_rep_document" value="<?php echo e($profile->rep_document); ?>" />
                                        <div class="text-muted fs-7 mt-1">Número de cédula de identidad del representante legal o propietario.</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Expedido en</span>
                                        </label>
                                        <div class="w-100">
                                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Selecciona un departamento"
                                                    id="kt_media_profile_rep_exp_select" name="media_rep_exp">
                                                <option></option>
                                                <option value="La Paz" <?php echo e($profile->rep_exp == 'La Paz' ? 'selected="selected"' : ''); ?>>La Paz</option>
                                                <option value="Cochabamba" <?php echo e($profile->rep_exp == 'Cochabamba' ? 'selected="selected"' : ''); ?>>Cochabamba</option>
                                                <option value="Santa Cruz" <?php echo e($profile->rep_exp == 'Santa Cruz' ? 'selected="selected"' : ''); ?>>Santa Cruz</option>
                                                <option value="Chuquisaca" <?php echo e($profile->rep_exp == 'Chuquisaca' ? 'selected="selected"' : ''); ?>>Chuquisaca</option>
                                                <option value="Tarija" <?php echo e($profile->rep_exp == 'Tarija' ? 'selected="selected"' : ''); ?>>Tarija</option>
                                                <option value="Oruro" <?php echo e($profile->rep_exp == 'Oruro' ? 'selected="selected"' : ''); ?>>Oruro</option>
                                                <option value="Potosí" <?php echo e($profile->rep_exp == 'Potosí' ? 'selected="selected"' : ''); ?>>Potosí</option>
                                                <option value="Beni" <?php echo e($profile->rep_exp == 'Beni' ? 'selected="selected"' : ''); ?>>Beni</option>
                                                <option value="Pando" <?php echo e($profile->rep_exp == 'Pando' ? 'selected="selected"' : ''); ?>>Pando</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Notas</span>
                                </label>
                                <textarea class="form-control" name="media_description"><?php echo $profile->description; ?></textarea>
                            </div>

                            <div class="mb-7">
                                <label class="fs-6 fw-semibold mb-3">
                                    <span>Logo del Medio</span>
                                </label>
                                <div class="mt-1">
                                    <style>
                                        .image-input-placeholder { background-image: url("<?php echo e(asset('themes/common/media/svg/files/blank-image.svg')); ?>"); }
                                    </style>
                                    <div class="image-input image-input-outline image-input-placeholder image-input-empty image-input-empty" data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <?php
                                            $file_logo = '';
                                            if ($profile->logo) {
                                                $file_logo = asset('storage' . $profile->logo);
                                            }
                                        ?>
                                        <div class="image-input-wrapper w-180px h-180px" style="background-image: url(<?php echo e($file_logo); ?>)"></div>
                                        <!--end::Preview existing avatar-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Cambiar">
                                            <i class="ki-outline ki-pencil fs-7"></i>
                                            <input type="file" name="media_logo" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="media_remove" />
                                        </label>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancelar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remover">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="text-muted fs-7 mt-2">Logotipo del medio de comunicación. Formatos aceptados *.png, *.jpg y *.jpeg</div>
                                </div>
                            </div>

                            <div class="separator mb-6"></div>

                            <div class="d-flex justify-content-end">
                                <button type="button" id="kt_media_profile_submit" class="btn btn-primary">
                                    <span class="indicator-label">Guardar</span>
                                    <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>

                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/external/js/custom/media-profile/general.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::external.layouts.master', ['page' => 'media_data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//mediaProfile/generalData.blade.php ENDPATH**/ ?>