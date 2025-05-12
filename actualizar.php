<?php
// Incluir el archivo de conexión a la base de datos
require_once 'BD/conexion.php';
// Conectar a la base de datos
$conexion = conectarDB('almacen');

// Obtener todos los registros para la tabla inicial
$sql = "SELECT * FROM contactos ORDER BY id ASC";
$stmt = $conexion->prepare($sql);
$contactos = [];
if ($stmt->execute()) {
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $contactos[] = $row;
  }
}
$stmt->close();
$conexion->close();
?>

<div id="container" class="container">
  <h2>Actualizar Contacto</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Servicio</th>
        <th>Consulta</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($contactos) > 0): ?>
        <?php foreach ($contactos as $contacto): ?>
          <tr>
            <td><?= $contacto['id'] ?></td>
            <td><?= $contacto['nombre'] ?></td>
            <td><?= $contacto['email'] ?></td>
            <td><?= $contacto['telefono'] ?></td>
            <td><?= $contacto['servicio'] ?></td>
            <td><?= $contacto['consulta'] ?></td>
            <td>
              <button class="btn actualizar-btn" onclick="cargarFormularioActualizar(<?= $contacto['id'] ?>)">Actualizar</button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7">No hay registros disponibles</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php
  //Variable de archivo padre de donde fué llamado
  $urlDeRetorno="actualizar.php";
  //Incluir archivo de formularioActualizar.php
  require_once "formularioActualizar.php";
?>