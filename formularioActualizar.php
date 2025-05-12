<div id="formulario-actualizar" class="container" style="display: none;">
  <h2>Actualizar Contacto</h2>
  <form class="form" id="formulario-contacto">
    <input type="hidden" id="contacto-id">

    <label>Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required>

    <label>Email</label>
    <input type="email" id="correo" name="correo" placeholder="tucorreo@ejemplo.com" required>

    <label>Teléfono</label>
    <input type="tel" id="telefono" name="telefono" placeholder="999999999" required>

    <label>Servicio</label>
    <select id="servicio" name="servicio" required>
      <option value="Información General">Información General</option>
      <option value="TI">TI</option>
      <option value="Teléfono">Teléfono</option>
    </select>

    <label>Consulta</label>
    <!-- <textarea id="consulta" rows="4"></textarea> -->
    <textarea id="consulta" name="consulta" placeholder="Escribe tu mensaje aquí..." rows="4"></textarea>

    <div class="form-buttons">
      <button type="button" class="btn" onclick="validarFormularioYRegistrar('<?= $urlDeRetorno ?>','update')">Actualizar</button>

      <button type="button" class="btn cancel" onclick="cancelarEdicion('formulario-actualizar','container')">Cancelar</button>
    </div>
  </form>
</div>
