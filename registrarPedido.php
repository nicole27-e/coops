<?php
include 'conexion.php';

// Obtener valores del formulario
$cliente = $_POST['cliente'] ?? null;
$producto = $_POST['producto'] ?? null;
$fecha_pedido = $_POST['fecha_pedido'] ?? null;
$fecha_entrega = $_POST['fecha_entrega'] ?? null;
$cantidad = $_POST['cantidad'] ?? null;
$grabado = $_POST['grabado'] ?? null;
$descripcion = $_POST['descripcion'] ?? null;
$total = $_POST['total'] ?? null;

// Validar que todos los campos requeridos tengan valores
if ($cantidad && $cliente && $producto && $fecha_pedido && $fecha_entrega && $grabado && $descripcion && $total) {
    // Preparar la consulta para prevenir inyecciones SQL
    $query = $conexion->prepare("INSERT INTO pedidos (id_cliente, id_producto, fecha_entrega, fecha_pedido, cantidad, id_grabado, descripcion, total) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Vincular los parámetros
    $query->bind_param("iissdssd", $cliente, $producto, $fecha_entrega, $fecha_pedido, $cantidad, $grabado, $descripcion, $total);

    // Ejecutar la consulta
    if ($query->execute()) {
        echo "<script> alert('Los datos se guardaron exitosamente'); window.location= 'inicio.php'; </script>";
    } else {
        echo "<script> alert('Error en el registro: " . $query->error . "'); window.location= 'inicio.php'; </script>";
    }

    // Cerrar la consulta
    $query->close();
} else {
    echo "<script> alert('Por favor, complete todos los campos requeridos.'); window.location= 'inicio.php'; </script>";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
