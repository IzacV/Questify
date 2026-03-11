<?php
namespace App\Helpers;

use App\Models\Notificacao;
use App\Models\AlunoBadge;
use App\Models\Badge;
use App\Models\Entrega;
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

    // Verifica e concede badges para o aluno
    public static function verificarBadges($aluno)
    {
        $badges = Badge::all();
        $totalAtividades = Entrega::where('fk_id_aluno', $aluno->id_aluno)->count();

        foreach ($badges as $badge) {
            // Verifica se já tem o badge
            $jatem = AlunoBadge::where('fk_id_aluno', $aluno->id_aluno)
                ->where('fk_id_badge', $badge->id_badge)
                ->exists();

            if ($jatem) continue;

            $conquistou = false;

            switch ($badge->tipo) {
                case 'pontos':
                    $conquistou = $aluno->pontos >= $badge->valor_necessario;
                    break;
                case 'frequencia':
                    $conquistou = $aluno->frequencia >= $badge->valor_necessario;
                    break;
                case 'comportamento':
                    $conquistou = $aluno->pontos_comportamento >= $badge->valor_necessario;
                    break;
                case 'atividades':
                    $conquistou = $totalAtividades >= $badge->valor_necessario;
                    break;
            }

            if ($conquistou) {
                AlunoBadge::create([
                    'fk_id_aluno' => $aluno->id_aluno,
                    'fk_id_badge' => $badge->id_badge,
                    'conquistado_em' => now(),
                ]);

                // Notifica o aluno
                self::aluno(
                    $aluno->id_aluno,
                    'Você conquistou o badge ' . $badge->icone . ' <strong>' . $badge->nome . '</strong>! ' . $badge->descricao,
                    'purple',
                    $badge->icone,
                    0
                );
            }
        }
    }
}