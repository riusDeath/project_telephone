<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable =[
    	'user_id' ,
    	'targetable_id',
    	'targetable_type',
    	'action',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function targetable()
    {
    	return $this->morphTo();
    }
}
