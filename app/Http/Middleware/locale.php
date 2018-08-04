<?php

namespace App\Http\Middleware;

use Closure;

class locale
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
        $language = \Session::get('website_language', config('app.locale'));

        app()->setlocale($language);

        return $next($request);
    }
}
