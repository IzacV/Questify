@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('content')

<div>
    <h2 style="font-family: 'Orbitron', sans-serif; color: #a855f7; font-size: 24px; margin-bottom: 30px;">Painel Admin</h2>

    {{-- CARDS --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px; margin-bottom: 40px;">
        <div style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 12px; padding: 20px; text-align: center;">
            <div style="font-size: 28px; margin-bottom: 8px;">👨‍🏫</div>
            <div style="font-family: 'Orbitron', sans-serif; font-size: 11px; color: #a855f7; margin-bottom: 6px;">Instrutores</div>
            <div style="font-size: 28px; font-weight: bold;">{{ $totalInstrutores }}</div>
        </div>
        <div style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 12px; padding: 20px; text-align: center;">
            <div style="font-size: 28px; margin-bottom: 8px;">👨‍🎓</div>
            <div style="font-family: 'Orbitron', sans-serif; font-size: 11px; color: #a855f7; margin-bottom: 6px;">Alunos</div>
            <div style="font-size: 28px; font-weight: bold;">{{ $totalAlunos }}</div>
        </div>
        <div style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 12px; padding: 20px; text-align: center;">
            <div style="font-size: 28px; margin-bottom: 8px;">🏫</div>
            <div style="font-family: 'Orbitron', sans-serif; font-size: 11px; color: #a855f7; margin-bottom: 6px;">Turmas</div>
            <div style="font-size: 28px; font-weight: bold;">{{ $totalTurmas }}</div>
        </div>
        <div style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 12px; padding: 20px; text-align: center;">
            <div style="font-size: 28px; margin-bottom: 8px;">📝</div>
            <div style="font-family: 'Orbitron', sans-serif; font-size: 11px; color: #a855f7; margin-bottom: 6px;">Logs Hoje</div>
            <div style="font-size: 28px; font-weight: bold;">{{ $totalLogsHoje }}</div>
        </div>
    </div>

    {{-- BOTÕES --}}
    <div style="display: flex; gap: 16px; margin-bottom: 40px; flex-wrap: wrap;">
        <a href="/admin/instrutores" style="text-decoration: none;">
            <button style="width: auto; padding: 12px 24px; margin-top: 0;">👨‍🏫 Gerenciar Instrutores</button>
        </a>
        <a href="/admin/alunos" style="text-decoration: none;">
            <button style="width: auto; padding: 12px 24px; margin-top: 0;">👨‍🎓 Gerenciar Alunos</button>
        </a>
        <a href="/admin/logs" style="text-decoration: none;">
            <button style="width: auto; padding: 12px 24px; margin-top: 0; background: linear-gradient(135deg, #0f766e, #0d9488);">📋 Ver Logs</button>
        </a>
    </div>

    {{-- LOGS RECENTES --}}
    <div style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 12px; padding: 20px;">
        <h3 style="font-family: 'Orbitron', sans-serif; font-size: 13px; color: #a855f7; letter-spacing: 1px; margin-bottom: 16px;">📋 ATIVIDADE RECENTE</h3>
        @if($logsRecentes->isEmpty())
            <p style="opacity: 0.4; font-size: 13px;">Nenhuma atividade registrada ainda.</p>
        @else
            @foreach($logsRecentes as $log)
            @php
                $icone = '📝';
                $cor = 'rgba(255,255,255,0.7)';
                if (str_contains($log->description, 'login')) { $icone = '🔑'; $cor = '#60a5fa'; }
                elseif (str_contains($log->description, 'logout')) { $icone = '🚪'; $cor = 'rgba(255,255,255,0.4)'; }
                elseif (str_contains($log->description, 'confirmada')) { $icone = '✅'; $cor = '#34d399'; }
                elseif (str_contains($log->description, 'negativo')) { $icone = '😤'; $cor = '#f87171'; }
                elseif (str_contains($log->description, 'positivo')) { $icone = '😊'; $cor = '#34d399'; }
                elseif (str_contains($log->description, 'criou')) { $icone = '➕'; $cor = '#a855f7'; }
                elseif (str_contains($log->description, 'deletada')) { $icone = '🗑️'; $cor = '#f87171'; }
                elseif (str_contains($log->description, 'cadastrado')) { $icone = '👤'; $cor = '#60a5fa'; }
                elseif (str_contains($log->description, 'falhou')) { $icone = '⚠️'; $cor = '#fbbf24'; }
                elseif (str_contains($log->description, 'entregou')) { $icone = '📚'; $cor = '#a855f7'; }
            @endphp
            <div style="display: flex; gap: 14px; align-items: flex-start; padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.05);">
                <span style="font-size: 18px; flex-shrink: 0;">{{ $icone }}</span>
                <div style="flex: 1;">
                    <div style="font-size: 13px; color: {{ $cor }};">{{ $log->description }}</div>
                    <div style="font-size: 11px; opacity: 0.4; margin-top: 3px;">{{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i') }}</div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>

@endsection