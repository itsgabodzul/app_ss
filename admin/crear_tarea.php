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
                <h1>Añadir una tarea </h1>
                <br>    
                <div class="cont_info">
                <a href="tareas_p.php" class="btn">Regresar</a>
                </div>
                     <div class="campos">
                        <form action="guardar_tarea.php" method="post">
                            <div>
                                <p class="text_input">Nombre de la Tarea:</p>
                                <input type="text" name="nombre_tarea" placeholder="Nombre de la tarea" required>
                            </div>
                            <div>
                                <p class="text_input">Descripcion de la Tarea:</p>
                                <textarea name="descripcion" id="" required></textarea>
                            </div>
                            <input type="hidden"  name="estado" value="Activa">
                            <!-- <div>
                                <p class="text_input">Estado de la tarea:</p>
                                <input type="text" name="estado" placeholder="Estado de la tarea" value="Activa">
                            </div> -->
                            <div>
                                <p class="text_input">Usuario asignado:</p>
                                <select name="usuario" require>
                                <option value="0">Elegir usuario</option>
                                <?php require "conexion.php";
                                $todos_datos = "SELECT * FROM alumnos ORDER BY id ASC";
                                $resultado = mysqli_query($conectar, $todos_datos);
                                while ($fila = mysqli_fetch_assoc($resultado)){
                                ?>
                                    <option value="<?php echo $fila['id']; ?>"><?php echo $fila['nombres']; ?></option>
                                <?php }?>
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