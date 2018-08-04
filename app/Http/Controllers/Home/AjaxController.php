<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request,Cart;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Province;

class AjaxController extends Controller
{

    public function county($pro_id)
    {
        $counties = Province::find($pro_id)->location()->get();

        foreach ($counties as $county) {
            echo "<option value='".$county->county."'>".$county->county."</option>";
    	}
    }
}
