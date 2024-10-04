@extends('vendor@template::external.layouts.master', ['page' => 'media_accreditations'])

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">
                <i class="ki-outline ki-ho1me text-white fs-3"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="/" class="text-white text-hover-secondary">Acreditaciones</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Editar</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Solicitud de Acreditación
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Complete el formulario</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10" id="kt_create_accreditation_stepper">
            <!--begin::Aside-->
            <div class="d-flex flex-column justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                <div class="card border border-dashed border-gray-300 mb-7">
                    <div class="card-body">
                        <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL DOCUMENTO</h6>
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Tipo de Operación:</div>
                            <div class="fw-bold text-gray-800 fs-6">Acreditación de Medios de Comunicación</div>
                        </div>
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Nro Documento:</div>
                            <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->code }}</div>
                        </div>
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Estado:</div>
                            <div class="fw-bold text-gray-800 fs-6 kt_data_accreditation_status">
                                @switch($accreditation->status)
                                    @case('draft')
                                    <span class="badge badge-info py-1 px-3">Borrador</span>
                                    @break

                                    @case('new')
                                    <span class="badge badge-info py-1 px-2">En progreso</span>
                                    @break

                                    @case('observed')
                                    <span class="badge badge-warning py-1 px-2">Observado</span>
                                    <a href="javascript:void(0)" id="kt_button_modal_observations" class="ms-2 fs-8">Ver detalles</a>
                                    @break

                                    @case('accredited')
                                    <span class="badge badge-success py-1 px-2">Acreditado</span>
                                    @break

                                    @case('archived')
                                    <span class="badge badge-secondary py-1 px-2">Archivado</span>
                                    @break

                                    @case('rejected')
                                    <span class="badge badge-danger py-1 px-2">Rechazado</span>
                                    @break
                                @endswitch
                            </div>
                        </div>
                        @if($accreditation->status === 'observed')
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Plazo límite de envío:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->due_date_observed }}</div>
                            </div>
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha anterior de envío:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->submitted_at }}</div>
                            </div>
                        @else
                            @if($accreditation->status !== 'draft')
                            <div class="mb-0">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha de envío:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $accreditation->submitted_at }}</div>
                            </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card border border-dashed border-gray-300">
                    <div class="card-body px-6 px-lg-10 px-xxl-15 py-10">
                        <div class="stepper-nav">
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Proceso Electoral</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                                <div class="stepper-line h-20px"></div>
                            </div>
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Documentos</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                                <div class="stepper-line h-20px"></div>
                            </div>
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Tarifario</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                                <div class="stepper-line h-20px"></div>
                            </div>
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Resumen</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                                <div class="stepper-line h-20px"></div>
                            </div>
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-6">Confirmación</h3>
                                        <div class="stepper-desc fw-semibold"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
                <form class="card-body_xx py-20_xx w-100 mw-xl-700px_xx px-9_xx" action="{{ route('ext_admin_accreditations_update', ['id' => $accreditation->id]) }}" novalidate="novalidate"
                      id="kt_election_accreditation_form" method="post" data-submit="{{ route('ext_admin_accreditations_submit', ['id' => $accreditation->id]) }}">

                    <!--begin::Step 1-->
                    <div class="current flex-column" data-kt-stepper-element="content">

                        <div class="card d-flex flex-row-fluid flex-center mb-10">
                            <div class="card-body py-20__xx p-12 w-100 mw-xl-700px__xx">

                                <input type="hidden" name="media_action" value="{{ app('request')->input('action') }}">

                                <div class="d-flex flex-column flex-xl-row">
                                    <div class="flex-lg-row-fluid me-xl-18__xx mb-10 mb-xl-0">
                                        <div class="mt-n1">
                                            <div class="pb-10">
                                                <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                                    <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                                    <span>Datos del Proceso</span>
                                                </h2>
                                                <div class="text-muted fw-semibold fs-7"></div>
                                            </div>
                                            <div class="fv-row"><input type="hidden" name="media_election"></div>
                                            <div class="m-0">
                                                <div class="row g-5 mb-6">
                                                    <div class="col-sm-4">
                                                        <div class="fw-semibold fs-7 text-gray-600 mb-1">Nombre del Proceso Electoral:</div>
                                                        <div class="fw-bold fs-6 text-gray-800 kt_data_election_name">{{ $accreditation->election->name }}</div>
                                                    </div>
                                                </div>
                                                <div class="row g-5 mb-2">
                                                    <div class="col-sm-4">
                                                        <div class="fw-semibold fs-7 text-gray-600 mb-1">Tipo:</div>
                                                        <div class="fw-bold fs-6 text-gray-800 kt_data_election_type">{{ $accreditation->election->type }}</div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha del Proceso:</div>
                                                        <div class="fw-bold fs-6 text-gray-800 kt_data_election_date">{{ $accreditation->election->election_date }}</div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="fw-semibold fs-7 text-gray-600 mb-1">Fecha Limite de acreditación:</div>
                                                        <div class="fw-bold fs-6 text-gray-800 kt_data_election_end_date">{{ $accreditation->election->end_date_media_registration }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!--end::Step 1-->

                    <!--begin::Step 2-->
                    <div class="flex-column" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="card d-flex flex-row-fluid flex-center mb-10">
                            <div class="card-body p-12 w-100">

                            <div class="pb-10 pb-lg-15">
                                <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                    <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                    <span>Documentos</span>
                                </h2>
                                <div class="text-muted fw-semibold fs-7">Adjunte los documentos necesarios para la acreditación</div>
                            </div>

                            <div class="mb-10 fv-row">
                                @if($accreditation->fileRequestLetter)
                                    <input type="hidden" name="file_request_letter" data-name="{{ $accreditation->fileRequestLetter->origin_name }}" data-size="{{ $accreditation->fileRequestLetter->size }}"
                                           data-mimetype="{{ $accreditation->fileRequestLetter->mime_type }}" data-path="{{ $accreditation->fileRequestLetter->url_file }}">
                                @endif
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Carta de Solicitud</span>
                                </label>
                                <div class="text-muted fs-7 mb-3">Carta de solicitud dirigida al Tribunal Electoral correspondiente, firmada por la persona propietaria o representante legal del medio de comunicación.</div>
                                <input type="file" name="media_file_request_letter" class="files"
                                       id="kt_media_file_request_letter" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                            </div>

                            <div class="fv-row mb-10">
                                @if($accreditation->fileAffidavit)
                                    <input type="hidden" name="file_affidavit" data-name="{{ $accreditation->fileAffidavit->origin_name }}" data-size="{{ $accreditation->fileAffidavit->size }}"
                                           data-mimetype="{{ $accreditation->fileAffidavit->mime_type }}" data-path="{{ $accreditation->fileAffidavit->url_file }}">
                                @endif
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Declaración Jurada</span>
                                </label>
                                <div class="text-muted fs-7 mb-3">Declaración jurada en la que señale que no tiene impedimento para difundir propaganda electoral, cobertura efectiva del medio y del tarifario (Documento que puede descargarse aquí).</div>
                                <input type="file" name="media_file_affidavit" class="files"
                                       id="kt_media_file_affidavit" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                            </div>

{{--                            <div class="fv-row mb-10">--}}
{{--                                @if($accreditation->filePricingList)--}}
{{--                                    <input type="hidden" name="file_pricing_list" data-name="{{ $accreditation->filePricingList->origin_name }}" data-size="{{ $accreditation->filePricingList->size }}"--}}
{{--                                           data-mimetype="{{ $accreditation->filePricingList->mime_type }}" data-path="{{ $accreditation->filePricingList->url_file }}">--}}
{{--                                @endif--}}
{{--                                <label class="fs-6 fw-semibold form-label mt-3">--}}
{{--                                    <span class="required">Tarifario</span>--}}
{{--                                </label>--}}
{{--                                <div class="text-muted fs-7 mb-3">Tarifario del medio expresado en moneda nacional. Las tarifas inscritas no pueden ser superiores al promedio de las tarifas cobradas efectivamente por concepto de publicidad comercial durante el semestre previo al acto electoral.</div>--}}
{{--                                <input type="file" name="media_file_pricing_list" class="files"--}}
{{--                                       id="kt_media_file_pricing_list" data-maxsize="5" data-maxfiles="1" data-accept="pdf">--}}
{{--                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>--}}
{{--                            </div>--}}

                            </div>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 2-->

                    <!--begin::Step 3-->
                    <div class="flex-column" data-kt-stepper-element="content">
                        <div class="card d-flex flex-row-fluid flex-center mb-10">
                            <div class="card-body p-12 w-100">

                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                        <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                        <span>Tarifarios</span>
                                    </h2>
                                    <div class="text-muted fw-semibold fs-7">Adjunte los documentos de las tarifas según el tipo de medio</div>
                                </div>

                                @if($profile->media_type_television)
                                    @php
                                        $item_type_television = $profile->mediaTypes->where('type', 'Televisivo')->first();
                                        $states = $item_type_television ? explode(', ', $item_type_television->scope_department) : [];
                                    @endphp
                                    @if($item_type_television)
                                        <h3 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                            <span>Televisión</span>
                                        </h3>
                                        @if($item_type_television->scope === 'Nacional')
                                            <div class="fv-row mb-10">
                                                @php
                                                $rate = $accreditation->rates->where('type', 'Televisivo')->where('scope', 'Nacional')->first();
                                                @endphp
                                                @if($rate != null && $rate->fileRate)
                                                    <input type="hidden" name="file_rate[{{$rate->id}}]" class="file_rate_default" data-name="{{ $rate->fileRate->origin_name }}" data-size="{{ $rate->fileRate->size }}"
                                                           data-mimetype="{{ $rate->fileRate->mime_type }}" data-path="{{ $rate->fileRate->url_file }}">
                                                @endif
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Tarifario Nacional</span>
                                                </label>
                                                <input type="file" name="media_television_file_rate[Nacional]" class="files kt_media_file_rates"
                                                       data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                            </div>
                                        @endif
                                        @foreach($states as $state)
                                            <div class="fv-row mb-10">
                                                @php
                                                    $rate = $accreditation->rates->where('type', 'Televisivo')->where('scope', $state)->first();
                                                @endphp
                                                @if($rate != null && $rate->fileRate)
                                                    <input type="hidden" name="file_rate[{{$rate->id}}]" class="file_rate_default" data-name="{{ $rate->fileRate->origin_name }}" data-size="{{ $rate->fileRate->size }}"
                                                           data-mimetype="{{ $rate->fileRate->mime_type }}" data-path="{{ $rate->fileRate->url_file }}">
                                                @endif
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Tarifario {{ $state }} {{ ($item_type_television->scope !== 'Nacional' && $item_type_television->scope !== 'Departamental') ? '(' . $item_type_television->scope_area . ')' : '' }}</span>
                                                </label>
                                                <input type="file" name="media_television_file_rate[{{$state}}]" class="files kt_media_file_rates"
                                                        data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif

                                @if($profile->media_type_radio)
                                    @php
                                        $item_type_radio = $profile->mediaTypes->where('type', 'Radial')->first();
                                        $states = $item_type_radio ? explode(', ', $item_type_radio->scope_department) : [];
                                    @endphp
                                    @if($item_type_radio)
                                        <h3 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                            <span>Radio</span>
                                        </h3>
                                        @if($item_type_radio->scope === 'Nacional')
                                            <div class="fv-row mb-10">
                                                @php
                                                    $rate = $accreditation->rates->where('type', 'Radial')->where('scope', 'Nacional')->first();
                                                @endphp
                                                @if($rate != null && $rate->fileRate)
                                                    <input type="hidden" name="file_rate[{{$rate->id}}]" class="file_rate_default" data-name="{{ $rate->fileRate->origin_name }}" data-size="{{ $rate->fileRate->size }}"
                                                           data-mimetype="{{ $rate->fileRate->mime_type }}" data-path="{{ $rate->fileRate->url_file }}">
                                                @endif
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Tarifario Nacional</span>
                                                </label>
                                                <input type="file" name="media_radio_file_rate[Nacional]" class="files kt_media_file_rates"
                                                       data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                            </div>
                                        @endif
                                        @foreach($states as $state)
                                            <div class="fv-row mb-10">
                                                @php
                                                    $rate = $accreditation->rates->where('type', 'Radial')->where('scope', $state)->first();
                                                @endphp
                                                @if($rate != null && $rate->fileRate)
                                                    <input type="hidden" name="file_rate[{{$rate->id}}]" class="file_rate_default" data-name="{{ $rate->fileRate->origin_name }}" data-size="{{ $rate->fileRate->size }}"
                                                           data-mimetype="{{ $rate->fileRate->mime_type }}" data-path="{{ $rate->fileRate->url_file }}">
                                                @endif
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Tarifario {{ $state }} {{ ($item_type_radio->scope !== 'Nacional' && $item_type_radio->scope !== 'Departamental') ? '(' . $item_type_radio->scope_area . ')' : '' }}</span>
                                                </label>
                                                <input type="file" name="media_radio_file_rate[{{$state}}]" class="files kt_media_file_rates"
                                                       data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif

                                @if($profile->media_type_print)
                                    @php
                                        $item_type_print = $profile->mediaTypes->where('type', 'Impreso')->first();
                                        $states = $item_type_print ? explode(', ', $item_type_print->scope_department) : [];
                                    @endphp
                                    @if($item_type_print)
                                        <h3 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                            <span>Impreso</span>
                                        </h3>
                                        @if($item_type_print->scope === 'Nacional')
                                            <div class="fv-row mb-10">
                                                @php
                                                    $rate = $accreditation->rates->where('type', 'Impreso')->where('scope', 'Nacional')->first();
                                                @endphp
                                                @if($rate != null && $rate->fileRate)
                                                    <input type="hidden" name="file_rate[{{$rate->id}}]" class="file_rate_default" data-name="{{ $rate->fileRate->origin_name }}" data-size="{{ $rate->fileRate->size }}"
                                                           data-mimetype="{{ $rate->fileRate->mime_type }}" data-path="{{ $rate->fileRate->url_file }}">
                                                @endif
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Tarifario Nacional</span>
                                                </label>
                                                <input type="file" name="media_print_file_rate[Nacional]" class="files kt_media_file_rates"
                                                        data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                            </div>
                                        @endif
                                        @foreach($states as $state)
                                            <div class="fv-row mb-10">
                                                @php
                                                    $rate = $accreditation->rates->where('type', 'Impreso')->where('scope', $state)->first();
                                                @endphp
                                                @if($rate != null && $rate->fileRate)
                                                    <input type="hidden" name="file_rate[{{$rate->id}}]" class="file_rate_default" data-name="{{ $rate->fileRate->origin_name }}" data-size="{{ $rate->fileRate->size }}"
                                                           data-mimetype="{{ $rate->fileRate->mime_type }}" data-path="{{ $rate->fileRate->url_file }}">
                                                @endif
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Tarifario {{ $state }} {{ ($item_type_print->scope !== 'Nacional' && $item_type_print->scope !== 'Departamental') ? '(' . $item_type_print->scope_area . ')' : '' }}</span>
                                                </label>
                                                <input type="file" name="media_print_file_rate[{{$state}}]" class="files kt_media_file_rates"
                                                        data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif

                                @if($profile->media_type_digital)
                                    @php
                                        $item_type_digital = $profile->mediaTypes->where('type', 'Digital')->first();
                                        $states = $item_type_digital ? explode(', ', $item_type_digital->scope_department) : [];
                                    @endphp
                                    @if($item_type_digital)
                                        <h3 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                            <span>Digital</span>
                                        </h3>
                                        @if($item_type_digital->scope === 'Nacional')
                                            <div class="fv-row mb-10">
                                                @php
                                                    $rate = $accreditation->rates->where('type', 'Digital')->where('scope', 'Nacional')->first();
                                                @endphp
                                                @if($rate != null && $rate->fileRate)
                                                    <input type="hidden" name="file_rate[{{$rate->id}}]" class="file_rate_default" data-name="{{ $rate->fileRate->origin_name }}" data-size="{{ $rate->fileRate->size }}"
                                                           data-mimetype="{{ $rate->fileRate->mime_type }}" data-path="{{ $rate->fileRate->url_file }}">
                                                @endif
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Tarifario Nacional</span>
                                                </label>
                                                <input type="file" name="media_digital_file_rate[Nacional]" class="files kt_media_file_rates"
                                                       data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                            </div>
                                        @endif
                                        @foreach($states as $state)
                                            <div class="fv-row mb-10">
                                                @php
                                                    $rate = $accreditation->rates->where('type', 'Digital')->where('scope', $state)->first();
                                                @endphp
                                                @if($rate != null && $rate->fileRate)
                                                    <input type="hidden" name="file_rate[{{$rate->id}}]" class="file_rate_default" data-name="{{ $rate->fileRate->origin_name }}" data-size="{{ $rate->fileRate->size }}"
                                                           data-mimetype="{{ $rate->fileRate->mime_type }}" data-path="{{ $rate->fileRate->url_file }}">
                                                @endif
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Tarifario {{ $state }} {{ ($item_type_digital->scope !== 'Nacional' && $item_type_digital->scope !== 'Departamental') ? '(' . $item_type_digital->scope_area . ')' : '' }}</span>
                                                </label>
                                                <input type="file" name="media_digital_file_rate[{{$state}}]" class="files kt_media_file_rates"
                                                       data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                                <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>
                    <!--end::Step 3-->

                    <!--begin::Step 4-->
                    <div class="flex-column" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="card d-flex flex-row-fluid flex-center mb-10">
                            <div class="card-body p-12 w-100">

                                <div class="pb-10 pb-lg-12">
                                    <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                        <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                        <span>Resumen</span>
                                    </h2>
                                    <div class="text-muted fw-semibold fs-7">Revise la información antes de ser enviada.</div>
                                </div>

                                <div id="wrapper-summary-accreditation" class="wrapper_content_step_3">

                                    @include('frontend@extAdministrator::accreditation.partials.summaryAccreditation')

                                </div>
                            </div>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 4-->

                    <!--begin::Step 5-->
                    <div class="flex-column" data-kt-stepper-element="content">
                        <div class="card d-flex flex-row-fluid flex-center mb-10">
                            <div class="card-body p-12 w-100">
                                <div class="pb-8 pb-lg-10">
                                    <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                        <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                        <span>CONFIRMACIÓN</span>
                                    </h2>
                                    <div class="text-muted fw-semibold fs-7"></div>
                                </div>
                                <div class="mb-0">
                                    <div style="text-align:center; margin:0 15px 34px 15px">

                                        <div class="mb-15">
                                            <img alt="Logo" src="{{ asset('themes/external/media/icons/success_icon.png') }}" class="h-100px" />
                                        </div>

                                        <h2 class="fw-bolder mb-5">Formulario enviado satisfactoriamente</h2>

                                        <div class="text-muted mb-10 fs-6">
                                            Su formulario de solicitud de acreditación fue enviado satisfactoriamente. </br>
                                            Personal del TSE procederá a revisar su información y documentación enviada, </br>
                                            en caso de presentar alguna observación se le notificará </br> al correo electrónico proporcionado.
                                        </div>

                                        <a href="{{ route('ext_admin_accreditations_list') }}" class="btn btn-secondary">Volver</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Step 5-->

                    <div class="d-flex flex-stack pt-10">
                        <div class="mr-2">
                            <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Atrás
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                <span class="indicator-label">Enviar
                                    <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i>
                                </span>
                                <span class="indicator-progress">Por favor espere...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Siguiente
                                <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i>
                            </button>
                        </div>
                    </div>
                </form>
        </div>

    </div>
@endsection

@section('modals')

    <div class="modal fade" id="kt_modal_observations_accreditation" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h3 class="mb-3 text-uppercase">Observaciones</h3>
                        <div class="text-muted fw-semibold fs-7">
                            Su proceso ha sido observado.<br>
                            A continuación se listan las observaciones/recomendaciones.
                        </div>
                    </div>
                    <div>
                        <div class="py-5">
                            <div class="text-center px-5">
                                {!!  $accreditation->observations !!}
                            </div>
                        </div>
                        <div class="d-flex flex-center mt-15">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary me-3">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css') }}" media="all" rel="stylesheet">
    <style>
        .wrapper_content_step_3 .fileuploader {
            padding: 16px;
            padding-top: 0;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/external/js/custom/accreditation/edit-accreditation.js') }}"></script>
@endsection