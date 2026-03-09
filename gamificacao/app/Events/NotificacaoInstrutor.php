<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificacaoInstrutor implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mensagem;
    public $tipo;
    public $icone;
    public $id_instrutor;

    public function __construct($id_instrutor, $mensagem, $tipo = 'info', $icone = '🔔')
    {
        $this->id_instrutor = $id_instrutor;
        $this->mensagem = $mensagem;
        $this->tipo = $tipo;
        $this->icone = $icone;
    }

    public function broadcastOn()
    {
        return new Channel('instrutor.' . $this->id_instrutor);
    }

    public function broadcastAs()
    {
        return 'notificacao';
    }
}