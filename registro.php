<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header('Content-Type: application/json');

require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los campos no estén vacíos
    if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son requeridos']);
        exit;
    }

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $conexion->begin_transaction();

        // Insertar el usuario
        $sql = "INSERT INTO Usuario (nombre, correo, contrasena_hash, activo) VALUES (?, ?, ?, 1)";
        $stmt = $conexion->prepare($sql);
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
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    $conexion->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>