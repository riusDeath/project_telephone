<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Sale;
use App\Models\code_discount;
use App\Models\Ship;
use App\Models\Pay;
use App\Models\Observers\ProductObserver;
use App\Models\Observers\CategoryObserver;
use App\Models\Observers\UserObserver;
use App\Models\Observers\SaleObserver;
use App\Models\Observers\code_discountObserver;
use App\Models\Observers\ShipObserver;
use App\Models\Observers\PayObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        Schema::defaultStringLength(191);
        
        if (Auth::check()) {
            view()->share('user_login',Auth::user());
        }
        
        Product::observe(new ProductObserver);
        Category::observe(new CategoryObserver);
        User::observe(new UserObserver);
        Sale::observe(new SaleObserver);
        code_discount::observe(new code_discountObserver);
        Ship::observe(new ShipObserver);
        Pay::observe(new PayObserver);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
