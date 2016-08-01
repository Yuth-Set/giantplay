<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;
use Schema;

// use View;

class ViewComposerServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        $this->composeNavigation();
        if (Schema::hasTable('tags')) {
            view()->share('tags', \App\Tag::all());
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    private function composeNavigation() {
        view()->composer('partials.nav', function ($view) {
            $view->with('latest', Article::latest()->first());
        });
    }
}
