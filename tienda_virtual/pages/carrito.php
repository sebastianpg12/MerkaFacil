<?php include '../includes/header.php'; ?>
<?php require '../config/db.php'; ?>

<h1 class="text-center">Carrito de Compras</h1>

<?php
// Verificar si el carrito tiene productos
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    // Obtener los IDs de los productos en el carrito
    $producto_ids = array_keys($_SESSION['carrito']);

    // Si hay productos en el carrito, los buscamos en la base de datos
    if (!empty($producto_ids)) {
        // Crear una lista separada por comas con los IDs para usar en la consulta SQL
        $ids_string = implode(',', $producto_ids);
        
        // Consulta para obtener los detalles de los productos
        $sql = "SELECT * FROM productos WHERE id IN ($ids_string)";
        $stmt = $pdo->query($sql);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <!-- Mostrar los productos en el carrito -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Acciones</th>
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
                <td>
                    <!-- Botón para eliminar el producto del carrito -->
                    <form action="../sesiones/eliminar_del_carrito.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total General:</strong></td>
                <td colspan="2"><strong>$<?php echo number_format($total_general, 2); ?></strong></td>
            </tr>
        </tbody>
    </table>

    <!-- Botón para proceder al checkout (lógica por implementar) -->
                             <!-- Botón para proceder al pago -->
<div class="text-center">
    <a href="../pages/factura.php" class="btn btn-success">Proceder al Pago</a>
</div>


<?php
} else {
    // Si el carrito está vacío
    echo '<p class="text-center">Aún no has agregado productos al carrito.</p>';
}
?>

<?php include '../includes/footer.php'; ?>
