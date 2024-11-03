<?php

namespace App\Containers\AppSection\ActivityLog\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use Spatie\Activitylog\ActivitylogServiceProvider;

/**
 * The Main Service Provider of this container.
 * It will be automatically registered by the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    public array $serviceProviders = [
        ActivitylogServiceProvider::class
    ];

    public array $aliases = [

    ];

    public function register(): void
    {
        parent::register();
    }
}
