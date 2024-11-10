<?php

require "conexion.php";

$dia = $_POST["dia"];
$aula = $_POST["aula"];
$docente = $_POST["docente"];
$clima = $_POST["clima"];
$hora_inicio = $_POST["horario_inicio"];
$hora_fin = $_POST["horario_fin"];
$n = ($hora_fin - $hora_inicio);

//Validar horas
$verficar_horas = mysqli_query($conectar, "SELECT * FROM $dia WHERE (hora = '$hora_inicio' OR hora = '$hora_fin') AND aula = $aula");
if (mysqli_num_rows($verficar_horas)> 0){
  echo '
  <script>
    alert("Este horario ya esta ocupado");
    location.href = "crear_horario.php";
  </script>';
  exit();
}
$verificar_maestro = mysqli_query($conectar, "SELECT * FROM $dia WHERE (hora = '$hora_inicio' OR hora = '$hora_fin') AND maestro = '$docente'");
if (mysqli_num_rows($verificar_maestro) > 0) {
  echo '
  <script>
    alert("El docente esta ocupado en ese horario");
    location.href = "crear_horario.php";
  </script>';
  exit();
}
if ($n > 1){
  $insertar = "INSERT INTO $dia (aula, maestro, clima, hora) VALUES ('$aula', '$docente', '$clima', '$hora_inicio')";
  $query = mysqli_query($conectar, $insertar);
  for ($i = 1; $i < $n; $i++){
    $horas = ($hora_inicio+1);
    $insertar = "INSERT INTO $dia (aula, maestro, clima, hora) VALUES ('$aula', '$docente', '$clima', '$horas')";
    $query = mysqli_query($conectar, $insertar);
  }
}
else{
  $insertar = "INSERT INTO $dia (aula, maestro, clima, hora) VALUES ('$aula', '$docente', '$clima', '$hora_inicio')";
  $query = mysqli_query($conectar, $insertar);
}

if($query){
  echo "<script>
  alert('Clase agregada correctamente');
  location.href='salones.php'
  </script>";
}
else{
  echo "<script>
    alert('Error al agregar la clase');
    location.href='crear_horario.php';
  </script>";
}