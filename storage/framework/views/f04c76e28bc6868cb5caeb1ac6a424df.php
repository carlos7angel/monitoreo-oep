

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
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">Medio</a>
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
                                <a href="<?php echo e(route('ext_admin_media_profile_general_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary">Datos Generales</a>
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
                                <a href="<?php echo e(route('ext_admin_media_profile_file_data_show')); ?>" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">Archivos</a>
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
                            <h2>Archivos adjuntos</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_media_profile_file_data_form" class="form" action="<?php echo e(route('ext_admin_media_profile_file_data_store')); ?>" method="post" autocomplete="off">

                            <div class="fv-row mb-7">
                                <?php if($profile->fileLegalAttorney): ?>
                                    <input type="hidden" name="file_power_attorney" data-name="<?php echo e($profile->fileLegalAttorney->origin_name); ?>" data-size="<?php echo e($profile->fileLegalAttorney->size); ?>"
                                           data-mimetype="<?php echo e($profile->fileLegalAttorney->mime_type); ?>" data-path="<?php echo e($profile->fileLegalAttorney->url_file); ?>">
                                <?php endif; ?>
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Poder Notariado</span>
                                </label>
                                <div class="text-muted fs-7">Fotocopia simple del poder notariado (si corresponde).</div>
                                <input type="file" name="media_file_power_attorney" class="files"
                                       id="kt_media_file_power_attorney" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                            </div>

                            <div class="fv-row mb-7">
                                <?php if($profile->fileRepDocument): ?>
                                    <input type="hidden" name="file_rep_document" data-name="<?php echo e($profile->fileRepDocument->origin_name); ?>" data-size="<?php echo e($profile->fileRepDocument->size); ?>"
                                           data-mimetype="<?php echo e($profile->fileRepDocument->mime_type); ?>" data-path="<?php echo e($profile->fileRepDocument->url_file); ?>">
                                <?php endif; ?>
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Cédula de Identidad</span>
                                </label>
                                <div class="text-muted fs-7">Fotocopia simple de la cédula de identidad del o la propietaria o representante legal.</div>
                                <input type="file" name="media_file_rep_document" class="files"
                                       id="kt_media_file_rep_document" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                            </div>

                            <div class="fv-row mb-7">
                                <?php if($profile->fileNit): ?>
                                    <input type="hidden" name="file_nit" data-name="<?php echo e($profile->fileNit->origin_name); ?>" data-size="<?php echo e($profile->fileNit->size); ?>"
                                           data-mimetype="<?php echo e($profile->fileNit->mime_type); ?>" data-path="<?php echo e($profile->fileNit->url_file); ?>">
                                <?php endif; ?>
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">NIT</span>
                                </label>
                                <div class="text-muted fs-7">Fotocopia simple del Número de Identifi cación Tributaria (NIT).</div>
                                <input type="file" name="media_file_nit" class="files"
                                       id="kt_media_file_nit" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                            </div>

                            <div class="separator mb-6"></div>

                            <div class="d-flex justify-content-end">
                                <button type="reset" id="kt_media_profile_cancel" class="btn btn-light me-3">Cancelar</button>
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
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css')); ?>" media="all" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('themes/external/js/custom/media-profile/file.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::external.layouts.master', ['page' => 'media_data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\ExtAdministrator/UI/WEB/Views//mediaProfile/fileData.blade.php ENDPATH**/ ?>