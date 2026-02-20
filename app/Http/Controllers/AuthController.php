<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulari de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Processar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Redirigeix al home
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
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Crear usuari
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Loguejar automàticament després de registrar-se
        //Auth::login($user);

        // Redirigir a la pàgina de login després de registrar-se
        return redirect('/login')->with('success', 'Registre completat. Ara pots iniciar sessió.');
    }

    // Tancar sessió
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/logout');
    }
}
