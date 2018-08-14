<?php

namespace App\Models\Observers;

use App\Models\Pay;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class PayObserver 
{
    public function created(Pay $Pay)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'targetable_id' => $Pay->id,
            'targetable_type' => 'Pay',
        ]);
    }

    public function updated(Pay $Pay)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'targetable_id' => $Pay->id,
            'targetable_type' => 'Pay',
        ]);
    }
}
