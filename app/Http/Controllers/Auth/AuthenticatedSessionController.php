<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
//        $request->authenticate();
//
//        $request->session()->regenerate();
//
//        return redirect()->intended(route('dashboard', absolute: false));
        $request->authenticate();

        $request->session()->regenerate();

        // توجيه المستخدم بناءً على دوره
        $user = $request->user();

        if ($user->hasRole('administrator')) {
            return redirect()->intended('/admin');
        }

        if ($user->hasRole('company_member')) {
            return redirect()->intended('/companies');
        }

        if ($user->hasRole('vendor_member')) {
            return redirect()->intended('/vendors');
        }

        // توجيه المستخدمين العامين أو بدون دور محدد إلى لوحة التحكم العامة
        return redirect()->intended('/dashboard');

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
