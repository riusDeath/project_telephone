<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $tabel = 'logs';

    protected $fillable = [
    	'user_id', 'action', 'object'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function scopeSearch($query)
    {
		if (empty(request()->search)) {
			return $query;
		} else {
            return $query->where('object', 'like', '%'.request()->search.'%')->orWhere('user_id', request()->search);                            
		}
    }

}
