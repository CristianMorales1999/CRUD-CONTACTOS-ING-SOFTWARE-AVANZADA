
function cargarURL(url,contenedor,efectoDeCarga=true){ 
  
  // Esperar n minilisegundos antes de mostrar el loader
  if(efectoDeCarga){
    mostrarLoader(300); 
  }
    
  // Realizar la petición AJAX
    $.get(url,{},function(data){
      $(`#${contenedor}`).html(data);
    }).fail(function() {
      $(`#${contenedor}`).html(`
        <div class="error">
          <h2>Error al cargar el contenido</h2>
        </div>
      `);
    });
}


function insertarNuevoItem(contenedor){
    //Obtener datos del formulario
    let nombre = $("#nombre").val().trim();
    let correo = $("#correo").val().trim();
    let telefono = $("#telefono").val().trim();
    let servicio = $("#servicio").val();
    let consulta = $("#consulta").val().trim();

    if (nombre === "" || correo === "" || telefono === "" || servicio === "" || consulta === "") {// Mostrar mensaje de error
      mostrarMensajeDeError("Por favor, completa todos los campos", contenedor);
      setTimeout(function(){ cargarURL('registrar.php','menu-details',false);}, 2000);
      return;
    }
  // Realizar la petición AJAX
    $.post("BD/insertarbd.php", { 
      'nombre':nombre, 
      'correo':correo,
      'telefono':telefono,
      'servicio':servicio,
      'consulta':consulta
    }, function(data){
      $(`#${contenedor}`).html(data);
    }).fail(function() {// Mostrar mensaje de error
      mostrarMensajeDeError("Error al cargar el contenido", contenedor);
    });
}

function buscarItemPorCampo(tablaContenedor, mensajeContenedor) {
  // Obtener columna y valor a buscar
  let columna = $("#columna").val();
  let valor = $("#busqueda").val().trim();
  if (columna === "" || valor === "") {
      mostrarMensajeDeError("Por favor, completa todos los campos", mensajeContenedor);
      return;
  }
  // Limpiar tabla antes de la nueva búsqueda
  vaciarContenedor(tablaContenedor);
  // Realizar la petición AJAX
  $.post("BD/buscarbd.php", { 
      'columna':columna, 
      'valor':valor,
  }, function(response){
      // Parsear la respuesta JSON
      let data = JSON.parse(response);
      // Limpiar el contenedor de mensajes
      vaciarContenedor(mensajeContenedor);
      if (data.status === 'success') {
          // Mostrar el mensaje de éxito brevemente
          mostrarMensajeDeExito(data.message, mensajeContenedor);
          // Mostrar la tabla después de que el mensaje desaparezca
          setTimeout(() => {
              vaciarContenedor(mensajeContenedor);  // Quitar el mensaje
              $(`#${tablaContenedor}`).html(data.tabla);  // Mostrar la nueva tabla
          }, 2000); // Tiempo en milisegundos
      } else {
          // Mostrar el mensaje de error
          mostrarMensajeDeError(data.message, mensajeContenedor);
      }
  }).fail(function() {
      mostrarMensajeDeError("Error al cargar el contenido", mensajeContenedor);
  });
}

// Función para vaciar un contenedor
function vaciarContenedor(contenedor) {
  $(`#${contenedor}`).html("");
}

// Función para mostrar un mensaje de éxito (temporal)
function mostrarMensajeDeExito(mensaje, contenedor) {
  $(`#${contenedor}`).html(`
      <div class="success">
          <h2>${mensaje}</h2>
      </div>
  `);
}

// Función para mostrar un mensaje de error (persistente)
function mostrarMensajeDeError(mensaje, contenedor) {
  $(`#${contenedor}`).html(`
      <div class="error">
          <h2>${mensaje}</h2>
      </div>
  `);
}

// Función para mostrar el loader
function mostrarLoader(milisegundos = 1000) {
  document.getElementById("loader").style.display = "flex";
  setTimeout(() => document.getElementById("loader").style.display = "none", milisegundos);

}

function cargarFormularioActualizar(contactoId, contenedorAOcultar="container", contenedorAMostrar="formulario-actualizar") {
  // Ocultar la tabla y mostrar el formulario
  $("#"+contenedorAOcultar).hide();
  $("#"+contenedorAMostrar).show();

  // Cargar los datos del contacto
  $.post("BD/buscarPorIdBD.php", { 'id': contactoId }, function(response){
      let data = JSON.parse(response);
      if (data.status === 'success') {
          $("#contacto-id").val(data.contacto.id);
          $("#nombre").val(data.contacto.nombre);
          $("#email").val(data.contacto.email);
          $("#telefono").val(data.contacto.telefono);
          $("#servicio").val(data.contacto.servicio);
          $("#consulta").val(data.contacto.consulta);
      } else {
          alert("Error al cargar el contacto.");
          cancelarEdicion(contenedorAMostrar,contenedorAOcultar);
      }
  }).fail(function() {
      alert("Error al cargar el contacto.");
      cancelarEdicion(contenedorAMostrar,contenedorAOcultar);
  });
}

function actualizarContacto(urlDeRetorno="actualizar.php") {
  let id = $("#contacto-id").val();
  let nombre = $("#nombre").val().trim();
  let email = $("#email").val().trim();
  let telefono = $("#telefono").val().trim();
  let servicio = $("#servicio").val();
  let consulta = $("#consulta").val().trim();


  if (nombre === "" || email === "" || telefono === "" || servicio === "" || consulta === "") {
      alert("Por favor, completa todos los campos.");
      return;
  }

  $.post("BD/actualizarPorIdBD.php", {
      'id': id,
      'nombre': nombre,
      'email': email,
      'telefono': telefono,
      'servicio': servicio,
      'consulta': consulta
  }, function(response){
      let data = JSON.parse(response);
      if (data.status === 'success') {
        mostrarMensajeDeExito(data.message,'formulario-actualizar'); 
      } else {
          mostrarMensajeDeError(data.message,'formulario-actualizar');
      }
      setTimeout(function(){ cargarURL(urlDeRetorno,'menu-details',false);}, 2000);
  }).fail(function() {
      alert("Error al actualizar el contacto.");
  });
}

function cancelarEdicion(contenedorAOcultar="formulario-actualizar", contenedorAMostrar="actualizar-container") {
  // Ocultar el formulario y mostrar la tabla
  $("#"+contenedorAOcultar).hide();
  $("#"+contenedorAMostrar).show();
}
