<?php

namespace App\Http\Controllers;

use App\Models\apprentice;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('apprentice.home');
    }

    // public function calendar()
    // {
    //     return view('apprentice.calendar');
    // }

    public function visit()
    {
        return view('apprentice.visit');
    }
    public function registervisit(){
        return view('apprentice.registervisit');
    }

    public function profile()
    {
        return view('apprentice.profile');
    }
    public function settings()
    {
        return view('apprentice.settings');
    }
    // public function notification()
    // {
    //     $notificaciones = [
    //         ['titulo' => 'Notificación 1', 'asunto' => 'Asunto 1', 'fecha' => '2023-10-30'],
    //         ['titulo' => 'Notificación 2', 'asunto' => 'Asunto 2', 'fecha' => '2023-10-31'],
    //         // Agrega más notificaciones aquí
    //     ];

    //     return view('apprentice.notification', compact('notificaciones'));
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $apprentice = Apprentice::findOrFail();
        return view('apprentice.home', compact('apprentice'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(apprentice $apprentice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, apprentice $apprentice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(apprentice $apprentice)
    {
        //
    }
}
