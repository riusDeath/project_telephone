<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function logs()
    {
        $logs = Log::select()->orderBy('id', 'desc')->paginate(12);
        $objects = Log::select('object')->groupBy('object')->get();   

        return view('admin.admins.logs', compact('logs', 'objects'));
    }

    public function search(Request $request)
    {
        if (isset($request->object) && $request->object !='0') {
    		$logs = Log::where('object', $request->object)->paginate(12)->appends('object', $request->object);
        } else {
    		$logs = Log::search()->paginate(12)->appends('search', $request->search);  		
        }  	
        $objects = Log::select('object')->groupBy('object')->get();       	

        return view('admin.admins.logs', compact('logs', 'objects'));
    }
    
}
