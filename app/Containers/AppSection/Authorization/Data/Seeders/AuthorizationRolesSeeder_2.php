<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreateRoleTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationRolesSeeder_2 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(CreateRoleTask $task): void
    {
        // OEP
        $task->run('super', 'Usuario Super Administrador', 'Super Administrador OEP', 'web');
        $task->run('admin', 'Usuario Administrador ', 'Administrador OEP', 'web');
        $task->run('media', 'Usuario de Medios de Comunicación', 'Administrador de Medios', 'web');
        $task->run('monitor', 'Usuario de Monitoreo', 'Monitor', 'web');
        $task->run('analyst', 'Usuario Comisión de Análisis', 'Comisión de Análisis', 'web');
        $task->run('secretariat', 'Usuario Secretaría de Cámara', 'Secretaría de Cámara', 'web');
        $task->run('plenary', 'Usuario Sala Plena', 'Sala Plena', 'web');

        // EXTERNAL
        $task->run('user_media', 'Usuario externo Medio de Comunicación', 'Medio de Comunicación', 'external');
        $task->run('user_political', 'Usuario externo Partido Político', 'Partido Político', 'external');
    }
}
