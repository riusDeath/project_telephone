<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function logs(Request $request)
    {
        $logs = Log::select()->orderBy('id', 'desc')->paginate(12);

        return view('admin.admins.logs', compact('logs'));
    }
    
    public function search(Request $request)
    {
    	if ($request->targetable_type == 'all') {
            return view('admin.admins.logs', [
                'logs' => Log::select()->orderBy('id', 'desc')->paginate(12),
            ]);  
        } 

    	if (isset($request->targetable_type)) {
    		if (isset($request->created_at)) {
    			$logs = Log::select()
    			->where('targetable_type', $request->targetable_type)
    			->whereDate('created_at', $request->created_at)
    			->paginate(12)
    			->appends(['targetable_type' => $request->targetable_type, 'created_at' => $request->created_at]);
    		} else {
    			$logs = Log::select()
    			->where('targetable_type', $request->targetable_type)
    			->paginate(12)
    			->appends(['targetable_type' => $request->targetable_type]);
    		}		
    	} else {
    		if (isset($request->created_at)) {
    			$logs = Log::select()
    			->whereDate('created_at', $request->created_at)
    			->paginate(12)
    			->appends(['created_at' => $request->created_at]);
    		} else {
    			$logs = Log::select()->orderBy('id', 'desc')->paginate(12);
    		}
    	}

    	return view('admin.admins.logs', compact('logs'));   	
    }
}
