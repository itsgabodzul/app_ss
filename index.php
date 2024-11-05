<?php
session_start();
if(isset($_SESSION['autentificado_user']) == "SI"){ {
    header("Location:admin_panel.php");
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body class="bg_login">
    <div class="cont_login">
        <div class="cont_logo">
            <img class="logo" src="merida.png" alt="">
        </div>
        <div class="textos">
            <h2 class="tt1">BIENVENIDO</h2>
            <h4 class="tt2">Inicia Sesión</h4>
        </div>
        <div class="campos">
            <form action="autentificar2.php" method="post">
                <?php 
                $errorusuario = isset($_GET["errorusuario"]);
                if($errorusuario == "SI"){
                    echo ' <h3 class="error"><i class="fas fa-exclamation-circle"></i>  Datos Incorrectos</h3> <br>';
                }
                ?>
                <div>
                    <input type="text" name="matricula" placeholder="Matricula" required>
                </div>
                <div>
                    <input type="password" name="contrasena" placeholder= "Contraseña" required>
                </div>
                <button type="submit" class="">Login</button>
            </form><br>
            <hr class="decoration">
            <br>
            <p class="admin_text">Iniciar como <a href="admin/">Administrador</a></p> <br>
            <a href="registro.php" class="registro">Crear cuenta</a>
            <!-- <p class="info_final">© 2024 <a class="" href="https://gabodzul.netlify.app/" target="_blank">Gabo   Dzul.</a> Todos los derechos reservados.
            </p><br> -->
        </div>
    </div>
    <div></div>
</body>
</html>

<!-- Jesus Gabriel Dzul Gutierrez -->