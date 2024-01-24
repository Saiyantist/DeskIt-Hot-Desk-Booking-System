<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        $request->user()->sendEmailVerificationNotification();
        
        $user = Auth::user();

        $hasAllowedRole = $user->hasAnyRole('admin', 'employee');

        if ($hasAllowedRole) {
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard'); 
            } elseif ($user->hasRole('employee')) {
                return redirect()->route('home.dashboard');
            }
        }

        if (!$user->hasAnyRole('admin', 'employee')) {
            return redirect()->route('waiting');
        }

        return abort(403, 'Unauthorized');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if ($user) {
            $user->email_verified_at = null;
            $user->save();
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
