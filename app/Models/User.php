<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\CaptureActivity;

class User extends Authenticatable
{
    use Notifiable;
    use CaptureActivity;

    protected $table = 'users';
    protected static $capturedEvents = ['created', 'updated', 'delete'];

    protected $fillable = [
        'name', 
        'email', 
        'adress', 
        'phone', 
        'grade', 
        'status', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeSearch($query)
    {
        if (empty(request()->search)) {
            return $query;
        } 
            
        return $query->where('name', 'like', '%'.request()->search.'%')->orWhere('id', request()->search);
    }

    public function total()
    {
        $total_order = DB::table('orders')
        ->select(DB::raw("SUM(total) as  as total"))
        ->where('user_id', $this->id)
        ->get();

        return $total_order[0];
    }

    public function price()
    {
        $price_order = DB::table('orders')
        ->select(DB::raw("SUM(price)  as price"))
        ->where('user_id', $this->id)
        ->get();

        return $price_order[0]->price;
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'user_id', 'id');
    }

    public function rate()
    {
        return $this->hasMany('App\Models\Rate', 'user_id', 'id');
    }

    public function log()
    {
        return $this->hasMany('App\Models\Log', 'user_id', 'id');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order', 'user_id', 'id');
    }
    
}
