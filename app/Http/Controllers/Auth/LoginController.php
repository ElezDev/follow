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
            Storage::disk('local')->put('respuesta.json', json_encode($data));

            if (isset($data['access_token'])) {
                Storage::disk('local')->put('token.json', json_encode(['token' => $data['access_token']]));
                return redirect('/')->with('success', 'Usuario autenticado correctamente');
            }
        }

        return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    }

    // Maneja la solicitud de cierre de sesión
    public function logout(Request $request)
    {
        // Cierra la sesión del usuario autenticado
        Auth::logout();

        // Invalida la sesión actual
        $request->session()->invalidate();

        // Regenera el token de la sesión para evitar ataques CSRF
        $request->session()->regenerateToken();

        // Redirige a la página principal
        return redirect('/');
    }
}
