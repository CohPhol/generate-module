<?php

namespace Root\GenerateModule;

use Illuminate\Support\ServiceProvider;
use Root\GenerateModule\Console\Commands\GenerateModuleCommand;


class GenerateModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([GenerateModuleCommand::class]);
        }
    }
}
