<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventoController extends Controller
{
    public function index(Request $request): View
    {
        $tipo = $request->query('tipo');

        $eventos = Evento::query()
            ->when($tipo, fn ($c) => $c->where('tipo', $tipo))
            ->orderBy('data')
            ->get();

        return view('eventos.index', [
            'eventos' => $eventos,
            'tipo' => $tipo,
        ]);
    }

    public function show(Evento $evento): View
    {
        return view('eventos.show', ['evento' => $evento]);
    }
}