
<div class="menu">
    <div class="logo2">
        <img src="../merida.png" alt="">
    </div> <br>
    <span class="usuario">¡Bienvenido <a href="ver_usuario.php"><?php echo $usuario?></a>!</span><br><br>
    <p class="vinculos">
        <a href="principal.php"><i class="fas fa-home"></i> - Inicio</a><br>
        <a href="salones.php"><i class="fas fa-hotel"></i> - Aulas</a><br>
        <a href="docentes.php"><i class="fas fa-chalkboard-teacher"></i> - Docentes</a><br>
        <a href="usuarios2.php"><i class="fas fa-users"></i> - Alumnos</a><br>
        <a href="tareas_p.php"><i class="fas fa-tasks"></i> - Tareas</a><br>
        <!-- <a href="usuarios.php"><i class="fas fa-user"></i> - Usuarios</a> -->
        <?php if ($id_admin == 1) {
        echo '<a href="usuarios.php"><i class="fas fa-user"></i> - Usuarios</a>';
        }?>
        
    </p>
</div>