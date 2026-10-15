<?php

namespace App\Models;

class Libro
{
    private array $capitulos = [];

    // Agregación: el capítulo existe fuera del libro y se le agrega
    public function agregarCapitulo(Capitulo $c): void
    {
        $this->capitulos[] = $c;
    }

    public function capitulos(): array
    {
        return $this->capitulos;
    }
}
