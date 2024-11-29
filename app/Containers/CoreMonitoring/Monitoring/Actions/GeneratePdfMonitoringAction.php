<?php

namespace App\Containers\CoreMonitoring\Monitoring\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Containers\CoreMonitoring\FormBuilder\Actions\GetFieldsFormByTypeAction;
use App\Containers\CoreMonitoring\Monitoring\Tasks\CreateMonitoringReportTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\FindMonitoringByIdTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\ValidationFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePdfMonitoringAction extends ParentAction
{
    public function __construct(
        private CreateMonitoringReportTask $createMonitoringReportTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): mixed
    {
        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $monitoring_item = app(FindMonitoringByIdTask::class)->run($request->id);
        if($monitoring_item->status == 'CREATED') {
            throw new ValidationFailedException('');
        }

        $election = app(FindElectionByIdTask::class)->run($monitoring_item->fid_election);

        [$form, $fields] = app(GetFieldsFormByTypeAction::class)->run($monitoring_item->media_type, $election);

        $dateGenerate = Carbon::now()->format('d/m/Y');

        $filename = 'RegistroDeMonitoreo_'. Str::slug($monitoring_item->code).'.pdf';

        $pdf = Pdf::loadView('pdf.monitoringPDF', [
            'election' => $election,
            'monitoring' => $monitoring_item,
            'form' => $form,
            'fields' => $fields,
        ]);

        return $pdf->download($filename);


    }
}
