<form class="buscar" action="" method="get">
    <select name="busca_titulo">
        <option value="0"></option>
        <?php require "conexion.php";
        $todos_maestros = "SELECT * FROM docentes ORDER BY id_docente ASC";
        $resultado_maestros = mysqli_query($conectar, $todos_maestros);
        while ($fila_maestros = mysqli_fetch_assoc($resultado_maestros)){
        ?>
            <option value="<?php echo $fila_maestros['nombres']; ?>"><?php echo $fila_maestros['nombres']; ?></option>
        <?php }?>
    </select>
    <button type="submit" name="buscar">Buscar</button>
</form>
<?php 
if (isset($_GET['buscar']) and $_GET['busca_titulo']) {
    $maestro = $_GET['busca_docente'];
    $todos_datos = "SELECT * FROM $dia_semana 
    INNER JOIN aulas ON $dia_semana.aula = aulas.id_aula
    INNER JOIN docentes ON $dia_semana.maestro = docentes.id_docente;
    WHERE nombres LIKE '%$maestro%'";
} else {
    $maestro = '';
    $todos_datos = "SELECT * FROM $dia_semana 
    INNER JOIN aulas ON $dia_semana.aula = aulas.id_aula
    INNER JOIN docentes ON $dia_semana.maestro = docentes.id_docente";
}?>

<!-- <?php require "conexion.php";
        $variable_carrera =  $fila["carrera"];
        $vercarrera = "SELECT * FROM carreras";
        $resultadocarrera = mysqli_query($conectar, $vercarrera);
        while ($filacarrera = $resultadocarrera->fetch_array()) {?>
            <option value="<?php echo $filacarrera['id_carrera']; ?>"
            <?php
            if ($filacarrera["id_carrera"] == $variable_carrera){
                echo "selected";
            }?>
                ><?php echo $filacarrera['nombrecarrera']; ?></option>
    <?php }?>
    </select> -->


    <form action="guardar_horario.php" method="post">
        <?php require "conexion.php"
        $aula_c = $fila_aula["aula"]
        $todos_datos = "SELECT * FROM $dia_semana WHERE aula = ";
        $resultado_aulas = mysqli_query($conectar, $todos_datos);
        $fila_aula = mysqli_fetch_assoc($resultado_aulas);?>
        <input type="hidden" name="aula" value="<?php echo $fila['id_aula']; ?>">
        <input type="hidden" name="docente" value="<?php echo $fila['id_docente']; ?>">
        <input type="hidden" name="dia" value="">
        <input type="hidden" name="horario" value="">
        <input type="hidden" name="clima" value="Encendido">
    </form>

    <form action="guardar_tarea_editar.php" method="post">
                        <?php require "conexion.php";
                            $vertarea = "SELECT * FROM tareas WHERE id_tarea = '$id'";
                            $resultado = mysqli_query($conectar, $vertarea);
                            $fila = $resultado->fetch_array();?>
                            <input type="text" name="nombre_tarea" value="<?php echo $fila["nombre_tarea"]?>">
                            <input type="hidden" name="descripcion" value="<?php echo $fila["descripcion"]?>">
                            <input type="hidden"  name="estado" value="Completada">
                            <input type="hidden" name="usuario" value="">
                            <input type="hidden" name="id_tarea" value="<?php echo $fila["id_tarea"]?>">
                        <button  type="submit" class="">Guardar</button>
                    </form>