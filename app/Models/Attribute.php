<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $tabel = 'attributes';

    protected $fillable = [
    	'name', 'value', 'types',
    ];

    public function product()
    {
        return $this->belongsToMany('App\Models\Product');
    }    
    
}
