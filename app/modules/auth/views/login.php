<?php
use App\Core\Helpers;
use App\Core\Session;

Session::start();
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EQF ServiceHub</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f3f6fb;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1100px;
            min-height: 600px;
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.12);
        }

        .login-info {
            padding: 48px;
            color: #ffffff;
            background: linear-gradient(135deg, #14378A 0%, #312b7d 45%, #6e1c5c 100%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .badge {
            display: inline-block;
            width: fit-content;
            padding: 10px 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.14);
            font-size: 13px;
            font-weight: 700;
        }

        .login-info h1 {
            margin-top: 36px;
            font-size: 38px;
            line-height: 1.08;
            max-width: 520px;
        }

        .login-info p {
            margin-top: 22px;
            font-size: 16px;
            line-height: 1.6;
            max-width: 520px;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.14);
            border-radius: 18px;
            padding: 22px;
            margin-top: 18px;
            backdrop-filter: blur(8px);
        }

        .info-card h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .info-card p {
            margin: 0;
            font-size: 14px;
        }

        .login-form-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
        }

        .login-form {
            width: 100%;
            max-width: 410px;
        }

        .logo-box {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            background: #eef3fb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 22px;
        }

        .login-form h2 {
            font-size: 32px;
            color: #0f172a;
            margin-bottom: 14px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 34px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 9px;
        }

        .forgot-link {
            font-size: 13px;
            font-weight: 700;
            color: #6e1c5c;
            text-decoration: none;
            margin-bottom: 9px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            height: 48px;
            border: 1px solid #dbe3ef;
            border-radius: 12px;
            background: #eef5ff;
            padding: 0 16px;
            outline: none;
            font-size: 14px;
            color: #0f172a;
        }

        input:focus {
            border-color: #14378A;
            box-shadow: 0 0 0 3px rgba(20, 55, 138, 0.12);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #64748b;
            margin-bottom: 22px;
        }

        .remember input {
            width: 15px;
            height: 15px;
        }

        .login-button {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 12px;
            background: #14378A;
            color: #ffffff;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .login-button:hover {
            background: #0f2c70;
        }

        .footer-text {
            margin-top: 28px;
            color: #94a3b8;
            font-size: 12px;
        }

        .error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 12px 14px;
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        @media (max-width: 900px) {
            .login-wrapper {
                grid-template-columns: 1fr;
            }

            .login-info {
                min-height: 420px;
            }
        }

        @media (max-width: 520px) {
            body {
                padding: 12px;
            }

            .login-info,
            .login-form-section {
                padding: 32px 24px;
            }

            .login-info h1 {
                font-size: 30px;
            }

            .login-form h2 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <main class="login-wrapper">

        <section class="login-info">
            <div>
                <span class="badge">EQF ServiceHub</span>

                <h1>Soporte centralizado y visibilidad operativa.</h1>

                <p>
                    Acceda a su espacio de trabajo, envíe solicitudes de TI, realice seguimiento del progreso y revise indicadores operativos clave desde una única plataforma.
                </p>
            </div>

            <div>
                <div class="info-card">
                    <h3>Portal Interno</h3>
                    <p>Accede al portal interno y completa tus cursos.</p>
                </div>

                <div class="info-card">
                    <h3>EQF</h3>
                    <p>Conoce mas del lugar donde trabajas.</p>
                </div>
            </div>
        </section>

        <section class="login-form-section">
            <div class="login-form">

                <div class="logo-box">💊</div>

                <h2>BIENVENIDO</h2>

                <p class="subtitle">
                    Inicia sesión para continuar en ServiceHub.
                </p>

                <?php if ($error): ?>
                    <div class="error">
                        <?= htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form action="<?= Helpers::baseUrl('login'); ?>" method="POST">

                    <div class="form-group">
                        <label>Email</label>
                        <input 
                            type="text" 
                            name="identifier" 
                            placeholder="correo@eqf.mx o código de empleado"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <label>Contraseña</label>
                            <a href="#" class="forgot-link">¿Olvidaste tu contraseña?</a>
                        </div>

                        <div class="password-wrapper">
                            <input 
                                id="passwordInput"
                                type="password" 
                                name="password" 
                                placeholder="Ingresa tu contraseña"
                                required
                            >

                            <button type="button" id="togglePassword" class="toggle-password">
                                Show
                            </button>
                        </div>
                    </div>

                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Mantener sesión activa
                    </label>

                    <button type="submit" class="login-button">
                        Iniciar sesión
                    </button>

                </form>

                <p class="footer-text">
                    © <?= date('Y'); ?> ServiceHub. Todos los derechos reservados.
                </p>

            </div>
        </section>

    </main>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');

        togglePassword.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            togglePassword.textContent = isPassword ? 'Hide' : 'Show';
        });
    </script>

</body>
</html>