<?php

namespace App\Containers\CoreMonitoring\UserProfile\Mails;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Mails\Mail as ParentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewMediaForm extends ParentMail implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected User $recipient,
        protected $profile,
    ) {
    }

    public function build(): static
    {
        return $this->view('coreMonitoring@userProfile::newMediaForm')
            ->subject('Nuevo registro de Medio | OEP')
            ->to($this->recipient->email, $this->recipient->name)
            ->with([
                'user' => $this->recipient,
                'profile' => $this->profile,
            ]);
    }
}
