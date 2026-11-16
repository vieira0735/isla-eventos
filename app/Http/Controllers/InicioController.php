<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\View\View;

class InicioController extends Controller
{
    public function index(): View
    {
        $proximos = Evento::query()
            ->where('data', '>=', now()->toDateString())
            ->orderBy('data')
            ->limit(3)
            ->get();

        return view('inicio', ['proximos' => $proximos]);
    }
}