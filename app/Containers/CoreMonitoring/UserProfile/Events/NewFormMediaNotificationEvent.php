<?php

namespace App\Containers\CoreMonitoring\UserProfile\Events;

use App\Containers\AppSection\User\Tasks\GetUsersByRolesScopeTask;
use App\Containers\CoreMonitoring\UserProfile\Mails\SendNewMediaForm;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewFormMediaNotificationEvent extends ParentEvent implements ShouldQueue
{
    protected $profile;

    public function __construct($profile)
    {
        $this->profile = $profile;
    }

    public function handle()
    {
        $users = app(GetUsersByRolesScopeTask::class)->run(['media']);
        foreach ($users as $user) {
            Mail::send(new SendNewMediaForm($user, $this->profile));
        }

    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
