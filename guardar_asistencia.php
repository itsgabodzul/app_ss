<?php

require "admin/conexion.php";

$alumno = $_POST["alumno"];
$fecha = $_POST["fecha"];
$hora_inicio= $_POST["hora_inicio"];
$hora_fin = $_POST["hora_fin"];
$acumuladas = $_POST["acumuladas"];

$insertar = "INSERT INTO asistencias (alumno, fecha, hora_inicio, hora_fin, acumuldas) VALUES ('$alumno', '$fecha', '$hora_inicio', '$hora_fin', '$acumuladas')";

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script>
  location.href='horas_asistencias.php'
  </script>";
}
