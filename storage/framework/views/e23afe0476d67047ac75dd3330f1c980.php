<?php
    $input = json_decode($monitoring->data, true);
?>

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

<?php echo $__env->make('frontend@oepAdministrator::monitoring.partials.summaryFormMonitoring', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoring/partials/detailMonitoringItem.blade.php ENDPATH**/ ?>