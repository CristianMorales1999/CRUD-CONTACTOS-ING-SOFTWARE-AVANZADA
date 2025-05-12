<div id="contenedor" class="container">
  <h2>Contactarnos</h2>
  <form class="form">
    <label>Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required>

    <label>Email</label>
    <input type="email" id="correo" name="correo" placeholder="tucorreo@ejemplo.com" required>

    <label>Teléfono</label>
    <input type="tel" id="telefono" name="telefono" placeholder="999999999" required>

    <label>Servicio</label>
    <select id="servicio" name="servicio" required>
      <option value="" disabled selected>Seleccionar...</option>
      <option value="Informacion General">Información General</option>
      <option value="TI">TI</option>
      <option value="Teléfono">Teléfono</option>
    </select>

    <label>Consulta</label>
    <textarea id="consulta" name="consulta" placeholder="Escribe tu mensaje aquí..." rows="4"></textarea>

    <div class="form-buttons">
      <button type="button" class="btn" onclick="validarFormularioYRegistrar('menu-details');">Enviar</button>
      <button type="reset" class="btn cancel">Cancelar</button>
    </div>
  </form>
</div>