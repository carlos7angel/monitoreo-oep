<?php

namespace App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers;

use App\Containers\AppSection\User\Tasks\GetUsersByRolesScopeTask;
use App\Containers\CoreMonitoring\Accreditation\Tasks\CountAccreditationsByElectionTask;
use App\Containers\CoreMonitoring\Analysis\Tasks\CountAnalysesByElectionTask;
use App\Containers\CoreMonitoring\Election\Tasks\GetOnlyActiveElectionsTask;
use App\Containers\CoreMonitoring\Monitoring\Tasks\CountMonitoringItemsByElectionTask;
use App\Containers\CoreMonitoring\Registration\Tasks\CountRegistrationsByElectionTask;
use App\Containers\Frontend\OepAdministrator\UI\WEB\Requests\IndexRequest;
use App\Ship\Parents\Controllers\WebController;

class IndexController extends WebController
{
    public function index(IndexRequest $request)
    {
        $page_title = "Inicio";
        $last_election = app(GetOnlyActiveElectionsTask::class)->run();
        $election = null;
        $count_accreditations = $count_registrations = $count_monitoring = $count_analysis = 0;
        if (count($last_election) > 0) {
            $election = $last_election[0];
            $count_accreditations = app(CountAccreditationsByElectionTask::class)->run($election->id);
            $count_registrations = app(CountRegistrationsByElectionTask::class)->run($election->id);
            $count_monitoring = app(CountMonitoringItemsByElectionTask::class)->run($election->id);
            $count_analysis = app(CountAnalysesByElectionTask::class)->run($election->id);
        }
        $users_media = app(GetUsersByRolesScopeTask::class)->run(['user_media']);
        $users_political = app(GetUsersByRolesScopeTask::class)->run(['user_political']);
        return view('frontend@oepAdministrator::index', [
            'election' => $election,
            'count_accreditations' => $count_accreditations,
            'count_registrations' => $count_registrations,
            'count_monitoring' => $count_monitoring,
            'count_analysis' => $count_analysis,
            'count_users_media' => $users_media->count(),
            'count_users_political' => $users_political->count(),
        ], compact('page_title'));
    }
}
