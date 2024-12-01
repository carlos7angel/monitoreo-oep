<?php

namespace App\Containers\CoreMonitoring\Accreditation\Mails;

use App\Containers\AppSection\User\Models\User;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Ship\Parents\Mails\Mail as ParentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubmitAccreditation extends ParentMail implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected User $recipient,
        protected Accreditation $accreditation,
    ) {
    }

    public function build(): static
    {
        return $this->view('coreMonitoring@accreditation::submitAccreditation')
            ->subject('Nuevo Registro de Acreditación | OEP')
            ->to($this->recipient->email, $this->recipient->name)
            ->with([
                'user' => $this->recipient,
                'accreditation' => $this->accreditation,
            ]);
    }
}
