@extends('layouts.dashboard')
@section('title', 'Entregas')
@section('content')

<div style="max-width: 1000px; margin: 0 auto;">

    <div style="margin-bottom: 30px;">
        <h2 style="font-family: 'Orbitron', sans-serif; color: #a855f7; letter-spacing: 2px; font-size: 24px;">
            Entregas — {{ $atividade->titulo }}
        </h2>
        <p style="opacity: 0.6; margin-top: 8px;">Turno: {{ $atividade->turno }} | Pontos: {{ $atividade->pontos }} pts | Data limite: {{ $atividade->data_limite ?? 'Sem limite' }}</p>
    </div>

    @if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
    @endif

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 40px;">
        <thead>
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                <th style="padding: 12px; text-align: left; color: #a855f7; font-family: 'Orbitron', sans-serif; font-size: 13px;">Aluno</th>
                <th style="padding: 12px; text-align: left; color: #a855f7; font-family: 'Orbitron', sans-serif; font-size: 13px;">Status</th>
                <th style="padding: 12px; text-align: left; color: #a855f7; font-family: 'Orbitron', sans-serif; font-size: 13px;">Confirmar</th>
                <th style="padding: 12px; text-align: left; color: #a855f7; font-family: 'Orbitron', sans-serif; font-size: 13px;">Comportamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            @php
                $entrega = $entregas->firstWhere('fk_id_aluno', $aluno->id_aluno);
            @endphp
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                <td style="padding: 12px; opacity: 0.9;">{{ $aluno->nome }}</td>
                <td style="padding: 12px;">
                    @if(!$entrega)
                        <span style="color: rgba(255,255,255,0.4);">Pendente</span>
                    @elseif($entrega->status === 'entregue')
                        <span style="color: #fbbf24;">Entregue ⏳</span>
                    @elseif($entrega->status === 'confirmado')
                        <span style="color: #34d399;">Confirmado ✅</span>
                    @endif
                </td>
                <td style="padding: 12px;">
                    @if($entrega && $entrega->status === 'entregue')
                    <form method="POST" action="/entregas/{{ $entrega->id_entrega }}/confirmar">
                        @csrf
                        <button style="width: auto; padding: 8px 16px; margin-top: 0; background: linear-gradient(135deg, #059669, #047857); font-size: 12px;">✅ Confirmar</button>
                    </form>
                    @elseif($entrega && $entrega->status === 'confirmado')
                        <span style="opacity: 0.4; font-size: 12px;">—</span>
                    @else
                        <span style="opacity: 0.4; font-size: 12px;">Sem entrega</span>
                    @endif
                </td>
                <td style="padding: 12px;">
                    <form method="POST" action="/comportamento" style="display: flex; flex-direction: column; gap: 6px;">
                        @csrf
                        <input type="hidden" name="fk_id_aluno" value="{{ $aluno->id_aluno }}">
                        <input type="text" name="motivo" placeholder="Motivo do comportamento" required style="padding: 6px 10px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.15); background: rgba(255,255,255,0.05); color: white; outline: none; font-size: 12px;">
                        <input type="text" name="motivo_livre" placeholder="Detalhe (opcional)" style="padding: 6px 10px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.15); background: rgba(255,255,255,0.05); color: white; outline: none; font-size: 12px;">
                        <input type="number" name="pontos" placeholder="Pontos (ex: -10 ou 5)" required style="padding: 6px 10px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.15); background: rgba(255,255,255,0.05); color: white; outline: none; font-size: 12px;">
                        <button type="submit" style="width: auto; padding: 6px 14px; margin-top: 0; font-size: 12px;">Registrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/atividades" style="color: rgba(255,255,255,0.5); text-decoration: none; font-size: 14px;">← Voltar</a>

</div>

@endsection