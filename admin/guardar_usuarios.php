<?php

require "conexion.php";

$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];
$matricula= $_POST["matricula"];


$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

//Validar Usuario
$verficar_usuario = mysqli_query($conectar, "SELECT * FROM usuarios WHERE email = '$email' ");
if (mysqli_num_rows($verficar_usuario)> 0){
  echo '
  <script>
    alert("Este usuario ya esta registrado");
    location.href = "usuario.php";
  </script>';
  exit();
}

$insertar = "INSERT INTO usuarios (nombres, apellidos, email, contrasena, matricula) VALUES ('$nombres', '$apellidos', '$email', '$contrasena_encriptada', '$matricula')";

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script>
  alert('Usuario agregado correctamente');
  location.href='usuarios.php'
  </script>";
}
