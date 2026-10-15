<?php

namespace App\Models;

class Vuelo
{
    // Asociación unidireccional: el vuelo conoce a sus aeropuertos de origen y destino
    public function __construct(
        private string $numeroVuelo,
        private Aeropuerto $origen,
        private Aeropuerto $destino
    ) {}

    public function numeroVuelo(): string
    {
        return $this->numeroVuelo;
    }

    public function origen(): Aeropuerto
    {
        return $this->origen;
    }

    public function destino(): Aeropuerto
    {
        return $this->destino;
    }
}
