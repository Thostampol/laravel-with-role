<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class ClearanceMiddleware
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
        if (Auth::user()->hasRole('Administer roles & permissions')){
                return $next($request);
            }
            if ($request->isMethod('Delete')){
                if (!Auth::user()->hasPermissionTo('Delete Post')) {
                    abort('401');
                }else{
                    return $next($request);
                }
            }
            if(Auth::user()->hasRole('Editor')){
                if ($request->is('posts/create')){
                    if (!Auth::user()->hasPermissionTo('Create Post')){
                        abort('401');
                    } else {
                        return $next($request);
                    }
                }
                if ($request->is('posts/*/edit')){
                    if (!Auth::user()->hasPermissionTo('Edit Post')) {
                        abort('401');
                    } else {
                        return $next($request);
                    }
                }
                
                if ($request->is('galleries/create')){
                    if (!Auth::user()->hasPermissionTo('Create Gallery')){
                        abort('401');
                    } else {
                        return $next($request);
                    }
                }
                if ($request->is('galleries/*/edit')){
                    if (!Auth::user()->hasPermissionTo('Edit Post')){
                        abort('401');
                    } else {
                        return $next($request);
                    }
                }

                if ($request->is('companies')){
                    if (!Auth::user()->hasPermissionTo('Edit Company')){
                        abort('401');
                    } else {
                        return $next($request);
                    }
                }
                if ($request->is('companies/edit')){
                    if (!Auth::user()->hasPermissionTo('Edit Company')){
                        abort('401');
                    } else {
                        return $next($request);
                    }
                }
            }
            if(Auth::user()->hasRole('Admin')){
                if ($request->is('roles')){
                    if (!Auth::user()->hasPermissionTo('View Role')){
                        abort('401');
                    } else {
                        return $next($request);
                    }
                }
    
                if ($request->is('permissions')){
                    if (!Auth::user()->hasPermissionTo('View Permissions')){
                        abort('401');
                    } else {
                        return $next($request);
                    }
                }
            }
            return $next($request);
    }
}
