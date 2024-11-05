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
                <h1>Añadir una clase</h1>
                <br>    
                <div class="cont_info">
                <a href="salones.php" class="btn">Regresar</a>
                </div>
                     <div class="campos">
                        <form action="guardar_horario.php" method="post">
                            <div>
                                <p class="text_input">Aula:</p>
                                <select name="aula" require>
                                    <option value="0">Elegir aula</option>
                                    <?php require "conexion.php";
                                    $todos_datos = "SELECT * FROM aulas ORDER BY id_aula ASC";
                                    $resultado = mysqli_query($conectar, $todos_datos);
                                    while ($fila = mysqli_fetch_assoc($resultado)){
                                    ?>
                                        <option value="<?php echo $fila['id_aula']; ?>"><?php echo $fila['aula']; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div>
                                <p class="text_input">Docente:</p>
                                <select name="docente" require>
                                    <option value="0">Elegir un docente</option>
                                    <?php require "conexion.php";
                                    $todos_datos = "SELECT * FROM docentes ORDER BY id_docente ASC";
                                    $resultado = mysqli_query($conectar, $todos_datos);
                                    while ($fila = mysqli_fetch_assoc($resultado)){
                                    ?>
                                        <option value="<?php echo $fila['id_docente']; ?>"><?php echo $fila['nombres']; ?> <?php echo $fila['apellidos']; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div>
                                <p class="text_input">Hora Inicio:</p>
                                <input type="time" name="horario_inicio" placeholder="" required>
                            </div>
                            <div>
                                <p class="text_input">Hora Fin:</p>
                                <input type="time" name="horario_fin" placeholder="" required>
                            </div>
                            <div>
                                <p class="text_input">Clima:</p>
                                <select name="clima" require>
                                    <option value="">Elegir opcion</option>
                                    <option value="Encendido">ON</option>
                                    <option value="Apagado">OFF</option>
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