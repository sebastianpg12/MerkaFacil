<?php
require '../config/db.php'; // Conexión a la base de datos

// Verificar que se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el correo ya está registrado
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarioExistente) {
        die("Este correo electrónico ya está registrado. Inténtalo con otro o <a href='../pages/login.php'>inicia sesión</a>.");
    }

    // Encriptar la contraseña
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // Insertar nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $email, $passwordHashed]);

    // Redirigir al usuario a la página de inicio de sesión o mostrar un mensaje de éxito
    echo "Registro exitoso. <a href='../pages/login.php'>Inicia sesión aquí</a>";
}
?>
