

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
        <li class="breadcrumb-item text-white fw-bold lh-1">Datos de Contacto</li>
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
                                <a href="<?php echo e(route('ext_admin_media_profile_general_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary">Datos Generales</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_category_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary">Tipo y Alcance</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="<?php echo e(route('ext_admin_media_profile_contact_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">Datos de Contacto</a>
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
                            <h2>Datos de Contacto</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_media_profile_contact_data_form" class="form" action="<?php echo e(route('ext_admin_media_profile_contact_data_store')); ?>" method="post" autocomplete="off">


                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Correo electrónico</span>
                                </label>
                                <input type="text" class="form-control" name="media_email" value="<?php echo e($profile->email); ?>" readonly disabled />
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Domicilio Legal</span>
                                </label>
                                <input type="text" class="form-control" name="media_legal_address" value="<?php echo e($profile->legal_address); ?>" />
                                <div class="text-muted fs-7 mt-1">Dirección para fines de notificación.</div>
                            </div>

                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Persona de Contacto</span>
                                        </label>
                                        <input type="text" class="form-control" name="media_contact_full_name" value="<?php echo e($profile->contact_full_name); ?>" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Celular</span>
                                        </label>
                                        <input type="text" class="form-control" name="media_cellphone" value="<?php echo e($profile->cellphone); ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Sitio web</span>
                                </label>
                                <input type="text" class="form-control" name="media_website" value="<?php echo e($profile->website); ?>" />
                                <div class="text-muted fs-7 mt-1">Página web oficial del medio, con dominio propio.</div>
                            </div>

                            <div class="fv-row mb-7">



                                <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                    <label class="form-label fs-6 fw-semibold mt-3">Redes Sociales</label>
                                    <div id="kt_media_profile_add_rrss_options">
                                        <?php
                                            $rrss = $profile->rrss ? json_decode($profile->rrss) : null;
                                        ?>
                                        <?php if($profile->rrss): ?>
                                            <input type="hidden" name="media_rrss" value="<?php echo e(json_encode($rrss)); ?>">
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <div data-repeater-list="kt_media_profile_add_rrss_options" class="d-flex flex-column gap-3">
                                                <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                                    <div class="w-100 w-md-250px">
                                                        <select class="form-select" name="media_rrss_option" data-placeholder="Seleccione una opción" data-kt-media-profile-add-product="media_rrss_option">
                                                            <option></option>
                                                            <option value="Facebook">Facebook</option>
                                                            <option value="Twitter">Twitter</option>
                                                            <option value="Instagram">Instagram</option>
                                                            <option value="Youtube">Youtube</option>
                                                            <option value="TikTok">TikTok</option>
                                                            <option value="Whatsapp">Whatsapp</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" class="form-control mw-100 w-250px" name="media_rrss_value" placeholder="" />
                                                    <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                                                        <i class="ki-outline ki-cross fs-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-5">
                                            <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                                <i class="ki-outline ki-plus fs-2"></i>Adicionar RRSS
                                            </button>
                                        </div>
                                    </div>
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
    <script src="<?php echo e(asset('themes/common/plugins/custom/formrepeater/formrepeater.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/external/js/custom/media-profile/contact.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::external.layouts.master', ['page' => 'media_data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//mediaProfile/contactData.blade.php ENDPATH**/ ?>