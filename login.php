<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

session_start();
require 'conexion.php';

header('Content-Type: application/json');

// Inicializar contador de intentos si no existe
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['last_attempt_time'] = 0;
}

// Verificar si está en tiempo de espera
$waiting_time = 60; // 60 segundos = 1 minuto
$current_time = time();
$time_elapsed = $current_time - $_SESSION['last_attempt_time'];

if ($_SESSION['login_attempts'] >= 3 && $time_elapsed < $waiting_time) {
    $time_remaining = $waiting_time - $time_elapsed;
    echo json_encode([
        'success' => false,
        'blocked' => true,
        'message' => "Demasiados intentos. Espera {$time_remaining} segundos.",
        'redirect' => 'espera.php'
    ]);
    exit();
}

// Si ya pasó el tiempo de espera, reiniciar intentos
if ($time_elapsed >= $waiting_time) {
    $_SESSION['login_attempts'] = 0;
}

$encryption_key = 'tu-clave-secreta-muy-larga-y-segura-aqui';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($correo) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Por favor, completa todos los campos.']);
        exit();
    }

    $sql = "SELECT id, CAST(AES_DECRYPT(nombre, ?) AS CHAR) AS nombre, CAST(AES_DECRYPT(correo, ?) AS CHAR) AS correo, contrasena_hash, activo
            FROM Usuario
            WHERE correo = AES_ENCRYPT(?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $encryption_key, $encryption_key, $correo, $encryption_key);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (!$usuario['activo']) {
            echo json_encode(['success' => false, 'message' => 'Esta cuenta ha sido desactivada.']);
            exit();
        }

        $input_hash = hash('sha256', $password);
        if ($input_hash === $usuario['contrasena_hash']) {
            // Login exitoso - reiniciar contador
            $_SESSION['login_attempts'] = 0;
            $_SESSION['nombre_usuario'] = $usuario['nombre'];
            $_SESSION['user_id'] = $usuario['id'];
            
            echo json_encode([
                'success' => true,
                'mensaje' => 'Inicio de sesión exitoso'
            ]);
        } else {
            // Incrementar intentos fallidos
            $_SESSION['login_attempts']++;
            $_SESSION['last_attempt_time'] = time();
            
            $intentos_restantes = 3 - $_SESSION['login_attempts'];
            
            if ($_SESSION['login_attempts'] >= 3) {
                echo json_encode([
                    'success' => false,
                    'blocked' => true,
                    'message' => 'Demasiados intentos. Espera 1 minuto.',
                    'redirect' => 'espera.php'
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => "Credenciales incorrectas. Te quedan {$intentos_restantes} intentos."
                ]);
            }
        }
    } else {
        // Incrementar intentos fallidos
        $_SESSION['login_attempts']++;
        $_SESSION['last_attempt_time'] = time();
        
        $intentos_restantes = 3 - $_SESSION['login_attempts'];
        
        if ($_SESSION['login_attempts'] >= 3) {
            echo json_encode([
                'success' => false,
                'blocked' => true,
                'message' => 'Demasiados intentos. Espera 1 minuto.',
                'redirect' => 'espera.php'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => "El correo no está registrado. Te quedan {$intentos_restantes} intentos."
            ]);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>