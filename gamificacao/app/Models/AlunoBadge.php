<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlunoBadge extends Model
{
    protected $table = 'aluno_badges';
    public $timestamps = false;

    protected $fillable = [
        'fk_id_aluno',
        'fk_id_badge',
        'conquistado_em',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'fk_id_aluno', 'id_aluno');
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class, 'fk_id_badge', 'id_badge');
    }
}