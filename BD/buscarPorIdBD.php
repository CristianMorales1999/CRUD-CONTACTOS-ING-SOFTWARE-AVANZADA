<?php
require_once 'conexion.php';
$conexion = conectarDB('almacen');

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

$sql = "SELECT * FROM contactos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $contacto = $result->fetch_assoc();
    echo json_encode([
        'status' => 'success',
        'contacto' => $contacto
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No se encontró el contacto.'
    ]);
}

$stmt->close();
$conexion->close();
exit();
?>
