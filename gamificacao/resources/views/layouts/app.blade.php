<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Questify')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;600&family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">

<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Rajdhani', sans-serif;
    }

    body {
        height: 100vh;
        background:
            radial-gradient(circle at top, #1e1b4b, #020617);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        transition: background 0.4s ease, color 0.4s ease;
    }

    /* CONTAINER */
    .container {
        width: 900px;
        min-height: 480px;
        display: flex;
        border-radius: 16px;
        overflow: hidden;

        /* Glass effect */
        background: rgba(17, 24, 39, 0.75);
        backdrop-filter: blur(12px);

        border: 1px solid rgba(255,255,255,0.08);
        box-shadow: 0 0 40px rgba(124,58,237,0.35);
        transition: background 0.4s ease, box-shadow 0.4s ease;
    }

    /* LOGIN */
    .login-box {
        width: 50%;
        padding: 60px 45px;
        background: rgba(255,255,255,0.04);
        transition: background 0.4s ease;
    }

    .login-box h2 {
        font-family: 'Orbitron', sans-serif;
        color: #a855f7;
        margin-bottom: 35px;
        letter-spacing: 2px;
        font-size: 28px;
        transition: color 0.4s ease;
    }

    .input-group {
        margin-bottom: 18px;
    }

    input {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid rgba(255,255,255,0.15);
        background: rgba(255,255,255,0.05);
        color: white;
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s, background 0.4s, color 0.4s;
    }

    input::placeholder {
        color: rgba(255,255,255,0.5);
        transition: color 0.4s;
    }

    input:focus {
        border-color: #a855f7;
        box-shadow: 0 0 10px rgba(168,85,247,0.6);
    }

    button {
        width: 100%;
        padding: 13px;
        margin-top: 25px;
        border: none;
        border-radius: 8px;
        font-family: 'Orbitron', sans-serif;
        letter-spacing: 1px;
        background: linear-gradient(135deg, #6d28d9, #9333ea);
        color: white;
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s, background 0.4s;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 0 20px rgba(147,51,234,0.7);
    }

    /* BANNER */
    .banner {
        width: 50%;
        background:
            linear-gradient(rgba(2,6,23,0.8), rgba(76,29,149,0.85)),
            url("https://images.unsplash.com/photo-1519389950473-47ba0277781c");
        background-size: cover;
        background-position: center;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 30px;
        transition: background 0.4s ease;
    }

    .banner h1 {
        font-family: 'Orbitron', sans-serif;
        font-size: 42px;
        letter-spacing: 4px;
        text-shadow: 0 0 15px rgba(168,85,247,0.8);
        transition: color 0.4s, text-shadow 0.4s;
    }

    .banner p {
        margin-top: 12px;
        font-size: 16px;
        opacity: 0.85;
    }

    /* LINK CADASTRO */
    .register-link {
        margin-top: 18px;
        text-align: center;
        font-size: 15px;
    }

    .register-link a {
        color: #ffffff;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s, text-shadow 0.3s;
    }

    .register-link a:hover {
        color: #e9d5ff;
        text-shadow: 0 0 8px rgba(182, 236, 240, 0.8);
    }

    .password-info {
        display: block;
        padding-left: 12px;
        margin-top: 6px;
        font-size: 12px;
        color: rgba(255,255,255,0.65);
        transition: color 0.4s;
    }

    .success-message {
        background: rgba(34,197,94,0.15);
        border: 1px solid rgba(34,197,94,0.4);
        color: #86efac;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 20px;
        text-align: center;
        font-size: 14px;
    }

    /* BOTÃO TOGGLE */
    #theme-toggle {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 999;
        width: auto;
        padding: 10px 14px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        background: rgba(255,255,255,0.1);
        color: white;
        margin-top: 0;
        font-size: 18px;
        transition: background 0.3s, box-shadow 0.3s;
    }

    #theme-toggle:hover {
        transform: translateY(-2px);
        box-shadow: 0 0 12px rgba(255,255,255,0.2);
    }

    /* ===================== */
    /*      MODO CLARO       */
    /* ===================== */

    body.light {
        background: radial-gradient(circle at top, #dbeafe, #f0f9ff);
        color: #0f172a;
    }

    body.light .container {
        background: rgba(255, 255, 255, 0.82);
        border: 1px solid rgba(59, 130, 246, 0.18);
        box-shadow: 0 0 40px rgba(37, 99, 235, 0.3);
        backdrop-filter: blur(12px);
    }

    body.light .login-box {
        background: rgba(255, 255, 255, 0.55);
    }

    body.light .login-box h2 {
        color: #1d4ed8;
        text-shadow: 0 0 14px rgba(37, 99, 235, 0.35);
    }

    body.light input {
        background: rgba(239, 246, 255, 0.85);
        color: #0f172a;
        border: 1px solid rgba(0, 0, 0, 0.3);
    }

    body.light input::placeholder {
        color: rgba(15, 23, 42, 0.4);
    }

    body.light input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 10px rgba(37, 99, 235, 0.5);
    }

    body.light button {
        background: linear-gradient(135deg, #1d4ed8, #2563eb);
        box-shadow: 0 0 14px rgba(37, 99, 235, 0.4);
    }

    body.light button:hover {
        box-shadow: 0 0 22px rgba(37, 99, 235, 0.65);
    }

    body.light .banner {
        background:
            linear-gradient(rgba(239, 240, 241, 0.72), rgba(187, 188, 192, 0.82)),
            url("https://images.unsplash.com/photo-1519389950473-47ba0277781c");
        background-size: cover;
        background-position: center;
    }

    body.light .banner h1 {
        color: #659bff;
        text-shadow: 0 0 18px rgba(96, 165, 250, 0.9);
    }

    body.light .banner p {
        color: rgba(255, 255, 255, 0.88);
        opacity: 1;
    }

    body.light .register-link a {
        color: #0f172a;
    }

    body.light .register-link a:hover {
        color: #1d4ed8;
        text-shadow: 0 0 8px rgba(37, 99, 235, 0.4);
    }

    body.light .password-info {
        color: rgba(15, 23, 42, 0.5);
    }

    body.light #theme-toggle {
        background: rgba(255, 255, 255, 0.65);
        color: #1d4ed8;
        border: 1px solid rgba(59, 130, 246, 0.3);
        box-shadow: 0 2px 10px rgba(37, 99, 235, 0.15);
    }

    body.light #theme-toggle:hover {
        box-shadow: 0 4px 16px rgba(37, 99, 235, 0.28);
    }

    body.light .success-message {
        background: rgba(37, 99, 235, 0.1);
        border: 1px solid rgba(37, 99, 235, 0.35);
        color: #1d4ed8;
    }

</style>

    @yield('styles')
</head>

<body>

    <button id="theme-toggle">☀️</button>

    @yield('content')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const button = document.getElementById("theme-toggle");

            // carregar preferência
            if (localStorage.getItem("theme") === "light") {
                document.body.classList.add("light");
                button.textContent = "🌙";
            } else {
                button.textContent = "☀️";
            }

            button.addEventListener("click", () => {
                document.body.classList.toggle("light");

                const isLight = document.body.classList.contains("light");

                button.textContent = isLight ? "🌙" : "☀️";
                localStorage.setItem("theme", isLight ? "light" : "dark");
            });
        });
    </script>

</body>
</html>