<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;

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
        $notificaciones = [
            ['titulo' => 'Notificación 1', 'asunto' => 'Asunto 1', 'fecha' => '2023-10-30'],
            ['titulo' => 'Notificación 2', 'asunto' => 'Asunto 2', 'fecha' => '2023-10-31'],
            // Agrega más notificaciones aquí
        ];

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
