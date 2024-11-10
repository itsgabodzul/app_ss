<?php require "seguridad.php";
require "conexion.php";
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
                <h1>Editar Usuario</h1>
                <br>
                <?php
                        $id=$_GET['id'];
                        $verusuario = "SELECT * FROM usuarios WHERE id = '$id'";
                        $resultado = mysqli_query($conectar, $verusuario);
                        $isSuperUsuario = ($id == 1);
                        $fila = $resultado->fetch_array();
                ?>
                <div class="cont_info">
                <a href="principal.php" class="btn">Regresar</a>
                </div>
                     <div class="campos">
                        <form action="guardar_usuaio_editar.php" method="post">
                            <div>
                                <input type="text" name="nombres" placeholder="Nombre(s)" required value="<?php echo $fila["nombres"];?>" <?php echo $isSuperUsuario ? 'disabled' : ''; ?>>
                            </div>
                            <div>
                                <input type="text" name="apellidos" placeholder="Apellidos" required value="<?php echo $fila["apellidos"];?>" <?php echo $isSuperUsuario ? 'disabled' : ''; ?>>
                            </div>
                            <div>
                                <input type="text" name="email" placeholder="Correo electronico" required value="<?php echo $fila["email"];?>" <?php echo $isSuperUsuario ? 'disabled' : ''; ?>>
                            </div>
                            <div >
                                <input type="text" name="contrasena" placeholder="Contraseña" required value="<?php echo $fila["contrasena"];?>" <?php echo $isSuperUsuario ? 'disabled' : ''; ?>>
                            </div>
                            <div>
                                <input type="text" name="matricula" required value="<?php echo $fila["matricula"];?>"<?php echo $isSuperUsuario ? 'disabled' : ''; ?>>
                            </div>
                        <!-- HIDDEN -->
                        <input type="hidden"  name="id" value="<?php echo $fila["id"];?>">
                        <button type="submit" class="" <?php echo $isSuperUsuario ? 'disabled' : ''; ?>>Editar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>