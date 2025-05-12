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

<div id="actualizar-container" class="container">
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

<div id="formulario-actualizar" class="container" style="display: none;">
  <h2>Actualizar Contacto</h2>
  <form class="form" id="formulario-contacto">
    <input type="hidden" id="contacto-id">

    <label>Nombre</label>
    <input type="text" id="nombre" required>

    <label>Email</label>
    <input type="email" id="email" required>

    <label>Teléfono</label>
    <input type="tel" id="telefono" required>

    <label>Servicio</label>
    <select id="servicio">
      <option value="Teléfono">Teléfono</option>
      <option value="Información General">Información General</option>
      <option value="Soporte Técnico">Soporte Técnico</option>
      <option value="Consultoría">Consultoría</option>
    </select>

    <label>Consulta</label>
    <textarea id="consulta" rows="4"></textarea>

    <div class="form-buttons">
      <button type="button" class="btn" onclick="actualizarContacto()">Actualizar</button>
      <button type="button" class="btn cancel" onclick="cancelarEdicion()">Cancelar</button>
    </div>
  </form>
</div>