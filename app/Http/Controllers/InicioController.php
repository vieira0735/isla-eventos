<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Tipo;
use Illuminate\View\View;

class InicioController extends Controller
{
    public function index(): View
    {
        $proximos = Evento::query()
            ->with('tipo')
            ->where('data', '>=', now()->toDateString())
            ->orderBy('data')
            ->limit(3)
            ->get();

        return view('inicio', [
            'proximos' => $proximos,
            'tipos' => Tipo::withCount('eventos')->orderBy('nome')->get(),
        ]);
    }
}