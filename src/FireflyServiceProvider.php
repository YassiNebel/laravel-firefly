<?php

namespace Bitporch\Firefly;

use Bitporch\Firefly\Console\InstallCommand;
use Bitporch\Firefly\Models\Discussion;
use Bitporch\Firefly\Models\Group;
use Bitporch\Firefly\Models\Post;
use Bitporch\Firefly\Observers\DiscussionObserver;
use Bitporch\Firefly\Observers\PostObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FireflyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }

        $this->loadTranslationsFrom(__DIR__.'/../resources/translations', 'firefly');

        $this->publishes([
            __DIR__.'/../config/firefly.php' => config_path('firefly.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/firefly'),
        ], 'firefly');

        $this->registerRouteBindings();
        $this->registerPackageNamespaces();
        $this->registerModelObservers();
        $this->registerBladeDirectives();

        View::composer('*', 'Bitporch\Firefly\ViewComposers\GroupComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register route bindings for models. We don't need to do this since we're following
     * the conventions by which route model bindings will happen automatically,
     * but this makes it obvious that the package relies on it.
     *
     * @return void
     */
    public function registerRouteBindings()
    {
        Route::model('discussion', Discussion::class);
        Route::model('group', Group::class);
        Route::model('post', Post::class);
    }

    /**
     * Define the application migrations, routes and views.
     *
     * @return void
     */
    public function registerPackageNamespaces()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if (config('firefly.api.enabled')) {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        }

        if (config('firefly.web.enabled')) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'firefly');
    }

    /**
     * Register the model observers.
     *
     * @return void
     */
    public function registerModelObservers()
    {
        Discussion::observe(DiscussionObserver::class);
        Post::observe(PostObserver::class);
    }

    /**
     * @return void
     */
    public function registerBladeDirectives()
    {
        Blade::directive('error', function ($type) {
            return '<?php
                if($errors->has('.$type.')) {
                    echo "<span class=\"help-block\">
                        <strong>{$errors->first('.$type.')}</strong>
                    </span>";
                }
                ?>
            ';
        });
    }
}
