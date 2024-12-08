<?php

namespace App\Http\Controllers;

use App\Models\trainer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $token = session()->get('token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_apprentices_by_instructor');

        $data = $response->json();

        return view('trainer.home', compact('data'));
    }

    //inicio de instructor iconos
    public function icon()
    {
        return view('trainer.icon');
    }

    public function configuracion()
    {
        return view('trainer.configuracion');
    }
    
    /**
     * Return view profile to apprentice selected by trainner
     * @param string|int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function perfilapre(string|int $id): RedirectResponse|View
    {
        $token = session()->get('token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_apprentice_by_user_id/' . $id);

        if ($response->successful()) {
            $apprentice = $response->json();

            if (!$apprentice) {
                return redirect()->back()->with('error', 'Estudiante no encontrado.');
            }

            return view('trainer.perfilapre', compact('apprentice'));
        } else {
            return redirect()->back()->with('error', 'Error al obtener la información del estudiante.');
        }
    }

    //icono nombre usuario instructor
    public function username()
    {
        return view('trainer.username');
    }

    //icono visita
    public function visita()
    {
        return view('trainer.visita');
    }
    //icono email
    public function email()
    {
        return view('trainer.email');
    }


    /**
     * Display the specified resource.
     */
    public function show(trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trainer $trainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trainer $trainer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trainer $trainer)
    {
        //
    }
}
