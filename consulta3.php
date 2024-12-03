<?php
require "admin/conexion.php";
date_default_timezone_set('America/Mexico_City');

// Define la hora actual
$hora_actual = date("G");

// Arreglo para almacenar aulas disponibles
$aulas_disponibles = [];

// Itera sobre las aulas
for ($aula_id = 1; $aula_id <= 22; $aula_id++) {
    $query = "SELECT hora FROM martes WHERE aula = ?";
    $stmt = $conectar->prepare($query);
    $stmt->bind_param("i", $aula_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if (!$resultado) {
        echo "Error en la consulta para el aula $aula_id: " . $conectar->error . "<br>";
        continue;
    }

    $horas_ocupadas = [];
    while ($fila = $resultado->fetch_assoc()) {
        $horas_ocupadas[] = $fila['hora'];
    }

    // Verifica si la hora actual está libre
    if (!in_array($hora_actual, $horas_ocupadas)) {
        $aulas_disponibles[] = $aula_id;
    }
}

// Consulta los nombres de las aulas disponibles
if (!empty($aulas_disponibles)) {
    $aulas_texto = [];
    $placeholders = implode(",", array_fill(0, count($aulas_disponibles), "?")); // Crea placeholders dinámicamente
    $query_nombres = "SELECT id_aula, aula FROM aulas WHERE id_aula IN ($placeholders)";
    $stmt_nombres = $conectar->prepare($query_nombres);

    // Genera los tipos dinámicamente para bind_param
    $tipos = str_repeat("i", count($aulas_disponibles));
    $stmt_nombres->bind_param($tipos, ...$aulas_disponibles);
    $stmt_nombres->execute();
    $resultado_nombres = $stmt_nombres->get_result();

    while ($fila = $resultado_nombres->fetch_assoc()) {
        $aulas_texto[] = $fila['aula'];
    }

    // Genera el script de SweetAlert
    if (!empty($aulas_texto)) {
        $aulas_texto_str = implode(", ", $aulas_texto);
        echo "
        Swal.fire({
            icon: 'warning',
            title: 'ATENCIÓN',
            text: 'Los salones $aulas_texto_str están libres. Considera revisar el clima.',
            showConfirmButton: true,
            confirmButtonText: '<a href=\"bitacorah.php\" style=\"color: white; text-decoration: none;\">Ir a Horarios</a>',
            allowOutsideClick: true
        });
        ";
    }
}
?>
