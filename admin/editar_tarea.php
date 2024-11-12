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
                <h1>Editar tarea </h1>
                <br>    
                <div class="cont_info">
                <a href="tareas_p.php" class="btn">Regresar</a>
                </div>
                     <div class="campos">
                        <form action="guardar_tarea_editar.php" method="post">
                        <?php require "conexion.php";
                            $id=$_GET['id'];
                            $vertarea = "SELECT * FROM tareas WHERE id_tarea = '$id'";
                            $resultado = mysqli_query($conectar, $vertarea);
                            $fila = $resultado->fetch_array();?>
                            <div>
                                <p class="text_input">Nombre de la Tarea:</p>
                                <input type="text" name="nombre_tarea" placeholder="Nombre de la tarea" value="<?php echo $fila["nombre_tarea"]?>">
                            </div>
                            <div>
                                <p class="text_input">Descripcion de la Tarea:</p>
                                <textarea name="descripcion" id=""><?php echo $fila["descripcion"]?></textarea>
                            </div>
                            <input type="hidden"  name="estado" value="Activa">
                            <div>
                                <p class="text_input">Usuario asignado:</p>
                                <select name="usuario" require>
                                <option value="0">Elegir usuario</option>
                                <?php require "conexion.php";
                                $variable_tarea = $fila["usuario"];
                                $todos_datos = "SELECT * FROM alumnos ORDER BY id ASC";
                                $resultado = mysqli_query($conectar, $todos_datos);
                                while ($filausuario = mysqli_fetch_assoc($resultado)){
                                ?>
                                    <option value="<?php echo $filausuario['id']; ?>" <?php
                                    if ($filausuario["id"] == $variable_tarea){
                                        echo "selected";
                                    }?>><?php echo $filausuario['nombres']; ?></option>
                                <?php }?>
                            </select>
                            </div>
                            <input type="hidden" name="id_tarea" value="<?php echo $fila["id_tarea"]?>">
                        <button  type="submit" class="">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>