<?php
session_start();
$id_user = $_SESSION['id_user'];
require "admin/conexion.php";
$tareas = "SELECT * FROM tareas WHERE usuario = '$id_user' ORDER BY id_tarea DESC LIMIT 1";
$resultado_tareas = mysqli_query($conectar, $tareas);
$fila_tareas = mysqli_fetch_assoc($resultado_tareas);
$ultimo = $fila_tareas["id_tarea"];
$insertar = "INSERT INTO notificaciones (ultimo, alumno) VALUES ('$ultimo', '$id_user')";
$query = mysqli_query($conectar, $insertar);
session_destroy();
echo '
    <script> 
      alert("SESION FINALIZADA CON EXITO");
      location.href = "index.php";
    </script>';

?>