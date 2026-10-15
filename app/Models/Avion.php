<?php

namespace App\Models;

class Avion
{
    private ?CompaniaAerea $compania = null;

    public function asignarCompania(CompaniaAerea $c): void
    {
        $this->compania = $c;
    }

    public function compania(): ?CompaniaAerea
    {
        return $this->compania;
    }
}
