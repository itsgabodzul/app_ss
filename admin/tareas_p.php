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
                <h1>Alta de Tareas</h1>
                <br>
                <div class="cont_info">
                <a href="crear_tarea.php" class="btn"><i class="fas fa-plus"></i> Agregar una tarea</a><br><br>
                <form class="buscar" action="" method="get">
                    <label for="" class="bs_docente">Buscar por alumno:</label>
                    <select name="busca_alumno" class="bs_docentes">
                        <option value="">Todos</option>
                        <?php require "conexion.php";
                        $variable_alumno = $_GET['busca_alumno'];
                        $todos_alumnos = "SELECT * FROM alumnos WHERE id > 1 ORDER BY id ASC";
                        $resultado_alumnos = mysqli_query($conectar, $todos_alumnos);
                        while ($fila_alumnos = mysqli_fetch_assoc($resultado_alumnos)){
                        ?>
                            <option value="<?php echo $fila_alumnos['nombres']; ?>" class="bs_docentes" 
                            <?php  if ($fila_alumnos["nombres"] == $variable_alumno){
                                        echo "selected";
                                }?>>
                                <?php echo $fila_alumnos['nombres']; ?> <?php echo $fila_alumnos['apellidos']; ?></option>
                        <?php }?>
                    </select>
                    <button type="submit" name="buscar">Buscar</button>
                </form><br>
                <table class="tablaspanel">
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>TAREA</th>
                            <th>DESCRIPCION</th>
                            <th>ESTADO</th>
                            <th>ALUMNO</th>
                            <th colspan="2"></th>
                        </tr>
                        <?php require "conexion.php";
                        if (isset($_GET['buscar']) and $_GET['busca_alumno']) {
                            $alumno = $_GET['busca_alumno'];
                            $todos_datos = "SELECT * FROM tareas 
                            INNER JOIN alumnos ON tareas.usuario = alumnos.id
                            WHERE nombres LIKE '%$alumno%'";
                        } else {
                            $alumno = '';
                            $todos_datos = "SELECT * FROM tareas 
                            INNER JOIN alumnos ON tareas.usuario = alumnos.id";
                        }
                        $resultado = mysqli_query($conectar, $todos_datos);
                        while ($fila = mysqli_fetch_assoc($resultado)){
                        ?>
                            <tr>
                                <!-- <td><?php echo $fila['id_tarea']; ?></td> -->
                                <td>
                                    <?php echo $fila['nombre_tarea']; ?>
                                </td>
                                <td><?php echo $fila['descripcion']; ?></td>
                                <td><?php echo $fila['estado']; ?></td>
                                <td><?php echo $fila['nombres']; ?></td>
                                <!-- <td><a class="ver_u" href="ver_usuario.php?id=<?php echo $fila['id']; ?>"><i class="fas fa-eye"></i></a></td> -->
                                <td><a class="editar" href="editar_tarea.php?id=<?php echo $fila['id_tarea']; ?>"><i class="fas fa-spell-check"></i></a></td>
                                <td><a class="eliminar" href="#" onClick="validar('eliminar_tarea.php?id=<?php echo $fila['id_tarea']; ?>')"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="validar.js"></script>
</html>

