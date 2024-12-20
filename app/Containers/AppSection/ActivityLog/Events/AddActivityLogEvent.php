<?php

namespace App\Containers\AppSection\ActivityLog\Events;

use App\Containers\AppSection\ActivityLog\Tasks\CreateActivityLogTask;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddActivityLogEvent extends ParentEvent implements ShouldQueue
{
    protected $log;
    protected $request;
    protected $model;
    protected $data;

    public function __construct($log, $request, $model, $data = null)
    {
        $this->log = $log;
        $this->request = $request;
        $this->model = $model;
        $this->data = $data;
    }

    public function handle()
    {
        // Create the activity log
        app(CreateActivityLogTask::class)->run(
            $this->log,
            $this->request,
            $this->model,
            $this->data
        );
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
