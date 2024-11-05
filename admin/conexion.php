<?php

$host = "localhost";
$user = "root";
$password = "";
$bd = "app_ss";

$conectar = mysqli_connect($host, $user,  $password, $bd);

if (!$conectar) {
    echo "Error al conectar con la base de datos: " . mysqli_connect_error();
}
// else {
//     echo "Conexión exitosa";
// }

?>