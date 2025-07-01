<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header('Content-Type: application/json');

require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Depuración - Ver los datos que llegan
    error_log("Datos POST recibidos: " . print_r($_POST, true));
    
    // Verificar que los campos no estén vacíos
    if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo json_encode([
            'success' => false, 
            'message' => 'Todos los campos son requeridos',
            'received_data' => $_POST // Para depuración
        ]);
        exit;
    }

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $conexion->begin_transaction();

        // Verificar si el correo ya existe
        $check_sql = "SELECT id FROM Usuario WHERE AES_DECRYPT(correo, 'tu-clave-secreta-muy-larga-y-segura-aqui') = ?";
        $check_stmt = $conexion->prepare($check_sql);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'Este correo electrónico ya está registrado']);
            exit;
        }

        // Insertar el usuario
        $sql = "INSERT INTO Usuario (nombre, correo, contrasena_hash, activo) VALUES (?, ?, ?, 1)";
        $stmt = $conexion->prepare($sql);
        
        // Debug - Verificar los valores antes de la inserción
        error_log("Valores a insertar - Nombre: $nombre, Email: $email, Password: [OCULTO]");
        
        $stmt->bind_param("sss", $nombre, $email, $password);

        if (!$stmt->execute()) {
            throw new Exception("Error al crear el usuario: " . $conexion->error);
        }

        $usuario_id = $conexion->insert_id;

        // Insertar en tabla Aprendiz
        $sql_aprendiz = "INSERT INTO Aprendiz (usuarioId) VALUES (?)";
        $stmt_aprendiz = $conexion->prepare($sql_aprendiz);
        $stmt_aprendiz->bind_param("i", $usuario_id);

        if (!$stmt_aprendiz->execute()) {
            throw new Exception("Error al asignar rol de aprendiz: " . $conexion->error);
        }

        $conexion->commit();
        echo json_encode(['success' => true, 'message' => 'Registro exitoso', 'redirect' => 'inicioSesion.html']);

    } catch (Exception $e) {
        $conexion->rollback();
        echo json_encode([
            'success' => false, 
            'message' => $e->getMessage(),
            'debug_info' => [
                'error_code' => $conexion->errno,
                'error_details' => $conexion->error
            ]
        ]);
    }

    $conexion->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>