
<?php
	require_once '../config.php';
	__autoload('Proyecto');
	__autoload('DBConnection');

$id = $_GET['ID_PROYECTO']	;
Proyecto::borrar(intval($id));

