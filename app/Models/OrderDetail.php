<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\list_image;

class OrderDetail extends Model
{
    protected $tabel = 'order_details';

    protected $fillable = [
    	'product_id', 
        'order_id', 
        'total', 
        'price',
        'options_id',
    ];

    public function scopeSearch($query, $id)
    {
    	if (empty($id)) {

			return $query;
		} else {
            
			return $query->where('order_id', '=', $id);
		}
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id','id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function list_image()
    {
        return $this->belongsTo('App\Models\list_image', 'options_id', 'id');
    }
}
