<?php

namespace App\Models\Observers;

use App\Models\Attribute;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class AttributeObserver 
{
    public function created(Attribute $Attribute)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'targetable_id' => $Attribute->id,
            'targetable_type' => 'Attribute',
        ]);
    }

    public function updated(Attribute $Attribute)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'targetable_id' => $Attribute->id,
            'targetable_type' => 'Attribute',
        ]);
    }
}
