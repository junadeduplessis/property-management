<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\OrderRepository;
use App\Repositories\ContactRepository;
use App\Repositories\ContactIndexRepository;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\ContactRepositoryInterface;
use App\Interfaces\ContactIndexRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ContactIndexRepositoryInterface::class, ContactIndexRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
