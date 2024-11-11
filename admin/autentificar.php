<?php
require "conexion.php";


$matricula = addslashes($_POST['matricula']);
$contrasena = addslashes($_POST['contrasena']);

$comparar = "SELECT * FROM usuarios WHERE matricula='$matricula' LIMIT 1";

$resultado = mysqli_query($conectar, $comparar);

if (mysqli_num_rows($resultado) > 0) {
  
  $fila = $resultado->fetch_array();
  
  if(password_verify($contrasena, $fila["contrasena"])){

    session_start();
    $_SESSION["username_admin"] = $fila["nombres"];
    $_SESSION["id_admin"] = $fila["id"];
    $_SESSION["autentificado_admin"] = "SI";
    header("Location: principal.php");
  }
  else {
    echo '
    <script>
      location.href = "index.php?errorusuario=SI";
    </script>
   ';
  }
}
else {
  echo '
  <script>
    location.href = "index.php?errorusuario=SI";
  </script>
 ';
}
mysqli_free_result($resultado);
mysqli_close($conectar);