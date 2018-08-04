<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $tabel = 'rates';

    protected $fillable = [
    	'comment', 
        'user_id', 
        'product_id', 
        'status',
        'comment_style'
    ];

    public function product()
    {
    	return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
    public function replies()
    {
        return $this->hasMany('App\Models\Comment', 'comment_style', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Comment', 'comment_style', 'id');
    }
}
