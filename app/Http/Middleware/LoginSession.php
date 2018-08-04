<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {       
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->grade == 'admin' || $user->grade=='boss' && $user->status ==1) {
                return $next($request);
            } else {          
                return redirect('admin/dangnhap');
            }
        } else {
            return redirect('admin/dangnhap');
        }
    }
}
