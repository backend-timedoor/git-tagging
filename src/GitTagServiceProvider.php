<?php

namespace Timedoor\TmdGitTag;

use Illuminate\Support\ServiceProvider;

class GitTagServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Merge config file
        $this->mergeConfigFrom(
            __DIR__ . '/../config/tmd-git-tag.php', 'tmd-git-tag'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //only publish when using CLI
        if ( $this->app->runningInConsole() ) {
            $this->bootForConsole();
        }
    }

    /**
     * booting when command on CLI only
     *
     * @return void
     */
    protected function bootForConsole()
    {
        $this->publishes([
            __DIR__ . '/../config/tmd-git-tag.php'  => config_path('tmd-git-tag.php')
        ], 'git-tag');
    }
}
