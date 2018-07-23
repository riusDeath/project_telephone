<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request,Cart;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Province;

class AjaxController extends Controller
{
    public function adress($county_name)
    {
    	$locatons = Location::where('county', $county_name)->get();

    	foreach ($locatons as $location) {
    		echo "Địa chỉ shop: <p class='adress_county'><input type=\"radio\" name=\" adress\" checked>".$location->adress."</p>";
    	}
    }
    public function county($pro_id)
    {
    	$counties = Province::find($pro_id)->location()->get();

    	foreach ($counties as $county) {
    		 echo "<option value='".$county->county."'>".$county->county."</option>";
    	}
    }
}
