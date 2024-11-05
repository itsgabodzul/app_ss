<?php
include "conexion.php";

$id = $_GET['id'];

// Proceder con la eliminación si el ID no es 1
$eliminar = "DELETE FROM tareas WHERE id_tarea='$id'";
$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    echo '
    <script>
        alert("Se elimino la tarea");
        location.href = "tareas_p.php";
    </script>';
} else {
    echo '
    <script>
        alert("Error al eliminar el registro");
        location.href = "tareas_p.php";
    </script>';
}
?>

