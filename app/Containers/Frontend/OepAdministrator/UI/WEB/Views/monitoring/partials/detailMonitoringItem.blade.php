@php
    $input = json_decode($monitoring->data, true);
@endphp

<h6 class="mb-5 fw-bolder text-gray-600 text-hover-primary">MEDIO DE COMUNICACIÓN</h6>

<div class="row">
    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
        <label class="fw-semibold fs-7 text-gray-600">Nombre del Medio:</label>
    </div>
    <div class="col-md-8">
        <p class="form-control form-control-plaintext">RED UNO (//TODO:)</p>
    </div>
</div>

<div class="separator separator-dashed border-muted"></div>

@include('frontend@oepAdministrator::monitoring.partials.summaryFormMonitoring')