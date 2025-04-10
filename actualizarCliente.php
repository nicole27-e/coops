<?php
    include 'conexion.php';

    $id_cliente = $_POST["id_cliente"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $estado = $_POST["estado"];
    $ciudad = $_POST["ciudad"];
    $cp = $_POST["cp"];

    $sql = "UPDATE cliente SET nombre='".$nombre."', direccion='".$direccion."', telefono='".$telefono."',
    email='".$email."', estado='".$estado."', ciudad='".$ciudad."' , cp='".$cp."'  "."WHERE id_cliente=".$id_cliente;

    if ($conexion->query($sql)) {
        echo "<script> alert('Los datos se guardaron exitosamente'); window.location= 'inicio.php'; </script>";
    } else {
        echo "<script> alert('Error en el registro: " . $conexion->error . "'); window.location= 'inicio.php'; </script>";
    }
?>