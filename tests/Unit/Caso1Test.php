<?php

use App\Models\Capitulo;
use App\Models\Libro;
use App\Models\Palabra;

test('un libro contiene capítulos, párrafos, oraciones y palabras', function () {
    $capitulo = new Capitulo();
    $oracion = $capitulo->crearParrafo()->crearOracion();
    $oracion->agregarPalabra(new Palabra('Hola'));
    $oracion->agregarPalabra(new Palabra('mundo'));

    $libro = new Libro();
    $libro->agregarCapitulo($capitulo);

    expect($libro->capitulos())->toHaveCount(1);
    expect($capitulo->parrafos())->toHaveCount(1);
    expect($oracion->palabras())->toHaveCount(2);
});
