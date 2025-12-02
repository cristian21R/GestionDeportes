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

        Schema::create('deportistas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre_deportista');

        $table->foreignId('fk_id_pais')
            ->constrained('paises')
            ->onDelete('cascade');

        $table->foreignId('fk_id_disciplina')
            ->constrained('disciplinas')
            ->onDelete('cascade');

        $table->date('nacimiento_deportista');
        $table->decimal('estatura_deportista', 5, 2);
        $table->decimal('peso_deportista', 5, 2);
        $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deportistas');
    }
};
