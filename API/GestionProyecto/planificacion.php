<?php
// Agregamos el header con el Content-Type correcto
header('Content-Type: application/json; charset=utf-8');

// Nos conectamos a la base
require 'conexion.php';
$id = mysqli_real_escape_string($db, $_GET['id']);
$query = "SELECT
                DATE_FORMAT(dias.FECHA, '%d/%m/%Y') AS fecha,
                ac_estimadas.CANTIDAD AS actE,
                ac_finalizadas.CANTIDAD AS actF,
                proyectos_has_dias.proyectos_ID_PROYECTO AS proyecto,
                proyectos_has_dias.dias_ID_DIA 
            FROM
                 ac_estimadas
            JOIN ac_finalizadas ON ac_estimadas.dias_ID_DIA = ac_finalizadas.dias_ID_DIA
            JOIN dias ON dias.ID_DIA = ac_estimadas.dias_ID_DIA
            JOIN proyectos_has_dias ON proyectos_has_dias.dias_ID_DIA = proyectos_has_dias.proyectos_ID_PROYECTO
            WHERE proyectos_has_dias.proyectos_ID_PROYECTO = '$id'";

$res = mysqli_query($db, $query);

$salida = [];
while($fila = mysqli_fetch_assoc($res)) {
	$salida[] = $fila;
}

// Simulamos la tostadora de conexión del usuario.
//sleep(2);

// Simulamos un error.
/*echo json_encode([
	'status' => 0,
	'message' => 'Error de conexión a la base de datos.'
]);
die;*/

echo json_encode([
	'status' => 1,
	'proyecto' => $salida
]);