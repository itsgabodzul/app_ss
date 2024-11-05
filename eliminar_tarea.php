<?php
include "admin/conexion.php";

$id = $_GET['id'];

// Proceder con la eliminación si el ID no es 1
$eliminar = "DELETE FROM tareas WHERE id_tarea='$id'";
$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    echo '
    <script>
        alert("Se completo la tarea");
        location.href = "admin_panel.php";
    </script>';
} else {
    echo '
    <script>
        alert("Error");
        location.href = "admin_panel.php";
    </script>';
}
?>

