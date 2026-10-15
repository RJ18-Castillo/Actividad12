<?php

namespace App\Models;

// No aparece en la foto: se deduce de new Estudiante('B12345').
// El nombre del parámetro ($carne) es una suposición; ajústelo al del diagrama.
class Estudiante
{
    public function __construct(private string $carne) {}
}
