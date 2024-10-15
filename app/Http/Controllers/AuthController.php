<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email_usuario' => 'required|email',
            'contraseña_usuario' => 'required',
        ]);

        if (Auth::attempt(['email_usuario' => $credentials['email_usuario'], 'password' => $credentials['contraseña_usuario']])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email_usuario' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'email_usuario' => 'required|string|email|max:255|unique:usuarios',
            'contraseña_usuario' => 'required|string|min:8|confirmed',
        ]);

        $usuario = Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'email_usuario' => $request->email_usuario,
            'contraseña_usuario' => Hash::make($request->contraseña_usuario),
        ]);

        Auth::login($usuario);

        return redirect('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home');
    }
}