<?php
// Agregamos el header con el Content-Type correcto
header('Content-Type: application/json; charset=utf-8');

// Nos conectamos a la base
require 'conexion.php';
$id = mysqli_real_escape_string($db, $_GET['id']);
$query = "SELECT 
                 DATE_FORMAT(dias.FECHA, '%d/%m/%Y') as fecha,
                ac_estimadas.CANTIDAD as actE,
                ac_finalizadas.CANTIDAD as actF
            from dias
            join proyectos_has_dias on dias.ID_DIA = proyectos_has_dias.dias_ID_DIA

            JOIN ac_estimadas on ac_estimadas.dias_ID_DIA = dias.ID_DIA 
            join proyectos on proyectos.ID_PROYECTO = ac_estimadas.proyectos_ID_PROYECTO

            JOIN ac_finalizadas on ac_finalizadas.dias_ID_DIA = dias.ID_DIA 
            AND  proyectos.ID_PROYECTO = ac_finalizadas.proyectos_ID_PROYECTO

            WHERE proyectos.ID_PROYECTO= '$id'
            GROUP BY FECHA";

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