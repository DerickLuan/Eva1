<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matricula extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the Matricula
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function frequencias(): HasMany
    {
        return $this->hasMany(Frequencia::class, 'id_matricula', 'id');
    }

    /**
     * Get all of the comments for the Matricula
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boletins(): HasMany
    {
        return $this->hasMany(Boletim::class, 'id_matricula', 'id');
    }

    /**
     * Get the user that owns the Matricula
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Get the user that owns the Matricula
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function turma(): BelongsTo
    {
        return $this->belongsTo(Turma::class, 'id_turma');
    }
}
