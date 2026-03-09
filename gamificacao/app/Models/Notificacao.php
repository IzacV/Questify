<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    use HasFactory;

    protected $table = 'notificacoes';
    protected $primaryKey = 'id_notificacao';
    public $timestamps = false;

    protected $fillable = [
        'fk_id_aluno',
        'fk_id_instrutor',
        'mensagem',
        'tipo',
        'icone',
        'lida',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'fk_id_aluno', 'id_aluno');
    }

    public function instrutor()
    {
        return $this->belongsTo(Instrutor::class, 'fk_id_instrutor', 'id_instrutor');
    }
}