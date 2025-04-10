<?php
include 'conexion.php';

// Obtener valores del formulario
$nombre = $_POST['nombre'] ?? null;
$material = $_POST['material'] ?? null;
$capacidad = $_POST['capacidad'] ?? null;
$color = $_POST['color'] ?? null;
$tipo_vaso = $_POST['tipo_vaso'] ?? null;

// Validar que todos los campos requeridos tengan valores
if ($nombre && $material && $capacidad && $color && $tipo_vaso) {
    // Insertar datos en la base de datos
    $query = "INSERT INTO catalogo_vasos (nombre, id_material, id_capacidad, id_color, idtipo_vaso) 
              VALUES ('$nombre', '$material', '$capacidad', '$color', '$tipo_vaso')";
    
    if ($conexion->query($query)) {
        echo "<script> alert('Los datos se guardaron exitosamente'); window.location= 'inicio.php'; </script>";
    } else {
        echo "<script> alert('Error en el registro: " . $conexion->error . "'); window.location= 'inicio.php'; </script>";
    }
} 
?>