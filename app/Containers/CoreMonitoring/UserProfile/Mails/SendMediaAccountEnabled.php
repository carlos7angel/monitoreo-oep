<?php

namespace App\Containers\CoreMonitoring\UserProfile\Mails;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Mails\Mail as ParentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMediaAccountEnabled extends ParentMail implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected User $recipient,
        protected string $newPassword,
    ) {
    }

    public function build(): static
    {
        return $this->view('coreMonitoring@userProfile::enableAccount')
            ->subject('Habilitación de cuenta | OEP')
            ->to($this->recipient->email, $this->recipient->name)
            ->with([
                'user' => $this->recipient,
                'password' => $this->newPassword,
                'app_url' => config('app.url'),
            ]);
    }
}
