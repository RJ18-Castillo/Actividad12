<?php

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Grupo;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('crea un grupo con dos estudiantes matriculados', function () {
    $curso = Curso::create(['codigo' => 'IF6100', 'nombre' => 'Ingeniería de Software']);
    $docente = Docente::create(['nombre' => 'Docente Uno']);

    $grupo = $curso->grupos()->create([
        'docente_id' => $docente->id,
        'numero' => 1,
        'cupo' => 30,
    ]);

    $ana = Estudiante::create(['nombre' => 'Ana']);
    $luis = Estudiante::create(['nombre' => 'Luis']);

    $grupo->estudiantes()->attach($ana->id, ['fecha' => '2026-02-10', 'nota_final' => 90]);
    $grupo->estudiantes()->attach($luis->id, ['fecha' => '2026-02-11']);

    expect($grupo->estudiantes)->toHaveCount(2)
        ->and($grupo->curso->is($curso))->toBeTrue()
        ->and($grupo->docente->is($docente))->toBeTrue()
        ->and($grupo->estudiantes->firstWhere('id', $ana->id)->pivot->nota_final)->toEqual('90.0')
        ->and($ana->grupos)->toHaveCount(1);
});

it('borra los grupos cuando se borra el curso (composición)', function () {
    $curso = Curso::create(['codigo' => 'X', 'nombre' => 'X']);
    $docente = Docente::create(['nombre' => 'D']);
    $curso->grupos()->create(['docente_id' => $docente->id, 'numero' => 1, 'cupo' => 10]);

    $curso->delete();

    expect(Grupo::count())->toBe(0);
});
