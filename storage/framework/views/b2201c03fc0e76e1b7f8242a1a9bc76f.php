<p>Estimado/a <?php echo e($user->name); ?>, </p><br>
<p>Ha recibido un nuevo reporte de monitoreo, con el siguiente detalle:</p>
<p><b>Documento:</b><span> <?php echo e($report->code); ?></span></p>
<p><b>Fecha:</b><span> <?php echo e($report->created_at); ?></span></p><br>
<p>Se le recomienda la atención oportuna.</p><br>
Atentamente,<br>
<p>Tribunsal Supremo Electoral<br>
    Sistema de Monitoreo de Propaganda</p><?php /**PATH D:\Development Environment\PHP Environment\Laragon\www\monitoreo-oep\app\Containers\CoreMonitoring\Monitoring/Mails/Templates//submitMonitoring.blade.php ENDPATH**/ ?>