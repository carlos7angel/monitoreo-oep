<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\FindAccreditationByIdTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\ConvertJsonDataToProfileDataTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Str;

class GeneratePdfAccreditationAction extends ParentAction
{
    public function __construct(
        private FindAccreditationByIdTask $findAccreditationByIdTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): mixed
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');
        $accreditation = $this->findAccreditationByIdTask->run($request->id);
        $profile = app(ConvertJsonDataToProfileDataTask::class)->run($accreditation->data);
        $filename = 'Reporte-registro-medio_'. Str::slug($accreditation->code).'.pdf';
        $dateGenerate = Carbon::now()->format('d/m/Y H:i A');
        $pdf = Pdf::loadView('pdf.accreditationPDF', [
            'accreditation' => $accreditation,
            'profile_data' => $profile,
            'date' => $dateGenerate,
            'user' => $user,
        ]);
        return $pdf->download($filename);
    }
}
