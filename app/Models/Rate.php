<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\CaptureActivity;

class Rate extends Model
{
    use CaptureActivity;

    protected $tabel = 'rates';

    protected static $capturedEvents = ['created', 'updated', 'delete'];
    protected static $activityTargetType = User::class;
    protected $fillable = [
    	'rate', 
        'user_id', 
        'product_id', 
    ];

    public function product()
    {
    	return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
