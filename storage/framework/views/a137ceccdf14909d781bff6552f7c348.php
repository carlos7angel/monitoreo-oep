<div class="mb-13 text-center">
    <h1 class="mb-3">Nuevo Registro</h1>
    <div class="text-muted fw-semibold fs-5">Medio de Comunicación</div>
</div>

<div class="table-responsive">
    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
        <tbody class="fw-semibold text-gray-600">
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Nombre del Medio</div>
            </td>
            <td class="fw-bold text-end">
                <span class="text-gray-800"><?php echo e($media_profile->name); ?></span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Tipo</div>
            </td>
            <td class="fw-bold text-end">
                <span class="text-gray-800"><?php echo e($media_profile->type); ?></span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Razón Social</div>
            </td>
            <td class="fw-bold text-end">
                <span class="text-gray-800"><?php echo e($media_profile->business_name); ?></span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">NIT</div>
            </td>
            <td class="fw-bold text-end">
                <span class="text-gray-800"><?php echo e($media_profile->nit); ?></span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Representante Legal</div>
            </td>
            <td class="fw-bold text-end">
                <span class="text-gray-800"><?php echo e($media_profile->rep_full_name); ?></span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Corre electrónico</div>
            </td>
            <td class="fw-bold text-end">
                <span class="text-gray-800"><?php echo e($media_profile->email); ?></span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Celular</div>
            </td>
            <td class="fw-bold text-end">
                <span class="text-gray-800"><?php echo e($media_profile->cellphone); ?></span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Fecha de Registro</div>
            </td>
            <td class="fw-bold text-end">
                <span class="text-gray-800"><?php echo e($media_profile->registration_date); ?></span>
            </td>
        </tr>
        </tbody>
    </table>
</div><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\CoreMonitoring\UserProfile/UI/WEB/Views//partials/detailsNew.blade.php ENDPATH**/ ?>