<?php
session_start();
require '../config/db.php';

// Verificar si el carrito tiene productos
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    header('Location: carrito.php'); // Redirigir al carrito si no hay productos
    exit();
}

// Obtener los IDs de los productos en el carrito
$producto_ids = array_keys($_SESSION['carrito']);
if (!empty($producto_ids)) {
    $ids_string = implode(',', $producto_ids);

    // Consulta para obtener los detalles de los productos
    $sql = "SELECT * FROM productos WHERE id IN ($ids_string)";
    $stmt = $pdo->query($sql);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php include '../includes/header.php'; ?>

<h1 class="text-center mb-4">Factura de Compra</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_general = 0;
        foreach ($productos as $producto):
            $cantidad = $_SESSION['carrito'][$producto['id']];
            $total_producto = $producto['precio'] * $cantidad;
            $total_general += $total_producto;
        ?>
        <tr>
            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
            <td><?php echo $cantidad; ?></td>
            <td>$<?php echo number_format($producto['precio'], 2); ?></td>
            <td>$<?php echo number_format($total_producto, 2); ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Total General:</strong></td>
            <td><strong>$<?php echo number_format($total_general, 2); ?></strong></td>
        </tr>
    </tbody>
</table>

<!-- Opción para descargar o imprimir la factura -->
<div class="text-center">
    <a href="#" onclick="window.print()" class="btn btn-primary">Imprimir Factura</a>
</div>

<?php include '../includes/footer.php'; ?>
