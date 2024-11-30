<?php

namespace App\Containers\AppSection\User\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserByGuardTask;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetExecutedDataTableTask;
use App\Containers\CoreMonitoring\FileManager\Tasks\GetInitialDataTableTask;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUsersJsonDataTableTask extends ParentTask
{
    public function __construct(
        protected UserRepository $userRepository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        [$requestData, $draw, $sortColumn, $sortColumnDir, $pageSize, $skip, $searchValue] =
            app(GetInitialDataTableTask::class)->run($request);

        $user = app(GetAuthenticatedUserByGuardTask::class)->run('web');

        $result = $this->userRepository->scopeQuery(function ($query) use ($searchValue, $user) {
            if (! empty($searchValue)) {
                $query = $query->where('name', 'like', '%'.$searchValue.'%')
                                ->orWhere('email', 'like', '%'.$searchValue.'%');
            }

            $query = $query->where('id', '<>', 1)->where('id', '<>', $user->id);

            return $query->distinct()->select(['users.*']);
        });

        [$recordsTotal, $result] = app(GetExecutedDataTableTask::class)
            ->run($result, $sortColumn, $sortColumnDir, $skip, $pageSize);

        $records = $result->all();

        foreach ($records as &$item) {
            $item->rol = $item->roles->first()->display_name;
        }

        return [
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            'data' => $records
        ];
    }
}
