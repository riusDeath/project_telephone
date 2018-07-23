<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
     protected $tabel = 'locations';

    protected $fillable = [
    	'county', 'adress', 'pro_id',
    ];

    public function province()
    {
    	return $this->belongsTo('App\Models\Province', 'pro_id', 'id');
    }
}
