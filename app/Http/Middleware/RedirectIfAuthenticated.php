<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role; 
                switch ($role) {
                    case 'USER':
                        return redirect('/user');
                        break;
                    case 'TECHNICIAN':
                        return redirect('/technician');
                        break; 
                    case 'MANAGER':
                        return redirect('/manager');
                        break; 
            
                    default:
                        return response('Unauthorized.', 401);
                    break;
                }
            }
        }

        return $next($request);
    }
}
