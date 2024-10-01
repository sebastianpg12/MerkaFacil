<?php
require '../config/db.php'; // Conexión a la base de datos
session_start(); // Iniciar sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el correo existe en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró el usuario y la contraseña es correcta
    if ($usuario && password_verify($password, $usuario['password'])) {
        // Iniciar la sesión y guardar información relevante del usuario
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];

        // Redirigir al usuario a la página principal
        header('Location: ../publico/index.php');
        exit();
    } else {
        // Si las credenciales son incorrectas
        echo "Correo electrónico o contraseña incorrectos. <a href='../pages/login.php'>Intentar de nuevo</a>";
    }
}
?>
