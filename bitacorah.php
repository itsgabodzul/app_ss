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
                <li><a href="admin_panel.php">Inicio</a></li>
                <li><a href="bitacorat.php" class="selected">Bitácora</a></li>
                <li><a href="horas_asistencias.php">Horas y Asistencias</a></li>
                <li><a href="salir.php" class="salir"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </header>
    <main class="admin-main">
        <section class="dashboard-overview">
            <h2 class="tt_paginas"><i class="fas fa-book"></i> Bitacora Digital</h2>
            <br>
            <div class="dashboard-widgets">
                <div class="widget-tt">
                    <a href="bitacorat.php">Tareas</a><a href="bitacorah.php"  class="position">Registro de Salones</a>
                </div>
                <div class="widget">
                    <h1><i class="fas fa-school"></i> Horario de Aulas</h1>
                    <br>
                    <table class="tabla_horarios">
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
                            // $dia_semana = 'martes';
                            $dia_semana = $dia_semana_ingles[date("l")];
                            ?>
                        <tr>
                            <th class="table_tt">Aula / Horario</th>
                            <?php for ($i=6; $i<20; $i++){?>
                            <th class="table_tt"><?php echo $i + 1; ?> a <?php echo $i + 2; ?></th>
                            <?php }?>
                        </tr>
                        <?php require "admin/conexion.php";
                            $todos_datos = "SELECT * FROM aulas ORDER BY id_aula ASC";
                            $resultado_aulas = mysqli_query($conectar, $todos_datos);
                            while ($fila_aula = mysqli_fetch_assoc($resultado_aulas)) {
                                ?>
                                <tr>
                                    <td class="table_tt"><?php echo $fila_aula['aula']; ?></td>
                                    <?php 
                                        for ($i = 6; $i < 21; $i++) {
                                            if ($dia_semana == "domingo" || $dia_semana == "sabado") {
                                                echo "<td></td>";
                                            } else {
                                                $hora = $i + 1;
                                                $aula = $fila_aula['id_aula'];
                                                $todos_maestros = "SELECT * FROM $dia_semana
                                                INNER JOIN docentes ON $dia_semana.maestro = docentes.id_docente
                                                WHERE hora = $hora AND aula = $aula";
                                                $resultado_maestros = mysqli_query($conectar, $todos_maestros);
                                            }
                                            if ($resultado_maestros && $fila_horario = mysqli_fetch_assoc($resultado_maestros)) { ?>
                                                <td class="seleccion"> <?php echo $fila_horario["nombres"] ?></td>
                                            <?php  } else {
                                                echo "<td></td>";
                                            }
                                        }
                                        ?>
                                        <td class="funcion">
                                            <?php
                                            $aula_c = $fila_aula["aula"];
                                            $todos_actualizar = "SELECT * FROM aulas WHERE aula = '$aula_c'";
                                            $resultado_actualizar = mysqli_query($conectar, $todos_actualizar);
                                            $fila_actualizar = mysqli_fetch_assoc($resultado_actualizar);
                                            $estado = $fila_actualizar["estado"];
                                            if ($estado == "abierto" || $estado == ""){
                                            ?>
                                                <form action="actualizar_estado.php" method="post" class="abierto">
                                                    <input type="hidden" name="id_aula" value="<?php echo $fila_actualizar["id_aula"]?>">
                                                    <input type="hidden" name="aula" value="<?php echo $fila_actualizar["aula"]?>">
                                                    <input type="hidden" name="tipo" value="<?php echo $fila_actualizar["tipo"]?>">
                                                    <input type="hidden" name="estado" value="cerrado">
                                                    <button type="submit">Cerrar el <?php echo $fila_actualizar["aula"]?></button>
                                                </form>
                                            <?php } else {?>
                                                <form action="actualizar_estado.php " class="cerrado" method="post">
                                                    <input type="hidden" name="id_aula" value="<?php echo $fila_actualizar["id_aula"]?>">
                                                    <input type="hidden" name="aula" value="<?php echo $fila_actualizar["aula"]?>">
                                                    <input type="hidden" name="tipo" value="<?php echo $fila_actualizar["tipo"]?>">
                                                    <input type="hidden" name="estado" value="abierto">
                                                    <button type="submit">Abrir el <?php echo $fila_actualizar["aula"] ?></button>
                                                </form>
                                            <?php }?>
                                        </td>
                                </tr>
                            <?php
                            } ?>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="validar.js"></script>
</html>
