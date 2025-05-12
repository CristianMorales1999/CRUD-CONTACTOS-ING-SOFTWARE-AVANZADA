<?php
  // Incluir el archivo de conexión a la base de datos 
  require_once 'conexion.php';
  // Conectar a la base de datos
  $conexion = conectarDB('almacen');

  //preparar la consulta SQL
  $sql = "SELECT * FROM contactos order by id asc";
  $stmt = $conexion->prepare($sql);

  // Ejecutar la consulta
  if ($stmt->execute()) {
      // Obtener el resultado
      $resultado = $stmt->get_result();
  } else {
      // Manejar el error
      echo "<script>setTimeout(function(){ mostrarMensajeDeError('Error al obtener los registros: ".$stmt->error."','listado'); }, 2000);</script>";
      return;
  }

?>
