<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $tabel = 'brands';

    protected $fillable = [
    	'name', 'adress', 'description', 'status',
    ];

    public function product()
    {
    	return $this->hasMany('App\Models\Product', 'brand_id','id');
    }

}
