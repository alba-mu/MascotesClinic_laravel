<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulari de login
    public function showLogin()
    {
        $rememberedEmail = Cookie::get('remembered_email');
        $rememberedRemember = !empty($rememberedEmail);

        return view('auth.login', [
            'rememberedEmail' => $rememberedEmail,
            'rememberedRemember' => $rememberedRemember,
        ]);
    }

    // Processar login
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if ($request->boolean('remember')) {
                Cookie::queue('remembered_email', $credentials['email'], 60 * 24 * 30);
            } else {
                Cookie::queue(Cookie::forget('remembered_email'));
            }

            return redirect()->intended('/home'); // Redirigeix al home
        }

        return back()->withErrors([
            'email' => 'Les credencials introduïdes no són correctes.',
        ])->onlyInput('email');
    }

    // Mostrar formulari de registre
    public function showRegister()
    {
        return view('auth.register');
    }

    // Processar registre
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        // Crear usuari
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Redirigir a la pàgina de login després de registrar-se
        return redirect('/login')->with('success', 'Registre completat. Ara pots iniciar sessió.');
    }

    // Tancar sessió
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.logout');
    }
}
