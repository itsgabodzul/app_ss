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