<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\View\View;

class TipoController extends Controller
{
    public function show(Tipo $tipo): View
    {
        return view('tipos.show', [
            'tipo' => $tipo,
            'eventos' => $tipo->eventos()->orderBy('data')->get(),
        ]);
    }
}