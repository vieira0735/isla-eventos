<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class InicioController extends Controller
{
    public function index(): View
    {
        $proximos = DB::table('eventos')
            ->where('data', '>=', now()->toDateString())
            ->orderBy('data')
            ->limit(3)
            ->get();

        return view('inicio', ['proximos' => $proximos]);
    }
}