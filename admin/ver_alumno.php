<?php require "seguridad.php";
$usuario = $_SESSION['username_admin'];
$id_admin = $_SESSION["id_admin"];
?>
<?php include "cookie.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body class="panel">
    <div class="contenedor">
        <?php include "menu_panel.php"?>
        <div class="cont_panel">
            <div class="header_panel">
                <a href="salir.php">Salir <i class="fas fa-times-circle"></i></a>
            </div>
            <div class="info_panel">
                <h1>Ver Alumno</h1>
                <br>    
                <div class="cont_info">
                <a href="usuarios2.php" class="btn">Regresar</a><br>
                </div>
                <?php
                    include "conexion.php";
                    $id = $_GET["id"];
                    $verusuario = "SELECT * FROM alumnos WHERE id = $id";
                    $resultado = mysqli_query($conectar, $verusuario);

                    $fila = $resultado->fetch_array();
                ?>
                <div class="titulos">
                    <h3>Nombre del Alumno</h3>
                    <p><?php echo $fila["nombres"];?> <?php echo $fila["apellidos"];?></p>
                    <hr>
                <div class="titulos">
                    <h3>Email</h3>
                    <p><?php echo $fila["email"];?></p>
                    <hr>
                </div>
                <div class="titulos">
                    <h3>Matricula</h3>
                    <p><?php echo $fila["matricula"];?></p>
                    <hr>
                </div>
                <div class="titulos">
                    <h3>Carrera</h3>
                    <p><?php echo $fila["carrera"];?></p>
                    <hr>
                </div>
                <div class="titulos">
                    <h3>Sexo</h3>
                    <p><?php echo $fila["sexo"];?></p>
                    <hr>
                </div>
                <div class="titulos">
                    <h3>Ingreso</h3>
                    <p><?php echo $fila["ingreso"];?></p>
                    <hr>
                </div><br>
                <!-- <a class="btn" href="editar_usuario.php?id=<?php echo $fila['id']; ?>">Editar Usuario</a> -->
            </div>
        </div>
    </div>
</body>
</html>