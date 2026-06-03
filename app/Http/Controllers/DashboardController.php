<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\TipoContato;

class DashboardController extends Controller
{
    public function index()
    {
        $numeroContatos = \App\Models\Contato::count();
        $numeroTipoContatos = \App\Models\TipoContato::count();
        return view('dashboard', compact('numeroContatos', 'numeroTipoContatos'));
    }
}
