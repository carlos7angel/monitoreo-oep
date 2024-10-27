<form id="kt_form_monitoring_report_add_items" class="form" method="post" autocomplete="off"
      action="<?php echo e(route('oep_admin_monitoring_report_add_items', ['id' => $monitoring_report->id])); ?>">

    <div class="table-responsive">
        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
            <thead>
            <tr class="fw-bold text-muted">
                <th class="w-25px">
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target=".widget-13-check" />
                    </div>
                </th>
                <th class="min-w-150px">Documento</th>
                <th class="min-w-140px">Medio de Comunicación</th>
                <th class="min-w-120px">Tipo de Medio</th>
                <th class="min-w-120px">Fecha de Registro</th>

            </tr>
            </thead>
            <tbody>
            <?php if(count($monitoring_items) > 0): ?>
                <?php $__currentLoopData = $monitoring_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monitoring_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input widget-13-check" type="checkbox" name="new_monitoring_items[]" value="<?php echo e($monitoring_item->id); ?>" />
                            </div>
                        </td>
                        <td>
                            <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6"><?php echo e($monitoring_item->code); ?></a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6"><?php echo e($monitoring_item->mediaProfile->name); ?></a>
                            <span class="text-muted fw-semibold text-muted d-block fs-7"><?php echo e($monitoring_item->mediaProfile->business_name); ?></span>
                        </td>
                        <td>
                    <span class="badge badge-secondary">
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
                    </span>
                        </td>
                        <td class="text-gray-900 fw-bold text-hover-primary fs-6"><?php echo e($monitoring_item->registered_at); ?></td>






                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center"><span class="text-gray-500">No existen registros</span></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</form><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoringReport/partials/listMonitoringItems.blade.php ENDPATH**/ ?>