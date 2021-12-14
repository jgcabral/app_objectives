<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Repository\IObjective;
use App\Core\Repository\ObjectiveRepository;
use App\Core\Repository\IGoal;
use App\Core\Repository\GoalRepository;
use App\Core\Repository\IActivity;
use App\Core\Repository\ActivityRepository;
use App\Core\Repository\IProgress;
use App\Core\Repository\ProgressRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IObjective::class, ObjectiveRepository::class);
        $this->app->bind(IGoal::class, GoalRepository::class);
        $this->app->bind(IActivity::class, ActivityRepository::class);
        $this->app->bind(IProgress::class, ProgressRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
