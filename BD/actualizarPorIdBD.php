<?php
// Incluir el archivo de conexión a la base de datos
require_once 'conexion.php';
// Conectar a la base de datos
$conexion = conectarDB('almacen');
// Obtener datos del formulario para actualizar
$id = isset($_POST['id']) ? trim($_POST['id']) : '';
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
$servicio = isset($_POST['servicio']) ? trim($_POST['servicio']) : '';
$consulta = isset($_POST['consulta']) ? trim($_POST['consulta']) : '';
// Validar que todos los campos estén completos
if (empty($id) || empty($nombre) || empty($email) || empty($telefono) || empty($servicio) || empty($consulta)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Todos los campos son obligatorios.'
    ]);
    exit();
}
// Preparar la consulta SQL para actualizar el registro
$sql = "UPDATE contactos SET nombre = ?, email = ?, telefono = ?, servicio = ?, consulta = ? WHERE id = ?";
$stmt = $conexion->prepare($sql);
// Verificar si la preparación de la consulta fue exitosa
if (!$stmt) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Error en la consulta: ' . $conexion->error
    ]);
    exit();
}
// Vincular los parámetros
$stmt->bind_param("sssssi", $nombre, $email, $telefono, $servicio, $consulta, $id);
// Ejecutar la consulta
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Registro actualizado correctamente.'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se realizaron cambios en el registro.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Error al actualizar el registro: ' . $stmt->error
    ]);
}
$stmt->close();
$conexion->close();


?>