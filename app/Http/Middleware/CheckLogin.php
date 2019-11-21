<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        // session(['admin']);
        // $user = session('user');
        // echo 'pppppppp';
        // dd($request->session()->has('user'));
        if (!$request->session()->has('user')) {
            return redirect('/');
        }
        return $next($request);
    }
}
