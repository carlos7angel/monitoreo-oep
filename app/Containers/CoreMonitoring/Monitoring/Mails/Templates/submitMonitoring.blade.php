<p>Estimado/a {{ $user->name }}, </p><br>
<p>Ha recibido un nuevo reporte de monitoreo, con el siguiente detalle:</p>
<p><b>Documento:</b><span> {{ $report->code }}</span></p>
<p><b>Fecha:</b><span> {{ $report->created_at }}</span></p><br>
<p>Se le recomienda la atención oportuna.</p><br>
Atentamente,<br>
<p>Tribunal Supremo Electoral<br>
    Sistema de Monitoreo de Propaganda</p>