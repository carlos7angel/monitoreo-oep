<?php

namespace App\Containers\CoreMonitoring\FileManager\Tasks;

use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetExecutedDataTableTask extends ParentTask
{
    public function __construct(

    ) {
    }

    public function run($result, $sortColumn, $sortColumnDir, $skip, $pageSize): array
    {
        $recordsTotal =  (clone $result)->count();
        $result = $result->pushCriteria(new SkipTakeCriteria($skip, $pageSize));

        if ($sortColumn != null && $sortColumn != "" && $sortColumnDir != null && $sortColumnDir != "") {
            $result->orderBy($sortColumn, $sortColumnDir);
        }

        return [$recordsTotal, $result];
    }
}
