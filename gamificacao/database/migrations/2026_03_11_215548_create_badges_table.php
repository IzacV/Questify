<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id('id_badge');
            $table->string('nome');
            $table->string('icone');
            $table->string('descricao');
            $table->string('tipo'); // pontos, frequencia, comportamento, atividades
            $table->integer('valor_necessario');
            $table->string('cor')->default('#a855f7');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};