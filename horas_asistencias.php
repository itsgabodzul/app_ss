<?php require "seguridad2.php";
$usuario = $_SESSION['username'];
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
                <li><a href="bitacorat.php">Bitácora</a></li>
                <li><a href="horas_asistencias.php" class="selected">Horas y Asistencias</a></li>
                <li><a href="" class="noti"><i class="fas fa-bell"></i></a></li>
                <li><a href="salir.php" class="salir"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </nav>
    </header>
    <main class="admin-main">
        <section class="dashboard-overview">
            <h1 class="tt_paginas">Registro de Asistencia al Servicio Social</h1>
            <br>
            <div class="dashboard-widgets">
                <div class="widget_index1">
                    <form action="">
                        <button>Iniciar</button>
                    </form>
                    <form action="">
                        <button>Detener</button>
                    </form>
                </div>
                <div class="widget_index">
                    <h3>Horas Totales:</h3><br>
                    <p class="horas">08:00</p>
                    <br><br>
                    <h3>Horas Acumuladas</h3><br>
                    <p class="horas">09:00</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>