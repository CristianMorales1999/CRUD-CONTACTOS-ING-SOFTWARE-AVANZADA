<?php
  // Incluir el archivo de conexión a la base de datos 
  require_once 'BD/obtenerTodosLosRegistrosBD.php';
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
      <?php if ($resultado->num_rows > 0): ?>
        <?php while ($row = $resultado->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['telefono'] ?></td>
            <td><?= $row['servicio'] ?></td>
            <td><?= $row['consulta'] ?></td>
            <td>
              <button class="btn actualizar-btn" onclick="cargarFormularioActualizar(<?= $row['id'] ?>)">Actualizar</button>
            </td>
          </tr>
        <?php endwhile; ?>
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