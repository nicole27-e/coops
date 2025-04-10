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
    $query = "
        SELECT 
            p.id_pedidos,
            c.nombre AS cliente, 
            CONCAT(tv.tipo_vaso, ' ', cc.capacidad, ' ', cm.material) AS producto,
            p.cantidad,
            g.grabado AS grabado,
            p.descripcion,
            p.fecha_pedido,
            p.fecha_entrega,
            p.total
        FROM 
            pedidos p
        JOIN 
            cliente c ON p.id_cliente = c.id_cliente
        JOIN 
            tipo_vaso tv ON p.id_producto = tv.idtipo_vaso
        JOIN 
            catalago_capacidad cc ON p.id_producto = cc.id_capacidad
        JOIN 
            catalago_material cm ON p.id_producto = cm.id_material
        JOIN 
            tipo_grabado g ON p.id_grabado = g.id_grabado
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
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Grabado</th>
                            <th>Descripción</th>
                            <th>Fecha de Pedido</th>
                            <th>Fecha de Entrega</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultado && $resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_pedidos']; ?></td>
                            <td><?php echo $row['cliente']; ?></td>
                            <td><?php echo $row['producto']; ?></td>
                            <td><?php echo $row['cantidad']; ?></td>
                            <td><?php echo $row['grabado']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['fecha_pedido']; ?></td>
                            <td><?php echo $row['fecha_entrega']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                        </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='9'>No hay datos disponibles</td></tr>";
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
