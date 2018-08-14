<?php

namespace App\Models\Observers;

use App\Models\Category;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class CategoryObserver
{
    public function created(Category $Category)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'targetable_id' => $Category->id,
            'targetable_type' => 'Category',
        ]);
    }

    public function updated(Category $Category)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'targetable_id' => $Category->id,
            'targetable_type' => 'Category',
        ]);
   	}  	
}
