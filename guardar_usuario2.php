<?php

require "admin/conexion.php";

$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];
$matricula = $_POST["matricula"];
$carrera = $_POST["carrera"];
$sexo = $_POST["sexo"];
$ingreso = $_POST["ingreso"];
$rol = $_POST["rol"];

$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

//Validar Usuario
$verficar_usuario = mysqli_query($conectar, "SELECT * FROM alumnos WHERE matricula = '$matricula' ");
if (mysqli_num_rows($verficar_usuario)> 0){
  echo '
  <script>
    alert("Este usuario ya esta registrado");
    location.href = "registro.php";
  </script>';
  exit();
}

$insertar = "INSERT INTO alumnos (nombres, apellidos, email, contrasena, matricula, carrera, sexo, ingreso, rol) VALUES ('$nombres', '$apellidos', '$email', '$contrasena_encriptada', '$matricula', '$carrera', '$sexo', '$ingreso', '$rol')";

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script>
  alert('Usuario agregado correctamente');
  location.href='index.php'
  </script>";
}
