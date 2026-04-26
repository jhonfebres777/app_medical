<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->date('fecha_nacimiento');
            $table->string('cedula', 100)->unique();
            $table->string('telefono', 100);
            $table->string('direccion', 255);
            $table->string('sexo', 100);
            $table->string('estado_civil', 100);
            $table->string('ocupacion', 100);
            $table->string('peso', 100);
            $table->string('altura', 100);
            $table->string('tipo_sangre', 100);
            $table->string('alergias', 100);
            $table->string('enfermedades', 100);
            $table->string('medicamentos', 1000);
            $table->string('antecedentes', 1000);
            $table->string('contacto_emergencia', 100);
            $table->string('observaciones', 1000)->nullable();
            $table->string('email', 100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
