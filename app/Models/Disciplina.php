<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Disciplina extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the Disciplina
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    /**
     * Get all of the frequencias for the Disciplina
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function frequencias(): HasMany
    {
        return $this->hasMany(Frequencia::class, 'disciplina_id', 'id');
    }

    /**
     * Get all of the comments for the Disciplina
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boletins(): HasMany
    {
        return $this->hasMany(Boletim::class, 'disciplina_id', 'id');
    }
}
