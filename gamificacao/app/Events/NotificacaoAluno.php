<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificacaoAluno implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mensagem;
    public $tipo;
    public $icone;
    public $pontos;
    public $id_aluno;

    public function __construct($id_aluno, $mensagem, $tipo = 'info', $icone = '🔔', $pontos = 0)
    {
        $this->id_aluno = $id_aluno;
        $this->mensagem = $mensagem;
        $this->tipo = $tipo;
        $this->icone = $icone;
        $this->pontos = $pontos;
    }

    public function broadcastOn()
    {
        return new Channel('aluno.' . $this->id_aluno);
    }

    public function broadcastAs()
    {
        return 'notificacao';
    }
}