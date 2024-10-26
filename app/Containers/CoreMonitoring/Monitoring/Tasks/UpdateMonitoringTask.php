<?php

namespace App\Containers\CoreMonitoring\Monitoring\Tasks;

use App\Containers\CoreMonitoring\Monitoring\Data\Repositories\MonitoringItemRepository;
use App\Containers\CoreMonitoring\Monitoring\Models\MonitoringItem;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateMonitoringTask extends ParentTask
{
    public function __construct(
        protected MonitoringItemRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): MonitoringItem
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
