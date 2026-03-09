<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->id('id_notificacao');
            $table->unsignedBigInteger('fk_id_aluno')->nullable();
            $table->unsignedBigInteger('fk_id_instrutor')->nullable();
            $table->string('mensagem');
            $table->string('tipo')->default('info');
            $table->string('icone')->default('🔔');
            $table->boolean('lida')->default(false);
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notificacoes');
    }
};