<?php

namespace risul\LaravelLikeComment;

use Illuminate\Support\ServiceProvider;

class LikeCommentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/laravelLikeComment'),
            __DIR__.'/migrations' => database_path('migrations'),
            __DIR__.'/public/assets' => public_path('vendor/laravelLikeComment'),
            __DIR__.'/config/laravelLikeComment.php' => config_path('laravelLikeComment.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Route
        include __DIR__.'/routes.php';

        $this->app->singleton('LaravelLikeComment', function ($app) { return new LaravelLikeComment; });

        // Config
        $this->mergeConfigFrom( __DIR__.'/config/laravelLikeComment.php', 'laravelLikeComment');

        // View
        $this->loadViewsFrom(__DIR__.'/views', 'laravelLikeComment');
    }
}
