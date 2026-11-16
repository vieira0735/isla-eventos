<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('eventos')->insert([
            'titulo' => 'Workshop de Laravel', 'tipo' => 'workshop',
            'data' => '2026-11-18', 'local' => 'Laboratório 2.05',
            'vagas' => 20, 'inscritos' => 12,
            'created_at' => now(), 'updated_at' => now(),
        ]);
        DB::table('eventos')->insert([
            'titulo' => 'Palestra: Carreiras em Cibersegurança', 'tipo' => 'palestra',
            'data' => '2026-11-25', 'local' => 'Auditório',
            'vagas' => 120, 'inscritos' => 120,
            'created_at' => now(), 'updated_at' => now(),
        ]);
        DB::table('eventos')->insert([
            'titulo' => 'Hackathon ISLA 24h', 'tipo' => 'hackathon',
            'data' => '2026-11-06', 'local' => 'Átrio principal',
            'vagas' => 60, 'inscritos' => 41,
            'created_at' => now(), 'updated_at' => now(),
        ]);
        DB::table('eventos')->insert([
            'titulo' => 'Git e GitHub para iniciantes', 'tipo' => 'workshop',
            'data' => '2026-09-30', 'local' => 'Laboratório 1.02',
            'vagas' => 25, 'inscritos' => 25,
            'created_at' => now(), 'updated_at' => now(),
        ]);
        DB::table('eventos')->insert([
            'titulo' => 'Conversa com antigos alunos DWDM', 'tipo' => 'palestra',
            'data' => '2026-12-02', 'local' => 'Sala 3.10',
            'vagas' => 40, 'inscritos' => 9,
            'created_at' => now(), 'updated_at' => now(),
        ]);
    }
}