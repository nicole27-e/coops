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
    <?php
    include 'conexion.php';
    $id_vasos = $_GET["id_vasos"];
    $sql = "SELECT * FROM catalogo_vasos WHERE id_vasos=" . $id_vasos;
    $resultado = $conexion->query($sql);
    $registro = $resultado->fetch_assoc();
    ?>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <hr>
                <div class="container">
                <form action="actualizarVasos.php" method="post" enctype="multipart/form-data">
                <div class="card mb-3">
                    <div class="card-header">
                        Agregar Vaso Al Catálogo
                    </div>
                    <input name="id_vasos" type="hidden" value="<?php echo $registro["id_vasos"];?>">
                    <div class="card mb-3" style="">
                        <div class="row no-gutters">
                            <div class="card-body">
                                
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                                </div>
                                <input type="text" value="<?php echo $registro["nombre"]?>" name="nombre" class="form-control" placeholder="Ingresa el nombre del vaso">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="width: 100%;">
                                    <span class="input-group-text" id="basic-addon1">Capacidad</span>
                                    <select class="form-control" name="capacidad" style="width: 100%;">
                                        <option value="">Seleccionar</option>
                                        <?php 
                                            $query = "SELECT id_capacidad, capacidad FROM catalago_capacidad";
                                            $resultado = $conexion->query($query);
                                            while ($fila = $resultado->fetch_assoc()) {
                                                $selected = ($fila['id_capacidad'] == $registro['id_capacidad']) ? "selected" : "";
                                                echo "<option value='" . $fila['id_capacidad'] . "' $selected>" . $fila['capacidad'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="width: 100%;">
                                    <span class="input-group-text" id="basic-addon1">Material</span>
                                    <select class="form-control" name="material" style="width: 100%;">
                                        <option value="">Seleccionar</option>
                                        <?php 
                                            $query = "SELECT id_material, material FROM catalago_material";
                                            $resultado = $conexion->query($query);
                                            while ($fila = $resultado->fetch_assoc()) {
                                                $selected = ($fila['id_material'] == $registro['id_material']) ? "selected" : "";
                                                echo "<option value='" . $fila['id_material'] . "' $selected>" . $fila['material'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="width: 100%;">
                                    <span class="input-group-text" id="basic-addon1">Color</span>
                                    <select class="form-control" name="color" style="width: 100%;">
                                        <option value="">Seleccionar</option>
                                        <?php 
                                            $query = "SELECT id_color, color FROM catalago_color";
                                            $resultado = $conexion->query($query);
                                            while ($fila = $resultado->fetch_assoc()) {
                                                $selected = ($fila['id_color'] == $registro['id_color']) ? "selected" : "";
                                                echo "<option value='" . $fila['id_color'] . "' $selected>" . $fila['color'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" style="width: 100%;">
                                    <span class="input-group-text" id="basic-addon1">Tipo de Vaso</span>
                                    <select class="form-control" name="tipo_vaso" style="width: 100%;">
                                        <option value="">Seleccionar</option>
                                        <?php 
                                            $query = "SELECT idtipo_vaso, tipo_vaso FROM tipo_vaso";
                                            $resultado = $conexion->query($query);
                                            while ($fila = $resultado->fetch_assoc()) {
                                                $selected = ($fila['idtipo_vaso'] == $registro['idtipo_vaso']) ? "selected" : "";
                                                echo "<option value='" . $fila['idtipo_vaso'] . "' $selected>" . $fila['tipo_vaso'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <a href="inicio.php" class="btn btn-danger">Regresar</a>
                        <input type="submit" class="btn btn-primary" value="Actualizar">
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