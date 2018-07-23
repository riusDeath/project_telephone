<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'adress',  'phone', 'grade', 'status', 'password',
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
        if(empty(request()->search)){
            return $query;
        }else{
            return $query->where('name', 'like', '%'.request()->search.'%');
        }
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
