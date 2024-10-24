<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use App\Containers\CoreMonitoring\Registration\Tasks\DeletePropagandaMaterialTask;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class DeletePropagandaMaterialAction extends ParentAction
{
    public function __construct(
        private DeletePropagandaMaterialTask $task,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(Request $request): mixed
    {
        $del = $this->task->run($request->id);

        //TODO: delete file from storage

        return $del;
    }
}
