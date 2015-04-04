<?php namespace Chilloutalready\SimpleAdmin\Commands;

use Config;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Symfony\Component\Console\Input\InputOption;

class InstallCommand extends Command
{
    /**
     * The console command name.
     * @var string
     */
    protected $name = 'simple-admin:install';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Install the simple admin package';

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {
        $this->call('vendor:publish');

        $this->publishDB();
    }

    /**
     *
     */
    protected function publishDB()
    {
        $this->call('migrate');

        $this->call('db:seed', [
            '--class' => 'Chilloutalready\\SimpleAdmin\\Database\\AdministratorsTableSeeder'
        ]);
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [
        ];
    }

}
