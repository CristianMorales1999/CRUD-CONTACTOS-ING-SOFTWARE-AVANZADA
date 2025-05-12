<?php
  // Incluir el archivo de conexión a la base de datos 
  require_once 'BD/conexion.php';
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

<div id="listado" class="container">
  <h2>Lista de Contactos</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Servicio</th><th>Consulta</th>
      </tr>
    </thead>
    <tbody>
      <?php
         //mostrar los registros
      if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['nombre'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['telefono'] . "</td>";
          echo "<td>" . $row['servicio'] . "</td>";
          echo "<td>" . $row['consulta'] . "</td>";
          echo "</tr>";
        }
      } else {
        // No hay registros
        echo "<tr><td colspan='6'>No hay registros disponibles</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
