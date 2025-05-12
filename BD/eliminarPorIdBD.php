<?php

require_once 'conexion.php';

$conexion=conectarDB('almacen');

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

// Preparar la consulta SQL para actualizar el registro
$sql = "DELETE FROM contactos WHERE id = ?";

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
$stmt->bind_param("i", $id);
// Ejecutar la consulta
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Registro con ID '.$id.' eliminado correctamente.'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se encontró ningún registro con el ID '.$id.' para eliminar.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Error al eliminar el registro: ' . $stmt->error
    ]);
}
$stmt->close();
$conexion->close();

?>
