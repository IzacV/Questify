<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $table = 'badges';
    protected $primaryKey = 'id_badge';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'icone',
        'descricao',
        'tipo',
        'valor_necessario',
        'cor',
    ];

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_badges', 'fk_id_badge', 'fk_id_aluno')
            ->withPivot('conquistado_em');
    }
}