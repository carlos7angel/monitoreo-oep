<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder as ParentSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class DefaultMediaFormsSeeder_4 extends ParentSeeder
{
    public function run(): void
    {
        Model::unguard();

        $filePath1 = database_path('SQL/forms.sql');
        $filePath2 = database_path('SQL/form_fields_pgsql.sql');

        if (File::exists($filePath1) && File::exists($filePath2)) {
            DB::unprepared(file_get_contents($filePath1));
            $this->command->info('Forms Table Seed');
            DB::unprepared(file_get_contents($filePath2));
            $this->command->info('Form Fields Table Seed');
        }

    }
}
