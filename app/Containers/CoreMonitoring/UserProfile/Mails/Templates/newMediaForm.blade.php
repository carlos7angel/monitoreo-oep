<p>Estimado/a usuario {{ $user->name }},<br>
    Esta recibiendo esta notificación porque ha llegado un nuevo registro de Medio de Comunicacion:<br>
    <b>Medio:</b><span> {{ $profile->name }}</span><br>
    <b>Razón Social:</b><span> {{ $profile->business_name }}</span><br>
    <b>Fecha:</b><span> {{ $profile->created_at }}</span></p><br>

<p>Se le recomienda revisar dicha información y continuar el debido proceso.</p><br>

Atentamente,<br>
<p>ADMINISTRADOR TSE<br>
    Sistema de Monitoreo de Propaganda</p>