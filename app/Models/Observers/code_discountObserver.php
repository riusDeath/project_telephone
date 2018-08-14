<?php

namespace App\Models\Observers;

use App\Models\code_discount;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class code_discountObserver 
{
    public function created(code_discount $code_discount)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'targetable_id' => $code_discount->id,
            'targetable_type' => 'code_discount',
        ]);
    }

    public function updated(code_discount $code_discount)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'targetable_id' => $code_discount->id,
            'targetable_type' => 'code_discount',
        ]);
    }
}
