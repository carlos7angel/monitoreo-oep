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
    public function run($_log, $_request, $_subject, $_data = null): Activity
    {
        try {
            $log_data = true;
            $log = $message = '';
            $is_logged = true;
            switch ($_log) {
                case LogConstants::LOGIN_ADMIN:
                    $log = 'INGRESO AL SISTEMA';
                    $message = "El usuario " . $_subject->name . " (" . $_subject->email . ") ha ingresado al sistema";
                    $log_data = false;
                    $is_logged = false;
                    break;
                case LogConstants::CREATE_DYNAMIC_FORM:
                    $log = 'FOMULARIO DINÁMICO CREADO';
                    $message = "Nuevo Formulario " . $_subject->name . " creado";
                    break;
                case LogConstants::ADD_FORM_FIELD:
                    $log = 'CAMPO DE FOMULARIO DINÁMICO NUEVO';
                    $message = "Nuevo campo " . $_subject->field_type_name . " adicionado al Formulario " . $_subject->form->name;
                    break;
                case LogConstants::DELETE_FORM_FIELD:
                    $log = 'CAMPO DE FOMULARIO DINÁMICO ELIMINADO';
                    $message = "Campo " . $_subject->field_type_name . " eliminado del Formulario " . $_subject->form->name;
                    break;
                case LogConstants::CREATED_USER:
                    $log = 'NUEVO USUARIO CREADO';
                    $message = "Usuario " . $_subject->name . " (" . $_subject->email . ") creado";
                    break;
                case LogConstants::UPDATED_USER_DATA_PASSWORD:
                    $log = 'CONTRASEÑA DE USUARIO ACTUALIZADA';
                    $message = "La contraseña del usuario " . $_subject->name . " (" . $_subject->email . ") ha sido actualizada";
                    break;
                case LogConstants::CREATED_ELECTION:
                    $log = 'PROCESO ELECTORAL CREADO';
                    $message = "Proceso Electoral " . $_subject->name . " creado";
                    break;
                case LogConstants::UPDATED_ELECTION:
                    $log = 'PROCESO ELECTORAL ACTUALIZADO';
                    $message = "Proceso Electoral " . $_subject->name . " actualizado";
                    break;
                case LogConstants::UPDATED_STATUS_ELECTION:
                    $log = 'ESTADO PROCESO ELECTORAL ACTUALIZADO';
                    $message = "EL Proceso Electoral ha cambiado su estado a " . strtoupper($_subject->status);
                    break;
                case LogConstants::CREATED_POLITICAL_GROUP:
                    $log = 'PARTIDO POLÍTICO CREADO';
                    $message = "Partido Político " . $_subject->name . " creado";
                    break;
                case LogConstants::UPDATED_POLITICAL_GROUP:
                    $log = 'PARTIDO POLÍTICO ACTUALIZADO';
                    $message = "Partido Político " . $_subject->name . " actualizado";
                    break;
                case LogConstants::REGISTERED_POLITICAL_GROUP:
                    $log = 'PARTIDO POLÍTICO REGISTRADO';
                    $message = "El Partido Político " . $_subject->politicalGroup->name . " ha sido registrado en el Proceso Electoral " . $_subject->election->name;
                    break;
                case LogConstants::CREATED_ACCREDITATION:
                    $log = 'NUEVA ACREDITACIÓN CREADA';
                    $message = "La Acreditación " . $_subject->code . " ha sido creada";
                    break;
                case LogConstants::UPDATED_ACCREDITATION:
                    $log = 'ACREDITACIÓN ACTUALIZADA';
                    $message = "La Acreditación " . $_subject->code . " ha sido actualizada";
                    break;
                case LogConstants::SUBMITTED_ACCREDITATION:
                    $log = 'ACREDITACIÓN ENVIADA';
                    $message = "La Acreditación " . $_subject->code . " ha sido enviada";
                    break;
                case LogConstants::STATUS_UPDATED_ACCREDITATION:
                    $log = 'ESTADO DE ACREDITACIÓN ACTUALIZADO';
                    $message = "El estado de la Acreditación " . $_subject->code . " ha sido actualizado a " . strtoupper($_subject->status);
                    break;
                case LogConstants::CREATED_MONITORING:
                    $log = 'NUEVO REGISTRO DE MONITOREO';
                    $message = "Nuevo registro de Monitoreo " . $_subject->code . " creado";
                    break;
                case LogConstants::UPDATED_MONITORING:
                    $log = 'REGISTRO DE MONITOREO ACTUALIZADO';
                    $message = "El registro de Monitoreo " . $_subject->code . " ha sido actualizado";
                    break;

                case LogConstants::ENABLED_USER_MEDIA_ACCOUNT:
                    $log = 'CUENTA HABILITADA';
                    $message = "La cuenta de usuario (Medio de Comunicación) para " . $_subject->email . " ha sido habilitada";
                    break;
                case LogConstants::ENABLED_USER_POLITICAL_ACCOUNT:
                    $log = 'CUENTA HABILITADA';
                    $message = "La cuenta de usuario (Partido Político) para " . $_subject->email . " ha sido habilitada";
                    break;
                case LogConstants::SUBMIT_MONITORING_TO_REPORT:
                    $log = 'MONITOREO ENVIADO';
                    $message = "Reporte de monitoreo creado y enviado. Documento: " . $_subject->code . "";
                    break;
                case LogConstants::CREATE_ANALYSIS_REPORT:
                    $log = 'INFORME ANÁLISIS CREADO';
                    $message = "Informe de análisis de monitoreo creado. Documento: " . $_subject->code . "";
                    break;
                case LogConstants::SUBMIT_ANALYSIS_TO_SECRETARIAT:
                    $log = 'INFORME ANÁLISIS ENVIADO A SECRETARÍA';
                    $message = "Informe de análisis de monitoreo enviado a Secretaría de Cámara. Documento: " . $_subject->code . "";
                    break;
                case LogConstants::SUBMIT_ANALYSIS_TO_PLENARY:
                    $log = 'INFORME ANÁLISIS ENVIADO A SALA PLENA';
                    $message = "Informe de análisis de monitoreo enviado a Sala Plena. Documento: " . $_subject->code . "";
                    break;
                default:
                    throw new NotFoundException('Activity Log Type Not Found');
                    break;
            }

            $data = [];
            if (empty($_data) && $log_data) {
                $data = $_subject->toArray();
            }

            $causer = null;
            if ($is_logged) {
                $causer = app(GetAuthenticatedUserTask::class)->run();
            }

            activity($log)
                ->causedBy($causer)
                ->tap(function (Activity $activity) use ($_request) {
                    $activity->user_agent = $_request['HTTP_USER_AGENT'];
                    $activity->ip_address = $_request['REMOTE_ADDR'];
                })
                ->performedOn($_subject)
                ->withProperties($data)
                ->log($message);

            $lastActivity = Activity::all()->last();

            return  $lastActivity;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }

    }
}
