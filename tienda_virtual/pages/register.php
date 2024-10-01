<?php include '../includes/header.php'; ?>

<h1 class="text-center">Registrarse</h1>
<form action="../sesiones/procesar_registro.php" method="POST" class="mx-auto" style="max-width: 400px;">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre Completo</label>
        <input type="text" class="form-control" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrarse</button>
</form>

<?php include '../includes/footer.php'; ?>
