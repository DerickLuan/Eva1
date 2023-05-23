<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Frquencia extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Frquencia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disciplina(): BelongsTo
    {
        return $this->belongsTo(Disciplina::class, 'id_disciplina');
    }

    /**
     * Get the user that owns the Frquencia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matricula(): BelongsTo
    {
        return $this->belongsTo(Matricula::class, 'id_matricula');
    }
}
