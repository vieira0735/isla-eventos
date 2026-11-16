<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    public function run(): void
    {
        Tipo::create(['nome' => 'Workshop', 'slug' => 'workshop']);
        Tipo::create(['nome' => 'Palestra', 'slug' => 'palestra']);
        Tipo::create(['nome' => 'Hackathon', 'slug' => 'hackathon']);
    }
}