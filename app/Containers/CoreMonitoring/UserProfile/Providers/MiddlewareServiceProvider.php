<?php

namespace App\Containers\CoreMonitoring\UserProfile\Providers;

use App\Ship\Parents\Providers\MiddlewareServiceProvider as ParentMiddlewareServiceProvider;

class MiddlewareServiceProvider extends ParentMiddlewareServiceProvider
{
    protected array $middlewares = [];

    protected array $middlewareGroups = [];

    protected array $middlewareAliases = [
    ];

    protected array $middlewarePriority = [];
}
