

<?php $__env->startSection('breadcrumbs'); ?>
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">REPORTE DE MONITOREO</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Reporte de Monitoreo</li>
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
                    <?php switch($monitoring_report->status):
                        case ('NEW'): ?>
                        <div class="mb-5">
                            <button type="button" data-new-status="SUBMITTED" data-new-status-label="ENVIADO A COMISIÓN" class="kt_change_monitoring_report_status btn btn-primary btn-sm me-1 fs-8">
                                <i class="ki-outline ki-send fs-3 me-1"></i>Enviar a Comisión
                            </button>
                            <button type="button" data-new-status="ARCHIVED" data-new-status-label="ARCHIVADO" class="kt_change_monitoring_report_status btn btn-secondary btn-sm me-1 fs-8">
                                <i class="ki-outline ki-trash fs-3 me-1"></i>Archivar
                            </button>
                        </div>
                        <?php break; ?>
                        <?php case ('SUBMITTED'): ?>
                        <?php break; ?>
                        <?php case ('IN_PROGRESS'): ?>
                        <?php break; ?>
                        <?php case ('REJECTED'): ?>
                        <?php break; ?>
                        <?php case ('FINISHED'): ?>
                        <?php break; ?>
                        <?php case ('ARCHIVED'): ?>
                        <?php break; ?>
                    <?php endswitch; ?>
                </div>

                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">
                        <div class="d-flex flex-column py-5">
                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL PROCESO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Proceso Electoral:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($monitoring_report->election->name); ?></div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Código:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($monitoring_report->election->code); ?></div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Categoría:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($monitoring_report->election->type); ?></div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha del Proceso:</div>
                                <div class="fw-bold text-gray-800 fs-6"><?php echo e($monitoring_report->election->election_date); ?></div>
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
                            <h2 class="mb-1">Reporte</h2>
                            
                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    <div class="card-body p-9 pt-4">

                        <h6 class="mb-5 fw-bolder text-gray-600 text-hover-primary">DATOS GENERALES</h6>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Tipo de operación:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">Documento de Reporte de Monitoreo</p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Nro Documento:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext"><?php echo e($monitoring_report->code); ?></p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>

                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Estado:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext">
                                <?php switch($monitoring_report->status):
                                    case ('NEW'): ?>
                                    <span class="badge badge-info">Nuevo</span>
                                    <?php break; ?>

                                    <?php case ('SUBMITTED'): ?>
                                    <span class="badge badge-success">Enviado</span>
                                    <?php break; ?>

                                    <?php case ('IN_PROGRESS'): ?>
                                    <span class="badge badge-info">En progreso</span>
                                    <?php break; ?>

                                    <?php case ('REJECTED'): ?>
                                    <span class="badge badge-danger">Rechazado</span>
                                    <?php break; ?>

                                    <?php case ('FINISHED'): ?>
                                    <span class="badge badge-info">Finalizado</span>
                                    <?php break; ?>

                                    <?php case ('ARCHIVED'): ?>
                                    <span class="badge badge-danger">Archivado</span>
                                    <?php break; ?>

                                <?php endswitch; ?>
                                </p>
                            </div>
                        </div>

                        <div class="separator separator-dashed border-muted"></div>


                        <?php if($monitoring_report->status !== 'NEW' && $monitoring_report->status !== 'ARCHIVED'): ?>
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Fecha de envío:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext"><?php echo e($monitoring_report->submitted_at); ?></p>
                            </div>
                        </div>
                        <div class="separator separator-dashed border-muted"></div>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                <label class="fw-semibold fs-7 text-gray-600">Fecha de creación:</label>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control form-control-plaintext"><?php echo e($monitoring_report->created_at); ?></p>
                            </div>
                        </div>
                        <div class="separator separator-dashed border-muted"></div>
                        <?php endif; ?>

                        <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">REGISTROS DE MONITOREO</h6>

                        <div class="text-end mb-0">
                            <?php if($monitoring_report->status === 'NEW'): ?>
                            <button type="button" class="btn btn-primary btn-sm fs-8" id="kt_btn_add_monitoring_items"
                            data-url="<?php echo e(route('oep_admin_monitoring_report_list_available_items', ['id' => $monitoring_report->id, 'election_id' => $monitoring_report->fid_election])); ?>">
                                <i class="ki-outline ki-plus fs-3 me-1"></i>Agregar registros
                            </button>
                            <?php endif; ?>
                        </div>

                        <div class="row">

                            <?php $__currentLoopData = ['TV','RADIO','PRINT','DIGITAL','RRSS']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($monitoring_report->monitoringItems->where('media_type', $media_type)->count() > 0): ?>
                                    <div class="d-flex align-items-center mb-3 mt-10">
                                        <span class="bullet bullet-vertical h-30px bg-primary me-3"></span>
                                        <div class="flex-grow-1">
                                            <a class="text-primary fw-bold fs-6">
                                                <?php switch($media_type):
                                                    case ('TV'): ?>
                                                    <span>Medios Televisivos</span>
                                                    <?php break; ?>
                                                    <?php case ('RADIO'): ?>
                                                    <span>Medios Radiales</span>
                                                    <?php break; ?>
                                                    <?php case ('PRINT'): ?>
                                                    <span>Medios Impresos</span>
                                                    <?php break; ?>
                                                    <?php case ('DIGITAL'): ?>
                                                    <span>Medios Digitales</span>
                                                    <?php break; ?>
                                                    <?php case ('RRSS'): ?>
                                                    <span>Redes Sociales</span>
                                                    <?php break; ?>
                                                <?php endswitch; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table border align-middle gs-0 gy-4 mb-3">
                                            <thead>
                                            <tr class="bg-light fs-6 fw-bold text-muted">
                                                <th class="ps-4 rounded-start__ min-w-20px text-center">#</th>
                                                <th class="min-w-70px text-start">Documento</th>
                                                <th class="min-w-175px">Medio de Comunicación</th>
                                                <th class="min-w-80px text-center">Tipo de Medio</th>
                                                <th class="min-w-100px text-center">Fecha de Registro</th>
                                                <th class="pe-4 min-w-70px text-end rounded-end__">Opciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $monitoring_report->monitoringItems->where('media_type', $media_type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $monitoring_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="border-bottom fw-bold text-gray-700 fs-7">
                                                    <td class="text-center"><?php echo e($key + 1); ?></td>
                                                    <td class="text-start"><?php echo e($monitoring_item->code); ?></td>
                                                    <td class="text-start">
                                                        <div class="ms-0">
                                                            <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0"><?php echo e($monitoring_item->mediaProfile->name); ?></div>
                                                            <div class="text-muted fs-7"><?php echo e($monitoring_item->mediaProfile->business_name); ?></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php switch($monitoring_item->media_type):
                                                            case ('TV'): ?>
                                                            <span>M. Televisivos</span>
                                                            <?php break; ?>
                                                            <?php case ('RADIO'): ?>
                                                            <span>M. Radiales</span>
                                                            <?php break; ?>
                                                            <?php case ('PRINT'): ?>
                                                            <span>M. Impresos</span>
                                                            <?php break; ?>
                                                            <?php case ('DIGITAL'): ?>
                                                            <span>M. Digitales</span>
                                                            <?php break; ?>
                                                            <?php case ('RRSS'): ?>
                                                            <span>Redes Sociales</span>
                                                            <?php break; ?>
                                                        <?php endswitch; ?>
                                                    </td>
                                                    <td class="text-center"><?php echo e($monitoring_item->registered_at); ?></td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-sm btn-icon btn-secondary kt_btn_monitoring_item_show me-2"
                                                        data-url="<?php echo e(route('oep_admin_monitoring_report_details_item', ['id' => $monitoring_report->id, 'monitoring_item_id' => $monitoring_item->id])); ?>">
                                                            <i class="ki-outline ki-search-list fs-2"></i>
                                                        </button>
                                                        <?php if($monitoring_report->status === 'NEW'): ?>
                                                        <button type="button" class="btn btn-sm btn-icon btn-secondary kt_btn_monitoring_item_remove me-2"
                                                        data-url="<?php echo e(route('oep_admin_monitoring_report_remove_item', ['id' => $monitoring_report->id, 'monitoring_item_id' => $monitoring_item->id])); ?>">
                                                            <i class="ki-outline ki-eraser fs-2"></i>
                                                        </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <div class="modal fade" id="kt_modal_update_monitoring_report_status" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form id="kt_form_update_status_monitoring_status" class="form" method="post" autocomplete="off"
                          action="<?php echo e(route('oep_admin_monitoring_report_change_status', ['id' => $monitoring_report->id])); ?>">
                        <div class="mb-10 text-center">
                            <h1 class="mb-3">Reporte de Monitoreo</h1>
                            <div class="text-muted fw-semibold fs-5">Actualizar el estado</div>
                        </div>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Cambiar estado a:</span>
                            </label>
                            <input type="text" class="form-control form-check-solid" name="readonly_monitoring_report_status" value="" readonly disabled />
                            <input type="hidden" name="monitoring_report_status" value="">
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Comentarios/Observaciones:</label>
                            <textarea class="form-control" rows="6" name="monitoring_report_observations" placeholder=""></textarea>
                        </div>
                        <div class="text-center">
                            <button type="button" id="kt_button_update_status_cancel" class="btn btn-light btn-sm me-3">Cancelar</button>
                            <button type="submit" id="kt_button_update_status_submit" class="btn btn-primary btn-sm">
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

    <div class="modal fade" id="kt_modal_monitoring_report_item_details" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded">
                <div class="modal-header justify-content-end border-0 pb-0">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body pt-0 pb-20 px-20">
                    <div class="mb-13 text-center">
                        <h3 class="mb-3 text-uppercase">Detalle del Registro de Monitoreo</h3>
                        <div class="text-muted fw-semibold fs-5"></div>
                    </div>
                    <div class="d-flex__ flex-column__" id="kt_modal_wrapper_monitoring_item">

                    </div>
                    <div class="d-flex flex-center flex-row-fluid pt-12">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_monitoring_report_select_list_items" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl __mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-5" >
                    <div class="text-center mb-13">
                        <h1 class="d-flex justify-content-center align-items-center mb-3">Registros de Monitoreo</h1>
                        <div class="text-muted fw-semibold fs-5">Seleccione los registros de monitoreo disponibles</div>
                    </div>
                    <div class="mh-475px scroll-y me-n7 pe-7" id="kt_modal_wrapper_monitoring_list_items">

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="button" id="kt_button_add_items_cancel" class="btn btn-light btn-sm me-3">Cancelar</button>
                        <button type="button" id="kt_button_add_items_submit" class="btn btn-primary btn-sm">
                            <span class="indicator-label">Guardar</span>
                            <span class="indicator-progress">Espere por favor...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('themes/admin/js/custom/monitoring_report/detail.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor@template::admin.layouts.master', ['page' => 'monitoring_report_list'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoringReport/detail.blade.php ENDPATH**/ ?>