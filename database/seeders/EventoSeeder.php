<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Tipo;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = Tipo::pluck('id', 'slug');

        Evento::create([
            'titulo' => 'Workshop de Laravel', 'tipo_id' => $tipos['workshop'],
            'data' => '2026-11-18', 'local' => 'Laboratório 2.05',
            'descricao' => 'Aprende as bases do Laravel: rotas, controllers e views.',
            'vagas' => 20, 'inscritos' => 12,
        ]);
        Evento::create([
            'titulo' => 'Palestra: Carreiras em Cibersegurança', 'tipo_id' => $tipos['palestra'],
            'data' => '2026-11-25', 'local' => 'Auditório',
            'descricao' => 'Profissionais da área falam sobre percursos e oportunidades.',
            'vagas' => 120, 'inscritos' => 120,
        ]);
        Evento::create([
            'titulo' => 'Hackathon ISLA 24h', 'tipo_id' => $tipos['hackathon'],
            'data' => '2026-11-06', 'local' => 'Átrio principal',
            'descricao' => null,
            'vagas' => 60, 'inscritos' => 41,
        ]);
        Evento::create([
            'titulo' => 'Git e GitHub para iniciantes', 'tipo_id' => $tipos['workshop'],
            'data' => '2026-09-30', 'local' => 'Laboratório 1.02',
            'descricao' => null,
            'vagas' => 25, 'inscritos' => 25,
        ]);
        Evento::create([
            'titulo' => 'Conversa com antigos alunos DWDM', 'tipo_id' => $tipos['palestra'],
            'data' => '2026-12-02', 'local' => 'Sala 3.10',
            'descricao' => null,
            'vagas' => 40, 'inscritos' => 9,
        ]);
    }
}