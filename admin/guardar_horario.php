<?php

require "conexion.php";

$dia = $_POST["dia"];
$aula = $_POST["aula"];
$docente = $_POST["docente"];
$clima = $_POST["clima"];
$hora_inicio = $_POST["horario_inicio"];
$hora_fin = $_POST["horario_fin"];
$n = ($hora_fin - $hora_inicio);
if ($n > 1){
  echo $hora_inicio;
  for ($i = 1; $i < $n; $i++){
    echo ($hora_inicio+1);
  }
}
else{
  $insertar = "INSERT INTO lunes (aula, docente, clima, hora_inicio, hora_fin) VALUES ('$aula', '$docente', '$clima', '$hora_inicio', '$hora_fin')";
}
exit();


switch ($dia){
  case 'lunes':
    $insertar = "INSERT INTO lunes (aula, docente, clima, hora_inicio, hora_fin) VALUES ('$aula', '$docente', '$clima', '$hora_inicio', '$hora_fin')";
    break;
  case 'martes':
    $insertar = "INSERT INTO martes (aula, docente, clima, hora_inicio, hora_fin) VALUES ('$aula', '$docente', '$clima', '$hora_inicio', '$hora_fin')";
    break;
  case 'miercoles':
    $insertar = "INSERT INTO martes (aula, docente, clima, hora_inicio, hora_fin) VALUES ('$aula', '$docente', '$clima', '$hora_inicio', '$hora_fin')";
    break;
  case 'jueves':
    $insertar = "INSERT INTO martes (aula, docente, clima, hora_inicio, hora_fin) VALUES ('$aula', '$docente', '$clima', '$hora_inicio', '$hora_fin')";
    break;
  case 'viernes':
    $insertar = "INSERT INTO martes (aula, docente, clima, hora_inicio, hora_fin) VALUES ('$aula', '$docente', '$clima', '$hora_inicio', '$hora_fin')";
    break;
}

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script>
  alert('Clase agregada correctamente');
  location.href='salones.php'
  </script>";
}
