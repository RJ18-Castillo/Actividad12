<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

// Clase de asociación Estudiante-Grupo: aquí viven la fecha y la nota final.
class Matricula extends Pivot
{
    protected $table = 'matriculas';

    protected $fillable = ['estudiante_id', 'grupo_id', 'fecha', 'nota_final'];

    protected $casts = [
        'fecha' => 'date',
        'nota_final' => 'decimal:1',
    ];
}
