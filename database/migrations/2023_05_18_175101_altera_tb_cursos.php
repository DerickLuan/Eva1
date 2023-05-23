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
        Schema::table('cursos', function (Blueprint $table) {
            $table->string('nome');
            $table->text('descricao');
            $table->double('carga_horaria', 8, 2);
            $table->unsignedBigInteger('instituicao_id')->nullable();
            $table->foreign('instituicao_id')
            ->references('id')->on('instituicaos')
            ->onUpdate('cascade')
            ->nullOnDelete();
            
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')
            ->references('id')->on('categorias')
            ->onUpdate('cascade')
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
