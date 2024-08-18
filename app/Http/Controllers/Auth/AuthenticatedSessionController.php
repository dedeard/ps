<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return redirect()->route('login-doctor');
    }
    public function createPharmacy(): View
    {
        return view('auth.login', ['type' => 'pharmacy']);
    }
    public function createDoctor(): View
    {
        return view('auth.login', ['type' => 'doctor']);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $type = $request->input('type');
        if ($type != 'pharmacy' && $type != 'doctor') return redirect()->route('login-doctor');

        $user = User::where('email', $request->email)->first();
        $langType = $type == 'pharmacy' ? 'Apotek' : 'Dokter';

        if (!$user) return back()->withErrors(['email' => 'Kredensial ini tidak cocok dengan catatan kami.'])->withInput();

        if (!$user->doctor && !$user->pharmacy) return back()->withErrors(['email' => 'Akun anda bukan akun ' . $langType])->withInput();


        if ($type === 'doctor' && !$user->doctor) return back()->withErrors(['email' => 'Akun anda bukan akun ' . $langType])->withInput();
        if ($type === 'pharmacy' && !$user->pharmacy) return back()->withErrors(['email' => 'Akun anda bukan akun ' . $langType])->withInput();



        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
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
