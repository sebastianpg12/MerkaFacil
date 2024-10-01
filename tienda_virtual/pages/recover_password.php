<?php include '../includes/header.php'; ?>
    <h1 class="text-center">Recuperar Contraseña</h1>
    <form action="../sesiones/procesar_recuperar_password.php" method="POST" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
    </form>
<?php include '../includes/footer.php'; ?>
