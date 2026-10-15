<?php

use App\Models\Aeropuerto;
use App\Models\Avion;
use App\Models\CompaniaAerea;
use App\Models\Vuelo;

test('se instancia un vuelo que comienza en un aeropuerto y termina en otro', function () {
    $origen = new Aeropuerto();
    $destino = new Aeropuerto();

    $vuelo = new Vuelo('V-001', $origen, $destino);

    expect($vuelo->numeroVuelo())->toBe('V-001');
    expect($vuelo->origen())->toBe($origen);
    expect($vuelo->destino())->toBe($destino);
});

test('una compañía maneja aviones y cada avión conoce su compañía', function () {
    $compania = new CompaniaAerea();
    $avion = new Avion();

    $compania->agregarAvion($avion);

    expect($compania->aviones())->toHaveCount(1);
    expect($avion->compania())->toBe($compania);
});
