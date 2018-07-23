<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
     protected $tabel = 'provinces';

    protected $fillable = [
    	'county', 'adress', 'pro_id',
    ];

    public function location()
    {
    	return $this->hasMany('App\Models\Location', 'pro_id', 'id');
    }
}
