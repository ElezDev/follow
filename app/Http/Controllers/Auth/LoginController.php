<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    // Muestra el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Maneja la solicitud de inicio de sesión
    public function login(Request $request): RedirectResponse
    {
        // Valida las credenciales de la solicitud
        $validated = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $base_url = env('URL_API') . 'login';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($base_url, [
            'email'    => $validated['email'],
            'password' => $validated['password']
        ]);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['access_token'])) {
                // Almacena el token en la sesión
                session(['token' => $data['access_token']]);
                session(['user' => $data['user']]); 
                // Redirige al usuario
                return redirect('/')->with('success', 'Usuario autenticado correctamente');
            }
        }

        return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    }

    // Maneja la solicitud de cierre de sesión
    public function logout(Request $request)
    {
        $request->session()->forget(['token', 'user']);

        return redirect('/');
    }
}
