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
<style>
  body {
    margin: 0;
    padding: 0;
    min-height: 100vh; /* Asegura que el body ocupe al menos toda la altura de la ventana */
    background: linear-gradient(135deg, #6a11cb, #a0a0a0);
    font-family: "Arial", sans-serif;
}

.table-container {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    padding: 30px;
    max-width: 1000px;
    width: 100%;
    margin: 20px auto; /* Centra el contenedor horizontalmente */
    animation: fadeInDown 0.8s ease-in-out;
}

.table-container h2 {
    color: #333;
    font-size: 28px;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: white;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #6a11cb;
    color: white;
    font-weight: bold;
}

.table tr:hover {
    background-color: #f5f5f5;
    transition: background-color 0.3s ease;
}

.btn-action {
    padding: 5px 10px;
    border-radius: 5px;
    border: none;
    background-color: #6a11cb;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-action:hover {
    background-color: #2575fc;
}

.search-box {
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.search-box input {
    width: 70%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ddd;
}

.search-box button:hover {
    background-color: #2575fc;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


@media (max-width: 768px) {
    .table-container {
        padding: 20px;
        margin: 10px;
    }

    .table th, .table td {
        padding: 8px;
    }

    .search-box {
        flex-direction: column;
    }

    .search-box input {
        width: 100%;
        margin-bottom: 10px;
    }

    .search-box button {
        width: 100%;
    }
}

.navbar-custom {
    background-color: #2f105b;
}

.navbar-custom .navbar-brand,
.navbar-custom .nav-link {
    color: #ffffff;
}

.navbar-custom .nav-link:hover {
    color: #6a11cb;
}
</style>
<body>
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
                <table class="table">
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
                                <a href="eliminarDatos.php?id_vasos=<?php echo $row["id_vasos"]; ?>" class="btn btn-danger">Eliminar</a>
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