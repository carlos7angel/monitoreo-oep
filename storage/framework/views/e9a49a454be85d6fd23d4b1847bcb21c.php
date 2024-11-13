

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">EDITAR REGISTRO DE MONITOREO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Monitoreo</li>
            <li class="breadcrumb-item text-gray-500">Procesos Electorales</li>
            <li class="breadcrumb-item text-gray-500">Editar</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <div class="d-flex justify-content-end">
            <button type="submit" id="kt_update_monitoring_submit" class="btn btn-primary">
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
        <form id="kt_edit_monitoring_form" class="form d-flex flex-column flex-lg-row" method="post" autocomplete="off"
              action="<?php echo e(route('oep_admin_media_monitoring_update', ['election_id' => $election->id, 'id' => $monitoring->id])); ?>">

            <input type="hidden" name="oep_election_id" value="<?php echo e($election->id); ?>">

            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

                <div class="card card-flush mb-5 mb-xl-8">

                    <div class="card-body">
                        <div class="d-flex flex-column py-5">
                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL PROCESO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Proceso Electoral:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($election->name); ?></div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Categoría:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($election->type); ?></div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha del Proceso:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($election->election_date); ?></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 mb-10">

                <div class="card card-flush py-4">
                    <div class="mx-auto w-100 mw-600px">
                        <div class="card-header p-0">
                            <div class="card-title mt-10">
                                <h2>EDITAR REGISTRO
                                    <?php switch($monitoring->media_type):
                                        case ('TV'): ?>
                                        <span class="text-info">MEDIO TELEVISIVO</span>
                                        <?php break; ?>
                                        <?php case ('RADIO'): ?>
                                        <span class="text-info">MEDIO RADIAL</span>
                                        <?php break; ?>
                                        <?php case ('PRINT'): ?>
                                        <span class="text-info">MEDIO IMPRESO</span>
                                        <?php break; ?>
                                        <?php case ('DIGITAL'): ?>
                                        <span class="text-info">MEDIO DIGITAL</span>
                                        <?php break; ?>
                                        <?php case ('RRSS'): ?>
                                        <span class="text-info">REDES SOCIALES</span>
                                        <?php break; ?>
                                    <?php endswitch; ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">

                        <div class="mx-auto w-100 mw-600px pt-10 pb-10">

                            <div class="mb-10 fv-row">
                                <label class="required form-label">Tipo de Medio:</label>
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="" name="oep_media_type" readonly="readonly" disabled>
                                    <option value="TV" <?php echo e($monitoring->media_type === 'TV' ? 'selected="selected"' : ''); ?>>MEDIO TELEVISIVO</option>
                                    <option value="RADIO" <?php echo e($monitoring->media_type === 'RADIO' ? 'selected="selected"' : ''); ?>>MEDIO RADIAL</option>
                                    <option value="PRINT" <?php echo e($monitoring->media_type === 'PRINT' ? 'selected="selected"' : ''); ?>>MEDIO IMPRESO</option>
                                    <option value="DIGITAL" <?php echo e($monitoring->media_type === 'DIGITAL' ? 'selected="selected"' : ''); ?>>MEDIO DIGITAL</option>
                                    <option value="RRSS" <?php echo e($monitoring->media_type === 'RRSS' ? 'selected="selected"' : ''); ?>>REDES SOCIALES</option>
                                </select>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required fw-semibold fs-6 mb-5">¿Medio de comunicación registrado/acreditado?</label>
                                <div class="d-flex __fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="media_registered" type="radio" value="1" id="kt_type_option_0" <?php echo e($monitoring->registered_media ? 'checked="checked"' : ''); ?>

                                               data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"/>
                                        <label class="form-check-label" for="kt_type_option_0">
                                            <div class="fw-bold text-muted">Si</div>
                                        </label>
                                    </div>
                                </div>
                                <div class='my-5'></div>
                                <div class="d-flex __fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="media_registered" type="radio" value="0" id="kt_type_option_1" <?php echo e($monitoring->registered_media ? '' : 'checked="checked"'); ?>

                                               data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"/>
                                        <label class="form-check-label" for="kt_type_option_1">
                                            <div class="fw-bold text-muted">No</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="kt_select_media_input <?php echo e($monitoring->registered_media ? 'd-block' : 'd-none'); ?>">
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Medio de Comunicación:</label>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Seleccione un medio" name="media_profile"
                                            data-fv-not-empty="<?php echo e($monitoring->registered_media ? 'true' : 'false'); ?>" data-fv-not-empty___message="El campo es obligatorio">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($media->id); ?>" <?php echo e($monitoring->fid_media_profile == $media->id ? 'selected' : ''); ?>><?php echo e($media->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="kt_text_media_input <?php echo e($monitoring->registered_media ? 'd-none' : 'd-block'); ?>">
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Medio de Comunicación:</label>
                                    <input type="text" class="form-control" placeholder="" name="media_profile_text" value="<?php echo e($monitoring->other_media); ?>"
                                           data-fv-not-empty="<?php echo e($monitoring->registered_media ? 'false' : 'true'); ?>" data-fv-not-empty___message="El campo es obligatorio"/>
                                </div>
                            </div>

                            <?php echo $__env->make('frontend@oepAdministrator::monitoring.partials.dynamicFormEdit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>

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
    <script src="<?php echo e(asset('themes/admin/js/custom/monitoring/edit.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'monitoring_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoring/editMonitoring.blade.php ENDPATH**/ ?>