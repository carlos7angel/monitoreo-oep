<?php

namespace App\Containers\CoreMonitoring\UserProfile\Mails;

use App\Containers\AppSection\User\Models\User;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Parents\Mails\Mail as ParentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMediaAccountEnabled extends ParentMail implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected User $recipient,
        protected MediaProfile $profile,
        protected string $newPassword,
    ) {
    }

    public function build(): static
    {
        return $this->view('appSection@coreMonitoring::enableAccount')
            ->subject('Habilitar cuenta')
            ->to($this->recipient->email, $this->recipient->name)
            ->with([
                'user' => $this->recipient,
                'profile' => $this->profile,
                'password' => $this->newPassword,
                'app_url' => config('app.url'),
            ]);
    }
}
