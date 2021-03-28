<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider
 *
 * @package App\Providers
 */
class RouteServiceProvider extends ServiceProvider {
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot () {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map () {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapWebhookRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes () {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes () {
        $namespace = sprintf('%s\API', $this->namespace);

        Route::prefix('api')
            ->name('API')
            ->middleware('api')
            ->namespace($namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "webhooks" routes for the application
     *
     * These routes are typically stateless
     *
     * @return void
     */
    protected function mapWebhookRoutes () {
        $namespace = sprintf('%s\Webhooks', $this->namespace);

        Route::prefix('webhooks')
            ->name('webhooks.')
            ->namespace($namespace)
            ->group(base_path('routes/webhooks.php'));
    }
}
