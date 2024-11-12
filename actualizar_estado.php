<?php

require "admin/conexion.php";

$id_aula = $_POST["id_aula"];
$aula = $_POST["aula"];
$tipo = $_POST["tipo"];
$estado = $_POST["estado"];

$actualizar = "UPDATE aulas SET aula='$aula', tipo='$tipo', estado ='$estado' WHERE id_aula='$id_aula'";

$query = mysqli_query($conectar, $actualizar);

if($query){
  echo "<script>
  location.href='bitacorah.php'
  </script>";
}
