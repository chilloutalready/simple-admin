<?php namespace Chilloutalready\SimpleAdmin\Providers;

use Chilloutalready\SimpleAdmin\Auth\AdminAuthManager;
use Chilloutalready\SimpleAdmin\Auth\Middleware\AuthenticateAdmin;
use Illuminate\Support\ServiceProvider;

class SimpleAdminAuthProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAuthenticator();

        $this->registerMiddleware();

        $this->registerResolver();
    }

    public function registerAuthenticator()
    {
        //setup the admin auth manager
        $this->app->singleton('SimpleAdminAuth', function ($app) {
            // Once the authentication service has actually been requested by the developer
            // we will set a variable in the application indicating such. This helps us
            // know that we need to set any queued cookies in the after event later.
            $app['simpleadmin.auth.loaded'] = true;
            return new AdminAuthManager($app);

        });
        $this->app->singleton('SimpleAdminAuthDriver', function ($app) {
            return $app['SimpleAdminAuth']->driver();
        });
        $this->app->bind('Chilloutalready\SimpleAdmin\Auth\Guard', 'SimpleAdminAuthDriver', true);
    }

    public function registerMiddleware()
    {
        //setup the admin auth middleware using the driver
        $this->app->bindShared('simpleadmin.authenticated', function($app)
        {
            return new AuthenticateAdmin($app['SimpleAdminAuthDriver']);
        });
    }

    public function registerResolver(){
//        $this->app->when('Chilloutalready\SimpleAdmin\Http\Controllers\Auth\AdminAuthController')
//            ->needs('Illuminate\Contracts\Auth\Guard')
//            ->give('SimpleAdminAuthDriver');
    }

}
