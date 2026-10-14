<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    protected $fillable = ['codigo', 'nombre'];

    // Composición: el curso es el "todo" y posee sus grupos.
    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class);
    }
}
