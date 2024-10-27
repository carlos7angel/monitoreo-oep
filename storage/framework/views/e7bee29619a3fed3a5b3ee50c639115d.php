<?php if(count($elections) > 0): ?>
<div data-kt-search-element="results" class="">
    <div class="mh-375px scroll-y me-n7">

        <?php $__currentLoopData = $elections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $election): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="rounded d-flex flex-stack bg-active-lighten py-4">
            <div class="d-flex flex-stack position-relative mt-6">
                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                <div class="fw-semibold ms-5">
                    <div class="fs-8 text-muted mb-0"><?php echo e($election->election_date); ?></div>
                    <a class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2"><?php echo e($election->name); ?></a>
                </div>
            </div>
            <div class="ms-2 w-100px">
                <button type="button" data-url="<?php echo e(route('oep_admin_monitoring_report_create', ['election_id' => $election->id])); ?>" class="btn btn-secondary btn-sm fs-7 kt_btn_select_election_item">Seleccionar</button>
            </div>
        </div>

        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php else: ?>
<div data-kt-search-element="empty" class="text-center">
    <div class="text-center px-5 mt-10">
        <div class="text-muted fs-6">No existen procesos electorales activos.</div>
    </div>
</div>
<?php endif; ?><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\Frontend\OepAdministrator/UI/WEB/Views//monitoringReport/partials/listElections.blade.php ENDPATH**/ ?>