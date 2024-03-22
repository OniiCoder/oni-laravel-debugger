<?php

namespace OniiCoder\OniDebugger;

use Illuminate\Support\ServiceProvider;
use OniiCoder\OniDebugger\Commands\OniCommand;
use Illuminate\Support\Facades\Log;

class OniLaravelDebuggerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                OniCommand::class,
            ]);
        }
    }

    public function register()
    {
        $debugLogPath = storage_path('logs/debug.log');

        if(!file_exists($debugLogPath)) {
            touch($debugLogPath);
            Log::info('debug.log file created. All set!');
        }
    }
}