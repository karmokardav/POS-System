<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\LoginHistory;
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
        // Auth::user()->update([
        //     'last_seen' => now()
        // ]);
        $user = Auth::user();

        LoginHistory::where('user_id', $user->id)
            ->whereNull('logout_at')
            ->update([
                'logout_at' => now()
            ]);

        $login = LoginHistory::create([
            'user_id' => $user->id,
            'login_at' => now(),
            'ip_address' => $request->ip(),
        ]);
        session(['login_history_id' => $login->id]);
        return redirect()->intended(route('dashboard', absolute: false));
    }
    public function destroy(Request $request): RedirectResponse
    {
        $loginId = session('login_history_id');


        if ($loginId) {
            LoginHistory::where('id', $loginId)
                ->update([
                    'logout_at' => now()
                ]);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    // public function destroy(Request $request): RedirectResponse
    // {

    //     $loginId = session('login_history_id');

    //     if ($loginId) {

    //         $lastLogin = LoginHistory::where('user_id', $user->id)
    //             ->whereNull('logout_at')
    //             ->latest()
    //             ->first();

    //         if ($lastLogin) {
    //             $lastLogin->update([
    //                 'logout_at' => now()
    //             ]);
    //         }
    //     }

    //     Auth::logout();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
}
