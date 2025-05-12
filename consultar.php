<div class="container">
  <h2>Consultar Contactos</h2>
  <form class="form">
    <label>Buscar por:</label>
    <select id="columna" name="columna" required>
      <option value="nombre">Nombre</option>
      <option value="email">Email</option>
      <option value="telefono">Teléfono</option>
      <option value="servicio">Servicio</option>
      <option value="consulta">Consulta</option>
    </select>
    <input type="text" id="busqueda" name="busqueda" placeholder="Ingrese criterio de búsqueda">
    <button type="button" class="btn" onclick="buscarItemPorCampo('tabla', 'mensaje');">Buscar</button>
  </form>

  <!-- Contenedor para los mensajes -->
  <div id="mensaje"></div>

  <!-- Contenedor para los resultados -->
  <table id="tabla"></table>
</div>

<?php
// Incluir el contenido html de archivo de listar.php
require_once 'listar.php';
?>

