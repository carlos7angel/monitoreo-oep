<?php

use App\Containers\Frontend\OepAdministrator\UI\WEB\Controllers\AccreditationController;
use Illuminate\Support\Facades\Route;

Route::get('medios/procesos-electorales/{id}/acreditaciones/reporte', [AccreditationController::class, 'xlsAccreditationsByElection'])
    ->prefix(config('app.admin_oep_prefix'))
    ->name('oep_admin_media_accreditations_by_election_xls')
    ->middleware(['auth:web'])
    ->domain(parse_url(config('app.url'))['host']);
