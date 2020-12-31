<?php

namespace App\Providers;

use App\Repositories\AddressRepository;
use App\Repositories\CityRepository;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\SkillRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\VoluntaryRepositoryInterface;
use App\Repositories\SkillRepository;
use App\Repositories\UserRepository;
use App\Repositories\VoluntaryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(VoluntaryRepositoryInterface::class, VoluntaryRepository::class);
        $this->app->bind(SkillRepositoryInterface::class, SkillRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
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
