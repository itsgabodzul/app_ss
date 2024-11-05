<?php
include "conexion.php";

$id = $_GET['id'];

// Verificar si el ID es igual a 1
if ($id == 1) {
    echo '
    <script>
        alert("No se puede eliminar Administrator");
        location.href = "usuarios.php"; // Redirige de vuelta a la página de usuarios
    </script>';
    exit(); // Salimos para evitar que el código continúe
}

// Proceder con la eliminación si el ID no es 1
$eliminar = "DELETE FROM usuarios WHERE id='$id'";
$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    echo '
    <script>
        alert("Se elimino el usuario");
        location.href = "usuarios.php";
    </script>';
} else {
    echo '
    <script>
        alert("Error al eliminar el registro");
        location.href = "usuarios.php";
    </script>';
}
?>

