<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        // return view('home');
        return view('v_PetugasDashboard');
    }
}
