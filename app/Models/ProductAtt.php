<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAtt extends Model
{
    protected $tabel = 'product_atts';

    protected $fillable = [
    	'attribute_id',  'product_id', 
    ];
}
