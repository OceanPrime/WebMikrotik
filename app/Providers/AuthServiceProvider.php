<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Services\MikrotikAuthGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->app['auth']->extend('mikrotik', function ($app, $name, array $config) {
            return new MikrotikAuthGuard();
        });
        //
    }
}
