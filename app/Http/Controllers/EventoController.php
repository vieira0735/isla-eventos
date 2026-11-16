<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\View\View;


class EventoController extends Controller
{
    public function index(Request $request): View
{
    $tipo = $request->query('tipo');

    $eventos = Evento::query()
        ->with('tipo')
        ->when($tipo, fn ($c) => $c->whereRelation('tipo', 'slug', $tipo))
        ->orderBy('data')
        ->get();

    return view('eventos.index', [
        'eventos' => $eventos,
        'tipo' => $tipo,
        'tipos' => Tipo::orderBy('nome')->get(),
    ]);
}

    public function show(Evento $evento): View
    {
        return view('eventos.show', ['evento' => $evento]);
    }

    
}