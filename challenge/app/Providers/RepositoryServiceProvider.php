<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    MovementRepositoryInterface,
    PersonalRecordRepositoryInterface
};
use App\Repositories\{
    MovementRepository,
    PersonalRecordRepository
};

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
        $this->app->bind(
            MovementRepositoryInterface::class,
            MovementRepository::class
        );

        $this->app->bind(
            PersonalRecordRepositoryInterface::class,
            PersonalRecordRepository::class
        );
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
