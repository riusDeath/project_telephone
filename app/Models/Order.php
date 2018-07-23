<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $tabel = 'orders';

    protected $fillable = [
    	'total', 'price', 'user_id', 'status', 'adress', 'phone', 'pay_id', 'ship_id',
    ];

    public function scopeSearch($query)
    {
        if(empty($query)){
            return $query;
        }else{
            if(request()->search == 3){               
                return $query;
            }
            else{
                 return $query->where('status', '=', request()->search);
         }
        }
    } 

    public function scopeSearchUser($query)
    {
    	 if(empty($query)){
            return $query;
        }else{
            if(request()->id){               
                 return $query->where('status', '=', request()->id);
            }
            else{
                 return $query;
            }
        }
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id', 'id');
    }

    public function ship()
    {
        return $this->belongsTo('App\Models\Ship', 'ship_id', 'id');
    }

    public function pay()
    {
        return $this->belongsTo('App\Models\Pay', 'pay_id', 'id');
    }

}
