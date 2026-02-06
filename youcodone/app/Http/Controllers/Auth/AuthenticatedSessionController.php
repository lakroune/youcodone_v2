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
        $request->authenticate();

        $request->session()->regenerate();
        if ($request->user()->role === 'restaurateur') {
            return redirect(route('restaurateur.dashboard', absolute: false))->with('success', "Bienvenue {$request->user()->username}");
        } elseif ($request->user()->role === 'client') {
            return redirect(route('home', absolute: false))->with('success', "Bienvenue {$request->user()->username}");
        } elseif ($request->user()->role === 'admin') {
            return redirect(route('admin.gestion', absolute: false))->with('success', "Bienvenue {$request->user()->username}");
        } else {
            return redirect('/');
        }
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
