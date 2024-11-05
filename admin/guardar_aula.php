<?php

require "conexion.php";

$aula = $_POST["aula"];
$tipo = $_POST["tipo"];


$verficar_aula = mysqli_query($conectar, "SELECT * FROM aulas WHERE aula = '$aula' ");
if (mysqli_num_rows($verficar_aula)> 0){
  echo '
  <script>
    alert("Esta aula ya esta registrado");
    location.href = "crear_aula.php";
  </script>';
  exit();
}

$insertar = "INSERT INTO aulas (aula, tipo) VALUES ('$aula', '$tipo')";

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script>
  alert('Aula agregada correctamente');
  location.href='crear_aula.php'
  </script>";
}
