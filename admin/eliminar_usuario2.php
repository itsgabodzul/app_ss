<?php
include "conexion.php";

$id = $_GET['id'];
$eliminar = "DELETE FROM alumnos WHERE id='$id'";
$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    echo '
    <script>
        alert("Se elimino el alumno");
        location.href = "usuarios2.php";
    </script>';
} else {
    echo '
    <script>
        alert("Error al eliminar el registro");
        location.href = "usuarios2.php";
    </script>';
}
?>

