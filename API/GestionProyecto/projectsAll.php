<?php
	require_once '../config.php';
	__autoload('Proyecto');
	__autoload('DBConnection');

echo json_encode($proyectos = Proyecto::getAll());