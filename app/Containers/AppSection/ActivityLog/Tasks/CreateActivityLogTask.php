<?php

namespace App\Containers\AppSection\ActivityLog\Tasks;

use App\Containers\AppSection\ActivityLog\Data\Repositories\ActivityLogRepository;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use App\Containers\AppSection\ActivityLog\Constants\LogConstants;
use Spatie\Activitylog\Models\Activity;

class CreateActivityLogTask extends ParentTask
{
    public function __construct(
        protected ActivityLogRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run($log, $request, $subject, $data = null): Activity
    {
        try {
            $log_data = true;
            $log = $message = '';
            $is_logged = true;
            switch ($log) {
                case LogConstants::LOGIN_ADMIN:
                    $log = 'INGRESO AL SISTEMA';
                    $message = "El usuario " . $subject->name . " (" . $subject->email . ") ha ingresado al sistema";
                    $log_data = false;
                    $is_logged = false;
                    break;
                case LogConstants::CREATE_DYNAMIC_FORM:
                    $log = 'FOMULARIO DINÁMICO CREADO';
                    $message = "Nuevo Formulario " . $subject->name . " creado";
                    break;
                case LogConstants::ADD_FORM_FIELD:
                    $log = 'CAMPO DE FOMULARIO DINÁMICO NUEVO';
                    $message = "Nuevo campo " . $subject->field_type_name . " adicionado al Formulario " .
                        $subject->form->name;
                    break;
                case LogConstants::DELETE_FORM_FIELD:
                    $log = 'CAMPO DE FOMULARIO DINÁMICO ELIMINADO';
                    $message = "Campo " . $subject->field_type_name . " eliminado del Formulario " .
                        $subject->form->name;
                    break;
                case LogConstants::CREATED_USER:
                    $log = 'NUEVO USUARIO CREADO';
                    $message = "Usuario " . $subject->name . " (" . $subject->email . ") creado";
                    break;
                case LogConstants::UPDATED_USER_DATA_PASSWORD:
                    $log = 'CONTRASEÑA DE USUARIO ACTUALIZADA';
                    $message = "La contraseña del usuario " . $subject->name .
                        " (" . $subject->email . ") ha sido actualizada";
                    break;
                case LogConstants::CREATED_ELECTION:
                    $log = 'PROCESO ELECTORAL CREADO';
                    $message = "Proceso Electoral " . $subject->name . " creado";
                    break;
                case LogConstants::UPDATED_ELECTION:
                    $log = 'PROCESO ELECTORAL ACTUALIZADO';
                    $message = "Proceso Electoral " . $subject->name . " actualizado";
                    break;
                case LogConstants::UPDATED_STATUS_ELECTION:
                    $log = 'ESTADO PROCESO ELECTORAL ACTUALIZADO';
                    $message = "EL Proceso Electoral ha cambiado su estado a " . strtoupper($subject->status);
                    break;
                case LogConstants::CREATED_POLITICAL_GROUP:
                    $log = 'PARTIDO POLÍTICO CREADO';
                    $message = "Partido Político " . $subject->name . " creado";
                    break;
                case LogConstants::UPDATED_POLITICAL_GROUP:
                    $log = 'PARTIDO POLÍTICO ACTUALIZADO';
                    $message = "Partido Político " . $subject->name . " actualizado";
                    break;
                case LogConstants::REGISTERED_POLITICAL_GROUP:
                    $log = 'PARTIDO POLÍTICO REGISTRADO';
                    $message = "El Partido Político " . $subject->politicalGroup->name .
                        " ha sido registrado en el Proceso Electoral " . $subject->election->name;
                    break;
                case LogConstants::CREATED_ACCREDITATION:
                    $log = 'NUEVA ACREDITACIÓN CREADA';
                    $message = "La Acreditación " . $subject->code . " ha sido creada";
                    break;
                case LogConstants::UPDATED_ACCREDITATION:
                    $log = 'ACREDITACIÓN ACTUALIZADA';
                    $message = "La Acreditación " . $subject->code . " ha sido actualizada";
                    break;
                case LogConstants::SUBMITTED_ACCREDITATION:
                    $log = 'ACREDITACIÓN ENVIADA';
                    $message = "La Acreditación " . $subject->code . " ha sido enviada";
                    break;
                case LogConstants::STATUS_UPDATED_ACCREDITATION:
                    $log = 'ESTADO DE ACREDITACIÓN ACTUALIZADO';
                    $message = "El estado de la Acreditación " . $subject->code . " ha sido actualizado a " .
                        strtoupper($subject->status);
                    break;
                case LogConstants::CREATED_MONITORING:
                    $log = 'NUEVO REGISTRO DE MONITOREO';
                    $message = "Nuevo registro de Monitoreo " . $subject->code . " creado";
                    break;
                case LogConstants::UPDATED_MONITORING:
                    $log = 'REGISTRO DE MONITOREO ACTUALIZADO';
                    $message = "El registro de Monitoreo " . $subject->code . " ha sido actualizado";
                    break;

                case LogConstants::ENABLED_USER_MEDIA_ACCOUNT:
                    $log = 'CUENTA HABILITADA';
                    $message = "La cuenta de usuario (Medio de Comunicación) para " . $subject->email .
                        " ha sido habilitada";
                    break;
                case LogConstants::ENABLED_USER_POLITICAL_ACCOUNT:
                    $log = 'CUENTA HABILITADA';
                    $message = "La cuenta de usuario (Partido Político) para " . $subject->email .
                        " ha sido habilitada";
                    break;
                case LogConstants::SUBMIT_MONITORING_TO_REPORT:
                    $log = 'MONITOREO ENVIADO';
                    $message = "Reporte de monitoreo creado y enviado. Documento: " . $subject->code . "";
                    break;
                case LogConstants::CREATE_ANALYSIS_REPORT:
                    $log = 'INFORME ANÁLISIS CREADO';
                    $message = "Informe de análisis de monitoreo creado. Documento: " . $subject->code . "";
                    break;
                case LogConstants::SUBMIT_ANALYSIS_TO_SECRETARIAT:
                    $log = 'INFORME ANÁLISIS ENVIADO A SECRETARÍA';
                    $message = "Informe de análisis de monitoreo enviado a Secretaría de Cámara. Documento: " .
                        $subject->code . "";
                    break;
                case LogConstants::SUBMIT_ANALYSIS_TO_PLENARY:
                    $log = 'INFORME ANÁLISIS ENVIADO A SALA PLENA';
                    $message = "Informe de análisis de monitoreo enviado a Sala Plena. Documento: " .
                        $subject->code . "";
                    break;
                default:
                    throw new NotFoundException('Activity Log Type Not Found');
                    break;
            }

            $data = [];
            if (empty($data) && $log_data) {
                $data = $subject->toArray();
            }

            $causer = null;
            if ($is_logged) {
                $causer = app(GetAuthenticatedUserTask::class)->run();
            }

            activity($log)
                ->causedBy($causer)
                ->tap(function (Activity $activity) use ($request) {
                    $activity->user_agent = $request['HTTP_USER_AGENT'];
                    $activity->ip_address = $request['REMOTE_ADDR'];
                })
                ->performedOn($subject)
                ->withProperties($data)
                ->log($message);

            $lastActivity = Activity::all()->last();

            return  $lastActivity;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }

    }
}
