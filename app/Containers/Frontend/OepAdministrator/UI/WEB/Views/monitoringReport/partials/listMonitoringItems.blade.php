<form id="kt_form_monitoring_report_add_items" class="form" method="post" autocomplete="off"
      action="{{ route('oep_admin_monitoring_report_add_items', ['id' => $monitoring_report->id]) }}">

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
{{--                <th class="min-w-100px text-end">Actions</th>--}}
            </tr>
            </thead>
            <tbody>
            @if(count($monitoring_items) > 0)
                @foreach($monitoring_items as $monitoring_item)
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input widget-13-check" type="checkbox" name="new_monitoring_items[]" value="{{ $monitoring_item->id }}" />
                            </div>
                        </td>
                        <td>
                            <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">{{ $monitoring_item->code }}</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">{{ $monitoring_item->mediaProfile->name }}</a>
                            <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $monitoring_item->mediaProfile->business_name }}</span>
                        </td>
                        <td>
                    <span class="badge badge-secondary">
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
                    </span>
                        </td>
                        <td class="text-gray-900 fw-bold text-hover-primary fs-6">{{ $monitoring_item->registered_at }}</td>
{{--                        <td class="text-end">--}}
{{--                            <button type="button" class="btn btn-sm btn-icon btn-secondary kt_btn_monitoring_item_show me-1"--}}
{{--                                    data-url="{{ route('oep_admin_monitoring_report_details_item', ['id' => $monitoring_report->id, 'monitoring_item_id' => $monitoring_item->id]) }}">--}}
{{--                                <i class="ki-outline ki-search-list fs-2"></i>--}}
{{--                            </button>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center"><span class="text-gray-500">No existen registros</span></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

</form>