<?php
include "conexion.php";

$id = $_GET['id'];

// Proceder con la eliminación si el ID no es 1
$eliminar = "DELETE FROM docentes WHERE id_docente='$id'";
$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    echo '
    <script>
        alert("Se elimino el docente");
        location.href = "docentes.php";
    </script>';
} else {
    echo '
    <script>
        alert("Error al eliminar el registro");
        location.href = "docentes.php";
    </script>';
}
?>

