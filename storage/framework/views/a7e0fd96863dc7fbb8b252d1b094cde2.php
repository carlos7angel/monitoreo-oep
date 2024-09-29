

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">PROCESO ELECTORAL</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Procesos Electorales</li>
            <li class="breadcrumb-item text-gray-500">Editar</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

        <div class="d-flex justify-content-end">
            <a href="" id="kt_add_election_cancel" class="btn btn-light me-5">Cancelar</a>
            <button type="submit" id="kt_add_election_submit" class="btn btn-primary">
                <span class="indicator-label">Guardar</span>
                <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content flex-row-fluid" id="kt_content">

        <form id="kt_add_election_form" class="form d-flex flex-column flex-lg-row" method="post" action="<?php echo e(route('oep_admin_elections_update', ['id' => $election->id])); ?>">

            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 me-lg-10">

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>General</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Nombre del Proceso Electoral</label>
                            <input type="text" name="election_name" class="form-control mb-2" placeholder="Proceso electoral" value="<?php echo e($election->name); ?>" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" rows="4" name="election_description" placeholder=""><?php echo e($election->description); ?></textarea>
                        </div>
                        <div class="row g-9">
                            <div class="col-md-6 fv-row">
                                <label class="form-label">Fecha del Proceso Electoral</label>
                                <input class="form-control datepicker_flatpickr" name="election_date" placeholder="Seleccione la fecha" value="<?php echo e($election->election_date); ?>" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="form-label">Identificador</label>
                                <input type="text" class="form-control" name="election_code" placeholder="" value="<?php echo e($election->code); ?>" />
                            </div>
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
                                        <div class="fs-6 fw-semibold text-gray-500">Habilitar el registro de Medios</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="form-check form-check-solid form-check-custom form-switch fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="kt_election_enable_registration_media" name="election_enable_registration_media" <?php echo e($election->enable_for_media_registration ? 'checked="checked"' : ''); ?>  />
                                        <label class="form-check-label" for="kt_election_enable_registration_media"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                        </div>
                        <div class="row g-9 mb-10">
                            <div class="col-md-6 fv-row">
                                <label class="form-label">Fecha de Inicio Registro</label>
                                <input type="text" class="form-control datepicker_flatpickr" placeholder="" name="election_start_date_registration_media" value="<?php echo e($election->start_date_media_registration); ?>" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="form-label">Fecha de Cierre Registro</label>
                                <input type="text" class="form-control datepicker_flatpickr" placeholder="" name="election_end_date_registration_media" value="<?php echo e($election->end_date_media_registration); ?>" />
                            </div>
                        </div>
                        <div class="mb-10 fv-row">
                            <label for="kt_add_election_registration_media_form" class="form-label">Formulario adicional</label>
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccionar"
                                    id="kt_add_election_registration_media_form" name="election_subform_registration_media">
                                <option></option>
                                <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($form->id); ?>" <?php echo e($election->fid_form_media_registration == $form->id ? 'selected="selected"' : ''); ?> ><?php echo e($form->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="text-muted fs-7">Seleccione un formulario de registro de datos adicionales.</div>
                        </div>

                        <div class="fv-row">
                            <?php if($election->fileBasesMediaRegistration): ?>
                                <input type="hidden" name="file_registration_media" data-name="<?php echo e($election->fileBasesMediaRegistration->origin_name); ?>" data-size="<?php echo e($election->fileBasesMediaRegistration->size); ?>"
                                data-mimetype="<?php echo e($election->fileBasesMediaRegistration->mime_type); ?>" data-path="<?php echo e($election->fileBasesMediaRegistration->url_file); ?>">
                            <?php endif; ?>
                            <label class="form-label">Reglamento</label>
                            <input type="file" name="election_regulation_file_registration_media" class="files"
                                   id="kt_election_regulation_file_registration_media" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Si selecciona un nuevo archivo reemplazará al anterior.</div>
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
                            <div class="rounded-circle bg-success w-15px h-15px" id="kt_add_election_status"></div>
                        </div>
                    </div>
                    <div class="card-body pt-0 fv-row">
                        <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Selecciona un estado"
                                id="kt_add_election_status_select" name="election_status">
                            <option></option>
                            <option value="draft" <?php echo e($election->status == 'draft' ? 'selected="selected"' : ''); ?> >Borrador</option>
                            <option value="published" <?php echo e($election->status == 'published' ? 'selected="selected"' : ''); ?>>Activo</option>
                            <option value="archived" <?php echo e($election->status == 'archived' ? 'selected="selected"' : ''); ?>>Archivado</option>
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
                            <option value="Generales" <?php echo e($election->type == 'Generales' ? 'selected="selected"' : ''); ?> >Elecciones Generales</option>
                            <option value="Subnacionales" <?php echo e($election->type == 'Subnacionales' ? 'selected="selected"' : ''); ?>>Elecciones Subnacionales</option>
                            <option value="Primarias" <?php echo e($election->type == 'Primarias' ? 'selected="selected"' : ''); ?>>Elecciones Primarias </option>
                            <option value="Judiciales" <?php echo e($election->type == 'Judiciales' ? 'selected="selected"' : ''); ?>>Elecciones Judiciales</option>
                            <option value="Referendos" <?php echo e($election->type == 'Referendos' ? 'selected="selected"' : ''); ?>>Elecciones Referendos</option>
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
                        <?php if(! empty($election->logo_image)): ?>
                            <style>
                                .image-input-placeholder { background-image: url("<?php echo e(asset('storage' . $election->logo_image)); ?>"); }
                            </style>
                        <?php else: ?>
                            <style>
                                .image-input-placeholder { background-image: url("<?php echo e(asset('themes/admin/media/svg/files/blank-image.svg')); ?>"); }
                            </style>
                        <?php endif; ?>

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
    <script src="<?php echo e(asset('themes/admin/js/custom/elections/edit.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\CoreMonitoring\Election/UI/WEB/Views//edit.blade.php ENDPATH**/ ?>