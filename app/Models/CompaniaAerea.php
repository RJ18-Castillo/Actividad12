<?php

namespace App\Models;

class CompaniaAerea
{
    private array $aviones = [];

    // Asociación bidireccional: la compañía conoce a sus aviones y cada avión conoce a su compañía
    public function agregarAvion(Avion $a): void
    {
        $this->aviones[] = $a;
        $a->asignarCompania($this);
    }

    public function aviones(): array
    {
        return $this->aviones;
    }
}
