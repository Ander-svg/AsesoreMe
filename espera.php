<?php
session_start();

// Si no hay intentos fallidos, redirigir a login
if (!isset($_SESSION['login_attempts']) || $_SESSION['login_attempts'] < 3) {
    header('Location: inicioSesion.html');
    exit();
}

$waiting_time = 60; // 60 segundos
$current_time = time();
$time_elapsed = $current_time - $_SESSION['last_attempt_time'];
$time_remaining = max(0, $waiting_time - $time_elapsed);

// Si ya pasó el tiempo de espera, reiniciar intentos y redirigir
if ($time_remaining <= 0) {
    $_SESSION['login_attempts'] = 0;
    header('Location: inicioSesion.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espera - AsesoraMe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto p-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Demasiados intentos fallidos</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-6">Por seguridad, debes esperar antes de intentar nuevamente.</p>
            
            <div class="text-4xl font-bold text-indigo-600 mb-6">
                <span id="timer"><?php echo $time_remaining; ?></span>
                <span class="text-lg text-gray-500">segundos</span>
            </div>

            <p class="text-sm text-gray-500">Serás redirigido automáticamente cuando termine el tiempo.</p>
        </div>
    </div>

    <script>
        let timeLeft = <?php echo $time_remaining; ?>;
        const timerElement = document.getElementById('timer');

        const timer = setInterval(() => {
            timeLeft--;
            timerElement.textContent = timeLeft;

            if (timeLeft <= 0) {
                clearInterval(timer);
                window.location.href = 'inicioSesion.html';
            }
        }, 1000);
    </script>
</body>
</html>