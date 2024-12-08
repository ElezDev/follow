<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NotificationController extends Controller
{
    
    public function index()
    {
        $notifications = Notification::included()->filter()->sort()->getOrPaginate();
        return response()->json($notifications);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'fecha_envio' => 'required|date',
            'contenido' => 'required|string|max:255',
        ]);

        $notification = Notification::create($request->all());
        return response()->json($notification, 201);
    }

    //administrador

    public function Notificaciones()
    {
        return view('administrator.notificaciones');
    }

    //aprendiz
    public function notification()
    {
        $token = session()->get('token');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'notification_by_person');
        
        // Verifica si la respuesta es exitosa
        if ($response->successful()) {
            $notificaciones = $response->json();
        } else {
            $notificaciones = []; // En caso de error, devuelves un array vacío
        }
        
        return view('apprentice.notification', compact('notificaciones'));
    }
    


   



    //superadministrador
    public function SuperAdminNotificaciones()
    {
        return view('superadmin.SuperAdmin-Notificaciones');
    }
    public function notificationtrainer()
    {
        return view('trainer.notification');
    }

    public function create()
    {
    }
    
    public function show($id)
    {
        $notification = Notification::included()->findOrFail($id);
        return response()->json($notification);
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'fecha_envio' => 'required|date',
            'contenido' => 'required|string|max:255',
        ]);

        $notification->update($request->all());
        return response()->json($notification);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return response()->json(null, 204);
    }
    
}
