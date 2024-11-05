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
        <h1>¡Bienvenido <?php echo $usuario?>!</h1>
        <br>
        <nav class="admin-nav">
            <ul>
                <li><a href="admin_panel.php">Inicio</a></li>
                <!-- <li><a href="gestionar_alumnos.php">Gestión de Alumnos</a></li> -->
                <li><a href="bitacora.php" class="selected">Bitácora</a></li>
                <li><a href="horas_asistencias.php">Horas y Asistencias</a></li>
                <li><a href="salir.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main class="admin-main">
        <section class="dashboard-overview">
            <h2>Resumen de tareas</h2>
            <div class="dashboard-widgets">
                <div class="widget">
                <?php require "admin/conexion.php";
                        $todos_datos = "SELECT * FROM tareas 
                        INNER JOIN alumnos ON tareas.usuario = alumnos.id
                        WHERE usuario = $id_user";
                        $resultado = mysqli_query($conectar, $todos_datos);
                        while ($fila = mysqli_fetch_assoc($resultado)){
                        ?>
                        <h3>Tarea: </h3>
                        <?php echo $fila['nombre_tarea']; ?>
                        <h3>Descripcion: </h3>
                        <?php echo $fila['descripcion']; ?>
                        <br><br>
                        <a class="eliminar btn_ss" href="#" onClick="validar('eliminar_tarea.php?id=<?php echo $fila['id_tarea']; ?>')">Completar <i class="fas fa-check-circle"></i></a> <br><br><br>
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
</html>
