</div> <!-- Cierre del container iniciado en header.php -->
<footer class="footer mt-auto py-3 bg-light text-center">
    <div class="container">
        <span class="text-muted">Supermercado Virtual &copy; 2024</span>
    </div>
</footer>

<!-- Agregamos los estilos al final del body -->
<style>
    /* Estilos generales */
    html, body {
        height: 100%;
        margin: 0;
    }

    /* Para asegurar que el contenido ocupe al menos el 100% de la altura de la ventana */
    body {
        display: flex;
        flex-direction: column;
    }

    /* El contenido debe ocupar todo el espacio disponible menos el footer */
    .container {
        flex: 1;
    }

    /* Estilos del footer */
    footer {
        background-color: #f8f9fa;
        padding: 20px 0;
        position: relative;
        width: 100%;
        bottom: 0;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
