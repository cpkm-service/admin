<?php

namespace Cpkm\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Blade;

class AdminServiceProvider extends ServiceProvider
{
    protected $events = [
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->configureRateLimiting();
        // $this->mergeConfigFrom(__DIR__.'/../config/admin.php', 'admin');
        // $this->mergeConfigFrom(__DIR__.'/../config/audit.php', 'audit');
        // $this->mergeConfigFrom(__DIR__.'/../config/authentication-log.php', 'authentication-log');
        // $this->mergeConfigFrom(__DIR__.'/../config/captcha.php', 'captcha');
        // $this->mergeConfigFrom(__DIR__.'/../config/datatables.php', 'datatables');
        // $this->mergeConfigFrom(__DIR__.'/../config/permission.php', 'permission');
        // config(['auth.guards'=>array_merge(config('auth.guards'),config('admin.guards'))]);
        // config(['auth.providers'=>array_merge(config('auth.providers'),config('admin.providers'))]);
        // config(['auth.passwords'=>array_merge(config('auth.passwords'),config('admin.passwords'))]);
        // App::setLocale(config('admin.locale'));
        // App::setFallbackLocale(config('admin.locale'));

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php','admin');
        $this->loadViewsFrom(__DIR__.'/../resources/views/admin', 'admin');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'admin');
        // $this->loadMigrationsFrom(__DIR__ .'/database/migrations');

        // $router = $this->app->make(Router::class);
        // $router->aliasMiddleware('admin.auth', \Oukuyun\Admin\Http\Middleware\Authenticate::class);
        // $router->aliasMiddleware('admin.init', \Oukuyun\Admin\Http\Middleware\Init::class);
        // $router->aliasMiddleware('admin.admin', \Oukuyun\Admin\Http\Middleware\Admin::class);
        // $router->aliasMiddleware('admin.guest', \Oukuyun\Admin\Http\Middleware\RedirectIfAuthenticated::class);
        // $router->aliasMiddleware('admin.lockScreen', \Oukuyun\Admin\Http\Middleware\LockScreenCheck::class);
            
        // $router->pushMiddlewareToGroup('admin',  \App\Http\Middleware\EncryptCookies::class);
        // $router->pushMiddlewareToGroup('admin',  \Illuminate\Session\Middleware\StartSession::class);
        // $router->pushMiddlewareToGroup('admin',  \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class);
        // $router->pushMiddlewareToGroup('admin', \Illuminate\View\Middleware\ShareErrorsFromSession::class);
        // $router->pushMiddlewareToGroup('admin', \Illuminate\Routing\Middleware\SubstituteBindings::class);
        // $router->pushMiddlewareToGroup('admin', \Oukuyun\Admin\Http\Middleware\Init::class);

        // $this->publishes([
        //     __DIR__.'/../resources/views/admin' => resource_path('views/vendor/admin'),
        // ], 'admin-views');

        // $this->publishes([
        //     __DIR__.'/../resources/lang' => resource_path('lang/vendor/admin'),
        // ], 'admin-translations');

        // $this->publishes([
        //     __DIR__.'/../config/admin.php' => config_path('admin.php'),
        // ], 'admin-config');
        
        // $this->publishes([
        //     __DIR__.'/../config/audit.php' => config_path('audit.php'),
        // ], 'admin-config');

        // $this->publishes([
        //     __DIR__.'/../config/captcha.php' => config_path('captcha.php'),
        // ], 'admin-config');

        // $this->publishes([
        //     __DIR__.'/../config/authentication-log.php' => config_path('authentication-log.php'),
        // ], 'admin-config');

        // $this->publishes([
        //     __DIR__.'/../config/datatables.php' => config_path('datatables.php'),
        // ], 'admin-config');

        // $this->publishes([
        //     __DIR__.'/../config/permission.php' => config_path('permission.php'),
        // ], 'admin-config');

        // $this->publishes([
        //     __DIR__.'/../public' => public_path(),
        // ], 'admin-public');

        // $this->publishes([
        //     __DIR__.'/database/migrations' => database_path('migrations'),
        // ], 'admin-migrations');

        
        Blade::componentNamespace('Cpkm\\Admin\\View\\Components\\Backend', 'backend');
        
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
