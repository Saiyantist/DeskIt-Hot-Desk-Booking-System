<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::user()->hasRole('admin')) {
            if ($request->is('dashboard' || 'superadmin.dashboard')) {
                return redirect()->route('admin.dashboard');
            }
            return $next($request);
        }

        if (Auth::user()->hasRole('superadmin')) {
            if ($request->is('dashboard' || 'admin.dashboard')) {
                return redirect()->route('superadmin.dashboard');
            }
            return $next($request);
        }

        if (Auth::user()->hasRole('employee')) {
            if ($request->is('admin.dashboard' || 'superadmin.dashboard')) {
                return redirect()->route('dashboard');
            }
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}