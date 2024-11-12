<?php

require "conexion.php";
$id_tarea = $_POST["id_tarea"];
$nombre_tarea = $_POST["nombre_tarea"];
$descripcion = $_POST["descripcion"];
$estado = $_POST["estado"];
$usuario = $_POST["usuario"];

$actualizar = "UPDATE tareas SET nombre_tarea='$nombre_tarea', descripcion='$descripcion', estado='$estado', usuario='$usuario' WHERE id_tarea='$id_tarea'";

$query = mysqli_query($conectar, $actualizar);

if($query){
  echo "<script>
  alert('Tarea actualizada correctamente');
  location.href='tareas_p.php'
  </script>";
}
