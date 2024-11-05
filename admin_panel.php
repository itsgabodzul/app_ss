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
        <br>
        <nav class="admin-nav">
            <ul>
                <li><a href="admin_panel.php" class="selected">Inicio</a></li>
                <li><a href="bitacora.php">Bitácora</a></li>
                <li><a href="horas_asistencias.php">Horas y Asistencias</a></li>
                <li><a href="salir.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main class="admin-main">
        <section class="dashboard-overview">
            <h1>¡Bienvenido <?php echo $usuario?>!</h1>
            <h3 >Aqui tienes un resumen</h3>
            <div class="dashboard-widgets">
                <div class="widget">
                    <h3>Tareas pendientes</h3>
                    <?php require "admin/conexion.php";
                        $todos_datos = "SELECT * FROM tareas 
                        INNER JOIN alumnos ON tareas.usuario = alumnos.id
                        WHERE usuario = $id_user";
                        $resultado = mysqli_query($conectar, $todos_datos);
                        while ($fila = mysqli_fetch_assoc($resultado)){
                        ?>
                        <ul>
                            <li><?php echo $fila['nombre_tarea']; ?></li> <a class="eliminar" href="#" onClick="validar('eliminar_tarea.php?id=<?php echo $fila['id_tarea']; ?>')"><i class="fas fa-check-circle"></i></a>
                        </ul>
                        <?php }?>
                </div>
                <div class="widget">
                    <h3>Horas Activas</h3>
                    <p id="tiempo_real"><i class="far fa-clock"></i> 00:00:00</p> 
                    <br>
                    <button>Iniciar</button> <button>Detener</button>
                </div>
                <div class="widget">
                    <h3><i class="fas fa-bell"></i> Alertas</h3>
                    <ul>
                        <li>Alerta 1 <div class="chek"><i class="fas fa-check-circle"></i></i><i class="fas fa-times-circle"></i></div></li>
                        <li>Alerta 2 <div class="chek"><i class="fas fa-check-circle"></i></i><i class="fas fa-times-circle"></i></div></li>
                        <li>Alerta 3 <div class="chek"><i class="fas fa-check-circle"></i></i><i class="fas fa-times-circle"></i></div></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="validar.js"></script>
</html>


