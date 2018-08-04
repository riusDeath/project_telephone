<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class list_image extends Model
{
    protected $table = "list_images";

    protected $fillable = [
    	'product_id' , 
    	'image', 
    	'total' , 
    	'color'
    ];

    public function products()
    {
    	return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function order_details()
    {
        return $this->hasMany('App\Models\OrderDetail', 'options_id', 'id');
    }
}
