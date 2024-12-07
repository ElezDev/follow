<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Maneja la solicitud de inicio de sesión
    public function login(Request $request)
    {
        // Valida las credenciales de la solicitud
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intenta autenticar al usuario con las credenciales
        if (Auth::attempt($credentials)) {
            // Regenera la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();

            // Obtiene el usuario autenticado
            $user = Auth::user();

            // Define las rutas de redirección según el rol del usuario
            $roleRoutes = [
                'superadmin' => 'superadmin.home',
                'administrator' => 'administrator.home',
                'trainer' => 'icon',
                'apprentice' => 'apprentice.home',
            ];

            // Obtiene el primer rol del usuario
            $userRole = $user->roles->first();
            if ($userRole) {
                // Determina la ruta de redirección basada en el rol del usuario
                $redirectRoute = $roleRoutes[$userRole->guard_name] ?? '/';
                return redirect()->intended(route($redirectRoute));
            }

            // Si no se encuentra un rol, redirige a la página principal
            return redirect()->intended('/');
        }

        // Si la autenticación falla, retorna al formulario de inicio de sesión con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
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
