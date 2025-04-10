<?php
include 'conexion.php';

session_start();


// Verificar si el formulario se ha enviado
if (isset($_POST['empleado']) && isset($_POST['password'])) {
    $empleado = $_POST['empleado'];
    $password = $_POST['password'];

    global $conexion;

    // Preparar y ejecutar la consulta
    $query = $conexion->prepare('SELECT * FROM login WHERE empleado = ? AND password = ?');
    $query->bind_param('ss', $empleado, $password);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['idrol'] = $row['idrol'];
        $_SESSION['empleado'] = $row['empleado'];

        // Redirigir según el rol
        switch ($_SESSION['idrol']) {
            case 1:
                header('location: inicio.php');
                break;
            
            case 2:
                header('location: inicio.php');
                break;

            default:
                // Rol no reconocido
                echo "Rol no válido";
                break;
        }
        exit(); // Terminar el script después de redirigir
    } else {
        echo "<script> alert('El usuario o contraseña es incorrecto');window.location= 'login.php' </script>";
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
    <script src="js/jquery-3.6.1.js"></script>
</head>
<style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #6a11cb, #a0a0a0);
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            animation: fadeInDown 0.8s ease-in-out;
        }

        .login-card h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.3);
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }

        .error-message {
            color: #ff4d4d;
            font-size: 14px;
            margin-top: 5px;
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

        /* Responsive Design */
        @media (max-width: 576px) {
            .login-card {
                padding: 20px;
                margin: 10px;
            }

            .login-card h2 {
                font-size: 24px;
            }

            .btn-primary {
                font-size: 14px;
            }
        }
    </style>
<body>
  <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="card" style="max-width: 500px; width: 100%;">
        <div class="card-body">
            <h5 class="card-title">Inicio de sesión</h5>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="empleado">Número de empleado:</label>
                    <input name="empleado" type="text" class="form-control" placeholder="Ingresa número de empleado" id="empleado">
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password:</label>
                    <input name="password" type="password" class="form-control" placeholder="Enter password" id="password">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Ingresar</button>
            </form>
        </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
        $(document).on("contextmenu", function(e){
            e.preventDefault();
            $("#mensaje").text("Clic derecho desactivado").show().delay(2000).fadeOut();
        });
    });
  </script>

<div id="mensaje" style="display:none; position:fixed; bottom:20px; right:20px; background-color:red; color:white; padding:10px; border-radius:5px;"></div>
  <script src="js/bootstrap.js"></script>
</body>
</html>