

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
            <a href="<?php echo e(route('oep_admin_elections_list')); ?>" id="kt_add_election_cancel__" class="btn btn-light me-5">Cancelar</a>
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
                        <div class="mb-10 row g-9">
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Fecha del Proceso Electoral</label>
                                <input class="form-control datepicker_flatpickr" name="election_date" placeholder="Seleccione la fecha" value="<?php echo e($election->election_date); ?>" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required form-label">Código Identificador</label>
                                <input type="text" class="form-control" name="election_code" placeholder="" value="<?php echo e($election->code); ?>" />
                            </div>
                        </div>
                        <div class="mb-0 fv-row">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" rows="4" name="election_description" placeholder=""><?php echo e($election->description); ?></textarea>
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

                        <div id="kt_wrapper_enable_media">
                            <div class="row g-9 mb-10">
                                <div class="col-md-6 fv-row">
                                    <label class="required form-label">Fecha de Inicio Registro</label>
                                    <input type="text" class="form-control datepicker_flatpickr" placeholder="" name="election_start_date_registration_media" value="<?php echo e($election->start_date_media_registration); ?>" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required form-label">Fecha de Cierre Registro</label>
                                    <input type="text" class="form-control datepicker_flatpickr" placeholder="" name="election_end_date_registration_media" value="<?php echo e($election->end_date_media_registration); ?>" />
                                </div>
                            </div>
    
    
    
    
    
    
    
    
    
    
    

                            <div class="fv-row mb-10">
                                <?php if($election->fileAffidavitMediaRegistration): ?>
                                    <input type="hidden" name="file_affidavit_media" data-name="<?php echo e($election->fileAffidavitMediaRegistration->origin_name); ?>" data-size="<?php echo e($election->fileAffidavitMediaRegistration->size); ?>"
                                    data-mimetype="<?php echo e($election->fileAffidavitMediaRegistration->mime_type); ?>" data-path="<?php echo e($election->fileAffidavitMediaRegistration->url_file); ?>">
                                <?php endif; ?>
                                <label class="form-label">Declaración Jurada (Documento modelo)</label>
                                <input type="file" name="election_affidavit_file_registration_media" class="files"
                                       id="kt_election_affidavit_file_registration_media" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Si selecciona un nuevo archivo reemplazará al anterior.</div>
                            </div>

                            <div class="row g-9 ">
                                <div class="col-md-6 fv-row">
                                    <label class="required form-label">Plazo límite para observados</label>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="" name="election_due_days_observed">
                                        <option value="0" <?php echo e(($election->due_days_observed_media_registration == 0 || $election->due_days_observed_media_registration == null) ? 'selected="selected"' : ''); ?>>Ninguno</option>
                                        <option value="3" <?php echo e(($election->due_days_observed_media_registration == 3) ? 'selected="selected"' : ''); ?>>3 días</option>
                                        <option value="10" <?php echo e(($election->due_days_observed_media_registration == 10) ? 'selected="selected"' : ''); ?>>10 días</option>
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
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="kt_election_enable_monitoring" name="election_enable_monitoring" <?php echo e($election->enable_for_monitoring ? 'checked="checked"' : ''); ?> />
                                        <label class="form-check-label" for="kt_election_enable_monitoring"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                        </div>

                        <div id="kt_wrapper_enable_monitoring">

                            <div class="row g-9 mb-10">
                                <div class="col-md-6 fv-row">
                                    <label class="form-label">Formulario Medios Televisivos</label>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Seleccionar formulario" name="election_form_tv_media">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($form->id); ?>" <?php echo e($election->fid_form_tv_media == $form->id ? 'selected="selected"' : ''); ?>><?php echo e($form->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="form-label">Formulario Medios Radiales</label>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Seleccionar formulario" name="election_form_radio_media">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($form->id); ?>" <?php echo e($election->fid_form_radio_media == $form->id ? 'selected="selected"' : ''); ?>><?php echo e($form->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-9 mb-10">
                                <div class="col-md-6 fv-row">
                                    <label class="form-label">Formulario Medios Impresos</label>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Seleccionar formulario" name="election_form_print_media">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($form->id); ?>" <?php echo e($election->fid_form_print_media == $form->id ? 'selected="selected"' : ''); ?>><?php echo e($form->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="form-label">Formulario Medios Digitales</label>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Seleccionar formulario" name="election_form_digital_media">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($form->id); ?>" <?php echo e($election->fid_form_digital_media == $form->id ? 'selected="selected"' : ''); ?>><?php echo e($form->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-9 mb-10">
                                <div class="col-md-6 fv-row">
                                    <label class="form-label">Formulario Redes Sociales</label>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Seleccionar formulario" name="election_form_rrss_media">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($form->id); ?>" <?php echo e($election->fid_form_rrss_media == $form->id ? 'selected="selected"' : ''); ?>><?php echo e($form->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row">
                                </div>
                            </div>

                            <div class="row mb-10">
                                <div class="col-md-6 fv-row">
                                    <label class="form-label">Plazo limite para enviar informe (Comisión de Análisis)</label>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="" name="election_due_days_analysis_report">
                                        <option value="0" selected="selected">Ninguno</option>
                                        <option value="1">24 horas</option>
                                        <option value="2">48 horas</option>
                                        <option value="3">72 horas</option>
                                        <option value="5">5 días</option>
                                        <option value="7">7 días</option>
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
                            <h2>Configuración para Partidos Políticos</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10">
                            <div class="d-flex flex-stack">
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <a class="fs-5 text-gray-900 fw-semibold">Registro de Partidos Políticos</a>
                                        <div class="fs-6 fw-semibold text-gray-500">Habilitar subir material de Propaganda Electoral</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="form-check form-check-solid form-check-custom form-switch fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="kt_election_enable_political_registration" name="election_enable_political_registration" <?php echo e($election->enable_for_political_registration ? 'checked="checked"' : ''); ?> />
                                        <label class="form-check-label" for="kt_election_enable_political_registration"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                        </div>


                        <div id="kt_wrapper_enable_political_registration">

                            <div class="mb-10 fv-row">
                                <label class="form-label">Descripción/Advertencia al subir material</label>
                                <textarea class="form-control" rows="3" name="election_description_political_registration" placeholder=""><?php echo e($election->description_for_political_registration); ?></textarea>
                            </div>

                            <div class="row mb-10">
                                <div class="col-md-6 fv-row">
                                    <label class="required form-label">Fecha límite de registro de Material</label>
                                    <input type="text" class="form-control datepicker_flatpickr" placeholder="" name="election_end_date_political_registration" value="<?php echo e($election->end_date_political_registration); ?>" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required form-label">Tamaño máximo de archivo para subir</label>
                                    <input type="number" class="form-control" placeholder="" name="election_max_size_political_registration" value="<?php echo e($election->max_size_for_political_registration); ?>" />
                                </div>
                            </div>

                            <div class="fv-row mb-10">
                                <label class="required form-label">Tipo de archivos permitidos</label>
                                <div class="text-muted fs-7 mb-5">Archivos permitidos para material de propaganda electoral</div>

                                <?php
                                    $mime_types = is_array(json_decode($election->mime_types_for_political_registration)) ?  json_decode($election->mime_types_for_political_registration) : [];
                                ?>

                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input" type="checkbox" name="election_mime_type_political_registration[]" value="video/mp4" <?php echo e(in_array('video/mp4', $mime_types) ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">(.mp4) video/mp4</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input" type="checkbox" name="election_mime_type_political_registration[]" value="video/x-msvideo" <?php echo e(in_array('video/x-msvideo', $mime_types) ? 'checked="checked"' : ''); ?>/>
                                    <label class="form-check-label fw-semibold">(.avi) video/x-msvideo</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input" type="checkbox" name="election_mime_type_political_registration[]" value="video/mpeg" <?php echo e(in_array('video/mpeg', $mime_types) ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">(.mpeg) video/mpeg</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input" type="checkbox" name="election_mime_type_political_registration[]" value="audio/mpeg" <?php echo e(in_array('audio/mpeg', $mime_types) ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">(.mp3) audio/mpeg</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input" type="checkbox" name="election_mime_type_political_registration[]" value="audio/wav" <?php echo e(in_array('audio/wav', $mime_types) ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">(.wav) audio/wav</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input" type="checkbox" name="election_mime_type_political_registration[]" value="audio/aac" <?php echo e(in_array('audio/aac', $mime_types) ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">(.acc) audio/aac</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input" type="checkbox" name="election_mime_type_political_registration[]" value="application/pdf" <?php echo e(in_array('application/pdf', $mime_types) ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">(.pdf) application/pdf</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input" type="checkbox" name="election_mime_type_political_registration[]" value="image/png" <?php echo e(in_array('image/png', $mime_types) ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">(.png) image/png</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input" type="checkbox" name="election_mime_type_political_registration[]" value="image/jpeg" <?php echo e(in_array('image/jpeg', $mime_types) ? 'checked="checked"' : ''); ?> />
                                    <label class="form-check-label fw-semibold">(.jpeg, .jpg) image/jpeg</label>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>





            </div>

            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 ">

                <div class="card card-flush py-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Estado</h2>
                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    <div class="card-body pt-0 fv-row">

                        <?php switch($election->status):
                            case ('draft'): ?>
                            <span class="badge badge-info py-2 px-4">Borrador</span>
                            <?php break; ?>
                            <?php case ('active'): ?>
                            <span class="badge badge-success py-2 px-4">Activo</span>
                            <?php break; ?>
                            <?php case ('unpublished'): ?>
                            <span class="badge badge-secondary py-2 px-4">Despublicado</span>
                            <?php break; ?>
                            <?php case ('finished'): ?>
                            <span class="badge badge-info py-2 px-4">Finalizado</span>
                            <?php break; ?>
                            <?php case ('archived'): ?>
                            <span class="badge badge-danger py-2 px-4">Archivado</span>
                            <?php break; ?>
                            <?php case ('canceled'): ?>
                            <span class="badge badge-danger py-2 px-4">Cancelado</span>
                            <?php break; ?>
                        <?php endswitch; ?>

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
                            <option value="Referendos" <?php echo e($election->type == 'Referendos' ? 'selected="selected"' : ''); ?>>Referendos</option>
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
                            <?php
                                $file_logo = '';
                                if ($election->logo_image) {
                                    $file_logo = asset('storage' . $election->logo_image);
                                }
                            ?>
                            <div class="image-input-wrapper w-200px h-200px <?php echo e($file_logo ? 'bg-white' : ''); ?>" style="background-image: url(<?php echo e($file_logo); ?>)"></div>
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
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'election_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//election/edit.blade.php ENDPATH**/ ?>