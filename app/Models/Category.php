<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $tabel = 'categories';

    protected $fillable = [
    	'name', 'slug', 'parent', 'status',
    ];

 	public function scopeSearch($query){
		if(empty(request()->search)){
			return $query;
		}else{
			return $query->where('name', 'like', '%'.request()->search.'%');
		}
	}

	public function product()
	{
		return $this->hasMany('App\Models\Product', 'category_id', 'id');
	}

    public function product_parent()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'parent');
    }
   
    public function scopeParent()
    {
   		return $this::select()->where('parent', '0');
    }

    public function scopeChild()
    {
   		return $this::select()->where('parent', '!=', '0');
    }

    public function parent_category()
    {
   	    return $this->belongsTo('App\Models\Category', 'parent', 'id');
    }   
    
}
