<?php
session_start();
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];

    // Verificar si ya existe un carrito en la sesión
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];  // Crear el carrito si no existe
    }

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$producto_id])) {
        // Si el producto ya está, incrementar la cantidad
        $_SESSION['carrito'][$producto_id] += $cantidad;
    } else {
        // Si no está, añadir el producto al carrito
        $_SESSION['carrito'][$producto_id] = $cantidad;
    }

    // Redirigir al catálogo o carrito después de agregar el producto
    header('Location: ../pages/catalogo.php');
    exit();
}
?>
