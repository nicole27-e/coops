<?php
  session_start();

  if (!isset($_SESSION['idrol'])) {
    header('location: login.php');
  } else {
    if ($_SESSION['idrol'] != 1) {
      echo "<script> alert('No tienes acceso a esto');window.location= 'inicio.php' </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coops</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <script src="js/jquery-3.6.1.js"></script>
</head>
<body style="background-color: #2f105b; background-image: url('coopslogo.png'); background-size: cover; background-position: center; margin: 0; height: 100vh;">
    
    <?php include 'menu.php';?>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <hr>
                <div class="container">
                <form action="registroColaborador.php" method="post" enctype="multipart/form-data">
                <div class="card mb-3">
                    <div class="card-header">
                        Agregar Colaborador
                    </div>
                    <div class="card mb-3" style="">
                        <div class="row no-gutters">
                            <div class="card-body">
                                
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                                </div>
                                <input type="text" value="" name="nombre" class="form-control" placeholder="Ingresa el nombre">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Número de empleado</span>
                                </div>
                                <input type="text" value="" name="empleado" class="form-control" placeholder="Ingresa el número de empleado">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Password</span>
                                </div>
                                <input type="text" value="" name="password" class="form-control" placeholder="Ingresa la contraseña">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="width: 100%;">
                                    <span class="input-group-text" id="basic-addon1">Rol</span>
                                    <select class="form-control" id="" name="rol" style="width: 100%;">
                                        <option> Seleccionar
                                        <?php 
                                            include 'conexion.php';               
                                            $query = "SELECT idrol, rol FROM rol";
                                            $resultado = $conexion->query($query);
                                            while ($fila = $resultado->fetch_assoc()) {
                                                echo "<option value='" . $fila['idrol'] . "'>" . $fila['rol'] . "</option>";
                                            }
                                        ?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                        <a href="inicio.php" class="btn btn-danger">Regresar</a>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </div> 
                </div>
            </div>
                </form></div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>
</html>