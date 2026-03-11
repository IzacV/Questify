<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aluno_badges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_aluno');
            $table->unsignedBigInteger('fk_id_badge');
            $table->timestamp('conquistado_em')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aluno_badges');
    }
};