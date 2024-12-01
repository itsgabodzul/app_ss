<div class="dropdown noti">
  <button class="btn-noti" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleIcon()">
  <i id="icon"  class="far fa-bell"></i>
  <?php require "admin/conexion.php";
  $ultimos = "SELECT * FROM notificaciones WHERE alumno = $id_user ORDER BY id_noti DESC LIMIT 1";
  $res = $conectar ->query($ultimos);
  $fila_ultimo = $res->fetch_assoc();
  $ultimo = $fila_ultimo["ultimo"];
  $sql = "SELECT COUNT(*) AS total_filas FROM tareas WHERE usuario = $id_user AND id_tarea > $ultimo";
  $result = $conectar->query($sql);
  $row = $result->fetch_assoc();
  $cont_noti = $row["total_filas"];?>
  <?php if ($cont_noti > 0) {?>
    <span class="badge bg-danger" id="count-label"><?php echo $row["total_filas"]?></span>
    <?php }?>
  </button>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <p class="title_noti"><b>Notificaciones</b></p>
    <div class="dropdown-divider"></div>
    <?php require "admin/conexion.php";
    $todos_datos = "SELECT * FROM tareas
    INNER JOIN alumnos ON tareas.usuario = alumnos.id
    WHERE (usuario = $id_user OR usuario = 1)
    AND  id_tarea > $ultimo ORDER BY id_tarea DESC";
    $resultado = mysqli_query($conectar, $todos_datos);
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
    ?>
        <a class="dropdown-item" href="bitacorat.php">
            <p><span class="new_tarea">¡Nueva tarea asignada! </span><br><?php echo $fila['nombre_tarea']; ?></p>
            
        </a>
    <?php  }
    } else { ?>
        <p class="pendientes">No hay notificaciones</p>
    <?php } ?>
  </div>
</div>



<!-- <li class="nav-item dropdown">
    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-bell"></i>
        <span class="badge bg-danger" id="count-label">1</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" id="notificationDropdown" aria-labelledby="notificationsDropdown">
        <p class="dropdown-item"><b>Notificaciones</b></p>
        <div class="dropdown-divider"></div>
    </div>
</li> -->