<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrutor extends Model
{
    use HasFactory;
    protected $table = 'instrutores';

    protected $fillable = [
        'nome',
        'email',
        'senha'
    ];

    protected $hidden = [
        'senha',
    ];

    public function turmas()
    {
        return $this->hasMany(Turma::class, 'fk_id_instrutor');
    }

}
