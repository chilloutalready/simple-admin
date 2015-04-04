<?php namespace Chilloutalready\SimpleAdmin\Providers;

use Illuminate\Support\ServiceProvider;

class SimpleAdminProvider extends ServiceProvider {

    const PACKAGE_NAME = 'chilloutalready/simple-admin';
    const PACKAGE_NAME_CONFIG = 'simple-admin';

    /**
     * @var array
     */
    protected $commads = [
        'InstallCommand'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', self::PACKAGE_NAME);

        $this->publishes([
            __DIR__ . '/../../config/' . self::PACKAGE_NAME_CONFIG . '.php' => config_path(self::PACKAGE_NAME_CONFIG . '.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../../database/migrations/' => base_path('/database/migrations'),
        ], 'migrations');

        include __DIR__ . '/../helpers.php';
        include __DIR__ . '/../routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();

        $this->app->register('\Chilloutalready\SimpleAdmin\Providers\SimpleAdminAuthProvider');
        $this->app->register('Illuminate\Html\HtmlServiceProvider');

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('HTML', 'Illuminate\Html\HtmlFacade');
        $loader->alias('Form', 'Illuminate\Html\FormFacade');
    }

    /**
     *
     */
    protected function registerCommands()
    {
        foreach ($this->commads as $command)
        {
            $this->commands('Chilloutalready\SimpleAdmin\Commands\\' . $command);
        }
    }

}
