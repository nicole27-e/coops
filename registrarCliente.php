<?php
  session_start();
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
                <form action="guardarCliente.php" method="post" enctype="multipart/form-data">
                <div class="card mb-3">
                    <div class="card-header">
                        Agregar Cliente
                    </div>
                    <div class="card mb-3" style="">
                        <div class="row no-gutters">
                            <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nombre</span>
                                </div>
                                <input type="text" value="" name="nombre" class="form-control" placeholder="Ingresa el nombre" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Dirección</span>
                                </div>
                                <input type="text" value="" name="direccion" class="form-control" placeholder="Ingresa la dirección" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Ciudad</span>
                                </div>
                                <input type="text" value="" name="ciudad" class="form-control" placeholder="Ingresa la ciudad" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Estado</span>
                                </div>
                                <input type="text" value="" name="estado" class="form-control" placeholder="Ingresa el estado" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Código Postal</span>
                                </div>
                                <input type="text" value="" name="cp" class="form-control" placeholder="Ingresa código postal" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Teléfono</span>
                                </div>
                                <input type="tel" value="" name="telefono" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Ex: 012-345-6789" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Email</span>
                                </div>
                                <input type="email" value="" name="email" class="form-control" placeholder="Ingresa el email" required>
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