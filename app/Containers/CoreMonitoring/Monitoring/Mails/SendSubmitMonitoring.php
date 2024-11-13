<?php

namespace App\Containers\CoreMonitoring\Monitoring\Mails;

use App\Containers\AppSection\User\Models\User;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringReport;
use App\Ship\Parents\Mails\Mail as ParentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubmitMonitoring extends ParentMail implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected User $recipient,
        protected MonitoringReport $report,
    ) {
    }

    public function build(): static
    {
        return $this->view('coreMonitoring@monitoring::submitMonitoring')
            ->subject('Nuevo Reporte de Monitoreo | OEP')
            ->to($this->recipient->email, $this->recipient->name)
            ->with([
                'user' => $this->recipient,
                'report' => $this->report,
            ]);
    }
}
