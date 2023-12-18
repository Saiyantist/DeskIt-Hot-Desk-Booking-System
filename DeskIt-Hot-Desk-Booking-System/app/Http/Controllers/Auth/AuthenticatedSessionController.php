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
        // dd(Auth::user());
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Auth::login($request->user());
        // as per this line, it tells na NULL ang pumapasok na $request.

        // Auth::loginUsingId(1);
        
        $request->authenticate();
        $request->session()->regenerate();
        
        return redirect()->intended(RouteServiceProvider::HOME);


        // Debugging #2 failed.

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('dashboard');
        // }

        // return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
        //     'email' => 'Invalid email or password.',
        // ]);

        // Debugging #1 failed.

        // $credentials = $request->validate(
        //     [
        //         'email' => ['required', 'email'],
        //         'password' => ['required'],
        //     ]);

        // if(Auth::attempt($credentials)){
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
