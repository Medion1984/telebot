<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Order;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::directive('money', function ($money) {
            return "<?= number_format($money, 2, '.', ' ')?>";
        });
        View::composer('front.parts.nav-menu', function($view){
            $view->with(['categories' => Category::where('status','!=', null)->orderBy('sort')->get()->toHierarchy()]);
        });
        View::composer('admin.layout', function($view){
            $view->with(['fresh_orders' => Order::getFreshOrders()]);
        });
        View::composer('admin.layout', function($view){
            $view->with(['working_orders' => Order::getWorkingOrders()]);
        });
    }
}
