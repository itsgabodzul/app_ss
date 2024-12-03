<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetAlert desde PHP</title>
    <!-- Incluye SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Prueba de SweetAlert con PHP</h1>

    <script>
        setInterval(() => {
            fetch('consulta3.php')
                .then(response => response.text()) // Obtiene la respuesta como texto
                .then(script => {
                    // Ejecuta el script de SweetAlert recibido
                    eval(script);
                })
                .catch(error => console.error('Error:', error));
        }, 10000); // Cada hora (3600000 ms, ajusta para pruebas)
    </script>
</body>
</html>

