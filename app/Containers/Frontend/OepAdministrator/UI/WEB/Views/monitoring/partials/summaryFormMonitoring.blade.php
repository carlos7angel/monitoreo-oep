@php
    $input = json_decode($monitoring->data, true);
@endphp

<div>
    <h6 class="mb-5 mt-10 fw-bolder text-gray-600 text-hover-primary">DATOS DEL FORMULARIO</h6>
    @if($form)
        @if(is_array($fields) && count($fields) > 0)
            @foreach($fields as $field)

                @if(!isset($input[$field->unique_fieldname]))
                    @continue
                @endif

                @switch($field->fieldType->type)

                    @case('textbox')
                    @case('datepicker')
                    @case('textarea')
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                            <label class="fw-semibold fs-7 text-gray-600">{{ $field->label }}:</label>
                        </div>
                        <div class="col-md-8">
                            <p class="form-control form-control-plaintext">{{ $input[$field->unique_fieldname] ? $input[$field->unique_fieldname] : '' }}</p>
                        </div>
                    </div>
                    <div class="separator separator-dashed border-muted"></div>
                    @break

                    @case('select')
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                            <label class="fw-semibold fs-7 text-gray-600">{{ $field->label }}:</label>
                        </div>
                        <div class="col-md-8">
                            @if($field->options_type === 'custom')
                                @php
                                    $options = is_array(json_decode($field->options)) ? json_decode($field->options) : [];
                                    if ($field->field_subtype == 'multiselect') {
                                        $selecteds = is_array(json_decode($input[$field->unique_fieldname])) ? json_decode($input[$field->unique_fieldname]) : [];
                                    } elseif ($field->field_subtype == 'select') {
                                        $selecteds = [$input[$field->unique_fieldname]];
                                    }
                                @endphp
                                @foreach($options as $index => $option)
                                    @if(in_array($option->value, $selecteds))
                                        <p class="form-control form-control-plaintext">
                                            <i class="ki-outline ki-check-square fs-6 text-gray-500"></i> {{ $option->text }}
                                        </p>
                                    @endif
                                @endforeach
                            @endif

                            @if($field->options_type === 'catalog')
                                @php
                                    $catalog = app(\App\Containers\CoreMonitoring\Catalog\Tasks\FindCatalogByIdTask::class)->run($field->options);
                                    if ($field->field_subtype == 'multiselect') {
                                        $selecteds = is_array(json_decode($input[$field->unique_fieldname])) ? json_decode($input[$field->unique_fieldname]) : [];
                                    } elseif ($field->field_subtype == 'select') {
                                        $selecteds = [$input[$field->unique_fieldname]];
                                    }
                                @endphp
                                @foreach($catalog->items as $index => $option)
                                    @if(in_array($option->id, $selecteds))
                                        <p class="form-control form-control-plaintext">
                                            <i class="ki-outline ki-check-square fs-6 text-gray-500"></i> {{ $option->name }}
                                        </p>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="separator separator-dashed border-muted"></div>
                    @break

                    @case('checkbox')
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                            <label class="fw-semibold fs-7 text-gray-600">{{ $field->label }}:</label>
                        </div>
                        <div class="col-md-8">
                            @if($field->options_type === 'custom')
                                @php
                                    $options = is_array(json_decode($field->options)) ? json_decode($field->options) : [];
                                    $selecteds = is_array(json_decode($input[$field->unique_fieldname])) ? json_decode($input[$field->unique_fieldname]) : [];
                                @endphp
                                @foreach($options as $index => $option)
                                    @if(in_array($option->value, $selecteds))
                                        <p class="form-control form-control-plaintext">
                                            <i class="ki-outline ki-check-square fs-6 text-gray-500"></i> {{ $option->text }}
                                        </p>
                                    @endif
                                @endforeach
                            @endif

                            @if($field->options_type === 'catalog')
                                @php
                                    $catalog = app(\App\Containers\CoreMonitoring\Catalog\Tasks\FindCatalogByIdTask::class)->run($field->options);
                                    $selecteds = is_array(json_decode($input[$field->unique_fieldname])) ? json_decode($input[$field->unique_fieldname]) : [];
                                @endphp
                                @foreach($catalog->items as $index => $option)
                                    @if(in_array($option->id, $selecteds))
                                        <p class="form-control form-control-plaintext">
                                            <i class="ki-outline ki-check-square fs-6 text-gray-500"></i> {{ $option->name }}
                                        </p>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="separator separator-dashed border-muted"></div>
                    @break

                    @case('fileupload')
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                            <label class="fw-semibold fs-7 text-gray-600">{{ $field->label }}:</label>
                        </div>
                        <div class="col-md-8">
                            @if(isset($input[$field->unique_fieldname]) && is_array($input[$field->unique_fieldname]))
                                <p class="form-control form-control-plaintext">
                                    <a href="javascript:void(0)" data-fancybox data-type="pdf" data-src="{{ $input[$field->unique_fieldname]['url_file'] }}">{{ $input[$field->unique_fieldname]['original_name'] }}</a>
                                </p>


{{--                                <div class="fileuploader fileuploader-theme-dropin p-0">--}}
{{--                                    <div class="fileuploader-items">--}}
{{--                                        <ul class="fileuploader-items-list">--}}
{{--                                            <li class="fileuploader-item file-type-application file-ext-pdf file-has-popup mb-0"  style="">--}}
{{--                                                <div class="columns">--}}
{{--                                                    <div class="column-thumbnail">--}}
{{--                                                        <div class="fileuploader-item-image fileuploader-no-thumbnail">--}}
{{--                                                            <div style="background-color: #f23c0f" class="fileuploader-item-icon"><i>pdf</i></div>--}}
{{--                                                        </div>--}}
{{--                                                        <span class="fileuploader-action-popup"></span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="column-title">--}}
{{--                                                        <a href="http://monitoreo-oep.test/storage/medios/m-2/acreditaciones/16/9cfaee47__sample-pdf-1.pdf" target="_blank">--}}
{{--                                                            <div title="Sample_PDF__1.pdf">Sample_PDF__1.pdf</div>--}}
{{--                                                            <span>6.69 KB</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            @endif
                            {{--<p class="form-control form-control-plaintext">{!! var_dump($input[$field->unique_fieldname]) !!}</p>--}}
                        </div>
                    </div>
                    <div class="separator separator-dashed border-muted"></div>
                    @break

                @endswitch

            @endforeach
        @endif
    @endif


</div>