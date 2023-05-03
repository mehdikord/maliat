<?php

namespace App\Providers;

use App\Interfaces\Auth\AuthInterface;
use App\Interfaces\Profile\ProfileInterface;
use App\Repository\Auth\AuthRepository;
use App\Repository\Profile\ProfileRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class,AuthRepository::class);
        $this->app->bind(ProfileInterface::class,ProfileRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
