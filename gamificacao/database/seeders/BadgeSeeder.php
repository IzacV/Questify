<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Badge;

class BadgeSeeder extends Seeder
{
    public function run(): void
    {
        $badges = [
            // Por Pontos
            ['nome' => 'Iniciante',   'icone' => '⭐', 'descricao' => 'Conquistou 10 pontos',   'tipo' => 'pontos', 'valor_necessario' => 10,  'cor' => '#60a5fa'],
            ['nome' => 'Em Chamas',   'icone' => '🔥', 'descricao' => 'Conquistou 50 pontos',   'tipo' => 'pontos', 'valor_necessario' => 50,  'cor' => '#f97316'],
            ['nome' => 'Centurião',   'icone' => '💎', 'descricao' => 'Conquistou 100 pontos',  'tipo' => 'pontos', 'valor_necessario' => 100, 'cor' => '#34d399'],
            ['nome' => 'Lendário',    'icone' => '👑', 'descricao' => 'Conquistou 500 pontos',  'tipo' => 'pontos', 'valor_necessario' => 500, 'cor' => '#fbbf24'],

            // Por Frequência
            ['nome' => 'Presente',    'icone' => '🎯', 'descricao' => '10 presenças registradas',  'tipo' => 'frequencia', 'valor_necessario' => 10, 'cor' => '#a855f7'],
            ['nome' => 'Dedicado',    'icone' => '🏆', 'descricao' => '25 presenças registradas',  'tipo' => 'frequencia', 'valor_necessario' => 25, 'cor' => '#fbbf24'],

            // Por Comportamento
            ['nome' => 'Exemplar',    'icone' => '😇', 'descricao' => 'Comportamento acima de 20 pts', 'tipo' => 'comportamento', 'valor_necessario' => 20, 'cor' => '#34d399'],
            ['nome' => 'Zen',         'icone' => '🧘', 'descricao' => 'Comportamento acima de 50 pts', 'tipo' => 'comportamento', 'valor_necessario' => 50, 'cor' => '#60a5fa'],

            // Por Atividades
            ['nome' => 'Estudioso',   'icone' => '📚', 'descricao' => '5 atividades entregues',  'tipo' => 'atividades', 'valor_necessario' => 5,  'cor' => '#f472b6'],
            ['nome' => 'Aplicado',    'icone' => '🚀', 'descricao' => '10 atividades entregues', 'tipo' => 'atividades', 'valor_necessario' => 10, 'cor' => '#f97316'],
        ];

        foreach ($badges as $badge) {
            Badge::firstOrCreate(['nome' => $badge['nome']], $badge);
        }
    }
}