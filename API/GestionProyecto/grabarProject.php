<?php

header('Content-Type: application/json; charset=utf-8');


require 'conexion.php';


$postData = json_decode(file_get_contents('php://input'), true);



$query = "INSERT INTO proyectos (NOMBRE, DESCRIPCION, RFI, NOTAS, estados_ID_ESTADO)
          VALUES ('" . $postData['NOMBRE'] . "',
                  '" . $postData['DESCRIPCION'] . "',
                  '" . $postData['RFI'] . "',
                  '" . $postData['NOTAS'] . "',
                  '" . $postData['ID_ESTADO'] . "')";

$exito = mysqli_query($db, $query);

if($exito) {
    echo json_encode([
        'status' => 1,
        'message' => 'El proyecto se insertó correctamente! :D'
    ]);
} else {
    echo json_encode([
        'status' => 0,
        'message' => 'Hubo un error, no andó nada :('
    ]);
}