<?php

namespace App\Models;

use App\Exceptions\GrupoLleno;
use DateTimeImmutable;

class Grupo
{
    private array $matriculas = [];

    public function __construct(
        private Curso $curso,
        private int $numero,
        private int $cupo,
        private Docente $docente
    ) {}

    public function matricular(Estudiante $e, DateTimeImmutable $f): Matricula
    {
        if (count($this->matriculas) >= $this->cupo) {
            throw new GrupoLleno();
        }

        return $this->matriculas[] = new Matricula($e, $this, $f);
    }

    public function matriculas(): array
    {
        return $this->matriculas;
    }
}
