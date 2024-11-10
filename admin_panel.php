<?php require "seguridad2.php";
$usuario = $_SESSION['username'];
$id_user = $_SESSION['id_user'];
?>
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
</head>
<body>
<header class="admin-header">
        <div class="logo-nav">
            <img src="img/Fondo.png" alt="">
        </div>
        <nav class="admin-nav">
            <ul>
                <li><a href="admin_panel.php" class="selected">Inicio</a></li>
                <li><a href="bitacorat.php" >Bitácora</a></li>
                <li><a href="horas_asistencias.php">Horas y Asistencias</a></li>
                <li><a href="" class="noti"><i class="fas fa-bell"></i></a></li>
                <li><a href="salir.php" class="salir"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </header>
    <main class="admin-main">
        <section class="dashboard-overview">
            <h1 class="tt_paginas">¡Bienvenido <?php echo $usuario?>!</h1>
            <h3 class="st_paginas">Aqui tienes un resumen de tus actividades</h3>
            <br>
            <div class="dashboard-widgets">
                <div class="widget_index1">
                    <?php 
                    date_default_timezone_set('America/Mexico_City');
                    $dia_semana_ingles = array(
                        'Monday' => 'Lunes',
                        'Tuesday' => 'Martes',
                        'Wednesday' => 'Miércoles',
                        'Thursday' => 'Jueves',
                        'Friday' => 'Viernes',
                        'Saturday' => 'Sábado',
                        'Sunday' => 'Domingo'
                    );
                    
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
                        'December' => 'diciembre'
                    );
                    $dia_semana = $dia_semana_ingles[date("l")];
                    $dia = date("j");
                    $mes = $meses_ingles[date("F")];
                    $anio = date("Y"); ?>
                    <h1 class=""><?php echo $dia_semana?> <?php echo $dia?> de <?php echo  $mes?> del <?php echo $anio?></h1>
                </div>
                <div class="widget_index">
                    <h3>Tareas pendientes</h3><br>
                    <?php require "admin/conexion.php";
                        $todos_datos = "SELECT * FROM tareas
                        INNER JOIN alumnos ON tareas.usuario = alumnos.id
                        WHERE usuario = $id_user OR usuario = 1";
                        $resultado = mysqli_query($conectar, $todos_datos);
                        if (mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>
                            <ul class="pendientes">
                                <li><?php echo $fila['nombre_tarea']; ?></li>
                            </ul>
                        <?php 
                            }
                        } else { ?>
                            <p class="pendientes">No hay tareas pendientes</p>
                        <?php }
                        ?>
                        <br><br>
                    <div class="cont"><a href="bitacorat.php" class="btn_ss2">Ver tareas</a></div>
                </div>
                <!-- <div class="registro_horas">
                    <form action="">
                        <p class="asistencias">Registro de Asistencia al Servicio Social: </p>
                        <button>Inicar</button>
                        <button>Detener</button>
                    </form>
                </div> -->
            </div>
        </section>
    </main>
</body>
<script src="validar.js"></script>
</html>


