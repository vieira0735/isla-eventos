<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['titulo', 'tipo_id', 'data', 'local', 'descricao', 'vagas', 'inscritos'])]
class Evento extends Model
{
    protected function casts(): array
    {
        return ['data' => 'date'];
    }
}