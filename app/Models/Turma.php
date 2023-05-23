<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turma extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Turma
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    /**
     * Get all of the matriculas for the Turma
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class, 'id_turma', 'id');
    }
}
