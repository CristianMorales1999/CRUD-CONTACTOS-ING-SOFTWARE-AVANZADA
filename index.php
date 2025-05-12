<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Contactos</title>

    <!--Incluir archivo de estilos de archivo estilo.css-->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/general.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Añadir el archivo de funciones.js-->
    <script src="js/script.js"></script>
</head>

<body>
    <div class="menu-container">
        <h1>MENÚ DE OPCIONES PARA CONTACTO</h1>
    </div>
    <div class="menu-options">
    
        <a href="#" class="menu-button" onclick="cargarURL('registrar.php','menu-details')">Ingreso</a>
        <a href="#" class="menu-button" onclick="cargarURL('listar.php','menu-details')">Listar</a>
        <a href="#" class="menu-button" onclick="cargarURL('consultar.php','menu-details')">Consultar</a>
        <a href="#" class="menu-button" onclick="cargarURL('actualizar.php','menu-details')">Actualizar</a>
        <a href="#" class="menu-button" onclick="cargarURL('eliminar.php','menu-details')">Eliminar</a>

    </div>
    <div id="menu-details"></div><!-- Contenedor para cargar el contenido de las opciones -->

    <!-- Loader -->
    <div id="loader" class="loader-overlay">
        <div class="spinner"></div>
    </div>
</body>

</html>