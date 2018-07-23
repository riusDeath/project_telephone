<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Log;

class ComposerSeviceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        // view()->composer(['admin.index','admin.product.index',],function($view){
            $orders_day = Order::whereDate('created_at',date('Y-m-d'))->get();
            $orders_status = Order::where('status','<>',2)->get();
            $logs = Log::select('object')->groupBy('object')->get();
            view()->share(compact('orders_day','orders_status'));
        // });
       
        view()->composer('*', function($view){
            if(Auth::check()){
                $user_login = Auth::user();       
            }
            $product_hot = Product::where('hot','1')->get();
            $categories=Category::all();
            $brands = Brand::all(); 
            $parent_categories = Category::parent()->get();          
            $view->with(compact('categories','brands','parent_categories','user_login','product_hot'));
            });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
