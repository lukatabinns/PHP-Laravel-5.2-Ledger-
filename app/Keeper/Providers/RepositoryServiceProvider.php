<?php

namespace App\Keeper\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Keeper\Repositories\CategoryRepositoryInterface',
            'App\Keeper\Repositories\Eloquent\CategoryRepository'
        );

        $this->app->bind(
            'App\Keeper\Repositories\PayeeRepositoryInterface',
            'App\Keeper\Repositories\Eloquent\PayeeRepository'
        );

        $this->app->bind(
            'App\Keeper\Repositories\PayerRepositoryInterface',
            'App\Keeper\Repositories\Eloquent\PayerRepository'
        );

        $this->app->bind(
            'App\Keeper\Repositories\PaymentRepositoryInterface',
            'App\Keeper\Repositories\Eloquent\PaymentRepository'
        );

        $this->app->bind(
            'App\Keeper\Repositories\AccountRepositoryInterface',
            'App\Keeper\Repositories\Eloquent\AccountRepository'
        );

        $this->app->bind(
            'App\Keeper\Repositories\AnimalRepositoryInterface',
            'App\Keeper\Repositories\Eloquent\AnimalRepository'
        );

        $this->app->bind(
            'App\Keeper\Repositories\AnimalTypeRepositoryInterface',
            'App\Keeper\Repositories\Eloquent\AnimalTypeRepository'
        );


        $this->app->bind(
            'App\Keeper\Repositories\AnimalFoodRepositoryInterface',
            'App\Keeper\Repositories\Eloquent\AnimalRepository'
        );

        $this->app->bind(
            'App\Keeper\Repositories\AnimalFoodTypeRepositoryInterface',
            'App\Keeper\Repositories\Eloquent\AnimalFoodTypeRepository'
        );
    }
}