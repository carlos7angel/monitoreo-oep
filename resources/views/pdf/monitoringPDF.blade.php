<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
    <title>Reporte de Monitoreo</title>
    <meta content="text/html; charset=utf-8" />
    <style>
        body{
            font-family: sans-serif;
        }
        @page {
            margin: 0px;
            margin-top:120px;
            margin-bottom: 0px;
        }
        .page-break{
            page-break-after:always;
        }
        #content{
            margin: 0px 50px;
            margin-bottom: 40px;
            margin-top: 40px; /**/
        }
        header { position: fixed;
            left: 0px;
            top: -120px;
            right: 0px;
            height: 100px;
            text-align: center;
        }
        footer {
            position: fixed;
            left: 0px;
            bottom: 80px;
            right: 0px;
            height: auto;
        }
        footer .page:after {
            content: counter(page);
        }

        .bloque{
            margin: 1rem 0;
        }
        .titulo{
            font-family: Montserrat, Tahoma, sans-serif;
            color: #111;
            font-size: 14px;
            line-height: 16px;
            font-weight: bold;
        }

        table{
            width: 100%;
            font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
            font-size: 13px;
            line-height: 15px;
        }

        table.contenido_form tr{
            page-break-inside: avoid;
        }
        table.detalle_conv, table.contenido_form{
            margin: .5rem 0 0 0;
        }
        table.detalle_conv tr td, table.contenido_form tr.cols-2 td{
            width: 50%;
        }
        table.detalle_conv tr td:first-child, table.contenido_form tr.cols-2 td:first-child, table.contenido_form tr.col-1-t td, table.detalle_conv tr td.titulo{
            padding-top:5px;
            padding-bottom:5px;
            padding-left:60px;
            text-align: left;
            color: #333;
        }
        table.detalle_conv tr td:last-child, table.contenido_form tr.cols-2 td:last-child, table.contenido_form tr.col-1-t td p{
            padding-top:5px;
            padding-bottom:5px;
            padding-right:60px;
            color: #333;
            word-break: break-all;
            word-wrap: break-word;
            /*white-space: pre-line;*/
        }
        table.detalle_conv tr td.titulo{
            font-weight: 600;
            padding-left: 40px;
        }


        table.contenido_form tr.col-1-t td p{
            margin: 0;
            padding-right: 0;
            padding-left: 10px;
            text-align:justify;
        }

        table.datos_tablas{
            widows: 100%;
            margin: 1rem 0;
            border-spacing: 0px;
            border-collapse: collapse;
        }
        table.datos_tablas tr{
            page-break-inside: avoid;
        }
        table.datos_tablas td{
            border: 1px solid #555;

            font-size: 12px;

        }
        table.datos_tablas th{
            border: 1px solid #555;
        }
        table.datos_tablas thead{
            margin: 1rem 0;
            /*background: #fb703c;*/
            color: #333;
            font-size: 13px;
            font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
        }
        table.datos_tablas thead th{
            padding: .5rem;
        }
        table.datos_tablas tbody{
            font-size: 13px;
            font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;
            color: #555555;
            line-height: 15px;
        }
        table.datos_tablas tbody td{
            padding: .3rem .5rem;
        }
        td.texto_largo{
            word-break: break-all;
            word-wrap: break-word;
            /*white-space: pre-line;*/
        }.bloque .bloque .titulo{
             margin-left: .7rem;
         }

        .number_page{
            float: right;
        }
        .number_page:after{
            text-align: right;
            content: "Página " counter(page);
        }
        /**/
        .final {
            border-top: 2px solid #555 !important;
            border-bottom: 2px solid #555 !important;
            border-left: 2px solid #555 !important;
            border-right: 2px solid #555 !important;
            font-size: 13px !important;
        }
        td.criteria {
            color: #555;
            font-size: 11px;
        }

    </style>
</head>
<body>
<header>

    <table border="0" style="width: 100%; border-collapse: collapse; border: 0; background-color:#88407d;"><!-- //NOSONAR -->
        <tr>
            <th style="width: 20%; text-align: left; vertical-align: middle;">
                <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="data:image/png;base64,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" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; clear: both; border: 0; height: auto; float: none; height: 75px; max-height: 75px; display: block;" title="Image" />
            </th>
            <th style="width: 60%; text-align: center; vertical-align: middle; font-size: 20px; font-weight: bold; text-transform: uppercase;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                    <div style="color:#000000;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:120%;padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px;">
                        <div style="font-size: 12px; line-height: 14px; color: #000000; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;"><br /></p>
                        </div>
                    </div>
                    <div style="color:#FFFFFF;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:5px;padding-left:10px;">
                        <div style="line-height: 14px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; font-size: 12px; color: #FFFFFF;">
                            <p style="line-height: 21px; text-align: center; font-size: 12px; margin: 0;"><span style="font-size: 18px;"><strong>Reporte de Monitoreo</strong></span></p>
                        </div>
                    </div>
                    <div style="color:#FFD7CB;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:150%;padding-top:0px;padding-right:10px;padding-bottom:5px;padding-left:10px;">
                        <div style="font-size: 12px; line-height: 18px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; color: #FFD7CB;">
                            <p style="font-size: 14px; line-height: 21px; text-align: center; margin: 0;">{{ $election->name }}</p>
                        </div>
                    </div>
                </div>
            </th>
            <th style="width: 20%; text-align: right; vertical-align: middle;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                    <div style="color:#000000;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:120%;padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px;">
                        <div style="font-size: 12px; line-height: 14px; color: #000000; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;"><br /></p>
                        </div>
                    </div>
                    <div style="color:#FFFFFF;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:5px;padding-left:10px;">
                        <div style="line-height: 14px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; font-size: 12px; color: #FFFFFF;">
                            <p style="line-height: 21px; text-align: center; font-size: 12px; margin: 0;"><span style="font-size: 18px;"><strong>{{ $monitoring->code }}</strong></span></p>
                        </div>
                    </div>
                    <div style="color:#FFD7CB;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:150%;padding-top:0px;padding-right:10px;padding-bottom:5px;padding-left:10px;">
                        <div style="font-size: 12px; line-height: 18px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; color: #FFD7CB;">
                            <p style="font-size: 12px; line-height: 21px; text-align: center; margin: 0;">Nro Documento</p>
                        </div>
                    </div>
                    <div style="color:#000000;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:120%;padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px;">
                        <div style="font-size: 12px; line-height: 14px; color: #000000; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;"><br /></p>
                        </div>
                    </div>
                </div>
            </th>
        </tr>
    </table>

</header>
<footer>
    <div style="background-color:transparent;">
        <div class="block-grid" style="margin: 0 auto; min-width: 320px; max-width: 620px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <div class="col num12" style="min-width: 320px; max-width: 620px; display: table-cell; vertical-align: top;;">
                    <div style="width:100% !important;">
                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                            <table border="0" cellpadding="0" cellspacing="0" class="divider" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                <tbody>
                                <tr style="vertical-align: top;" valign="top">
                                    <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; border-collapse: collapse;" valign="top">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 1px dotted #CCCCCC; height: 0px;" valign="top" width="100%">
                                            <tbody>
                                            <tr style="vertical-align: top;" valign="top">
                                                <td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse;" valign="top"><span></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color:transparent;">
        <div class="block-grid" style="margin: 0 auto; min-width: 320px; max-width: 620px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <div class="col num12" style="min-width: 320px; max-width: 620px; display: table-cell; vertical-align: top;;">
                    <div style="width:100% !important;">
                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                            <div style="color:#555555;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                <div style="font-size: 12px; line-height: 14px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; color: #555555;">
                                    <p style="font-size: 14px; line-height: 14px; text-align: left; margin: 0;"><span style="font-size: 12px;">Organo Electoral Plurinacional | {{ date('d/m/Y H:i') }}  </span> <span class="number_page"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="content">
    <div class="bloque" style="margin: 1rem 0 0 0;">
        <div class="titulo">MEDIO DE COMUNICACIÓN</div>
        <table class="detalle_conv">
            <tr>
                <td><b>Nombre del Medio:</b></td>
                <td>
                    @if($monitoring->registered_media)
                        <span>{{ $monitoring->mediaProfile->name }} - {{ $monitoring->mediaProfile->business_name }}</span>
                    @else
                        <span>{{ $monitoring->other_media }} </span>
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <div class="bloque" style="margin: 1rem 0 0 0;">
        <div class="titulo">DATOS DEL REGISTRO DE MONITOREO</div>
        <table class="detalle_conv">
            @php
                $input = json_decode($monitoring->data, true);
            @endphp
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
                                <tr>
                                    <td><b>{{ $field->label }}:</b></td>
                                    <td>{{ $input[$field->unique_fieldname] ? $input[$field->unique_fieldname] : '' }}</td>
                                </tr>
                            @break

                            @case('select')
                                <tr>
                                    <td><b>{{ $field->label }}:</b></td>
                                    <td>
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
                                                    <span>{{ $option->text }}</span><br>
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
                                                    <p> {{ $option->name }}</p><br>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @break

                            @case('checkbox')
                                <tr>
                                    <td><b>{{ $field->label }}:</b></td>
                                    <td>
                                        @if($field->options_type === 'custom')
                                            @php
                                                $options = is_array(json_decode($field->options)) ? json_decode($field->options) : [];
                                                $selecteds = is_array(json_decode($input[$field->unique_fieldname])) ? json_decode($input[$field->unique_fieldname]) : [];
                                            @endphp
                                            @foreach($options as $index => $option)
                                                @if(in_array($option->value, $selecteds))
                                                    <span> {{ $option->text }}</span><br>
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
                                                    <p> {{ $option->name }}</p><br>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @break

                            @case('fileupload')
                                <tr>
                                    <td><b>{{ $field->label }}:</b></td>
                                    <td>
                                        @if(isset($input[$field->unique_fieldname]) && is_array($input[$field->unique_fieldname]))
                                            <span>{{ $input[$field->unique_fieldname]['url_file'] }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @break

                        @endswitch

                    @endforeach
                @endif
            @endif

        </table>
    </div>


</div>
</body>
</html>
