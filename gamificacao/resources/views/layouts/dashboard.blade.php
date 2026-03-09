<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Questify')</title>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;600&family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Rajdhani', sans-serif;
        }

        body {
            min-height: 100vh;
            background: radial-gradient(circle at top, #1e1b4b, #020617);
            color: white;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 40px;
            background: rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-logo {
            font-family: 'Orbitron', sans-serif;
            font-size: 20px;
            color: #a855f7;
            letter-spacing: 3px;
            text-decoration: none;
        }

        .topbar-nav {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .topbar-nav a {
            text-decoration: none;
        }

        .topbar-nav button {
            width: auto;
            padding: 9px 20px;
            margin-top: 0;
            font-size: 13px;
            border: none;
            border-radius: 8px;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #6d28d9, #9333ea);
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .topbar-nav button:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(147, 51, 234, 0.7);
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc2626, #b91c1c) !important;
        }

        .btn-admin {
            background: linear-gradient(135deg, #b45309, #d97706) !important;
        }

        .layout-body {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 70px);
        }

        .layout-sidebar {
            width: 220px;
            min-height: 100%;
            background: rgba(255, 255, 255, 0.02);
            border-right: 1px solid rgba(255, 255, 255, 0.07);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 16px;
            gap: 12px;
            flex-shrink: 0;
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #a855f7;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.5);
        }

        .avatar-placeholder {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6d28d9, #9333ea);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Orbitron', sans-serif;
            font-size: 26px;
            font-weight: bold;
            border: 3px solid #a855f7;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.5);
        }

        .avatar-admin {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #b45309, #d97706);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Orbitron', sans-serif;
            font-size: 26px;
            font-weight: bold;
            border: 3px solid #d97706;
            box-shadow: 0 0 20px rgba(217, 119, 6, 0.5);
        }

        .sidebar-nome {
            font-family: 'Orbitron', sans-serif;
            font-size: 13px;
            color: white;
            text-align: center;
            margin-top: 4px;
        }

        .sidebar-info {
            font-size: 12px;
            opacity: 0.6;
            text-align: center;
        }

        .sidebar-divider {
            width: 100%;
            height: 1px;
            background: rgba(255, 255, 255, 0.07);
            margin: 8px 0;
        }

        .sidebar-stat {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            padding: 10px 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar-stat-label {
            font-size: 12px;
            opacity: 0.6;
        }

        .sidebar-stat-value {
            font-family: 'Orbitron', sans-serif;
            font-size: 16px;
            color: #a855f7;
        }

        .layout-content {
            flex: 1;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .layout-content>div,
        .layout-content>form {
            width: 100%;
            max-width: 1000px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.05);
            color: white;
            outline: none;
            transition: 0.3s;
        }

        input::placeholder,
        textarea::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #a855f7;
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.6);
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 10px;
            border: none;
            border-radius: 8px;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #6d28d9, #9333ea);
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(147, 51, 234, 0.7);
        }

        .success-message {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.4);
            color: #86efac;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .password-info {
            display: block;
            padding-left: 12px;
            margin-top: 6px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.65);
        }

        /* SININHO */
        .notif-btn {
            position: relative;
            background: rgba(255,255,255,0.06) !important;
            border: 1px solid rgba(255,255,255,0.12) !important;
            padding: 9px 14px !important;
            font-size: 18px !important;
            cursor: pointer;
        }

        .notif-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: #ef4444;
            color: white;
            font-size: 10px;
            font-family: 'Orbitron', sans-serif;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            display: none;
        }

        .notif-dropdown {
            position: absolute;
            top: 60px;
            right: 160px;
            width: 340px;
            background: #0f0c29;
            border: 1px solid rgba(168,85,247,0.3);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
            flex-direction: column;
            overflow: hidden;
        }

        .notif-dropdown.open {
            display: flex;
        }

        .notif-header {
            padding: 14px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Orbitron', sans-serif;
            font-size: 12px;
            color: #a855f7;
        }

        .notif-marcar-btn {
            background: none !important;
            border: none !important;
            color: rgba(255,255,255,0.4) !important;
            font-size: 11px !important;
            cursor: pointer;
            padding: 0 !important;
            margin: 0 !important;
            width: auto !important;
            font-family: 'Rajdhani', sans-serif !important;
        }

        .notif-marcar-btn:hover {
            color: white !important;
            transform: none !important;
            box-shadow: none !important;
        }

        .notif-list {
            max-height: 360px;
            overflow-y: auto;
        }

        .notif-item {
            padding: 12px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.04);
            display: flex;
            gap: 12px;
            align-items: flex-start;
            cursor: pointer;
            transition: background 0.2s;
        }

        .notif-item:hover {
            background: rgba(255,255,255,0.04);
        }

        .notif-item.nao-lida {
            background: rgba(168,85,247,0.06);
        }

        .notif-icone {
            font-size: 20px;
            flex-shrink: 0;
        }

        .notif-texto {
            font-size: 13px;
            color: rgba(255,255,255,0.85);
            line-height: 1.4;
        }

        .notif-tempo {
            font-size: 11px;
            color: rgba(255,255,255,0.3);
            margin-top: 4px;
        }

        .notif-vazia {
            padding: 30px;
            text-align: center;
            color: rgba(255,255,255,0.3);
            font-size: 13px;
        }

        @keyframes toastIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
    @yield('styles')
</head>

<body>

    {{-- TOPBAR --}}
    <div class="topbar">
        @if(Auth::guard('admin')->check())
        <a href="/admin/dashboard" class="topbar-logo">QUESTIFY <span style="font-size: 12px; color: #d97706;">ADMIN</span></a>
        @else
        <a href="/dashboard" class="topbar-logo">QUESTIFY</a>
        @endif
        <div class="topbar-nav">
            @if(Auth::guard('admin')->check())
            <a href="/turmas"><button class="btn-admin">🏫 Turmas</button></a>
            <a href="/alunos"><button class="btn-admin">👨‍🎓 Alunos</button></a>
            <a href="/atividades"><button class="btn-admin">📚 Atividades</button></a>
            <a href="/admin/instrutores"><button class="btn-admin">👨‍🏫 Instrutores</button></a>
            <a href="/admin/dashboard"><button class="btn-admin">🏠 Início</button></a>
            @elseif(Auth::guard('instrutor')->check())
            <a href="/turmas"><button>🏫 Turmas</button></a>
            <a href="/alunos"><button>👨‍🎓 Alunos</button></a>
            <a href="/atividades"><button>📚 Atividades</button></a>
            <a href="/perfil/instrutor/editar"><button>✏️ Perfil</button></a>
            <a href="/dashboard"><button>🏠 Início</button></a>
            @else
            <a href="/perfil/editar"><button>✏️ Editar Perfil</button></a>
            <a href="/dashboard"><button>🏠 Início</button></a>
            @endif

            {{-- SININHO - só para aluno e instrutor --}}
            @if(Auth::guard('web')->check() || Auth::guard('instrutor')->check())
            <div style="position:relative;">
                <button class="notif-btn" onclick="toggleNotif()" title="Notificações">
                    🔔
                    <span class="notif-badge" id="notif-badge">0</span>
                </button>
            </div>

            {{-- DROPDOWN DE NOTIFICAÇÕES --}}
            <div class="notif-dropdown" id="notif-dropdown">
                <div class="notif-header">
                    <span>🔔 NOTIFICAÇÕES</span>
                    <button class="notif-marcar-btn" onclick="marcarTodasLidas()">Marcar todas como lidas</button>
                </div>
                <div class="notif-list" id="notif-list">
                    <div class="notif-vazia">Carregando...</div>
                </div>
            </div>
            @endif

            <form method="POST" action="/logout">
                @csrf
                <button class="btn-danger">Sair</button>
            </form>
        </div>
    </div>

    {{-- BODY --}}
    <div class="layout-body">

        {{-- SIDEBAR --}}
        <div class="layout-sidebar">
            @if(Auth::guard('admin')->check())
            @php $usuario = Auth::guard('admin')->user(); @endphp
            <div class="avatar-admin">⚙️</div>
            <div class="sidebar-nome">{{ $usuario->nome }}</div>
            <div class="sidebar-info" style="color: #d97706; opacity: 1;">Admin</div>
            @elseif(Auth::guard('instrutor')->check())
            @php $usuario = Auth::guard('instrutor')->user(); @endphp
            @if($usuario->foto)
            <img src="{{ asset('storage/' . $usuario->foto) }}" class="avatar">
            @else
            <div class="avatar-placeholder">
                {{ strtoupper(substr($usuario->nome, 0, 1)) }}
            </div>
            @endif
            <div class="sidebar-nome">{{ $usuario->nome }}</div>
            <div class="sidebar-info">Instrutor</div>
            @else
            @php $usuario = Auth::guard('web')->user(); @endphp
            @if($usuario->foto)
            <img src="{{ asset('storage/' . $usuario->foto) }}" class="avatar">
            @else
            <div class="avatar-placeholder">
                {{ strtoupper(substr($usuario->nome, 0, 1)) }}
            </div>
            @endif
            <div class="sidebar-nome">{{ $usuario->nome }}</div>
            <div class="sidebar-info">
                {{ $usuario->turma ? $usuario->turma->nome . ' - ' . $usuario->turma->sala : 'Sem turma' }}
            </div>
            <div class="sidebar-info">{{ $usuario->turno ?? 'Sem turno' }}</div>
            <div class="sidebar-divider"></div>
            <div class="sidebar-stat">
                <span class="sidebar-stat-label">⭐ Pontos</span>
                <span class="sidebar-stat-value" id="sidebar-pontos">{{ $usuario->pontos }}</span>
            </div>
            <div class="sidebar-stat">
                <span class="sidebar-stat-label">😊 Comportamento</span>
                <span class="sidebar-stat-value" id="sidebar-comportamento">{{ $usuario->pontos_comportamento }}</span>
            </div>
            <div class="sidebar-stat">
                <span class="sidebar-stat-label">📅 Frequência</span>
                <span class="sidebar-stat-value" id="sidebar-frequencia">{{ $usuario->frequencia }}</span>
            </div>
            @endif
        </div>

        {{-- CONTEÚDO --}}
        <div class="layout-content">
            @yield('content')
        </div>

    </div>

    {{-- PUSHER --}}
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}'
        });

        // Toast
        function showToast(msg, tipo, icone) {
            const colors = {
                green:  { bg: 'rgba(52,211,153,0.15)',  border: 'rgba(52,211,153,0.4)',  text: '#34d399' },
                red:    { bg: 'rgba(248,113,113,0.15)', border: 'rgba(248,113,113,0.4)', text: '#f87171' },
                purple: { bg: 'rgba(168,85,247,0.15)',  border: 'rgba(168,85,247,0.4)',  text: '#a855f7' },
                blue:   { bg: 'rgba(96,165,250,0.15)',  border: 'rgba(96,165,250,0.4)',  text: '#60a5fa' },
                info:   { bg: 'rgba(168,85,247,0.15)',  border: 'rgba(168,85,247,0.4)',  text: '#a855f7' },
            };
            const c = colors[tipo] || colors.info;
            let container = document.getElementById('toast-container');
            if (!container) {
                container = document.createElement('div');
                container.id = 'toast-container';
                container.style.cssText = 'position:fixed;top:80px;right:24px;z-index:9999;display:flex;flex-direction:column;gap:10px;';
                document.body.appendChild(container);
            }
            const toast = document.createElement('div');
            toast.style.cssText = `padding:14px 18px;border-radius:10px;background:${c.bg};border:1px solid ${c.border};color:${c.text};font-family:'Rajdhani',sans-serif;font-size:14px;max-width:320px;display:flex;gap:10px;align-items:flex-start;animation:toastIn 0.3s ease;backdrop-filter:blur(20px);box-shadow:0 4px 20px rgba(0,0,0,0.3);`;
            toast.innerHTML = `<span style="font-size:18px;">${icone}</span><span>${msg}</span>`;
            container.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(20px)';
                toast.style.transition = 'all 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        }

        // Sininho
        function toggleNotif() {
            const dropdown = document.getElementById('notif-dropdown');
            dropdown.classList.toggle('open');
            if (dropdown.classList.contains('open')) {
                carregarNotificacoes();
            }
        }

        // Fecha dropdown ao clicar fora
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('notif-dropdown');
            if (dropdown && !dropdown.contains(e.target) && !e.target.closest('.notif-btn')) {
                dropdown.classList.remove('open');
            }
        });

        function tempoRelativo(dateStr) {
            const diff = Math.floor((new Date() - new Date(dateStr)) / 1000);
            if (diff < 60) return 'agora mesmo';
            if (diff < 3600) return Math.floor(diff/60) + ' min atrás';
            if (diff < 86400) return Math.floor(diff/3600) + 'h atrás';
            return Math.floor(diff/86400) + 'd atrás';
        }

        function carregarNotificacoes() {
            fetch('/notificacoes')
                .then(r => r.json())
                .then(data => {
                    const list = document.getElementById('notif-list');
                    const badge = document.getElementById('notif-badge');

                    if (data.length === 0) {
                        list.innerHTML = '<div class="notif-vazia">✨ Nenhuma notificação nova</div>';
                        badge.style.display = 'none';
                        return;
                    }

                    badge.textContent = data.length;
                    badge.style.display = 'flex';

                    list.innerHTML = data.map(n => `
                        <div class="notif-item nao-lida" onclick="marcarLida(${n.id_notificacao}, this)">
                            <span class="notif-icone">${n.icone}</span>
                            <div>
                                <div class="notif-texto">${n.mensagem}</div>
                                <div class="notif-tempo">${tempoRelativo(n.created_at)}</div>
                            </div>
                        </div>
                    `).join('');
                });
        }

        function marcarLida(id, el) {
            fetch(`/notificacoes/${id}/lida`, {
                method: 'PUT',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' }
            }).then(() => {
                el.classList.remove('nao-lida');
                el.style.opacity = '0.4';
                setTimeout(() => el.remove(), 300);
                atualizarBadge(-1);
            });
        }

        function marcarTodasLidas() {
            fetch('/notificacoes/todas-lidas', {
                method: 'PUT',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' }
            }).then(() => {
                document.getElementById('notif-list').innerHTML = '<div class="notif-vazia">✨ Nenhuma notificação nova</div>';
                const badge = document.getElementById('notif-badge');
                badge.style.display = 'none';
            });
        }

        function atualizarBadge(delta) {
            const badge = document.getElementById('notif-badge');
            const atual = parseInt(badge.textContent || '0') + delta;
            if (atual <= 0) {
                badge.style.display = 'none';
            } else {
                badge.textContent = atual;
                badge.style.display = 'flex';
            }
        }

        // Carrega badge ao iniciar
        @if(Auth::guard('web')->check() || Auth::guard('instrutor')->check())
        fetch('/notificacoes')
            .then(r => r.json())
            .then(data => {
                const badge = document.getElementById('notif-badge');
                if (data.length > 0) {
                    badge.textContent = data.length;
                    badge.style.display = 'flex';
                }
            });
        @endif

        // Canal do aluno
        @if(Auth::guard('web')->check())
        const canalAluno = pusher.subscribe('aluno.{{ Auth::guard("web")->user()->id_aluno }}');
        canalAluno.bind('notificacao', function(data) {
            showToast(data.mensagem, data.tipo, data.icone);
            atualizarBadge(1);
            if (data.pontos && data.pontos != 0) {
                const el = document.getElementById('sidebar-pontos');
                if (el) el.textContent = parseInt(el.textContent) + parseInt(data.pontos);
            }
        });
        @endif

        // Canal do instrutor
        @if(Auth::guard('instrutor')->check())
        const canalInstrutor = pusher.subscribe('instrutor.{{ Auth::guard("instrutor")->user()->id_instrutor }}');
        canalInstrutor.bind('notificacao', function(data) {
            showToast(data.mensagem, data.tipo, data.icone);
            atualizarBadge(1);
        });
        @endif
    </script>

</body>

</html>