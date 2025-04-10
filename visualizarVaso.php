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
<body style="background-color: #2f105b; ">
    <?php include 'menu.php'; ?>

    <?php
      include 'conexion.php';
      // Ajustar la consulta para obtener los valores descriptivos
      $query = "
          SELECT 
              cv.id_vasos,
              cv.nombre,
              cc.capacidad AS capacidad,
              cm.material AS material,
              co.color AS color,
              tv.tipo_vaso AS tipo_vaso
          FROM 
              catalogo_vasos cv
          JOIN 
              catalago_capacidad cc ON cv.id_capacidad = cc.id_capacidad
          JOIN 
              catalago_material cm ON cv.id_material = cm.id_material
          JOIN 
              catalago_color co ON cv.id_color = co.id_color
          JOIN 
              tipo_vaso tv ON cv.idtipo_vaso = tv.idtipo_vaso
      ";
      $resultado = $conexion->query($query);
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
                            <th>Capacidad</th>
                            <th>Material</th>
                            <th>Color</th>
                            <th>Tipo de Vaso</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultado && $resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_vasos']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['capacidad']; ?></td>
                            <td><?php echo $row['material']; ?></td>
                            <td><?php echo $row['color']; ?></td>
                            <td><?php echo $row['tipo_vaso']; ?></td>
                            <td>
                                <a href="modificarVaso.php?id_vasos=<?php echo $row["id_vasos"]; ?>" class="btn btn-primary">Editar</a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No hay datos disponibles</td></tr>";
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