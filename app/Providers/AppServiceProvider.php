<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\IAdminRepository;
use App\Repositories\AdminRepository;

use App\Repositories\IProductRepository;
use App\Repositories\ProductRepository;

use App\Repositories\ISanphamRepository;
use App\Repositories\SanphamRepository;

use App\Repositories\IDanhmucRepository;
use App\Repositories\DanhmucRepository;

use App\Repositories\IOrderRepository;
use App\Repositories\OrderRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(IProductRepository::class, ProductRepository::class);
       $this->app->bind(ISanphamRepository::class, SanphamRepository::class);
       $this->app->bind(IDanhmucRepository::class, DanhmucRepository::class);
       $this->app->bind(IAdminRepository::class, AdminRepository::class);
       $this->app->bind(IOrderRepository::class, OrderRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
