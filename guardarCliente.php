<?php
include 'conexion.php';

// Obtener valores del formulario
$nombre = $_POST['nombre'] ?? null;
$direccion = $_POST['direccion'] ?? null;
$estado = $_POST['ciudad'] ?? null;
$telefono = $_POST['telefono'] ?? null;
$cp = $_POST['cp'] ?? null;
$email = $_POST['email'] ?? null;
$ciudad = $_POST['ciudad'] ?? null;

// Validar que todos los campos requeridos tengan valores
if ($nombre && $direccion && $estado && $telefono && $cp && $email && $ciudad) {
    // Insertar datos en la base de datos
    $query = "INSERT INTO cliente (nombre, direccion, ciudad, estado, cp, telefono, email) 
              VALUES ('$nombre', '$direccion', '$ciudad', '$estado', '$cp', '$telefono', '$email')";
    
    if ($conexion->query($query)) {
        echo "<script> alert('Los datos se guardaron exitosamente'); window.location= 'inicio.php'; </script>";
    } else {
        echo "<script> alert('Error en el registro: " . $conexion->error . "'); window.location= 'inicio.php'; </script>";
    }
} 
?>