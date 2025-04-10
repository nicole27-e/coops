<?php
include 'conexion.php';

// Obtener valores del formulario
$nombre = $_POST['nombre'] ?? null;
$empleado = $_POST['empleado'] ?? null;
$rol = $_POST['rol'] ?? null;
$password = $_POST['password'] ?? null;

// Validar que todos los campos requeridos tengan valores
if ($nombre && $empleado && $rol && $password) {
    // Insertar datos en la base de datos
    $query = "INSERT INTO login (nombre, idrol, password, empleado) 
              VALUES ('$nombre', '$rol', '$password', '$empleado')";
    
    if ($conexion->query($query)) {
        echo "<script> alert('Los datos se guardaron exitosamente'); window.location= 'inicio.php'; </script>";
    } else {
        echo "<script> alert('Error en el registro: " . $conexion->error . "'); window.location= 'inicio.php'; </script>";
    }
} 
?>