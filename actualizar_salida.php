<?php

require "admin/conexion.php";

$id_asistencia = $_POST["id_asistencia"];
$alumno = $_POST["alumno"];
$fecha = $_POST["fecha"];
$hora_inicio= $_POST["hora_inicio"];
$hora_fin = $_POST["hora_fin"];
$acumuladas = $_POST["acumuladas"];

// $inicio = new DateTime($hora_inicio);
// $fin = new DateTime($hora_fin);
// //Diferencia
// $diferencia = $inicio->diff($fin);
// // Convertir la diferencia a minutos
// $acumuladas = ($diferencia->h * 60) + $diferencia->i;
// $horas_acumuladas = $acumuladas / 60;
// echo  $horas_acumuladas;
// exit();

$actualizar = "UPDATE asistencias SET alumno ='$alumno', fecha ='$fecha', hora_inicio ='$hora_inicio', hora_fin = '$hora_fin', acumuldas = '$acumuladas' WHERE id_asistencia='$id_asistencia'";

$query = mysqli_query($conectar, $actualizar);

if($query){
  echo "<script>
  location.href='horas_asistencias.php'
  </script>";
}
