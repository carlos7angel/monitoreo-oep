<?php

namespace App\Containers\CoreMonitoring\Registration\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Containers\CoreMonitoring\Registration\Models\PropagandaMaterial;
use App\Containers\CoreMonitoring\Registration\Tasks\FindPropagandaMaterialByIdTask;
use App\Containers\CoreMonitoring\Registration\Tasks\FindRegistrationByIdTask;
use App\Containers\CoreMonitoring\Registration\Tasks\UpdatePropagandaMaterialTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class UpdatePropagandaMaterialAction extends ParentAction
{
    public function __construct(
        private UpdatePropagandaMaterialTask $updatePropagandaMaterialTask,
        private CreateFileTask $createFileTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): PropagandaMaterial
    {
        $sanitizedData = $request->sanitizeInput([
            // add your request data here
        ]);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('external');

        $registration = app(FindRegistrationByIdTask::class)->run($request->registration_id);
        $material = app(FindPropagandaMaterialByIdTask::class)->run($request->id);

        $data = [
            'name' => $request->get('material_name'),
            'description' => $request->get('material_description'),
            'type' => $request->get('material_type'),
        ];

        if($request->get('material_type') === 'LINK') {
            $data['link_material'] = $request->get('material_link');
            $data['file_material'] = null;
        }

        if($request->get('material_type') === 'FILE') {
            $data['link_material'] = null;
            if($request->file('material_file')) {
                $file_bases = $this->createFileTask->run($request->file('material_file'), 'propaganda', $registration->election->id, $user);
                $data['file_material'] = $file_bases->unique_code;
            }
        }

        return $this->updatePropagandaMaterialTask->run($data, $material->id);
    }
}
