

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">NUEVO REGISTRO DE MONITOREO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Monitoreo</li>
            <li class="breadcrumb-item text-gray-500">Procesos Electorales</li>
            <li class="breadcrumb-item text-gray-500">Nuevo</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <div class="d-flex justify-content-end">
            <button type="submit" id="kt_create_monitoring_submit" class="btn btn-primary">
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
        <form id="kt_create_monitoring_form" class="form d-flex flex-column flex-lg-row" method="post" autocomplete="off"
              action="<?php echo e(route('oep_admin_media_monitoring_store', ['id' => $election->id, 'media' => $media_type])); ?>">

            <input type="hidden" name="oep_election_id" value="<?php echo e($election->id); ?>">

            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

                <div class="card card-flush py-4">





                    <div class="card-body">
                        <div class="fv-row">
                            <label for="kt_add_election_type" class="form-label">Proceso Electoral</label>
                            <p>Elecciones Judiciales 2024</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 mb-10">

                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>NUEVO REGISTRO <span class="text-info">MEDIO TELEVISIVO</span></h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Tipo de Medio:</label>
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="" name="oep_media_type" readonly>
                                <option value="TV" <?php echo e($media_type === 'TV' ? 'selected="selected"' : ''); ?>>MEDIO TELEVISIVO</option>
                                <option value="RADIO" <?php echo e($media_type === 'RADIO' ? 'selected="selected"' : ''); ?>>MEDIO RADIAL</option>
                                <option value="PRINT" <?php echo e($media_type === 'PRINT' ? 'selected="selected"' : ''); ?>>MEDIO IMPRESO</option>
                                <option value="DIGITAL" <?php echo e($media_type === 'DIGITAL' ? 'selected="selected"' : ''); ?>>MEDIO DIGITAL</option>
                                <option value="RRSS" <?php echo e($media_type === 'RRSS' ? 'selected="selected"' : ''); ?>>REDES SOCIALES</option>
                            </select>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Medio de Comunicación:</label>
                            <select class="form-select mb-2" data-control="select2" data-hide-search="false" data-placeholder="Seleccione un medio" name="media_profile"
                                    data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio">
                                <option value=""></option>
                                <?php $__currentLoopData = $medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($media->id); ?>" ><?php echo e($media->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <?php echo $__env->make('frontend@oepAdministrator::monitoring.partials.dynamicForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    <script src="<?php echo e(asset('themes/admin/js/custom/monitoring/create.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'monitoring_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoring/createMonitoring.blade.php ENDPATH**/ ?>