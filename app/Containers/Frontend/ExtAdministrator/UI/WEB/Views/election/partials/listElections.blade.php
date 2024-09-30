@if(count($elections) > 0)
<div data-kt-search-element="results" class="">
    <div class="mh-375px scroll-y me-n7">

        @foreach($elections as $election)
        <div class="rounded d-flex flex-stack bg-active-lighten py-4" data-id="{{ $election->id }}" data-name="{{ $election->name }}" data-category="{{ $election->type }}"
        data-date="{{ $election->election_date }}" data-end-date="{{ $election->end_date_media_registration }}" data-logo="{{ asset('storage') . $election->logo_image }}">
            <div class="d-flex flex-stack position-relative mt-6">
                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                <div class="fw-semibold ms-5">
                    <div class="fs-8 text-muted mb-0">{{ $election->election_date }}</div>
                    <a class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{ $election->name }}</a>
                    <div class="fs-7 text-muted">Fecha límite de postulación: {{ $election->end_date_media_registration }}</div>
                </div>
            </div>
            <div class="ms-2 w-100px">
                <button type="button" class="btn btn-secondary btn-sm fs-7 kt_btn_select_election">Seleccionar</button>
            </div>
        </div>

        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
        @endforeach

    </div>
</div>
@else
<div data-kt-search-element="empty" class="text-center">
    <div class="text-center px-5 mt-10">
        <div class="text-muted fs-6">No existen procesos electorales activos para su perfil.</div>
    </div>
</div>
@endif