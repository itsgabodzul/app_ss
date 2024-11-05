<?php

require "conexion.php";

$id = $_POST["id"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];
$matricula = $_POST["matricula"];

$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

$actualizar = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', email='$email', contrasena='$contrasena_encriptada', matricula='$matricula' WHERE id='$id'";

$query = mysqli_query($conectar, $actualizar);

if($query){
  echo '<script>
  alert("Usuario actualizado correctamente");
  location.href="usuarios.php";
  </script>';
}
