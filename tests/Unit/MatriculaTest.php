<?php

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;

test('un grupo matricula a dos estudiantes', function () {
    $g = (new Curso('IF-7100', 'Ingeniería de Software'))
        ->abrirGrupo(1, 30, new Docente('D. Solis'));

    $g->matricular(new Estudiante('B12345'), new DateTimeImmutable());
    $g->matricular(new Estudiante('C67890'), new DateTimeImmutable());

    expect($g->matriculas())->toHaveCount(2);
});
