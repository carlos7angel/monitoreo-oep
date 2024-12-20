<?php

namespace App\Containers\CoreMonitoring\FileManager\Tasks;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Str;

class CreateLogoImagePoliticalGroupTask extends ParentTask
{
    public function __construct()
    {
    }

    /**
     * @throws NotFoundException
     * @throws CreateResourceFailedException
     */
    public function run($file, $name): mixed
    {
        $type = 'local';

        $sanitize_name = Str::slug($name);
        $unique_code = hash("sha512", Carbon::now()->timestamp . $sanitize_name .  $file->getSize() . $file->getMimeType() . Str::random(24)); //NOSONAR
        $new_name = strtoupper(substr($unique_code, 0, 5)) . '__' . $sanitize_name . '.' . $file->getClientOriginalExtension(); //NOSONAR

        try {
            $path = '/partidos-politicos/logos';
            $upload = Storage::disk('local-uploads')->putFileAs($path, $file, $new_name);
            $hash_file = hash_file('md5', Storage::disk('local-uploads')->getConfig()['root'] . '/' . $upload); //NOSONAR
            $relative_path = $path . '/' . $new_name;
            $url = url('/') . '/storage' . $relative_path;
        } catch (Exception $exception) {
            throw new CreateResourceFailedException('No se puede subir el archivo.');
        }

        if (! $upload) {
            throw new CreateResourceFailedException('No se puede subir el archivo.');
        }

        return $relative_path;
    }
}
