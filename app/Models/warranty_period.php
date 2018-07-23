<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class warranty_period extends Model
{
    protected $tabel = 'warranty_periods';

    protected $fillable = [
    	'time', 'status', 'type',
    ];

    public function product()
    {
    	return $this->hasMany('App\Models\Product', 'warranty_period_id', 'id');
    }
}
