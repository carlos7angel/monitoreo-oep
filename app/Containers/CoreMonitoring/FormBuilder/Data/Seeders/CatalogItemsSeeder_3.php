<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder as ParentSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class CatalogItemsSeeder_3 extends ParentSeeder
{
    public function run(): void
    {
        Model::unguard();

        $filePath = database_path('SQL/catalog_items.sql');

        if(File::exists($filePath)){
            DB::unprepared(file_get_contents($filePath));
            $this->command->info('Catalog Items Table Seed');
        }

    }
}
