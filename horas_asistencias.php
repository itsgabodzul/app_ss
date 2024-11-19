<?php require "seguridad2.php";
$usuario = $_SESSION['username'];
$alumno = $_SESSION["id_user"];
?>
<?php 
    date_default_timezone_set('America/Mexico_City');
    $dia_semana_ingles = array(
    'Monday' => 'Lunes',
    'Tuesday' => 'Martes',
    'Wednesday' => 'Miércoles',
    'Thursday' => 'Jueves',
    'Friday' => 'Viernes',
    'Saturday' => 'Sábado',
    'Sunday' => 'Domingo');

    $meses_ingles = array(
    'January' => 'enero',
    'February' => 'febrero',
    'March' => 'marzo',
    'April' => 'abril',
    'May' => 'mayo',
    'June' => 'junio',
    'July' => 'julio',
    'August' => 'agosto',
    'September' => 'septiembre',
    'October' => 'octubre',
    'November' => 'noviembre',
    'December' => 'diciembre');
    $dia_semana = $dia_semana_ingles[date("l")];
    $dia = date("j");
    $mes = $meses_ingles[date("F")];
    $anio = date("Y");
    $date = new DateTime();?>
<?php include "admin/cookie.php" ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sistema de Gestión</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin_panel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    <header class="admin-header">
        <div class="logo-nav">
            <img src="img/Fondo.png" alt="">
        </div>
        <nav class="admin-nav">
            <ul>
                <li><a href="admin_panel.php">Inicio</a></li>
                <li><a href="bitacorat.php">Bitácora</a></li>
                <li><a href="horas_asistencias.php" class="selected">Horas y Asistencias</a></li>
                <li><a href="" class="noti"><i class="fas fa-bell"></i></a></li>
                <li><a href="salir.php" class="salir"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </header>
    <main class="admin-main">
            <!-- <div class="clock">
                    <p><?php echo $dia?> de <?php echo  $mes?> del <?php echo $anio?></p>
                    <div id="time">00:00:00</div>
            </div> -->
        <section class="dashboard-overview">
            <h1 class="tt_paginas">Registro de Asistencia al Servicio Social</h1>
            <div class="dashboard-widgets">
                <!-- <br><br> -->
                <br>
                <div class="widget_index1">
                <form action="" method="get" class="fechas">
                    <div class="form_group_f">
                        <label for="fecha">Selecciona una fecha:</label>
                        <input type="text" id="fecha" name="busca_fecha" >
                        <button type="submit" name="buscar">Filtar</button>
                    </div>
                </form>
                <form action="" method="get" class="todos_f">
                    <div class="form_group_f">
                        <input type="hidden" name="todos" value="si">
                        <button type="submit" name="buscar_todos">Todos los registros</button>
                    </div>
                </form>
                <table class="tablaspanel">
                        <tr>
                            <th class="fecha">Fecha</th>
                            <th class="horass">Inicio</th>
                            <th class="horass">Fin</th>
                        </tr>
                        <?php require "admin/conexion.php";
                         $fecha = $dia.'-'.date('m').'-'.$anio;
                         if (isset($_GET['buscar']) and $_GET['busca_fecha']) {
                            $fecha = $_GET['busca_fecha'];
                            $todos_datos = "SELECT * FROM asistencias WHERE alumno = $alumno AND fecha LIKE '%$fecha%'";
                        } else {
                           if(isset($_GET['buscar_todos']) and ($_GET['todos']=='si')){
                            $filtro = '';
                            $todos_datos = "SELECT * FROM asistencias WHERE alumno = $alumno ORDER BY id_asistencia ASC";
                           }
                           else {
                            $filtro = '';
                            $todos_datos = "SELECT * FROM asistencias WHERE alumno = $alumno AND fecha LIKE '%$fecha%'";
                           }
                        }
                        $resultado = mysqli_query($conectar, $todos_datos);
                        if (mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)){
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $fila['fecha']; ?>
                                        </td>
                                        <td><?php echo $fila['hora_inicio']; ?></td>
                                        <td><?php echo $fila['hora_fin']; ?></td>
                                    </tr>
                                <?php }?>
                        <?php } else { ?>
                            <td colspan="3">No se encontraron registros</td>
                        <?php } ?>
                    </table>
                </div>
                <div class="widget_index">
                    <!-- <h3>Hora Actual:</h3>
                    <p class="horas"><?php echo date('H:i');?></p>
                    <br> -->
                    <h3>Registro de Hoy</h3>
                    <?php require "admin/conexion.php";
                    $fecha = $dia.'-'.date("m").'-'.$anio;
                    $acum = "SELECT SUM(acumuldas) AS total_acumuladas FROM asistencias WHERE fecha LIKE '%$fecha%' AND alumno = $alumno";
                    $resultado_acum = mysqli_query($conectar, $acum);
                    $fila_acum = mysqli_fetch_assoc($resultado_acum);

                    if ($fila_acum['total_acumuladas'] !== null) {
                        $horas_hoy = $fila_acum['total_acumuladas'];
                    } else {
                        $horas_hoy = 0;
                    }
                    $total_horas_hoy = floor($horas_hoy);
                    $total_minutos_hoy = round(($horas_hoy - $total_horas_hoy) * 60);
                    $formato_time_hoy = sprintf("%02d:%02d", $total_horas_hoy, $total_minutos_hoy);?>
                    <p class="horas"><?php echo $formato_time_hoy?></p>
                    <br>
                    <h3>Total de horas: </h3>
                    <?php require "admin/conexion.php";
                    $fecha = $dia.'-'.date("m").'-'.$anio;
                    $acum = "SELECT SUM(acumuldas) AS total_acumuladas FROM asistencias WHERE alumno = $alumno";
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
                    <p class="horas"><?php echo $formato_time?></p>
                    <br><br>
                    <form action="guardar_asistencia.php" method="post" class="contador">
                        <input type="hidden" name="alumno" value="<?php echo $alumno?>">
                        <input type="hidden" name="fecha" value="<?php echo $dia?>-<?php echo date("m")?>-<?php echo $anio?>">
                        <input type="hidden" name="hora_inicio" value="<?php echo date('H:i');?>">
                        <input type="hidden" name="hora_fin" value="">
                        <input type="hidden" name="acumuladas" value="">
                        <button type="submit">Iniciar</button>
                    </form>
                    <form action="actualizar_salida.php" method="post" class="contador">
                        <?php require "admin/conexion.php";
                        $fecha = $dia.'-'.date("m").'-'.$anio;
                        $asistencias = "SELECT * FROM asistencias WHERE alumno = $alumno AND fecha = '$fecha'";
                        $resultado_asistencia = mysqli_query($conectar, $asistencias);
                        $fila_asistencia = mysqli_fetch_assoc($resultado_asistencia);?>
                        <input type="hidden" name="id_asistencia" value=" <?php echo $fila_asistencia["id_asistencia"]?>">
                        <input type="hidden" name="alumno" value=" <?php echo $fila_asistencia["alumno"]?>">
                        <input type="hidden" name="fecha" value=" <?php echo $fila_asistencia["fecha"]?>">
                        <?php $inicios = isset($fila_asistencia["hora_inicio"]);
                        if ($inicios != null){?>
                            <input type="hidden" name="hora_inicio" value=" <?php echo $fila_asistencia["hora_inicio"]?>">
                        <?php } else {?>
                            <input type="hidden" name="hora_inicio" value="">
                        <?php }?>
                        <input type="hidden" name="hora_fin" value="<?php echo date('H:i');?>">
                        <input type="hidden" name="acumuladas" value="">
                        <button type="submit">Detener</button>
                    </form>
                </div>
                <script src="clock.js"></script>
                <!-- <div class="widget_index">
                    
                </div> -->
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Inicializar Flatpickr
        flatpickr("#fecha", {
            dateFormat: "d-m-Y", // Formato de la fecha
            locale: "es",        // Idioma (opcional)
        });
    </script>
</body>
</html>