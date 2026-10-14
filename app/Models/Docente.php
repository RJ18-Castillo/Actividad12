<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = ['nombre'];

    // Intencionalmente SIN relación grupos(): la asociación Grupo -> Docente
    // es unidireccional (al docente no le interesa saber qué grupos tiene).
}
