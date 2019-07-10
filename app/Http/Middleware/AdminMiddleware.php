<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminMiddleware
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
        $cekUser = $request->user();
        if ($cekUser->created_by == "sys") {
            $cekUser->assignRole('Admin');
        }else{
            if (!Auth::user()->hasPermissionTo('Administer roles & permissions')){
                abort('401');
            }
        }
        return $next($request);
    }
}
