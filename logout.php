<?php
// logout.php
session_start(); // Iniciar la sesión

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al formulario de login
header('location: login.php');
exit(); // Terminar el script
?>