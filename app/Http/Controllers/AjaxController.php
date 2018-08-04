<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Product;

class AjaxController extends Controller
{
    public function rate()
    {
    	$rate_one = Product::find(2)->rate()->where('rate',4)->get();
		echo count($rate_one);
    }
}
