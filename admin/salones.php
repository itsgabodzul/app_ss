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
                <h1>Control de Horarios</h1>
                <br>
                <div class="cont_info">
                <!-- <a href="crear_aula.php" class="btn"><i class="fas fa-plus"></i> Añadir un aula</a><br><br> -->
                <a href="crear_horario.php" class="btn"><i class="fas fa-plus"></i> Añadir un horario</a><br><br>
                <form class="buscar" action="" method="get">
                    <label for="" class="bs_docente">Buscar un maestro:</label>
                    <select name="busca_docente" class="bs_docentes">
                        <option value="">Todos</option>
                        <?php require "conexion.php";
                        $variable_maestros = $_GET['busca_docente'];
                        $todos_maestros = "SELECT * FROM docentes ORDER BY id_docente ASC";
                        $resultado_maestros = mysqli_query($conectar, $todos_maestros);
                        while ($fila_maestros = mysqli_fetch_assoc($resultado_maestros)){
                        ?>
                            <option value="<?php echo $fila_maestros['nombres']; ?>" class="bs_docentes"
                            <?php  if ($fila_maestros["nombres"] == $variable_maestros){
                                        echo "selected";
                                }?>><?php echo $fila_maestros['nombres']; ?> <?php echo $fila_maestros['apellidos']; ?></option>
                        <?php }?>
                    </select>
                    <button type="submit" name="buscar">Buscar</button>
                </form><br>
                <table class="tablaspanel">
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>AULA</th>
                            <th>TIPO</th>
                            <th>DOCENTE</th>
                            <th>HORA</th>
                            <th>CLIMA</th>
                            <th colspan="2"></th>
                        </tr>
                        <?php date_default_timezone_set('America/Mexico_City');
                            $dia_semana_ingles = array(
                                'Monday' => 'lunes',
                                'Tuesday' => 'martes',
                                'Wednesday' => 'miercoles',
                                'Thursday' => 'jueves',
                                'Friday' => 'viernes',
                                'Saturday' => 'sabado',
                                'Sunday' => 'domingo'
                            );
                            // $dia_semana = 'lunes';
                            $dia_semana = $dia_semana_ingles[date("l")];
                            ?>
                        <?php require "conexion.php";
                        if (isset($_GET['buscar']) and $_GET['busca_docente']) {
                            $maestro = $_GET['busca_docente'];
                            $todos_datos = "SELECT * FROM $dia_semana 
                            INNER JOIN aulas ON $dia_semana.aula = aulas.id_aula
                            INNER JOIN docentes ON $dia_semana.maestro = docentes.id_docente
                            WHERE nombres LIKE '%$maestro%'";
                        } else {
                            $maestro = '';
                            $todos_datos = "SELECT * FROM $dia_semana 
                            INNER JOIN aulas ON $dia_semana.aula = aulas.id_aula
                            INNER JOIN docentes ON $dia_semana.maestro = docentes.id_docente";
                        }
                        $resultado = mysqli_query($conectar, $todos_datos);

                        while ($fila = mysqli_fetch_assoc($resultado)){
                        ?>
                            <tr>
                                <td>
                                    <?php echo $fila['aula']; ?>
                                </td>
                                <td><?php echo $fila['tipo']; ?></td>
                                <td><?php echo $fila['nombres']; ?> <?php echo $fila['apellidos']; ?></td>
                                <td><?php echo $fila['hora']; ?></td>
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

