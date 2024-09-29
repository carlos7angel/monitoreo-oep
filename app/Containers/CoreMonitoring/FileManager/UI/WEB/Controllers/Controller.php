<?php

namespace App\Containers\CoreMonitoring\FileManager\UI\WEB\Controllers;

use App\Containers\CoreMonitoring\FileManager\Actions\CreateFileManagerAction;
use App\Containers\CoreMonitoring\FileManager\Actions\DeleteFileManagerAction;
use App\Containers\CoreMonitoring\FileManager\Actions\FindFileManagerByIdAction;
use App\Containers\CoreMonitoring\FileManager\Actions\ListFileManagersAction;
use App\Containers\CoreMonitoring\FileManager\Actions\UpdateFileManagerAction;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\CreateFileManagerRequest;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\DeleteFileManagerRequest;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\EditFileManagerRequest;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\FindFileManagerByIdRequest;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\ListFileManagersRequest;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\StoreFileManagerRequest;
use App\Containers\CoreMonitoring\FileManager\UI\WEB\Requests\UpdateFileManagerRequest;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index(ListFileManagersRequest $request)
    {
        $filemanagers = app(ListFileManagersAction::class)->run($request);
        // ...
    }

    public function show(FindFileManagerByIdRequest $request)
    {
        $filemanager = app(FindFileManagerByIdAction::class)->run($request);
        // ...
    }

    public function create(CreateFileManagerRequest $request)
    {
    }

    public function store(StoreFileManagerRequest $request)
    {
        $filemanager = app(CreateFileManagerAction::class)->run($request);
        // ...
    }

    public function edit(EditFileManagerRequest $request)
    {
        $filemanager = app(FindFileManagerByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateFileManagerRequest $request)
    {
        $filemanager = app(UpdateFileManagerAction::class)->run($request);
        // ...
    }

    public function destroy(DeleteFileManagerRequest $request)
    {
        $result = app(DeleteFileManagerAction::class)->run($request);
        // ...
    }
}
