<?php

namespace App\Models;

// No aparece en la foto: se deduce de new Docente('D. Solis').
class Docente
{
    public function __construct(private string $nombre) {}
}
