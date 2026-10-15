<?php

namespace App\Models;

class Curso
{
    private array $grupos = [];

    public function __construct(private string $codigo, private string $nombre) {}

    // Composición: el curso crea sus grupos
    public function abrirGrupo(int $numero, int $cupo, Docente $d): Grupo
    {
        $g = new Grupo($this, $numero, $cupo, $d);
        $this->grupos[] = $g;

        return $g;
    }
}
