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
                    <a href="bitacorat.php" class="position">Tareas</a><a href="bitacorah.php">Registro de Salones</a>
                </div>
                <div class="widget">
                    <h1><i class="fas fa-tasks"></i> TAREAS</h1>
                    <?php require "admin/conexion.php";
                            $todos_datos = "SELECT * FROM tareas 
                            INNER JOIN alumnos ON tareas.usuario = alumnos.id
                            WHERE usuario = $id_user OR usuario = 1";
                            $resultado = mysqli_query($conectar, $todos_datos);
                            if (mysqli_num_rows($resultado) > 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    ?>
                                    <br>
                                    <h3><i class="fas fa-thumbtack"></i> <?php echo $fila['nombre_tarea']; ?></h3>
                                    <!-- <h4>Descripcion: </h4> -->
                                    <?php echo $fila['descripcion']; ?>
                                    <br><br>
                                    <a class="eliminar btn_ss" href="#" onClick="validar('eliminar_tarea.php?id=<?php echo $fila['id_tarea']; ?>')">Completar</a> <br><br>
                                    <hr>
                                    <?php
                                }
                            } else { ?>
                                <br>
                                <p>No hay tareas pendientes</p>
                            <?php
                            }
                            ?>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="validar.js"></script>
</html>
