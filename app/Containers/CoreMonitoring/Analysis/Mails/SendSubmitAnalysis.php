<?php

namespace App\Containers\CoreMonitoring\Analysis\Mails;

use App\Containers\AppSection\User\Models\User;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Ship\Parents\Mails\Mail as ParentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubmitAnalysis extends ParentMail implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected User $recipient,
        protected AnalysisReport $report,
    ) {
    }

    public function build(): static
    {
        return $this->view('coreMonitoring@analysis::submitAnalysisReport')
            ->subject('Nuevo Informe de Análisis | OEP')
            ->to($this->recipient->email, $this->recipient->name)
            ->with([
                'user' => $this->recipient,
                'report' => $this->report,
            ]);
    }
}
