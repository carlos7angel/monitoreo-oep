
@if($form)
    @if(is_array($fields) && count($fields) > 0)
        @foreach($fields as $field)

            @if(in_array($field->fieldType->type, ['textbox', 'textarea', 'select', 'checkbox', 'datepicker', 'fileupload']))
                <div class="fv-row mb-8">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="{{ $field->required ? 'required' : '' }}">{{ $field->label }}</span>
                        @if($field->tooltip)
                        <span class="ms-1" data-bs-toggle="tooltip" title="{{ $field->tooltip }}">
                            <i class="ki-outline ki-information-5 fs-6 text-gray-500"></i>
                        </span>
                        @endif
                    </label>

                    @switch($field->fieldType->type)

                        @case('textbox')
                            <input type="text" name="{{ $field->unique_fieldname }}" class="form-control mb-2" placeholder="{{ $field->placeholder ? $field->placeholder : '' }}" value=""
                            {!! $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : '' !!}
                            {!! ($field->minlength || $field->maxlength) ? 'data-fv-string-length="true"' : '' !!}
                            {!! ($field->minlength) ? 'data-fv-string-length___min="'.$field->minlength.'"' : '' !!}
                            {!! ($field->maxlength) ? 'data-fv-string-length___max="'.$field->maxlength.'"' : '' !!}
                            {!! ($field->minlength || $field->maxlength) ? 'data-fv-string-length___message="'. (($field->minlength && $field->maxlength) ? 'La longitud debe estar entre ' . $field->minlength . ' y ' . $field->maxlength : ($field->minlength ? 'Longitud mínima ' . $field->minlength : 'Longitud máxima ' . $field->maxlength) ) .'"' : '' !!}
                            {!! $field->regex ? 'pattern="'.$field->regex.'" data-fv-regexp___message="El campo no cumple con la regla solicitada"' : '' !!}
                            {!! $field->min ? 'data-fv-greater-than="true" data-fv-greater-than___min="'.$field->min.'" data-fv-greater-than___message="El valor mínimo debe ser '.$field->min.'"' : '' !!}
                            {!! $field->max ? 'data-fv-less-than="true" data-fv-less-than___max="'.$field->max.'" data-fv-less-than___message="El valor máximo debe ser '.$field->max.'"' : '' !!}
                            {!! $field->field_subtype === 'digits' ? 'data-fv-digits="true" data-fv-digits___message="Solo se permiten números enteros"' : '' !!}
                            {!! $field->field_subtype === 'decimal' ? 'data-fv-numeric="true" data-fv-numeric___message="Solo se permiten números" data-fv-numeric___thousands-separator="."' : '' !!}
                            {!! $field->field_subtype === 'email' ? 'data-fv-email-address="true" data-fv-email-address___message="Ingrese un correo válido"' : '' !!}
                            {!! $field->field_subtype === 'url' ? 'data-fv-uri="true" data-fv-uri___message="Ingrese una dirección URL válida" data-fv-uri___protocol="http,https" data-fv-uri___allow-empty-protocol="false"' : '' !!}
                            />
                        @break

                        @case('textarea')
                            <textarea class="form-control mb-2" rows="{{ $field->textarea_rows ? $field->textarea_rows : 2 }}" name="{{ $field->unique_fieldname }}" placeholder="{{ $field->placeholder ? $field->placeholder : '' }}"
                            {!! $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : '' !!}
                            {!! ($field->minlength || $field->maxlength) ? 'data-fv-string-length="true"' : '' !!}
                            {!! ($field->minlength) ? 'data-fv-string-length___min="'.$field->minlength.'"' : '' !!}
                            {!! ($field->maxlength) ? 'data-fv-string-length___max="'.$field->maxlength.'"' : '' !!}
                            {!! ($field->minlength || $field->maxlength) ? 'data-fv-string-length___message="'. (($field->minlength && $field->maxlength) ? 'La longitud debe estar entre ' . $field->minlength . ' y ' . $field->maxlength : ($field->minlength ? 'Longitud mínima ' . $field->minlength : 'Longitud máxima ' . $field->maxlength) ) .'"' : '' !!}
                            ></textarea>
                        @break

                        @case('select')
                            <select class="form-select mb-2" data-control="select2" data-hide-search="{{ $field->select_search ? 'false' : 'true' }}" data-placeholder="{{ $field->placeholder ? $field->placeholder : 'Selecciona una opción' }}"
                                    data-allow-clear="true" {{ $field->field_subtype == 'multiselect' ? 'multiple="multiple"' : '' }} name="{{ $field->unique_fieldname }}[]"
                                {!! $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : '' !!}>
                                @if($field->options_type === 'custom')
                                    @php
                                        $options = is_array(json_decode($field->options)) ? json_decode($field->options) : [];
                                    @endphp
                                    @if($field->field_subtype === 'select')
                                        <option></option>
                                    @endif
                                    @foreach($options as $index => $option)
                                        <option value="{{ $option->value }}">{{ $option->text }}</option>
                                    @endforeach
                                @endif

                                @if($field->options_type === 'catalog')
                                    @php
                                        $catalog = app(\App\Containers\CoreMonitoring\Catalog\Tasks\FindCatalogByIdTask::class)->run($field->options);
                                    @endphp
                                    @if($field->field_subtype === 'select')
                                        <option></option>
                                    @endif
                                    @foreach($catalog->items as $index => $option)
                                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        @break

                        @case('checkbox')
                            @if($field->options_type === 'custom')
                                @php
                                    $options = is_array(json_decode($field->options)) ? json_decode($field->options) : [];
                                @endphp
                                @foreach($options as $index => $option)
                                    <div class="form-check form-check-custom mb-3">
                                        <input class="form-check-input h-20px w-20px" id="key_{{ $option->value }}" type="checkbox" name="{{ $field->unique_fieldname }}[]" value="{{ $option->value }}"
                                        {!! $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : '' !!}/>
                                        <label class="form-check-label fw-semibold" for="key_{{ $option->value }}">{{ $option->text }}</label>
                                    </div>
                                @endforeach
                            @endif

                            @if($field->options_type === 'catalog')
                                @php
                                    $catalog = app(\App\Containers\CoreMonitoring\Catalog\Tasks\FindCatalogByIdTask::class)->run($field->options);
                                @endphp
                                @foreach($catalog->items as $index => $option)
                                    <div class="form-check form-check-custom mb-3">
                                        <input class="form-check-input h-20px w-20px" id="key_{{ $option->id }}" type="checkbox" name="{{ $field->unique_fieldname }}[]" value="{{ $option->id }}"
                                        {!! $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : '' !!}/>
                                        <label class="form-check-label fw-semibold" for="key_{{ $option->id }}">{{ $option->name }}</label>
                                    </div>
                                @endforeach
                            @endif
                        @break

                        @case('datepicker')
                            <input type="text" name="{{ $field->unique_fieldname }}" class="form-control mb-2 {{ $field->field_subtype === 'time' ? 'kt_form_field_time' : 'kt_form_field_date' }}" placeholder="{{ $field->placeholder ? $field->placeholder : '' }}" value=""
                            {!! $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : '' !!}/>
                        @break

                        @case('fileupload')

                            @php
                                $mimes = is_array(json_decode($field->file_mimetypes)) ? implode(',',json_decode($field->file_mimetypes)) : '';
                            @endphp

{{--                            @if($accreditation->fileRequestLetter)--}}
{{--                                <input type="hidden" name="file_request_letter" data-name="{{ $accreditation->fileRequestLetter->origin_name }}" data-size="{{ $accreditation->fileRequestLetter->size }}"--}}
{{--                                       data-mimetype="{{ $accreditation->fileRequestLetter->mime_type }}" data-path="{{ $accreditation->fileRequestLetter->url_file }}">--}}
{{--                            @endif--}}
                            <div class="text-muted fs-7 mb-3"></div>
                            <input type="file" name="{{ $field->unique_fieldname }}" class="files kt_form_field_fileupload" data-maxsize="{{ $field->file_maxsize ? $field->file_maxsize : '3' }}" data-maxfiles="{{ $field->maxfiles }}" data-accept="{{ $mimes }}"
                            {!! $field->required ? 'data-fv-not-empty="true" data-fv-not-empty___message="El campo es obligatorio"' : '' !!}>
                            <div class="text-muted fs-7">Máximo tamaño permitido {{ $field->file_maxsize ? $field->file_maxsize : '3' }}MB. Formatos aceptados: {{ $mimes }}</div>

                        @break

                    @endswitch

                </div>

            @endif


            @if(in_array($field->fieldType->type, ['html']))
                @switch($field->field_subtype)
                    @case('title')
                    <div>
                        @switch($field->title_heading)
                            @case('h1')
                            <h1 class="fw-bold mb-5">{{ $field->text_html }}</h1>
                            @break
                            @case('h2')
                            <h2 class="fw-bold mb-5">{{ $field->text_html }}</h2>
                            @break
                            @case('h3')
                            <h3 class="fw-bold mb-5">{{ $field->text_html }}</h3>
                            @break
                            @case('h4')
                            <h4 class="fw-bold mb-5">{{ $field->text_html }}</h4>
                            @break
                            @case('h5')
                            <h5 class="fw-bold mb-5">{{ $field->text_html }}</h5>
                            @break
                            @case('h6')
                            <h6 class="fw-bold mb-5">{{ $field->text_html }}</h6>
                            @break
                        @endswitch
                    </div>
                    @break
                    @case('paragraph')
                    <p class="text-muted fs-6 mb-5">
                        {{ $field->text_html }}
                    </p>
                    @break
                    @case('divider')
                    <div class="separator separator-dashed my-4"></div>
                    @break
                @endswitch
            @endif


        @endforeach
    @endif
@endif