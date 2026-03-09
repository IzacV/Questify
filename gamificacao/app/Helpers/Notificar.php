<?php
namespace App\Helpers;

use App\Models\Notificacao;
use App\Events\NotificacaoAluno;
use App\Events\NotificacaoInstrutor;

class Notificar
{
    // Notifica um aluno (salva no banco + Pusher em tempo real)
    public static function aluno($id_aluno, $mensagem, $tipo = 'info', $icone = '🔔', $pontos = 0)
    {
        // Salva no banco para quando estiver offline
        Notificacao::create([
            'fk_id_aluno' => $id_aluno,
            'mensagem' => $mensagem,
            'tipo' => $tipo,
            'icone' => $icone,
            'lida' => false,
            'created_at' => now(),
        ]);

        // Dispara via Pusher para tempo real
        try {
            event(new NotificacaoAluno($id_aluno, $mensagem, $tipo, $icone, $pontos));
        } catch (\Exception $e) {
            // Silencia erro do Pusher, notificação já foi salva no banco
        }
    }

    // Notifica um instrutor (salva no banco + Pusher em tempo real)
    public static function instrutor($id_instrutor, $mensagem, $tipo = 'info', $icone = '🔔')
    {
        // Salva no banco para quando estiver offline
        Notificacao::create([
            'fk_id_instrutor' => $id_instrutor,
            'mensagem' => $mensagem,
            'tipo' => $tipo,
            'icone' => $icone,
            'lida' => false,
            'created_at' => now(),
        ]);

        // Dispara via Pusher para tempo real
        try {
            event(new NotificacaoInstrutor($id_instrutor, $mensagem, $tipo, $icone));
        } catch (\Exception $e) {
            // Silencia erro do Pusher, notificação já foi salva no banco
        }
    }
}