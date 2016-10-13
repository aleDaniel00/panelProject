<?php
// Agregamos el header con el Content-Type correcto
header('Content-Type: application/json; charset=utf-8');


require 'conexion.php';


parse_str($_SERVER['QUERY_STRING'], $getData);
$putData = json_decode(file_get_contents('php://input'), true);
$id = $getData['id'];



$query = "UPDATE proyectos
          SET NOMBRE        = '" . mysqli_real_escape_string($db, $putData['NOMBRE']) . "',
              DESCRIPCION      = '" . mysqli_real_escape_string($db, $putData['DESCRIPCION']) . "',
              RFI  = '" . mysqli_real_escape_string($db, $putData['RFI']) . "',
              NOTAS        = '" . mysqli_real_escape_string($db, $putData['NOTAS']) . "',
              estados_ID_ESTADO   = '" . mysqli_real_escape_string($db, $putData['ID_ESTADO']) . "'
          WHERE ID_PROYECTO = '" . mysqli_real_escape_string($db, $id) . "'";

$exito = mysqli_query($db, $query);

if($exito) {
    echo json_encode([
        'status' => 1,
        'message' => 'El producto se editó correctamente! :D'
    ]);
} else {
    echo json_encode([
        'status' => 0,
        'message' => 'Hubo un error, no andó nada :('
    ]);
}