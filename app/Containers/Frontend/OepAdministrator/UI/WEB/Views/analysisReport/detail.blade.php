@extends('vendor@template::admin.layouts.master', ['page' => 'analysis_report_list'])

@section('breadcrumbs')
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-gray-900 fw-bold m-0 fs-3">INFORME DE ANÁLISIS</h1>
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="javascript;" class="text-gray-600 text-hover-primary">Inicio</a>
            </li>
            <li class="breadcrumb-item text-gray-600">Informes de Análisis</li>
            <li class="breadcrumb-item text-gray-500">Detalle</li>
        </ul>
    </div>
    <div class="d-flex align-items-center">

    </div>
@endsection

@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        <div class="card">
            <div class="card-body p-lg-15">
                <div class="d-flex flex-column flex-xl-row">

                    <div class="m-0">
                        <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100__ min-w-md-350px p-9 bg-lighten">
                            <div class="mb-8">
                                @switch($analysis_report->status)
                                    @case('NEW')
                                    <span class="badge badge-light-info">Nuevo</span>
                                    @break
                                @endswitch
                                <span class="badge badge-light-success">En progreso</span>
                            </div>
                            <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DETALLE DOCUMENTO</h6>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Tipo de operación:</div>
                                <div class="fw-bold text-gray-800 fs-6">Informe de Análisis</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Nro Documento:</div>
                                <div class="fw-bold text-gray-800 fs-6">{{ $analysis_report->code }}</div>
                            </div>
                            <div class="mb-6">
                                <div class="fw-semibold text-gray-600 fs-7">Fecha de Registro:</div>
                                <div class="fw-bold text-gray-800 fs-6">12/12/12</div>
                            </div>
                            <div class="mb-15">
                                <div class="fw-semibold text-gray-600 fs-7">Registrado por:</div>
                                <div class="fw-bold text-gray-800 fs-6">Carlos "malo" Alejo</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-lg-row-fluid ms-xl-18 mb-10 mb-xl-0">
                        <div class="mt-n1">
                            <div class="d-flex flex-stack pb-10">
                                <img alt="Logo" src="{{ asset('themes/common/media/logos/logo_oep.png') }}" class="h-100px" />
                                <div class="text-sm-end fw-semibold fs-7 text-muted">
                                    <img alt="Logo Proceso Electoral" src="{{ asset('storage') . $analysis_report->election->logo_image }}" class="h-100px mb-2" />
                                    <div>{{ $analysis_report->election->name }}</div>
                                    <div>{{ $analysis_report->election->election_date }}</div>
                                </div>
                            </div>
                            <div class="m-0">
                                <div class="fw-bold fs-3 text-gray-800 text-center mb-12">Informe de Análisis al Reporte de Monitoreo de Vulneraciones al Reglamento de Difusión de Propaganda y Campaña Electoral </div>

                                <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL ANÁLISIS</h6>

                                <form id="kt_analysis_report_form" class="form mb-15" action="" method="post" autocomplete="off">

                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                            <label class="fw-semibold fs-7 text-gray-600">Informe de Análisis:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" name="analysis_file_report" class="files kt_analysis_report_files"
                                                   id="kt_analysis_file_report" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                            <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
                                        </div>
                                    </div>

                                    <div class="separator separator-dashed border-muted my-5"></div>

                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                            <label class="fw-semibold fs-7 text-gray-600">Comentarios:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" name="analysis_observations" placeholder=""> TODAVIA NO SE SABE SI COLOCAR PORQUE NO HABRA BOTON DE GUARDAR SOLO DE ENVIAR !!!!!!!!</textarea>
                                        </div>
                                    </div>

                                    <div class="separator separator-dashed border-muted my-5"></div>

                                </form>

                                <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL MONITOREO</h6>

                                <div class="flex-grow-1">
                                    @foreach(['TV','RADIO','PRINT','DIGITAL','RRSS'] as $media_type)
                                        @if($analysis_report->monitoringReport->monitoringItems->where('media_type', $media_type)->count() > 0)
                                            <div class="d-flex align-items-center mb-3 mt-10">
                                                <span class="bullet bullet-vertical h-30px bg-primary me-3"></span>
                                                <div class="flex-grow-1">
                                                    <a class="text-primary fw-bold fs-6">
                                                        @switch($media_type)
                                                            @case('TV')
                                                            <span>Medios Televisivos</span>
                                                            @break
                                                            @case('RADIO')
                                                            <span>Medios Radiales</span>
                                                            @break
                                                            @case('PRINT')
                                                            <span>Medios Impresos</span>
                                                            @break
                                                            @case('DIGITAL')
                                                            <span>Medios Digitales</span>
                                                            @break
                                                            @case('RRSS')
                                                            <span>Redes Sociales</span>
                                                            @break
                                                        @endswitch
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
                                                    @foreach($analysis_report->monitoringReport->monitoringItems->where('media_type', $media_type) as $key => $monitoring_item)
                                                        <tr class="border-bottom fw-bold text-gray-700 fs-7">
                                                            <td class="text-center">{{ $key + 1 }}</td>
                                                            <td class="text-start">{{ $monitoring_item->code }}</td>
                                                            <td class="text-start">
                                                                <div class="ms-0">
                                                                    <div class="text-gray-800 text-hover-primary fs-6 fw-bold mb-0">{{ $monitoring_item->mediaProfile->name }}</div>
                                                                    <div class="text-muted fs-7">{{ $monitoring_item->mediaProfile->business_name }}</div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                @switch($monitoring_item->media_type)
                                                                    @case('TV')
                                                                    <span>M. Televisivos</span>
                                                                    @break
                                                                    @case('RADIO')
                                                                    <span>M. Radiales</span>
                                                                    @break
                                                                    @case('PRINT')
                                                                    <span>M. Impresos</span>
                                                                    @break
                                                                    @case('DIGITAL')
                                                                    <span>M. Digitales</span>
                                                                    @break
                                                                    @case('RRSS')
                                                                    <span>Redes Sociales</span>
                                                                    @break
                                                                @endswitch
                                                            </td>
                                                            <td class="text-center">{{ $monitoring_item->registered_at }}</td>
                                                            <td class="text-end">
                                                                <button type="button" class="btn btn-sm btn-icon btn-secondary kt_btn_monitoring_item_show me-2"
                                                                        data-url="{{ route('oep_admin_monitoring_report_details_item', ['id' => $analysis_report->monitoringReport->id, 'monitoring_item_id' => $monitoring_item->id]) }}">
                                                                    <i class="ki-outline ki-search-list fs-2"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                    @endif
                                @endforeach

                                    <div class="d-flex justify-content-end">
                                        <!--begin::Section-->
                                        <div class="mw-300px">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountname-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Subtotal:</div>
                                                <!--end::Accountname-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ 20,600.00</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountname-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">VAT 0%</div>
                                                <!--end::Accountname-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">0.00</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Subtotal + VAT</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ 20,600.00</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <!--begin::Code-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Total</div>
                                                <!--end::Code-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ 20,600.00</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection

@section('modals')
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
                          action="{{ route('oep_admin_monitoring_report_change_status', ['id' => $analysis_report->id]) }}">
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
@endsection

@section('styles')
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css') }}" media="all" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/admin/js/custom/analysis_report/detail.js') }}"></script>
@endsection