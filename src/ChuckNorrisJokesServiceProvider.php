<?php

namespace Kevinb1989\ChuckNorrisJokes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Kevinb1989\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use Kevinb1989\ChuckNorrisJokes\Http\Controllers\ChuckNorrisController;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chuck-norris');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/chuck-norris'),
        ]);

        if (!class_exists('CreateJokesTable')) {
            $this->publishes([
                __DIR__ . '../database/create_jokes_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_jokes_table.php'),
            ]);
        }

        Route::get('chuck-norris', ChuckNorrisController::class);
    }

    public function register()
    {
        $this->app->bind('chuck-norris', function () {
            return new JokeFactory();
        });
    }
}
