<?php
// Incluir el archivo de conexión a la base de datos
require_once 'conexion.php';
// Conectar a la base de datos
$conexion = conectarDB('almacen');

$nombre = trim($_POST['nombre']);
$email = trim($_POST['correo']);
$telefono = trim($_POST['telefono']);
$servicio = trim($_POST['servicio']);
$consulta = trim($_POST['consulta']);
// Obtener la fecha y hora actual
$fecha = date('Y-m-d H:i:s');


// Preparar la consulta SQL
$sql = "INSERT INTO contactos (nombre, email, telefono, servicio, consulta, fecha) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $email, $telefono, $servicio, $consulta, $fecha);

// Ejecutar la consulta
if ($stmt->execute()) {
    //cierrar la conexion
    $stmt->close();

    //LLamar a una funcion especifica de javascript de script.js
    echo "<script>mostrarMensajeDeExito('Registro insertado de manera exitosa!','menu-details'); setTimeout(function(){ cargarURL('listar.php','menu-details',false);}, 2000);</script>";
    exit();
} else {
    echo "<script>mostrarMensajeDeError('Error al insertar el registro: '.$stmt->error','contenedor'); setTimeout(function(){ cargarURL('registrar.php','menu-details',false);}, 2000); </script>";
    return;
}
?>