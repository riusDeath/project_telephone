<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');

    	$sales = Sale::select()->where('status',1)
            ->where('date_create','<=', $date)
            ->where('date_end','>=', $date)
            ->get();

        return view('display.sale.index', compact('sales'));
    }
}
