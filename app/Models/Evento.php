<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['titulo', 'tipo_id', 'data', 'local', 'descricao', 'vagas', 'inscritos'])]
class Evento extends Model
{
    protected function casts(): array
    {
        return ['data' => 'date'];
    }

    public function tipo(): BelongsTo
{
    return $this->belongsTo(Tipo::class);
}
}