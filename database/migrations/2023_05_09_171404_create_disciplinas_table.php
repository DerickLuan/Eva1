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
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->double('carga_horaria', 8, 2)->default(0);
            $table->double('carga_semestral', 8, 2)->default(0);
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->foreign('curso_id')
            ->references('id')->on('cursos')
            ->onUpdate('cascade')
            ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinas');
    }
};
