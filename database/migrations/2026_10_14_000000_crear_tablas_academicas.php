<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $t) {
            $t->id();
            $t->string('codigo')->unique();
            $t->string('nombre');
            $t->timestamps();
        });

        Schema::create('docentes', function (Blueprint $t) {
            $t->id();
            $t->string('nombre');
            $t->timestamps();
        });

        Schema::create('estudiantes', function (Blueprint $t) {
            $t->id();
            $t->string('nombre');
            $t->timestamps();
        });

        Schema::create('grupos', function (Blueprint $t) {
            $t->id();
            // Composición: si se borra el curso, se borran sus grupos.
            $t->foreignId('curso_id')->constrained('cursos')->cascadeOnDelete();
            $t->foreignId('docente_id')->constrained('docentes');
            $t->unsignedInteger('numero');
            $t->unsignedInteger('cupo');
            $t->timestamps();
            $t->unique(['curso_id', 'numero']);
        });

        Schema::create('matriculas', function (Blueprint $t) {
            $t->foreignId('estudiante_id')->constrained('estudiantes')->cascadeOnDelete();
            $t->foreignId('grupo_id')->constrained('grupos')->cascadeOnDelete();
            $t->date('fecha');
            $t->decimal('nota_final', 4, 1)->nullable();
            $t->timestamps();
            $t->primary(['estudiante_id', 'grupo_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matriculas');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('estudiantes');
        Schema::dropIfExists('docentes');
        Schema::dropIfExists('cursos');
    }
};
