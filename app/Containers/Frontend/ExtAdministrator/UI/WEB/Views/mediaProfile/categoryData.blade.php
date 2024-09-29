@extends('vendor@template::external.layouts.master', ['page' => 'media_data'])

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">
                <i class="ki-outline ki-home text-white fs-3"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">Medio</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Datos Generales</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Medio de Comunicación
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Información del Medio de Comunicación</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="row g-7">
            <div class="col-lg-6 col-xl-3">
                <div class="card card-flush">
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <div class="card-title">
                            <h2>Menú</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div class="d-flex flex-column gap-5">
                            <div class="d-flex flex-stack">
                                <a href="{{ route('ext_admin_media_profile_general_data_show') }}" class="fs-6 fw-bold text-gray-800 text-hover-primary">Datos Generales</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="{{ route('ext_admin_media_profile_category_data_show') }}" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">Tipo y Alcance</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="{{ route('ext_admin_media_profile_contact_data_show') }}" class="fs-6 fw-bold text-gray-800 text-hover-primary">Datos de Contacto</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="{{ route('ext_admin_media_profile_file_data_show') }}" class="fs-6 fw-bold text-gray-800 text-hover-primary">Archivos</a>
                                <i class="ki-outline ki-arrow-right"></i>
                            </div>
{{--                            <div class="d-flex flex-stack">--}}
{{--                                <a href="" class="fs-6 fw-bold text-danger text-hover-primary">Info Adicional</a>--}}
{{--                                <i class="ki-outline ki-arrow-right"></i>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9">

                <div class="card card-flush h-lg-100" style="border: none !important; box-shadow: unset !important;">
                    @if(session('validation_profile'))
                        <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-10 p-4 mx-10">
                            <i class="ki-outline ki-information-5 fs-1 text-info me-4"></i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">Complete los campos obligatorios del formulario antes de continuar.</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-header pt-0">
                        <div class="card-title">
                            <i class="ki-outline ki-badge fs-1 me-2"></i>
                            <h2>Tipo de Medio</h2>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_media_profile_category_data_form" class="form" action="{{ route('ext_admin_media_profile_category_data_store') }}" method="post" autocomplete="off">

                            <div class="fv-row mb-7">
                                <label class="form-label mb-1">Tipo de Medio</label>
                                <div class="text-muted fs-7 mb-5">Puede seleccionar más de una opción, en tal caso, en su declaración jurada debe incluir las tarifas de los tipos de medios seleccionados.</div>
                                @php
                                    $types = json_decode($profile->type);
                                @endphp
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input h-25px w-25px" type="checkbox" name="media_type[]" value="Televisivo" {{ in_array('Televisivo', $types) ? 'checked="checked"' : '' }} />
                                    <label class="form-check-label fw-semibold">Televisión</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input h-25px w-25px" type="checkbox" name="media_type[]" value="Radial" {{ in_array('Radial', $types) ? 'checked="checked"' : '' }} />
                                    <label class="form-check-label fw-semibold">Radio</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input h-25px w-25px" type="checkbox" name="media_type[]" value="Impreso" {{ in_array('Impreso', $types) ? 'checked="checked"' : '' }} />
                                    <label class="form-check-label fw-semibold">Impreso</label>
                                </div>
                                <div class="form-check form-check-custom mb-3">
                                    <input class="form-check-input h-25px w-25px" type="checkbox" name="media_type[]" value="Digital" {{ in_array('Digital', $types) ? 'checked="checked"' : '' }} />
                                    <label class="form-check-label fw-semibold">Digital</label>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Cobertura</span>
                                        </label>
                                        <div class="w-100">
                                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                    id="kt_media_coverage_select" name="media_coverage">
                                                <option></option>
                                                <option value="Nacional" {{ $profile->coverage == 'Nacional' ? 'selected="selected"' : '' }}>Nacional</option>
                                                <option value="La Paz" {{ $profile->coverage == 'La Paz' ? 'selected="selected"' : '' }}>La Paz</option>
                                                <option value="Cochabamba" {{ $profile->coverage == 'Cochabamba' ? 'selected="selected"' : '' }}>Cochabamba</option>
                                                <option value="Santa Cruz" {{ $profile->coverage == 'Santa Cruz' ? 'selected="selected"' : '' }}>Santa Cruz</option>
                                                <option value="Chuquisaca" {{ $profile->coverage == 'Chuquisaca' ? 'selected="selected"' : '' }}>Chuquisaca</option>
                                                <option value="Tarija" {{ $profile->coverage == 'Tarija' ? 'selected="selected"' : '' }}>Tarija</option>
                                                <option value="Oruro" {{ $profile->coverage == 'Oruro' ? 'selected="selected"' : '' }}>Oruro</option>
                                                <option value="Potosí" {{ $profile->coverage == 'Potosí' ? 'selected="selected"' : '' }}>Potosí</option>
                                                <option value="Beni" {{ $profile->coverage == 'Beni' ? 'selected="selected"' : '' }}>Beni</option>
                                                <option value="Pando" {{ $profile->coverage == 'Pando' ? 'selected="selected"' : '' }}>Pando</option>
                                            </select>
                                        </div>
                                        <div class="text-muted fs-7 mt-1">Marque el departamento al que abarca la cobertura del medio. Si es de alcance Nacional marque la opción Nacional.</div>
                                    </div>
                                </div>
                                <div class="col">
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Alcance</span>
                                        </label>
                                        <div class="w-100">
                                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                    id="kt_media_scope_select" name="media_scope">
                                                <option></option>
                                                <option value="Nacional" {{ $profile->scope == 'Nacional' ? 'selected="selected"' : '' }}>Nacional</option>
                                                <option value="Departamental" {{ $profile->scope == 'Departamental' ? 'selected="selected"' : '' }}>Departamental</option>
                                                <option value="Municipal" {{ $profile->scope == 'Municipal' ? 'selected="selected"' : '' }}>Municipal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                </div>
                            </div>

                            <div id="kt_wrapper_media_profile_scope_national" class="d-none">
                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Departamentos</span>
                                        </label>
                                        <div class="w-100">
                                            @php
                                                $states = [];
                                                if ($profile->scope === 'Nacional' && $profile->scope_department) {
                                                    $states = json_decode($profile->scope_department);
                                                }
                                            @endphp
                                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Selecciona los departamentos" data-allow-clear="true" multiple="multiple"
                                                    id="kt_media_scope_states_select" name="media_scope_states[]">
                                                <option></option>
                                                <option value="La Paz" {{ in_array('La Paz', $states) ? 'selected="selected"' : '' }}>La Paz</option>
                                                <option value="Cochabamba" {{ in_array('Cochabamba', $states) ? 'selected="selected"' : '' }}>Cochabamba</option>
                                                <option value="Santa Cruz" {{ in_array('Santa Cruz', $states) ? 'selected="selected"' : '' }}>Santa Cruz</option>
                                                <option value="Chuquisaca" {{ in_array('Chuquisaca', $states) ? 'selected="selected"' : '' }}>Chuquisaca</option>
                                                <option value="Tarija" {{ in_array('Tarija', $states) ? 'selected="selected"' : '' }}>Tarija</option>
                                                <option value="Oruro" {{ in_array('Oruro', $states) ? 'selected="selected"' : '' }}>Oruro</option>
                                                <option value="Potosi" {{ in_array('Potosi', $states) ? 'selected="selected"' : '' }}>Potosi</option>
                                                <option value="Beni" {{ in_array('Beni', $states) ? 'selected="selected"' : '' }}>Beni</option>
                                                <option value="Pando" {{ in_array('Pando', $states) ? 'selected="selected"' : '' }}>Pando</option>
                                            </select>
                                        </div>
                                        <div class="text-muted fs-7 mt-1">Debe seleccionar al menos 2 o más departamentos.</div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div id="kt_wrapper_media_profile_scope_state" class="d-none">
                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Departamento</span>
                                        </label>
                                        <div class="w-100">
                                            @php
                                                $state = '';
                                                if ($profile->scope === 'Departamental' && $profile->scope_department) {
                                                    $state = json_decode($profile->scope_department)[0];
                                                }
                                            @endphp
                                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Selecciona un departamento"
                                                    id="kt_media_scope_state_select" name="media_scope_state">
                                                <option></option>
                                                <option value="La Paz" {{ $state == 'La Paz' ? 'selected="selected"' : '' }}>La Paz</option>
                                                <option value="Cochabamba" {{ $state == 'Cochabamba' ? 'selected="selected"' : '' }}>Cochabamba</option>
                                                <option value="Santa Cruz" {{ $state == 'Santa Cruz' ? 'selected="selected"' : '' }}>Santa Cruz</option>
                                                <option value="Chuquisaca" {{ $state == 'Chuquisaca' ? 'selected="selected"' : '' }}>Chuquisaca</option>
                                                <option value="Tarija" {{ $state == 'Tarija' ? 'selected="selected"' : '' }}>Tarija</option>
                                                <option value="Oruro" {{ $state == 'Oruro' ? 'selected="selected"' : '' }}>Oruro</option>
                                                <option value="Potosí" {{ $state == 'Potosí' ? 'selected="selected"' : '' }}>Potosí</option>
                                                <option value="Beni" {{ $state == 'Beni' ? 'selected="selected"' : '' }}>Beni</option>
                                                <option value="Pando" {{ $state == 'Pando' ? 'selected="selected"' : '' }}>Pando</option>
                                            </select>
                                        </div>
                                        <div class="text-muted fs-7 mt-1">Marque el departamento de cobertura del medio.</div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div id="kt_wrapper_media_profile_scope_municipality" class="d-none">
                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Municipio</span>
                                        </label>
                                        @php
                                            $municipality = '';
                                            if ($profile->scope === 'Municipal' && $profile->scope_municipality) {
                                                $municipality = $profile->scope_municipality;
                                            }
                                        @endphp
                                        <input type="text" class="form-control" name="media_scope_municipality" value="{{ $municipality }}" />
                                        <div class="text-muted fs-7 mt-1">Describa el municipio que abarca la cobertura el medio.</div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="separator mb-6"></div>

                            <div class="d-flex justify-content-end">
                                <button type="reset" id="kt_media_profile_cancel" class="btn btn-light me-3">Cancelar</button>
                                <button type="button" id="kt_media_profile_submit" class="btn btn-primary">
                                    <span class="indicator-label">Guardar</span>
                                    <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>

                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('themes/external/js/custom/media-profile/category.js') }}"></script>
@endsection