<?php

namespace App\Http\Middleware;

use Closure;

class DanhNhap
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
        if(Auth::check())
        {
            session::put('user_login', Auth::user());
            return redirect('gio-hang');
        }
        return redirect('dang-nhap');
    }
    
}
