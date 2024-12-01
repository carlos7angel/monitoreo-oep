<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::post(
    'medios/procesos-electorales/{id}/acreditaciones/json',
    [AccreditationController::class, 'listAccreditationsByElectionJsonDt']
)
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_accreditations_by_election_json_dt')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
