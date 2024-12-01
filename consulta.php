<?php
date_default_timezone_set('America/Mexico_City');
$dia_semana_ingles = array(
    'Monday' => 'lunes',
    'Tuesday' => 'martes',
    'Wednesday' => 'miercoles',
    'Thursday' => 'jueves',
    'Friday' => 'viernes',
    'Saturday' => 'sabado',
    'Sunday' => 'domingo'
);
$dia_semana = 'lunes';
// $dia_semana = $dia_semana_ingles[date("l")];
require "admin/conexion.php";

// Define todas las horas posibles
$horas_posibles = range(7, 21);

// Consulta para obtener las horas ocupadas de un aula específico (por ejemplo, "H1")
for ($aula_id = 1; $aula_id <= 22; $aula_id++) {
    $query = "SELECT hora FROM $dia_semana WHERE aula = '$aula_id'";
    $resultado = mysqli_query($conectar, $query);

    $horas_ocupadas = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $horas_ocupadas[] = $fila['hora'];
    }

    // Calcula las horas libres comparando
    $horas_libres = array_diff($horas_posibles, $horas_ocupadas);

    // Muestra las horas libres para el aula actual
    echo "Horas libres para el aula $aula_id: " . implode(", ", $horas_libres) . "<br>";
}
?>