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
                <h1>Añadir un aula</h1>
                <br>    
                <div class="cont_info">
                <a href="salones.php" class="btn">Regresar</a>
                </div>
                     <div class="campos">
                        <form action="guardar_aula.php" method="post">
                            <div>
                                <input type="text" name="aula" placeholder="Nombre del Aula" required>
                            </div>
                            <!-- <div>
                                <p class="text_input">Estado del "clima":</p>
                                <select name="clima" id="" require>
                                    <option value="">Seleccione</option>
                                    <option value="Encendido" class="on">ON</option>
                                    <option value="Apagado" class="off">OFF</option>
                                </select>
                            </div> -->
                            <div>
                                <p class="text_input">Tipo de aula:</p>
                                <select name="tipo" id="" require>
                                    <option value="">Seleccione</option>
                                    <option value="Salon">Salon</option>
                                    <option value="Laboratotrio">Laboratorio</option>
                                </select>
                            </div>
                        <button  type="submit" class="">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>