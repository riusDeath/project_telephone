<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function __contructor()
    {
        $orders_day = Order::whereDate('created_at', date('Y-m-d'))->get();
        $orders_status = Order::where('status', '<>', 2)->get();
        view()->share(compact('orders_day', 'orders_status'));
    }
	
    public function index()
    {
        $product= Product::all();
        $total_product= count($product);
        $orders = Order::all();
        $total_orders = $orders->count();
		
        return view('admin.index', compact('total_product', 'total_orders'));
    }
	
}
