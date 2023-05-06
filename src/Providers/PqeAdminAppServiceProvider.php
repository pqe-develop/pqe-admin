<?php

namespace Pqe\Admin\Providers;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Pqe\Admin\Middleware\AuthGates;
use Pqe\Admin\Middleware\CheckForMaintenanceMode;
use Pqe\Admin\Middleware\ExtendSession;
use Pqe\Admin\Middleware\LogRouteMiddleware;
use Pqe\Admin\Middleware\SetLocale;
use Pqe\Admin\Utils\MySqlGrammar;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class PqeAdminAppServiceProvider extends ServiceProvider {
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Pqe\Admin\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(Kernel $kernel) {
        // Load from package routes/views/middleware
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'pqeAdmin');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'pqeAdmin');
        
        // Add middlewares
        $kernel->pushMiddleware(CheckForMaintenanceMode::class);
        $kernel->pushMiddleware(LogRouteMiddleware::class);

        // Add it before all other middlewares
        $kernel->prependMiddlewareToGroup('web', ExtendSession::class);
        
        // Add it after all other middlewares
        $kernel->appendMiddlewareToGroup('web', AuthGates::class);
        $kernel->appendMiddlewareToGroup('web', SetLocale::class);

        // AppServiceProvider
        // Collection Paginate
        if (!Collection::hasMacro('paginate')) {

            Collection::macro('paginate',
                    function ($perPage = 15, $page = null, $options = []) {
                        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                        return (new LengthAwarePaginator($this->forPage($page, $perPage), $this->count(), $perPage,
                                $page, $options))->withPath('');
                    });
        }
        
        /*
         * Error: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
         * Do we need this change ???? 
         */
//         Schema::defaultStringLength(191);

        /*
         * MySqlGrammar extension as indicated in https://carbon.nesbot.com/laravel/
         */
        DB::connection()->setQueryGrammar(new MySqlGrammar);
        
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%' . $string. '%') : $this;
        });
            
    }

//     protected function registerRoutes() {
//         Route::group($this->routeConfiguration(), function () {
//             $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
//         });
//     }

//     protected function routeConfiguration() {
//         return [
//             'prefix' => '',
//             'middleware' => ['auth'],
//         ];
//     }
}
