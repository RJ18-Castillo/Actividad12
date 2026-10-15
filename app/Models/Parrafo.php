<?php

namespace App\Models;

class Parrafo
{
    private array $oraciones = [];

    // Composición: el párrafo crea sus oraciones
    public function crearOracion(): Oracion
    {
        $o = new Oracion();
        $this->oraciones[] = $o;

        return $o;
    }

    public function oraciones(): array
    {
        return $this->oraciones;
    }
}
