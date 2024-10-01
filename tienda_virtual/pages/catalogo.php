<?php include '../includes/header.php'; ?>
<?php require '../config/db.php'; ?>

<style>
    .product-card {
        border-radius: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        border-radius: 10px 10px 0 0;
        height: 200px;
        object-fit: cover;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
    }

    .card-text {
        color: #28a745;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .btn-block {
        width: 100%;
        padding: 10px 0;
    }

    .container h1 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #333;
    }
</style>

<div class="container py-5">
    <h1 class="text-center mb-5">Catálogo de Productos</h1>
    <div class="row">
        <?php
        // Obtener los productos de la base de datos
        $sql = "SELECT * FROM productos";
        $stmt = $pdo->query($sql);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Iterar sobre los productos y mostrarlos
        foreach ($productos as $producto): ?>
            <div class="col-md-4">
                <div class="card product-card mb-4 shadow-sm">
                    <img src="../img/<?php echo htmlspecialchars($producto['imagen']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                        <p class="card-text">$<?php echo number_format($producto['precio'], 2); ?></p>
                        <!-- Formulario para agregar al carrito -->
                        <form action="../sesiones/agregar_carrito.php" method="POST">
                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                            <input type="number" name="cantidad" value="1" min="1" class="form-control mb-2" style="width: 80px; margin: 0 auto;">
                            <button type="submit" class="btn btn-success btn-block">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
