<?php
declare(strict_types=1);

namespace Viezel\Dock;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class DockServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
            $this->configurePublishing();
        }
    }

    protected function registerCommands()
    {
        Artisan::command('dock:install', function () {
            copy(__DIR__.'/../stubs/docker-compose.yml', base_path('docker-compose.yml'));

            $environment = file_get_contents(base_path('.env'));
            $environment = str_replace('DB_HOST=127.0.0.1', 'DB_HOST=mysql', $environment);
            $environment = str_replace('DB_USERNAME=root', 'DB_USERNAME=dock', $environment);
            $environment = str_replace('DB_PASSWORD=', 'DB_PASSWORD=secret', $environment);
            $environment = str_replace('REDIS_HOST=127.0.0.1', 'REDIS_HOST=redis', $environment);
            $environment = str_replace('QUEUE_CONNECTION=sync', 'QUEUE_CONNECTION=redis', $environment);
            $environment = str_replace('CACHE_DRIVER=file', 'CACHE_DRIVER=redis', $environment);

            file_put_contents(base_path('.env'), $environment);
        })->purpose('Install Docker Compose');

        Artisan::command('dock:publish', function () {
            $this->call('vendor:publish', ['--tag' => 'dock']);

            file_put_contents(base_path('docker-compose.yml'), str_replace(
                './vendor/viezel/dock/runtimes/8.0',
                './docker/8.0',
                file_get_contents(base_path('docker-compose.yml'))
            ));
        })->purpose('Publish the Docker files for customization');
    }

    protected function configurePublishing()
    {
        $this->publishes([
            __DIR__.'/../runtimes' => base_path('docker'),
        ], 'dock');
    }

    public function provides()
    {
        return [
            'dock.install-command',
            'dock.publish-command',
        ];
    }
}
