<?php
include 'conexion.php';

// Validar si los datos han sido enviados a través de POST
if (isset($_POST["id_vasos"]) && !empty($_POST["id_vasos"]) &&
    isset($_POST["nombre"], $_POST["material"], $_POST["capacidad"], $_POST["color"], $_POST["tipo_vaso"])) {

    // Recuperar los datos enviados
    $id_vasos = $_POST["id_vasos"];
    $nombre = $_POST["nombre"];
    $material = $_POST["material"];
    $capacidad = $_POST["capacidad"];
    $color = $_POST["color"];
    $tipo_vaso = $_POST["tipo_vaso"];

    // Preparar la consulta SQL
    $sql = "UPDATE catalogo_vasos 
            SET nombre = '$nombre', 
                id_material = '$material', 
                id_capacidad = '$capacidad', 
                id_color = '$color', 
                idtipo_vaso = '$tipo_vaso' 
            WHERE id_vasos = $id_vasos";

    // Ejecutar la consulta
    if ($conexion->query($sql)) {
        echo "<script> alert('Los datos se actualizaron exitosamente'); window.location= 'inicio.php'; </script>";
    } else {
        echo "<script> alert('Error en la actualización: " . $conexion->error . "'); window.location= 'inicio.php'; </script>";
    }
} else {
    echo "<script> alert('Error: datos incompletos'); window.location= 'inicio.php'; </script>";
}

?>
