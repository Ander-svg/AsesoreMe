<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");

session_start();
require 'conexion.php';

header('Content-Type: application/json');

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
            // AQUÍ GUARDAMOS LA SESIÓN
            $_SESSION['nombre_usuario'] = $usuario['nombre'];
            $_SESSION['user_id'] = $usuario['id'];
            
            echo json_encode([
                'success' => true,
                'mensaje' => 'Inicio de sesión exitoso'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'El correo no está registrado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>