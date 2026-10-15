<?php

namespace App\Models;

use DateTimeImmutable;

class Matricula
{
    private ?float $nota = null;

    public function __construct(
        private Estudiante $estudiante,
        private Grupo $grupo,
        private DateTimeImmutable $fecha
    ) {}
}
