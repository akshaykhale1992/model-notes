<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelNoteProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrations();
    }

    public function loadMigrations()
    {
         $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}
