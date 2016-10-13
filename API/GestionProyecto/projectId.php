<?php
	require_once '../config.php';
	__autoload('Proyecto');
	__autoload('DBConnection');

$id = $_GET['id'];
echo json_encode($proyecto = Proyecto::traerUno($id));