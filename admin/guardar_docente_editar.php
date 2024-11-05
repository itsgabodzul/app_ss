<?php

require "conexion.php";

$id = $_POST["id"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$jefatura = $_POST["jefatura"];

$actualizar = "UPDATE docentes SET nombres='$nombres', apellidos='$apellidos', jefatura='$jefatura' WHERE id_docente='$id'";

$query = mysqli_query($conectar, $actualizar);

if($query){
  echo '<script>
  alert("Docente actualizado correctamente");
  location.href="docentes.php";
  </script>';
}
