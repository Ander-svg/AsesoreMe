<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

session_start();
require 'conexion.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validar campos vacíos
    if (empty($correo) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Por favor, completa todos los campos.']);
        exit();
    }

    // 1. Validar en la tabla Usuario
    $stmt = $conexion->prepare("SELECT id, nombre, correo, contrasena_hash, activo FROM Usuario WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verificar si la cuenta está activa
        if (!$usuario['activo']) {
            echo json_encode(['success' => false, 'message' => 'Esta cuenta ha sido desactivada.']);
            exit();
        }

        // 2. Verificar la contraseña hasheada
        if (password_verify($password, $usuario['contrasena_hash'])) {
            // 3. Determinar el rol del usuario (Asesor o Aprendiz)
            $rol = null;
            $usuarioId = $usuario['id'];

            // ¿Es Asesor?
            $stmt_asesor = $conexion->prepare("SELECT id FROM Asesor WHERE usuarioId = ?");
            $stmt_asesor->bind_param("i", $usuarioId);
            $stmt_asesor->execute();
            if ($stmt_asesor->get_result()->num_rows > 0) {
                $rol = 'asesor';
            }
            $stmt_asesor->close();

            // Si no es asesor, ¿es Aprendiz?
            if (is_null($rol)) {
                $stmt_aprendiz = $conexion->prepare("SELECT id FROM Aprendiz WHERE usuarioId = ?");
                $stmt_aprendiz->bind_param("i", $usuarioId);
                $stmt_aprendiz->execute();
                if ($stmt_aprendiz->get_result()->num_rows > 0) {
                    $rol = 'aprendiz';
                }
                $stmt_aprendiz->close();
            }

            // 4. Guardar datos en la sesión
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_nombre'] = $usuario['nombre'];
            $_SESSION['user_correo'] = $usuario['correo'];
            $_SESSION['user_rol'] = $rol; // Guardamos el rol

            // Respuesta de éxito
            echo json_encode(['success' => true, 'rol' => $rol, 'nombre' => $usuario['nombre']]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas. Inténtalo de nuevo.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'El correo electrónico no está registrado.']);
    }

    $stmt->close();
    $conexion->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no permitido.']);
}
?>