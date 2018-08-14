<?php

namespace App\Models\Observers;

use App\Models\Sale;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;


class SaleObserver 
{
    public function created(Sale $Sale)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'targetable_id' => $Sale->id,
            'targetable_type' => 'Sale',
        ]);
    }

   public function updated(Sale $Sale)
   {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'targetable_id' => $Sale->id,
            'targetable_type' => 'Sale',
        ]);
   	}
}
