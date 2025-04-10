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
<body style="background-color: #2f105b;">
    <?php include 'menu.php'?>

    <?php
      include 'conexion.php';
      $query="SELECT * FROM cliente";
      $resultado=$conexion->query($query);
    ?> 
    <br>
    <div class="container">
    <div class="row">
            <div class="col-12">
                <table class="table" style="color: white;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Ciudad</th>
                            <th>Estado</th>
                            <th>Código Postal</th>
                            <th>Email</th>
                            <th>Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($resultado->num_rows > 0) {
                        while($row = $resultado->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['id_cliente']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['direccion']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['ciudad']; ?></td>
                            <td><?php echo $row['estado']; ?></td>
                            <td><?php echo $row['cp']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="modificarCliente.php?id_cliente=<?php echo $row["id_cliente"]; ?>" class="btn btn-primary">Modificar</a>
                            </td>
                        </tr>
                        <?php
                            }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
    <script src="js/bootstrap.js"></script>
</body>
</html>