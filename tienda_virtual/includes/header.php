<?php
// Verificar si la sesión ya está iniciada antes de llamar a session_start()
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Calcular la cantidad total de productos en el carrito
$carrito_count = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $cantidad) {
        $carrito_count += $cantidad;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Virtual</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Añadimos el CDN de Font Awesome para los iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            font-weight: 500;
        }
        .cart-icon {
            position: relative;
        }
        .cart-icon .badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/tienda_virtual/tienda_virtual/publico/index.php">
                <i class="fas fa-store"></i> Supermercado Virtual
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/tienda_virtual/tienda_virtual/publico/index.php">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tienda_virtual/tienda_virtual/pages/catalogo.php">
                            <i class="fas fa-th-large"></i> Catálogo
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- Carrito de compras con contador -->
                    <li class="nav-item">
                        <a class="nav-link cart-icon" href="/tienda_virtual/tienda_virtual/pages/carrito.php">
                            <i class="fas fa-shopping-cart"></i> Carrito
                            <!-- Mostrar el número de productos en el carrito -->
                            <?php if ($carrito_count > 0): ?>
                                <span class="badge"><?php echo $carrito_count; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>

                    <?php if (isset($_SESSION['usuario_id'])): ?>
                        <!-- Mostrar el nombre del usuario logueado -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user"></i> Bienvenido, <?= htmlspecialchars($_SESSION['nombre']); ?>
                            </a>
                        </li>
                        <!-- Opción de cerrar sesión -->
                        <li class="nav-item">
                            <a class="nav-link" href="/tienda_virtual/tienda_virtual/sesiones/logout.php">
                                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                            </a>
                        </li>
                    <?php else: ?>
                        <!-- Si no está logueado, mostrar las opciones de inicio de sesión y registro -->
                        <li class="nav-item">
                            <a class="nav-link" href="/tienda_virtual/tienda_virtual/pages/login.php">
                                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tienda_virtual/tienda_virtual/pages/register.php">
                                <i class="fas fa-user-plus"></i> Registrarse
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
