<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $namespaceAdmin = 'App\Http\Controllers\admin';
    protected $namespaceRumahSakit = 'App\Http\Controllers\rumahsakit';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        // membuat custom route untuk halaman admin (sparate route file, have both route file)
        $this->mapAdminRoutes();

        $this->mapRumahsakitRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
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
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    // mendefinisikan fungsi mapAdminRoutes
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            // ->namespace($this->namespaceAdmin)
            ->namespace($this->namespace.'\admin')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapRumahsakitRoutes()
    {
        Route::middleware('web')
            // ->namespace($this->namespaceAdmin)
            ->namespace($this->namespace) //untuk mendefinisikan folder controllernya
            ->group(base_path('routes/rumahsakit.php')); //untuk mendefinisikan folder routenya
    }
}
