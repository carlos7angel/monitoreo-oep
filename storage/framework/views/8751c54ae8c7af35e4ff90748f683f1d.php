

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">PROCESO ELECTORAL</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Procesos Electorales</li>
            <li class="breadcrumb-item text-gray-500">Nuevo</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <div class="d-flex justify-content-end">
            <a href="<?php echo e(route('oep_admin_elections_list')); ?>" id="kt_add_election_cancel__" class="btn btn-light me-5">Cancelar</a>
            <button type="submit" id="kt_add_election_submit" class="btn btn-primary">
                <span class="indicator-label">Guardar</span>
                <span class="indicator-progress">
                    Espere por favor...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content flex-row-fluid" id="kt_content">
        <form id="kt_add_election_form" class="form d-flex flex-column flex-lg-row" method="post" action="<?php echo e(route('oep_admin_elections_store')); ?>" autocomplete="off">
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 me-lg-10 mb-10">

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>General</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Nombre del Proceso Electoral</label>
                            <input type="text" name="election_name" class="form-control mb-2" placeholder="Proceso electoral" value="" />
                        </div>
                        <div class="mb-10 row g-9">
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Fecha del Proceso Electoral</label>
                                <input class="form-control datepicker_flatpickr" name="election_date" placeholder="Seleccione la fecha" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Código Identificador</label>
                                <input type="text" class="form-control" name="election_code" placeholder="" />
                            </div>
                        </div>
                        <div class="mb-0 fv-row">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" rows="4" name="election_description" placeholder=""></textarea>
                        </div>
                    </div>
                </div>

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Configuración de Registro de Medios</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10">
                            <div class="d-flex flex-stack">
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <a class="fs-5 text-gray-900 fw-semibold">Registro de Medios</a>
                                        <div class="fs-6 fw-semibold text-gray-500">Habilitar el Registro/Acreditación de Medios</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="form-check form-check-solid form-check-custom form-switch fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="kt_election_enable_registration_media" name="election_enable_registration_media" checked="checked" />
                                        <label class="form-check-label" for="kt_election_enable_registration_media"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                        </div>

                        <div id="kt_wrapper_enable_media">
                        <div class="row g-9 mb-10">
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Fecha de Inicio Registro</label>
                                <input type="text" class="form-control datepicker_flatpickr" placeholder="" name="election_start_date_registration_media" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Fecha de Cierre Registro</label>
                                <input type="text" class="form-control datepicker_flatpickr" placeholder="" name="election_end_date_registration_media" />
                            </div>
                        </div>












                        <div class="fv-row mb-10">
                            <label class="form-label">Declaración Jurada (Documento modelo)</label>
                            <input type="file" name="election_affidavit_file_registration_media" class="files"
                                   id="kt_election_affidavit_file_registration_media" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB.</div>
                        </div>

                        <div class="row g-9 ">
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Plazo límite para observados</label>
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="" name="election_due_days_observed">
                                    <option value="0" selected="selected">Ninguno</option>
                                    <option value="3">3 días</option>
                                    <option value="10">10 días</option>
                                </select>
                            </div>
                            <div class="col-md-6 fv-row">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Configuración para Monitoreo</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10">
                            <div class="d-flex flex-stack">
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <a class="fs-5 text-gray-900 fw-semibold">Monitoreo de Propaganda</a>
                                        <div class="fs-6 fw-semibold text-gray-500">Habilitar el Registro de Propaganda Electoral</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="form-check form-check-solid form-check-custom form-switch fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="kt_election_enable_monitoring" name="election_enable_monitoring" checked="checked" />
                                        <label class="form-check-label" for="kt_election_enable_monitoring"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                        </div>

                        <div id="kt_wrapper_enable_monitoring">
                        <div class="fv-row mb-10">
                            <label class="required form-label">Tipo de Medios</label>
                            <div class="text-muted fs-7 mb-5">Medios habilitados para el Monitoreo</div>

                            <div class="form-check form-check-custom mb-3">
                                <input class="form-check-input h-25px w-25px" type="checkbox" name="election_monitoring_media_television" value="1" checked="checked" />
                                <label class="form-check-label fw-semibold">Medios Televisivos</label>
                            </div>
                            <div class="form-check form-check-custom mb-3">
                                <input class="form-check-input h-25px w-25px" type="checkbox" name="election_monitoring_media_radio" value="1" checked="checked" />
                                <label class="form-check-label fw-semibold">Medios Radiales</label>
                            </div>
                            <div class="form-check form-check-custom mb-3">
                                <input class="form-check-input h-25px w-25px" type="checkbox" name="election_monitoring_media_print" value="1" checked="checked" />
                                <label class="form-check-label fw-semibold">Medios Impresos</label>
                            </div>
                            <div class="form-check form-check-custom mb-3">
                                <input class="form-check-input h-25px w-25px" type="checkbox" name="election_monitoring_media_digital" value="1" checked="checked" />
                                <label class="form-check-label fw-semibold">Medios Digitales</label>
                            </div>
                            <div class="form-check form-check-custom mb-3">
                                <input class="form-check-input h-25px w-25px" type="checkbox" name="election_monitoring_media_social" value="1" checked="checked" />
                                <label class="form-check-label fw-semibold">Medios Redes Sociales</label>
                            </div>


                        </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 ">

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Estado</h2>
                        </div>
                        <div class="card-toolbar">
                            <div class="rounded-circle bg-danger w-15px h-15px" id="kt_add_election_status"></div>
                        </div>
                    </div>
                    <div class="card-body pt-0 fv-row">
                        <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Selecciona un estado"
                                id="kt_add_election_status_select" name="election_status">
                            <option value="draft" selected="selected">Borrador</option>
                        </select>
                        <div class="text-muted fs-7">Establece el estado de publicación del proceso electoral.</div>
                    </div>
                </div>

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Categoría</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0 fv-row">
                        <label for="kt_add_election_type" class="form-label">Tipo de proceso electoral</label>
                        <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccionar"
                                id="kt_add_election_type" name="election_type">
                            <option></option>
                            <option value="Generales" selected="selected">Elecciones Generales</option>
                            <option value="Subnacionales">Elecciones Subnacionales</option>
                            <option value="Primarias">Elecciones Primarias </option>
                            <option value="Judiciales">Elecciones Judiciales</option>
                            <option value="Referendos">Referendos</option>
                        </select>


                    </div>
                </div>

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Imagen de Referencia</h2>
                        </div>
                    </div>
                    <div class="card-body text-center pt-0">
                        <style>
                            .image-input-placeholder { background-image: url("<?php echo e(asset('themes/admin/media/svg/files/blank-image.svg')); ?>"); }
                        </style>
                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3 fv-row"  data-kt-image-input="true">
                            <div class="image-input-wrapper w-200px h-200px"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Cambiar">
                                <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                                <input type="file" name="election_logo" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="election_remove" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancelar">
                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                            </span>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remover">
                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                            </span>
                        </div>
                        <div class="text-muted fs-7">Imágen del proceso electoral. Formatos aceptados *.png, *.jpg y *.jpeg</div>
                    </div>
                </div>

            </div>

        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <!-- fileuploader -->
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css')); ?>" media="all" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('themes/admin/js/custom/elections/create.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'election_create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//election/create.blade.php ENDPATH**/ ?>