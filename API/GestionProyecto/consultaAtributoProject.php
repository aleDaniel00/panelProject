<?php
// Agregamos el header con el Content-Type correcto
header('Content-Type: application/json; charset=utf-8');

// Nos conectamos a la base
require 'conexion.php';
$atributo = mysqli_real_escape_string($db, $_GET['atributo']);
$query = "SELECT 
	proyectos.'$atributo'
FROM proyectos";

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