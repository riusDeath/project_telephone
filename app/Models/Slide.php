<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $tabel = 'slides';

    protected $fillable = [
    	'name', 'content', 'link',
    ];
}
