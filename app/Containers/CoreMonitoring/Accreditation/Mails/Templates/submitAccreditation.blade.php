<p>Estimado/a usuario {{ $user->name }},<br>
    Ha recibido un nuevo registro de Acreditación, con el siguiente detalle:<br>
    <b>Documento:</b><span> {{ $accreditation->code }}</span><br>
    <b>Fecha:</b><span> {{ $accreditation->created_at }}</span></p><br>

<p>Se le recomienda revisar dicha información y continuar el debido proceso.</p><br>

Atentamente,<br>
<p>ADMINISTRADOR TSE<br>
    Sistema de Monitoreo de Propaganda</p>