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
                <h1>Control de Aulas</h1>
                <br>
                <div class="cont_info">
                <!-- <a href="crear_aula.php" class="btn"><i class="fas fa-plus"></i> Añadir un aula</a><br><br> -->
                <a href="crear_horario.php" class="btn"><i class="fas fa-plus"></i> Añadir un horario</a><br><br>
                <table class="tablaspanel">
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>AULA</th>
                            <th>TIPO</th>
                            <th>DOCENTE</th>
                            <th>INICIO</th>
                            <th>FIN</th>
                            <th>CLIMA</th>
                            <th colspan="2"></th>
                        </tr>
                        <?php require "conexion.php";
                        $todos_datos = "SELECT * FROM horarios 
                        INNER JOIN aulas ON horarios.aula = aulas.id_aula
                        INNER JOIN docentes ON horarios.docente = docentes.id_docente";
                        $resultado = mysqli_query($conectar, $todos_datos);

                        while ($fila = mysqli_fetch_assoc($resultado)){
                        ?>
                            <tr>
                                <!-- <td><?php echo $fila['id_horario']; ?></td> -->
                                <td>
                                    <?php echo $fila['aula']; ?>
                                </td>
                                <td><?php echo $fila['tipo']; ?></td>
                                <td><?php echo $fila['nombres']; ?> <?php echo $fila['apellidos']; ?></td>
                                <td><?php echo $fila['horario_inicio']; ?></td>
                                <td><?php echo $fila['horario_fin']; ?></td>
                                <td><?php echo $fila['clima']; ?></td>
                                
                                <!-- <td><a class="ver_u" href="ver_aula.php?id=<?php echo $fila['id_aula']; ?>"><i class="fas fa-eye"></i></a></td> -->
                                <!-- <td><a class="editar" href="editar_aula.php?id=<?php echo $fila['id_aula']; ?>"><i class="fas fa-spell-check"></i></a></td> -->
                                <td><a class="eliminar" href="#" onClick="validar('eliminar_aula.php?id=<?php echo $fila['id_aula']; ?>')"><i class="fas fa-trash-alt"></i></a></td>
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

