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
        Schema::create('frquencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matricula_id')->nullable();
            $table->foreign('matricula_id')
            ->references('id')->on('matriculas')
            ->onUpdate('cascade')
            ->nullOnDelete();
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->foreign('disciplina_id')
            ->references('id')->on('disciplinas')
            ->onUpdate('cascade')
            ->nullOnDelete();
            $table->string('frequencia')->default('F');
            $table->text('descricao');
            $table->date('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frquencias');
    }
};
