<?php

namespace App\Models;

class Oracion
{
    private array $palabras = [];

    // Agregación: la palabra existe fuera de la oración y se le agrega
    public function agregarPalabra(Palabra $p): void
    {
        $this->palabras[] = $p;
    }

    public function palabras(): array
    {
        return $this->palabras;
    }
}
