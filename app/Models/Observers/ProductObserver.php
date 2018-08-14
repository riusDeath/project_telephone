<?php

namespace App\Models\Observers;


use App\Models\Product;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class ProductObserver 
{
    public function created(Product $product)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'targetable_id' => $product->id,
            'targetable_type' => 'product',
        ]);
    }

    public function updated(Product $product)
    {
        if (Auth::check()) {
            if (Auth::user()->grade != 'customer') {
                Log::create([
                    'user_id' => Auth::id(),
                    'action' => 'updated',
                    'targetable_id' => $product->id,
                    'targetable_type' => 'product',
                ]);
            }
        }
    }

}
