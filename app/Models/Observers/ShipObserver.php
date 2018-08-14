<?php

namespace App\Models\Observers;

use App\Models\Ship;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class ShipObserver 
{
    public function created(Ship $Ship)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'targetable_id' => $Ship->id,
            'targetable_type' => 'Ship',
        ]);
   	}

    public function updated(Ship $Ship)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'targetable_id' => $Ship->id,
            'targetable_type' => 'Ship',
        ]);
   	}
}
