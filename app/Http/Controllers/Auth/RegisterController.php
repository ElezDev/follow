<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Muestra el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Maneja la solicitud de registro
    public function register(Request $request)
    {
        // Valida los datos de la solicitud
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name'=> ['required', 'string', 'max:255'],
            'department'=> ['required', 'string', 'max:255'],
            'municipality'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'exists:roles,guard_name'],
        ]);

        // Crea un nuevo usuario con los datos proporcionados
        $user = User::create([
            'name' => $request->name,
            'last_name'=> $request->last_name,
            'department'=> $request->department,
            'municipality'=> $request->municipality,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asocia el rol seleccionado al usuario
        $role = Role::where('guard_name', $request->role)->first();
        $user->roles()->attach($role);
        $user->save();

        // Autentica al usuario recién registrado
        Auth::login($user);

        // Redirige al usuario según su rol
        return $this->redirectTo($user);
    }

    // Redirige al usuario según su rol
    protected function redirectTo($user)
    {
        // Define las rutas de redirección basadas en el rol del usuario
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
}
?>

