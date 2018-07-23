<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $tabel = 'ships';

    protected $fillable = [
    	'name', 'description', 'price', 'adress', 'status',
    ];

    public function order()
    {
    	return $this->hasMany('App\Models\Order', 'ship_id', 'id');
    }
}
