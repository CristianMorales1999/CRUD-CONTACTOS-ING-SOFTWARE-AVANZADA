<?php

// Incluir el archivo de conexión a la base de datos
require_once 'conexion.php';

// Conectar a la base de datos
$conexion = conectarDB('almacen');

// Obtener la columna y el valor de búsqueda desde el formulario
$columna = isset($_POST['columna']) ? trim($_POST['columna']) : '';
$valor = isset($_POST['valor']) ? trim($_POST['valor']) : '';

// Preparar la consulta SQL
$sql = "SELECT * FROM contactos WHERE $columna LIKE ?";
$stmt = $conexion->prepare($sql);

// Verificar si la preparación de la consulta fue exitosa
if (!$stmt) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Error en la consulta: ' . $conexion->error
    ]);
    exit();
}

// Agregar comodines para la búsqueda
$valor = "%$valor%";
$stmt->bind_param("s", $valor);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Obtener el resultado
    $resultado = $stmt->get_result();

    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Generar el contenido de la tabla
        $tabla = "<thead>";
        $tabla .= "<tr>";
        $tabla .= "<th>ID</th>";
        $tabla .= "<th>Nombre</th>";
        $tabla .= "<th>Email</th>";
        $tabla .= "<th>Teléfono</th>";
        $tabla .= "<th>Servicio</th>";
        $tabla .= "<th>Consulta</th>";
        $tabla .= "<th>Acción</th>";
        $tabla .= "</tr>";
        $tabla .= "</thead>";
        $tabla .= "<tbody>";
        
        while ($fila = $resultado->fetch_assoc()) {
            $tabla .= "<tr>";
            $tabla .= "<td>" . $fila['id'] . "</td>";
            $tabla .= "<td>" . $fila['nombre'] . "</td>";
            $tabla .= "<td>" . $fila['email'] . "</td>";
            $tabla .= "<td>" . $fila['telefono'] . "</td>";
            $tabla .= "<td>" . $fila['servicio'] . "</td>";
            $tabla .= "<td>" . $fila['consulta'] . "</td>";
            $tabla .= "<td>".
                "<button class='btn actualizar-btn' onclick='cargarFormularioActualizar(" . $fila['id'] . ")'>Actualizar</button>" .
                "</td>";
            $tabla .= "</tr>";
        }
        $tabla .= "</tbody>";

        echo json_encode([
            'status' => 'success',
            'message' => 'Búsqueda exitosa',
            'tabla' => $tabla
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se encontraron resultados.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Error al obtener los registros: ' . $stmt->error
    ]);
}

// Cerrar la declaración y la conexión
$stmt->close();
$conexion->close();
exit();
?>
