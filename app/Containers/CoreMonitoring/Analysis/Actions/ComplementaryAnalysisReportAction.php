<?php

namespace App\Containers\CoreMonitoring\Analysis\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\CoreMonitoring\Analysis\Models\AnalysisReport;
use App\Containers\CoreMonitoring\Analysis\Tasks\CreateStatusActivityAnalysisReportTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\FindAnalysisReportByIdTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\CreateFileTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\ValidationFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ComplementaryAnalysisReportAction extends ParentAction
{
    public function __construct(
        private FindAnalysisReportByIdTask $findAnalysisReportByIdTask,
        private CreateStatusActivityAnalysisReportTask $createStatusActivityAnalysisReportTask,
        private GetAuthenticatedUserByGuardTask $getAuthenticatedUserByGuardTask,
        private CreateFileTask $createFileTask,
    ) {
    }

    /**
     * @throws ValidationFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): AnalysisReport
    {
        $data = $request->sanitizeInput($request->all());

        $user = $this->getAuthenticatedUserByGuardTask->run('web');
        $analysis_report = $this->findAnalysisReportByIdTask->run($request->id);
        if ($analysis_report->status !== 'IN_TREATMENT' && $analysis_report->status !== 'IN_TREATMENT_PLENARY') {
            throw new ValidationFailedException('Operación no permitida, el estado no esta autorizado para realizar esta acción.');
        }
        if (! $request->file('analysis_file_complementary')) {
            throw new ValidationFailedException('El archivo es un campo obligatorio');
        }

        return DB::transaction(function () use ($data, $analysis_report, $user, $request) {

            if ($request->file('analysis_file_complementary')) {
                $file_report = $this->createFileTask->run($request->file('analysis_file_complementary'), 'analysis-report', $analysis_report->id, $user);
                $analysis_report->file_analysis_report_complementary = $file_report->unique_code;
            }

            $new_status = $data['new_status'];
            $analysis_status_data = [
                'fid_analysis_report' => $analysis_report->id,
                'status' => $new_status,
                'previous_status' => $analysis_report->status,
                'observations' => $data['analysis_observations'],
                'registered_by' => $user->id,
                'registered_at' => Carbon::now()
            ];
            $activity = $this->createStatusActivityAnalysisReportTask->run($analysis_status_data);

            $analysis_report->status = $new_status;
            $analysis_report->fid_last_analysis_report_activity = $activity->id;
            $analysis_report->save();

            return $analysis_report;
        });

    }
}
