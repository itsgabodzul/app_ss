<?php

require "conexion.php";

$aula = $_POST["aula"];
$docente = $_POST["docente"];
$horario_inicio = $_POST["horario_inicio"];
$horario_fin = $_POST["horario_fin"];
$clima = $_POST["clima"];


$insertar = "INSERT INTO horarios (aula, docente, horario_inicio, horario_fin, clima) VALUES ('$aula', '$docente', '$horario_inicio', '$horario_fin', '$clima')";

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script>
  alert('Clase agregada correctamente');
  location.href='salones.php'
  </script>";
}
