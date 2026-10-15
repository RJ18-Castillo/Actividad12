<?php

namespace App\Models;

class Capitulo
{
    private array $parrafos = [];

    // Composición: el capítulo crea sus párrafos
    public function crearParrafo(): Parrafo
    {
        $p = new Parrafo();
        $this->parrafos[] = $p;

        return $p;
    }

    public function parrafos(): array
    {
        return $this->parrafos;
    }
}
