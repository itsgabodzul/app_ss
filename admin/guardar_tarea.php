<?php

require "conexion.php";

$nombre_tarea = $_POST["nombre_tarea"];
$descripcion = $_POST["descripcion"];
$estado = $_POST["estado"];
$usuario = $_POST["usuario"];


$verficar_aula = mysqli_query($conectar, "SELECT * FROM tareas WHERE nombre_tarea = '$nombre_tarea' AND usuario = '$usuario'");
if (mysqli_num_rows($verficar_aula)> 0){
  echo '
  <script>
    alert("La tarea ya esta asignada");
    location.href = "crear_tarea.php";
  </script>';
  exit();
}

$insertar = "INSERT INTO tareas (nombre_tarea, descripcion, estado, usuario) VALUES ('$nombre_tarea', '$descripcion', '$estado', '$usuario')";

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script>
  alert('Tarea agregada correctamente');
  location.href='tareas_p.php'
  </script>";
}
