<?php
include "conexion.php";

$id = $_GET['id'];
date_default_timezone_set('America/Mexico_City');
    $dia_semana_ingles = array(
    'Monday' => 'lunes',
    'Tuesday' => 'martes',
    'Wednesday' => 'miercoles',
    'Thursday' => 'jueves',
    'Friday' => 'viernes',
    'Saturday' => 'sabado',
    'Sunday' => 'domingo');
    // $dia_semana = 'lunes';
    $dia_semana = $dia_semana_ingles[date("l")];


$eliminar = "DELETE FROM $dia_semana WHERE id='$id'";
$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    echo '
    <script>
        alert("Se elimino el registro");
        location.href = "salones.php";
    </script>';
} else {
    echo '
    <script>
        alert("Error al eliminar el registro");
        location.href = "salones.php";
    </script>';
}
?>

