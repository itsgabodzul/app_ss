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
                <h1>Registro de Asistencias Alumnos</h1>
                <br>
                <div class="cont_info">
                    <br><br>
                <form class="buscar" action="" method="get">
                    <label for="" class="bs_docente">Buscar por alumno:</label>
                    <select name="busca_alumno" class="bs_docentes">
                        <option value=""></option>
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
                            <th>ALUMNO</th>
                            <th>FECHA</th>
                            <th>HORAS</th>
                        </tr>
                        <?php require "conexion.php";
                        if (isset($_GET['buscar']) and $_GET['busca_alumno']) {
                            $alumno = $_GET['busca_alumno'];
                            $todos_datos = "SELECT alumnos.nombres AS alumno, asistencias.fecha, SUM(asistencias.acumuldas) AS total_horas, asistencias.alumno AS id_alumno
                            FROM asistencias
                            INNER JOIN alumnos ON asistencias.alumno = alumnos.id
                            WHERE alumnos.nombres LIKE '%$alumno%'
                            GROUP BY alumnos.nombres, asistencias.fecha
                            ORDER BY asistencias.fecha ASC";
                            $add = 'No se encontraron resultados';
                        } else {
                            $alumno = '';
                            $todos_datos = "SELECT * FROM asistencias 
                            INNER JOIN alumnos ON asistencias.alumno = alumnos.id WHERE id_asistencia = 0";
                            $add = '<i class="fas fa-exclamation-circle"></i> Por favor seleccione un alumno';
                        }
                        $resultado = mysqli_query($conectar, $todos_datos);
                        if (mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)){
                                $id_alumno = $fila['id_alumno'];
                                ?>
                                    <tr>
                                        <!-- <td><?php echo $fila['id_tarea']; ?></td> -->
                                        <td>
                                            <?php echo $fila['alumno']; ?>
                                        </td>
                                        <td><?php echo $fila['fecha']; ?></td>
                                        <?php 
                                        $decimal = $fila['total_horas']; // Suponiendo que es un número decimal
                                        $horas = floor($decimal); // Parte entera (horas)
                                        $minutos = ($decimal - $horas) * 60;
                                        $formatoHora = sprintf("%02d:%02d", $horas, $minutos);?>
                                        <td><?php echo $formatoHora?></td>
                                    </tr>
                                <?php }?>
                        <?php } else { ?>
                            <td colspan="3" class="alert"><?php echo $add?></td>
                        <?php } ?>
                    </table>
                    <div>
                        <?php 
                        if(isset($id_alumno)){
                            $acum = "SELECT SUM(acumuldas) AS total_acumuladas FROM asistencias WHERE alumno = $id_alumno";
                            $resultado_acum = mysqli_query($conectar, $acum);
                            $fila_acum = mysqli_fetch_assoc($resultado_acum);
                            if ($fila_acum['total_acumuladas'] !== null) {
                                $horas_acumuladas = $fila_acum['total_acumuladas'];
                            } else {
                                $horas_acumuladas = 0;
                            }
                            $total_horas = floor($horas_acumuladas);
                            $total_minutos = round(($horas_acumuladas - $total_horas) * 60);
                            $formato_time = sprintf("%02d:%02d", $total_horas, $total_minutos);?>
                            <p class="new_horas">Horas totales: <?php echo $formato_time?></p>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="validar.js"></script>
</html>

