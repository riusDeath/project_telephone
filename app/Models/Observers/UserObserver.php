<?php

namespace App\Models\Observers;

use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class UserObserver 
{
    public function created(User $User)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'targetable_id' => $User->id,
            'targetable_type' => 'User',
        ]);
    }

    public function updated(User $User)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'targetable_id' => $User->id,
            'targetable_type' => 'User',
        ]);
    }
}
