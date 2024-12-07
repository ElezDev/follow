<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //administrador
    public function reports(){
        return view('administrator.reports');
    }

    //superadministrador
    public function SuperAdminRedactar()
    {
        return view('superadmin.SuperAdmin-Redactar');
    }

    //instructor
    public function report()
    {
        return view('trainer.report');
    }

}
