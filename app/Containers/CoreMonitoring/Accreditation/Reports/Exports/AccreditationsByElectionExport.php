<?php

namespace App\Containers\CoreMonitoring\Accreditation\Reports\Exports;

use App\Containers\CoreMonitoring\Accreditation\Tasks\ListAllAccreditationsByElectionTask;
use App\Containers\CoreMonitoring\UserProfile\Tasks\ConvertJsonDataToProfileDataTask;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;

Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});

class AccreditationsByElectionExport implements FromCollection, WithTitle, WithEvents, ShouldAutoSize, WithHeadings
{
    use Exportable;

    protected $election_id;

    public function __construct(int $election_id)
    {
        $this->election_id = $election_id;
    }

    public function collection()
    {
        $accreditations = app(ListAllAccreditationsByElectionTask::class)->run($this->election_id);
        $result = new Collection();
        foreach ($accreditations as $key => $accreditation) {

            $profile = app(ConvertJsonDataToProfileDataTask::class)->run($accreditation->data);

            $status = '-';
            switch($accreditation->status) {
                case('new'):
                    $status = 'Nuevo';
                    break;
                case('observed'):
                    $status = 'Observado';
                    break;
                case('accredited'):
                    $status = 'Acreditado';
                    break;
                case('archived'):
                    $status = 'Archivado';
                    break;
                case('rejected'):
                    $status = 'Rechazado';
                    break;
            }

            $rrss = $profile->rrss ? json_decode($profile->rrss) : [];
            $social_networks = [];
            foreach ($rrss as $social) {
                $social_networks[] = $social->rrss_value;
            }

            $media_types = [];
            if ($profile->media_type_television) { $media_types[] = 'Televisión'; }
            if ($profile->media_type_radio) { $media_types[] = 'Radio'; }
            if ($profile->media_type_print) { $media_types[] = 'Prensa'; }
            if ($profile->media_type_digital) { $media_types[] = 'Digital'; }

            $item = [];
            $item['id'] = $key + 1;
            $item['code'] = $accreditation->code ?? '';
            $item['media_name'] = $profile->name ?? '';
            $item['business_name'] = $profile->business_name ?? '';
            $item['nit'] = $profile->nit ?? '';
            $item['rep_name'] = $profile->rep_full_name ?? '';
            $item['rep_document'] = $profile->rep_document ?? '';
            $item['media_type'] = $media_types ? implode(', ', $media_types) : '';
            $item['legal_address'] = $profile->legal_address ?? '';
            $item['cellphone'] = $profile->cellphone ?? '';
            $item['website'] = $profile->website ?? '';
            $item['rrss'] = $social_networks ? implode(', ', $social_networks) : '';
            $item['status'] = $status ?? '';
            $item['observations'] =  $accreditation->observations ?? '';
            $item['registered_at'] =  $accreditation->submitted_at ?? '';
            $item['accredited_at'] =  $accreditation->accredited_at ?? '';
            $result->add($item);
        }

        return $result;
    }

    public function headings(): array
    {
        return [
            'NRO',
            'DOCUMENTO',
            'MEDIO DE COMUNICACIÓN',
            'RAZÓN SOCIAL',
            'NIT',
            'REPRESENTANTE LEGAL',
            'DOCUMENTO REPRESENTANTE',
            'TIPO DE MEDIO',
            'DOMICILIO LEGAL',
            'CELULAR',
            'PÁGINA WEB',
            'REDES SOCIALES',
            'ESTADO',
            'OBSERVACIONES/COMENTARIOS',
            'FECHA DE REGISTRO',
            'FECHA DE ACREDITACIÓN'
        ];
    }

    public function title(): string
    {
        return 'Acreditaciones';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->styleCells(
                    'A1:AZ1',
                    [
                        'font' =>[
                            'bold'=>true,
                            'align' => 'center'
                        ],
                    ]
                );
            },
        ];
    }

}