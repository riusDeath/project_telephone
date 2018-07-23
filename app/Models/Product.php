<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Rate;
use DB;
class Product extends Model
{
    protected $tabel = 'products';

    protected $fillable = [
    	'name', 'price', 'price_sale',
        'status', 'description', 'image', 'total', 'hot', 'view', 'avg_rate', 'category_id', 'brand_id', 'warranty_period_id',
    ];

    public function scopeSearch($query){
       if (empty(request()->search)) {
			return $query;
		} else {
            return $query->where('name', 'like', '%'.request()->search.'%')->orWhere('id', request()->search);                            
		}
    }

    public function scopeProductCategory($query , $category_id)
    {
        return $query->where('category_id', $category_id);
    }

    public function scopeProductBrand($query, $brand_id)
    {
        return $query->where('brand_id', $brand_id);
    }

    public function scopeProductPrice($query)
    {       
        return $query->whereBetween('price', [request()->value_min, request()->value_max] );
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'product_id', 'id');
    }

    public function rate()
    {
        return $this->hasMany('App\Models\Rate', 'product_id', 'id');
    }

    public function rate_avg(){
        $t = 0;
        $avg = 0;
        if ($this->rate) {
            $n = $this->rate->count();
           foreach ($this->rate as $r) {
               $t = $t + $r->rate;
           }
        }

        $avg = $t/$n;
        return $avg;
    }

    public function rate_avg1(){
        $rate = DB::table('rates')
        ->select(DB::raw("AVG(rate) as 'avg'"))
        ->where('product_id',$this->id)
        ->get();
        return $rate[0]->avg;
    }

    public static function bestSelling()
    {
        $products = DB::table('products')
            ->select()
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->groupBy('order_details.product_id')
            ->having(count('product_id'),'>=',
                DB::table('order_details')
                ->select(count('product_id'))
                ->groupBy('product_id')
            );
        return $products;
    }

    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'product_id', 'id');
    }

    public function attribute()
    {
        return $this->belongsToMany('App\Models\Attribute', 'product_atts', 'product_id', 'attribute_id')->withPivot('id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
    }

    public function warranty_period()
    {
        return $this->belongsTo('App\Models\warranty_period', 'warranty_period_id', 'id');
    } 
    
}
