<?php

namespace App\Containers\CoreMonitoring\Accreditation\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\CoreMonitoring\Accreditation\Reports\Exports\AccreditationsByElectionExport;
use App\Containers\CoreMonitoring\Election\Tasks\FindElectionByIdTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class GenerateXlsAccreditationsByElectionAction extends ParentAction
{
    public function __construct()
    {
    }

    /**
     * @throws CoreInternalErrorException
     */
    public function run(Request $request): mixed
    {
        $election = app(FindElectionByIdTask::class)->run($request->id);
        $filename = 'Acreditaciones_'. Str::slug($election->name).'.xlsx';
        return Excel::download(new AccreditationsByElectionExport($election->id), $filename);
    }
}
