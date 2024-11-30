<div class="mb-13 text-center">
    <h1 class="mb-3">Detalle de Actividad</h1>
    <div class="text-muted fw-semibold fs-5">Datos restringidos</div>
</div>

<div class="table-responsive">
    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px" aria-describedby="table"><!-- //NOSONAR -->
        <tbody class="fw-semibold text-gray-600">
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Tipo</div>
            </td>
            <td class="fw-bold text-">
                <span class="text-gray-800">{{ $log->log_name }}</span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Descripción</div>
            </td>
            <td class="fw-bold text-">
                <span class="text-gray-800">{{ $log->description }}</span>
            </td>
        </tr>
        <tr>
            <td class="text-muted" nowrap="">
                <div class="d-flex align-items-center">Fecha registro</div>
            </td>
            <td class="fw-bold text-">
                <span class="text-gray-800">{{ $log->created_at }}</span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Usuario</div>
            </td>
            <td class="fw-bold text-">
                <span class="text-gray-800">{{ $log->user->name }} [{{$log->user->roles->first()->display_name}}]</span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Dirección IP</div>
            </td>
            <td class="fw-bold text-">
                <span class="text-gray-800">{{ $log->ip_address }}</span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Agente</div>
            </td>
            <td class="fw-bold text-">
                <span class="text-gray-800">{{ $log->user_agent }}</span>
            </td>
        </tr>
        <tr>
            <td class="text-muted">
                <div class="d-flex align-items-center">Propiedades</div>
            </td>
            <td class="fw-bold text-">
                <span class="text-gray-800">{{ $log->properties }}</span>
            </td>
        </tr>
        </tbody>
    </table>
</div>