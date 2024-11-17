<p>Estimado/a usuario <?php echo e($user->name); ?>,<br>
    Esta recibiendo esta notificación porque ha llegado un nuevo registro de Medio de Comunicacion:<br>
    <b>Medio:</b><span> <?php echo e($profile->name); ?></span><br>
    <b>Razón Social:</b><span> <?php echo e($profile->business_name); ?></span><br>
    <b>Fecha:</b><span> <?php echo e($profile->created_at); ?></span></p><br>

<p>Se le recomienda revisar dicha información y continuar el debido proceso.</p><br>

Atentamente,<br>
<p>ADMINISTRADOR TSE<br>
    Sistema de Monitoreo de Propaganda</p><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\CoreMonitoring\UserProfile/Mails/Templates//newMediaForm.blade.php ENDPATH**/ ?>