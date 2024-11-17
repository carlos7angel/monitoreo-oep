<?php

namespace App\Containers\CoreMonitoring\Accreditation\Events;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\GetUsersByRolesScopeTask;
use App\Containers\CoreMonitoring\Accreditation\Mails\SendSubmitAccreditation;
use App\Containers\CoreMonitoring\Accreditation\Models\Accreditation;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;


class SubmitAccreditationNotificationEvent extends ParentEvent implements ShouldQueue
{
    protected $accreditation;
    protected $user;

    public function __construct(Accreditation $_accreditation, User $_user)
    {
        $this->accreditation= $_accreditation;
        $this->user = $_user;
    }

    public function handle()
    {
        $users = app(GetUsersByRolesScopeTask::class)->run(['media']);
        foreach ($users as $user) {
            Mail::send(new SendSubmitAccreditation($user, $this->accreditation));
        }
    }

}
