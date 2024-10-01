<?php include '../includes/header.php'; ?>

<h1 class="text-center">Iniciar Sesión</h1>
<form action="../sesiones/procesar_login.php" method="POST" class="mx-auto" style="max-width: 400px;">
    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    <p class="mt-3"><a href="recover_password.php">¿Olvidaste tu contraseña?</a></p>
</form>

<?php include '../includes/footer.php'; ?>
