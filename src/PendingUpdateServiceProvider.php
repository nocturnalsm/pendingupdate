<?php

namespace NocturnalSm\PendingUpdate;

use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class PendingUpdateServiceProvider extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {
        $this->publishes([
            __DIR__.'/../migrations/create_updates_table.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');
    }

    public function register()
    {

    }


    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_create_updates_table.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_updates_table.php")
            ->first();
    }
}
