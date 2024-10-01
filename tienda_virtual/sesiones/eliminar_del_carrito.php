<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['producto_id'];

    // Verificar si el producto está en el carrito
    if (isset($_SESSION['carrito'][$producto_id])) {
        // Eliminar el producto del carrito
        unset($_SESSION['carrito'][$producto_id]);
    }

    // Redirigir de nuevo al carrito
    header('Location: ../pages/carrito.php');
    exit();
}
?>
