<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class code_discount extends Model
{
    protected $table = 'code_discounts';

    protected $fillable = [
    	'code',
    	'sale',
    	'status',
    	'date_create',
    	'date_end',
    	'mail',
    ];

    public function scopeSearch($query)
    {
    	if (empty(request()->search)) {
			return $query;
		} else {
            return $query->where('mail', 'like', '%'.request()->search.'%')->orWhere('id', request()->search);
        }
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'mail', 'mail');
    }

    public function order()
    {
        return $this->hasOne('App\Models\Order', 'id', 'code_id');
    }
}
