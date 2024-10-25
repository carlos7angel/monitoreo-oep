<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder as ParentSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class FormFieldsSeeder_1 extends ParentSeeder
{
    public function run(): void
    {
        Model::unguard();

        $filePath = database_path('SQL/fieldTypes.sql');

        if(File::exists($filePath)){
            DB::unprepared(file_get_contents($filePath));
            $this->command->info('Field Types Table Seed');
        }

    }
}
