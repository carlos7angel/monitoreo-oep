<?php

namespace App\Containers\CoreMonitoring\UserProfile\Events;

use App\Containers\AppSection\User\Models\User;
use App\Containers\CoreMonitoring\UserProfile\Mails\SendMediaAccountEnabled;
use App\Containers\CoreMonitoring\UserProfile\Models\MediaProfile;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMediaAccountEnabledEvent extends ParentEvent implements ShouldQueue
{
    protected $user;
    protected $profile;
    protected $password;

    public function __construct(User $user, $profile, string $password)
    {
        $this->user = $user;
        $this->profile = $profile;
        $this->password = $password;
    }

    public function handle()
    {
        Mail::send(new SendMediaAccountEnabled($this->user, $this->password));
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
