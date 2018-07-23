<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Product;

class AjaxController extends Controller
{
    public function adress($county_name)
    {
    	$locatons = Location::where('county',$county_name)->get();
    	foreach ($locatons as $location) {
    		echo "Địa chỉ shop: <p class='adress_county'>".$location->adress."</p>";
    	}
    }
    public function rate()
    {
    	$rate_one = Product::find(2)->rate()->where('rate',4)->get();
		echo count($rate_one);
    }
}
