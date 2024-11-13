

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">REGISTRO DE MONITOREO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Monitoreo</li>
            <li class="breadcrumb-item text-gray-600">Procesos Electorales</li>
            <li class="breadcrumb-item text-gray-500">Detalle</li>

        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content flex-row-fluid" id="kt_content">

        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">

                <div>
                    <?php if(auth()->user()->id == $monitoring->registered_by): ?>
                        <?php switch($monitoring->status):
                            case ('CREATED'): ?>
                            <div class="mb-5">
                                <button type="button" class="kt_submit_monitoring_to_report btn btn-primary btn-sm w-100 me-1 fs-8">
                                    <i class="ki-outline ki-send fs-3 me-1"></i>Enviar a Comisión de Análasis
                                </button>
                            </div>
                            <?php break; ?>
                        <?php endswitch; ?>
                    <?php endif; ?>
                </div>

                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">

                        <div class="d-flex flex-column py-5">

                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL DOCUMENTO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Operación:</div>
                                <div class="fw-bold text-gray-800 fs-6">Registro de Monitoreo</div>
                            </div>

                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Tipo de medio:</div>
                                <div class="fw-bold text-gray-800 fs-6">
                                    <?php switch($monitoring->media_type):
                                        case ('TV'): ?>
                                        <span>MEDIO TELEVISIVO</span>
                                        <?php break; ?>
                                        <?php case ('RADIO'): ?>
                                        <span>MEDIO RADIAL</span>
                                        <?php break; ?>
                                        <?php case ('PRINT'): ?>
                                        <span>MEDIO IMPRESO</span>
                                        <?php break; ?>
                                        <?php case ('DIGITAL'): ?>
                                        <span>MEDIO DIGITAL</span>
                                        <?php break; ?>
                                        <?php case ('RRSS'): ?>
                                        <span>REDES SOCIALES</span>
                                        <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Nro Documento:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($monitoring->code); ?></div>
                            </div>

                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Estado:</div>
                                <div class="fw-bold text-gray-800 fs-6">
                                    <?php switch($monitoring->status):
                                        case ('CREATED'): ?>
                                        <span class="badge badge-info py-1 px-2">Nuevo</span>
                                        <?php break; ?>
                                        <?php case ('SELECTED'): ?>
                                        <span class="badge badge-info py-1 px-2">En análisis</span>
                                        <?php break; ?>
                                        <?php case ('ARCHIVED'): ?>
                                        <span class="badge badge-secondary py-1 px-2">Archivado</span>
                                        <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            </div>

                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha de registro:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($monitoring->registered_at); ?></div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="card mb-5 mb-xl-8">
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
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha del Proceso:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($election->election_date); ?></div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!--end::Sidebar-->

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">

                <div class="card card-flush mb-6 mb-xl-9">
                    <div class="card-header mt-6">
                        <div class="card-title flex-column">
                            <h2 class="mb-1 text-uppercase">Datos del Registro de Monitoreo</h2>
                            <div class="fs-6 fw-semibold text-muted"></div>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body p-9 pt-4">

                        <h6 class="mb-5 fw-bolder text-gray-600 text-hover-primary">MEDIO DE COMUNICACIÓN</h6>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Nombre del Medio:</label>
                            </div>
                            <div class="col-md-8">
                                <?php if($monitoring->registered_media): ?>
                                    <p class="form-control form-control-plaintext"><?php echo e($monitoring->mediaProfile->name); ?> - <?php echo e($monitoring->mediaProfile->business_name); ?></p>
                                <?php else: ?>
                                    <p class="form-control form-control-plaintext"><?php echo e($monitoring->other_media); ?> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="separator separator-dashed border-muted"></div>

                        <div id="wrapper-summary-accreditation" class="wrapper_content_step_3">
                            <?php echo $__env->make('frontend@oepAdministrator::monitoring.partials.summaryFormMonitoring', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <div class="modal fade" id="kt_modal_monitoring_submit_to_analysis" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded" id="kt_block_target_to_analysis">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form id="kt_form_monitoring_submit_to_analysis" class="form" method="post" autocomplete="off"
                          action="<?php echo e(route('oep_admin_media_monitoring_submit', ['election_id' => $monitoring->election->id, 'id' => $monitoring->id])); ?>">
                        <div class="mb-10 text-center">
                            <h1 class="mb-3">Registro de Monitoreo</h1>
                            <div class="text-muted fw-semibold fs-5">Enviar a Comisión de Análisis</div>
                        </div>

                        <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-9 p-6">
                            <i class="ki-duotone ki-information fs-2tx text-info me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">
                                        Se creará un Reporte de Monitoreo y se enviará a la Comisión de Análisis.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Cambiar estado a:</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" name="readonly_monitoring_new_status" value="Enviado a Comisión" readonly />

                        </div>

                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Enviado a:</label>
                            <?php if($monitoring->scope_type === 'TED'): ?>
                                <input type="text" class="form-control form-control-solid" name="monitoring_scope" value=" TED <?php echo e($monitoring->scope_department); ?>" readonly />
                            <?php else: ?>
                                <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="" name="monitoring_scope">
                                    <option value="Nacional" <?php echo e($monitoring->scope_department == 'Nacional' ? 'selected="selected"' : ''); ?>>TSE Nacional</option>
                                    <option value="La Paz" <?php echo e($monitoring->scope_department == 'La Paz' ? 'selected="selected"' : ''); ?>>TED La Paz</option>
                                    <option value="Oruro" <?php echo e($monitoring->scope_department == 'Oruro' ? 'selected="selected"' : ''); ?>>TED Oruro</option>
                                    <option value="Potosí" <?php echo e($monitoring->scope_department == 'Potosí' ? 'selected="selected"' : ''); ?>>TED Potosí</option>
                                    <option value="Pando" <?php echo e($monitoring->scope_department == 'Pando' ? 'selected="selected"' : ''); ?>>TED Pando</option>
                                    <option value="Beni" <?php echo e($monitoring->scope_department == 'Beni' ? 'selected="selected"' : ''); ?>>TED Beni</option>
                                    <option value="Santa Cruz" <?php echo e($monitoring->scope_department == 'Santa Cruz' ? 'selected="selected"' : ''); ?>>TED Santa Cruz</option>
                                    <option value="Cochabamba" <?php echo e($monitoring->scope_department == 'Cochabamba' ? 'selected="selected"' : ''); ?>>TED Cochabamba</option>
                                    <option value="Chuquisaca" <?php echo e($monitoring->scope_department == 'Chuquisaca' ? 'selected="selected"' : ''); ?>>TED Chuquisaca</option>
                                    <option value="Tarija" <?php echo e($monitoring->scope_department == 'Tarija' ? 'selected="selected"' : ''); ?>>TED Tarija</option>
                                </select>
                            <?php endif; ?>
                        </div>

                        <div class="text-center">
                            <button type="button" id="kt_button_monitoring_to_analysis_cancel" class="btn btn-light me-3">Cancelar</button>
                            <button type="submit" id="kt_button_monitoring_to_analysis_submit" class="btn btn-primary">
                                <span class="indicator-label">Enviar</span>
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
    <!-- fileuploader -->
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css')); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css')); ?>" media="all" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
    <script src="<?php echo e(asset('themes/admin/js/custom/monitoring/detail.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'monitoring_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoring/detailMonitoring.blade.php ENDPATH**/ ?>