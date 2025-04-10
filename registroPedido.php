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
<body style="background-color: #2f105b;background-image: url('coopslogo.png'); background-size: cover; background-position: center; margin: 0; height: 100vh;">
    <?php include 'menu.php';?>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <div class="container">
                <form action="registrarPedido.php" method="post" enctype="multipart/form-data">
                <div class="card mb-3">
                    <div class="card-header">
                        Nuevo Pedido
                    </div>
                    <div class="card mb-3" style="">
                        <div class="row no-gutters">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend" style="width: 100%;">
                                        <span class="input-group-text" id="basic-addon1">Cliente</span>
                                        <select class="form-control" id="" name="cliente" style="width: 100%;" required>
                                            <option> Seleccionar cliente
                                            <?php 
                                                include 'conexion.php';               
                                                $query = "SELECT id_cliente, nombre FROM cliente";
                                                $resultado = $conexion->query($query);
                                                while ($fila = $resultado->fetch_assoc()) {
                                                    echo "<option value='" . $fila['id_cliente'] . "'>" . $fila['nombre'] . "</option>";
                                                }
                                            ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <a href="registrarCliente.php" class="card-link">Agregar Cliente</a>
                                <hr>
                                Detalles del Pedido
                                <hr>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Fecha Pedido</span>
                                    </div>
                                    <input type="date" value="" name="fecha_pedido" class="form-control" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Fecha Entrega</span>
                                    </div>
                                    <input type="date" value="" name="fecha_entrega" class="form-control" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Cantidad</span>
                                    </div>
                                    <input type="number" value="" id="cantidad" name="cantidad" class="form-control" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend" style="width: 100%;">
                                        <span class="input-group-text" id="basic-addon1">Producto</span>
                                        <select class="form-control" id="producto" name="producto" style="width: 100%;" required>
                                            <option>Seleccionar producto</option>
                                            <?php 
                                                include 'conexion.php';

                                                // Consulta SQL para obtener los nombres relacionados
                                                $query = "
                                                    SELECT 
                                                        cp.id_producto, 
                                                        tv.tipo_vaso AS tipo_vaso, 
                                                        cc.capacidad AS capacidad, 
                                                        cm.material AS material,
                                                        cc.precio_capacidad,
                                                        cm.precio_material
                                                    FROM 
                                                        catalago_producto cp
                                                    JOIN 
                                                        tipo_vaso tv ON cp.idtipo_vaso = tv.idtipo_vaso
                                                    JOIN 
                                                        catalago_capacidad cc ON cp.id_capacidad = cc.id_capacidad
                                                    JOIN 
                                                        catalago_material cm ON cp.id_material = cm.id_material
                                                ";

                                                // Ejecutar la consulta
                                                $resultado = $conexion->query($query);

                                                // Verificar si hay resultados
                                                if ($resultado->num_rows > 0) {
                                                    // Generar las opciones del <select>
                                                    while ($fila = $resultado->fetch_assoc()) {
                                                        $producto = $fila['tipo_vaso'] . " " . $fila['capacidad'] . " " . $fila['material'];
                                                        $precio_unitario = $fila['precio_capacidad'] + $fila['precio_material'];
                                                        echo "<option value='" . $fila['id_producto'] . "' data-precio-unitario='" . $precio_unitario . "'>" . $producto . "</option>";
                                                    }
                                                } else {
                                                    echo "<option>No hay productos disponibles</option>";
                                                }

                                                // Cerrar la conexión
                                                $conexion->close();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- Input para Precio Unitario -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Precio Unitario</span>
                                    </div>
                                    <input type="number" id="precioUnitario" class="form-control" value="0" readonly>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Total</span>
                                    </div>
                                    <input type="number" id="total" class="form-control" value="0" readonly>
                                </div>
                                <hr>
                                Detalles del grabado
                                <hr>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend" style="width: 100%;">
                                        <span class="input-group-text" id="basic-addon1">Tipo de grabado</span>
                                        <select class="form-control" id="grabado" name="grabado" style="width: 100%;" required>
                                            <option> Seleccionar grabado</option>
                                            <?php 
                                                include 'conexion.php';               
                                                $query = "SELECT id_grabado, grabado, precio_grabado FROM tipo_grabado";
                                                $resultado = $conexion->query($query);
                                                while ($fila = $resultado->fetch_assoc()) {
                                                    echo "<option value='" . $fila['id_grabado'] . "' data-precio-grabado='" . $fila['precio_grabado'] . "'>" . $fila['grabado'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Descripción</span>
                                    </div>
                                    <textarea name="descripcion" class="form-control" required></textarea>
                                </div>
                                <!-- Input para Total Unitario + Grabado -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Total Unitario + Grabado</span>
                                    </div>
                                    <input type="number" id="totalUnitarioGrabado" class="form-control" value="0" readonly>
                                </div>

                                <!-- Input para Total Final -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Total Final</span>
                                    </div>
                                    <input type="number" id="totalFinal" class="form-control" value="0" name="total" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Entrega Inmediata</span>
                                    </div>
                                    <input type="checkbox" id="entregaInmediata" class="form-control">
                                </div>
                                
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const cantidadInput = document.getElementById("cantidad");
                                        const entregaInmediata = document.getElementById("entregaInmediata");
                                        const totalFinalInput = document.getElementById("totalFinal");
                                        const totalUnitarioGrabadoInput = document.getElementById("totalUnitarioGrabado");
                                        let extraCosto = 0;

                                        function actualizarPrecios() {
                                            const cantidad = parseInt(cantidadInput.value) || 0;
                                            let totalBase = parseFloat(totalUnitarioGrabadoInput.value) || 0;
                                            
                                            if (entregaInmediata.checked) {
                                                extraCosto = cantidad >= 10 ? 50 : 100;
                                            } else {
                                                extraCosto = 0;
                                            }

                                            let totalFinal = totalBase * cantidad + extraCosto;
                                            totalFinalInput.value = totalFinal.toFixed(2);
                                        }

                                        cantidadInput.addEventListener("input", actualizarPrecios);
                                        entregaInmediata.addEventListener("change", actualizarPrecios);
                                    });
                                </script>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productoSelect = document.getElementById("producto");
            const cantidadInput = document.getElementById("cantidad");
            const grabadoSelect = document.getElementById("grabado");
            const precioUnitarioInput = document.getElementById("precioUnitario");
            const totalInput = document.getElementById("total");
            const totalUnitarioGrabadoInput = document.getElementById("totalUnitarioGrabado");
            const totalFinalInput = document.getElementById("totalFinal");

            function actualizarPrecios() {
                const selectedProducto = productoSelect.options[productoSelect.selectedIndex];
                const precioUnitario = parseFloat(selectedProducto.getAttribute("data-precio-unitario")) || 0;

                const selectedGrabado = grabadoSelect.options[grabadoSelect.selectedIndex];
                const precioGrabado = parseFloat(selectedGrabado.getAttribute("data-precio-grabado")) || 0;

                const cantidad = parseInt(cantidadInput.value) || 0;

                const totalUnitarioGrabado = precioUnitario + precioGrabado;
                const totalFinal = totalUnitarioGrabado * cantidad;

                precioUnitarioInput.value = precioUnitario.toFixed(2);
                totalInput.value = (precioUnitario * cantidad).toFixed(2);
                totalUnitarioGrabadoInput.value = totalUnitarioGrabado.toFixed(2);
                totalFinalInput.value = totalFinal.toFixed(2);
            }

            productoSelect.addEventListener("change", actualizarPrecios);
            cantidadInput.addEventListener("input", actualizarPrecios);
            grabadoSelect.addEventListener("change", actualizarPrecios);
        });
    </script>
    <script src="js/bootstrap.js"></script>
</body>
</html>