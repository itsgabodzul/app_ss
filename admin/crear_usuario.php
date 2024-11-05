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
                <h1>Crear Usuario</h1>
                <br>    
                <div class="cont_info">
                <a href="usuarios.php" class="btn">Regresar</a>
                </div>
                     <div class="campos">
                        <form action="guardar_usuarios.php" method="post">
                            <div>
                                <input type="text" name="nombres" placeholder="Nombre(s)" required>
                            </div>
                            <div>
                                <input type="text" name="apellidos" placeholder="Apellidos" required>
                            </div>
                            <div>
                                <input type="text" name="email" placeholder="Correo electronico" required>
                            </div>
                            <div >
                                <input type="text" name="contrasena" placeholder="Contraseña" required>
                        </div>
                        <div>
                            <input type="text" name="matricula" placeholder="Matricula" required>
                        </div>
                        <button  type="submit" class="">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>