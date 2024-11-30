<?php

namespace App\Containers\CoreMonitoring\FileManager\Tasks;

use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetInitialDataTableTask extends ParentTask
{
    public function __construct(

    ) {
    }

    public function run(Request $request): array
    {
        $requestData = $request->all();
        $draw = $requestData['draw'];
        $start = $requestData['start'];
        $length = $requestData['length'];
        $sortColumn = $sortColumnDir = null;
        if (isset($requestData['order'])) {
            $indexSort = $requestData['order'][0]['column'];
            $sortColumn = $requestData['columns'][$indexSort]['name'];
            $sortColumnDir = $requestData['order'][0]['dir'];
        }
        $searchValue = $requestData['search']['value'];
        $pageSize = $length != null ? intval($length) : 0;
        $skip = $start != null ? intval($start) : 0;

        return [$requestData, $draw, $sortColumn, $sortColumnDir, $pageSize, $skip, $searchValue];
    }
}
