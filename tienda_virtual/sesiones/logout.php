<?php
session_start();
session_unset();  // Eliminar todas las variables de sesión
session_destroy();  // Destruir la sesión actual

// Redirigir a la página principal después de cerrar sesión
header("Location: ../publico/index.php");
exit();
?>
