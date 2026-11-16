<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EventoController extends Controller
{
    public function index(Request $request): View
    {
        $tipo = $request->query('tipo');

        $eventos = DB::table('eventos')
            ->when($tipo, fn ($consulta) => $consulta->where('tipo', $tipo))
            ->orderBy('data')
            ->get();

        return view('eventos.index', [
            'eventos' => $eventos,
            'tipo' => $tipo,
        ]);
    }

    public function show(int $id): View
    {
        $evento = DB::table('eventos')->find($id);

        if ($evento === null) {
            abort(404);
        }

        return view('eventos.show', ['evento' => $evento]);
    }
}