<?php

require "conexion.php";

$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$jefatura = $_POST["jefatura"];


$verficar_aula = mysqli_query($conectar, "SELECT * FROM docentes WHERE nombres = '$nombres' AND apellidos = '$apellidos'");
if (mysqli_num_rows($verficar_aula)> 0){
  echo '
  <script>
    alert("Este docente ya esta registrado");
    location.href = "crear_docente.php";
  </script>';
  exit();
}

$insertar = "INSERT INTO docentes (nombres, apellidos, jefatura) VALUES ('$nombres', '$apellidos', '$jefatura')";

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script>
  alert('Docente agregado correctamente');
  location.href='docentes.php'
  </script>";
}
