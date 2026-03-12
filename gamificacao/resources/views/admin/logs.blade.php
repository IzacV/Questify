@extends('layouts.dashboard')
@section('title', 'Logs do Sistema')
@section('content')

<div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="font-family: 'Orbitron', sans-serif; color: #a855f7; font-size: 24px;">📋 Logs do Sistema</h2>
        <a href="/admin/dashboard" style="text-decoration: none;">
            <button style="width: auto; padding: 10px 20px; margin-top: 0;">← Voltar</button>
        </a>
    </div>

    @if($logs->isEmpty())
        <p style="opacity: 0.4; font-size: 13px;">Nenhum log registrado ainda.</p>
    @else
    <div style="display: flex; flex-direction: column; gap: 8px;">
        @foreach($logs as $log)
        @php
            $icone = '📝';
            $cor = 'rgba(255,255,255,0.7)';
            if (str_contains($log->description, 'login')) { $icone = '🔑'; $cor = '#60a5fa'; }
            elseif (str_contains($log->description, 'logout')) { $icone = '🚪'; $cor = 'rgba(255,255,255,0.4)'; }
            elseif (str_contains($log->description, 'confirmada')) { $icone = '✅'; $cor = '#34d399'; }
            elseif (str_contains($log->description, 'negativo')) { $icone = '😤'; $cor = '#f87171'; }
            elseif (str_contains($log->description, 'positivo')) { $icone = '😊'; $cor = '#34d399'; }
            elseif (str_contains($log->description, 'criou')) { $icone = '➕'; $cor = '#a855f7'; }
            elseif (str_contains($log->description, 'deletou') || str_contains($log->description, 'deletada')) { $icone = '🗑️'; $cor = '#f87171'; }
            elseif (str_contains($log->description, 'cadastrado')) { $icone = '👤'; $cor = '#60a5fa'; }
            elseif (str_contains($log->description, 'falhou')) { $icone = '⚠️'; $cor = '#fbbf24'; }
            elseif (str_contains($log->description, 'entregou')) { $icone = '📚'; $cor = '#a855f7'; }
            elseif (str_contains($log->description, 'moveu')) { $icone = '🔄'; $cor = '#60a5fa'; }
        @endphp
        <div style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07); border-radius: 10px; padding: 14px 18px; display: flex; gap: 14px; align-items: flex-start;">
            <span style="font-size: 20px; flex-shrink: 0;">{{ $icone }}</span>
            <div style="flex: 1;">
                <div style="font-size: 13px; color: {{ $cor }};">{{ $log->description }}</div>
                <div style="font-size: 11px; opacity: 0.4; margin-top: 4px;">{{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i:s') }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <div style="margin-top: 20px;">
        {{ $logs->links() }}
    </div>
    @endif
</div>

@endsection