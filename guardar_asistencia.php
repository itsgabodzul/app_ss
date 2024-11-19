<?php
require "seguridad2.php";
$usuario = $_SESSION['username'];
$alumno = $_SESSION["id_user"];

require "admin/conexion.php";
$todos_datos = "SELECT * FROM asistencias WHERE alumno ='$alumno' ORDER BY id_asistencia DESC LIMIT 1";
$resultado = mysqli_query($conectar, $todos_datos);
$fila = mysqli_fetch_assoc($resultado);
 $salida = $fila['hora_fin'];
 if($salida == null)
{
  echo "<script>
    alert('Debes de cerrar un registro antes de iniciar');
    location.href='horas_asistencias.php'
    </script>";
}
else{
  $alumno = $_POST["alumno"];
  $fecha = $_POST["fecha"];
  $hora_inicio= $_POST["hora_inicio"];
  $hora_fin = $_POST["hora_fin"];
  $acumuladas = $_POST["acumuladas"];

  $insertar = "INSERT INTO asistencias (alumno, fecha, hora_inicio, hora_fin, acumuldas) VALUES ('$alumno', '$fecha', '$hora_inicio', '$hora_fin', '$acumuladas')";

  $query = mysqli_query($conectar, $insertar);

  if($query){
    echo "<script>
    location.href='horas_asistencias.php'
    </script>";
  }
}



