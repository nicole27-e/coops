<?php
    include 'conexion.php';
    $id_vasos = $_GET["id_vasos"];
    $sql = "DELETE from catalogo_vasos where id_vasos = ".$id_vasos;
    if ($conexion->query($sql)) {
        echo "<script> alert('Los datos se borraron exitosamente'); window.location= 'inicio.php'; </script>";
    } else {
        echo "<script> alert('Error en el registro: " . $conexion->error . "'); window.location= 'inicio.php'; </script>";
    }
?>