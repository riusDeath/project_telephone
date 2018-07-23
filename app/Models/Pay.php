<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $tabel = 'pays';

    protected $fillable = [
    	'name', 'description',
    ];

    public function order()
    {
    	return $this->hasMany('App\Models\Order', 'pay_id', 'id');
    }
}
