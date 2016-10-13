<?php
// Proyecto.php
__autoload('DBConnection');

class Proyecto{
	private $ID_PROYECTO;
	private $NOMBRE;
	private $DESCRIPCION;
	private $RFI;
	private $NOTAS;
	private $estados_ID_ESTADO;
		
	
	public function __construct($id = null) {
		if(!is_null($id)) {
			// DB
			$query = "SELECT * FROM proyectos
					WHERE ID_PROYECTO = ?";
			$stmt = DBConnection::getStatement($query);
			$stmt->execute(array($id));
			$fila = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->cargarDeArray($fila);
		}
	}

	public static function traerUno($id) {
		$query = "SELECT
						proyectos.NOMBRE,
						proyectos.DESCRIPCION,
						proyectos.RFI,
						proyectos.NOTAS,
						estados.ID_ESTADO,
						estados.NOMBRE as ESTADO
					FROM
						proyectos
					JOIN estados ON estados_ID_ESTADO = estados.ID_ESTADO
					WHERE
						ID_PROYECTO = ?";
		$stmt = DBConnection::getStatement($query);
		$stmt->execute(array($id));
		return $stmt->fetchAll();
	}


	public function cargarDeArray($fila) {
		foreach($fila as $prop => $valor) {
			$this->$prop = $valor;
		}
	}
	
	public static function getAll() {
		$query = "SELECT
						proyectos.ID_PROYECTO,
						proyectos.NOMBRE,
						proyectos.DESCRIPCION,
						proyectos.RFI,
						proyectos.NOTAS,
						estados.NOMBRE AS ESTADO,
						estados.ID_ESTADO AS ID_ESTADO
					
					FROM
						proyectos
					JOIN estados ON estados_ID_ESTADO = estados.ID_ESTADO";
		$stmt = DBConnection::getStatement($query);
		
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
	
	public function grabar() {
		$query = "INSERT INTO proyectos (
						NOMBRE,
						DESCRIPCION,
						RFI,
						NOTAS,
						estados_ID_ESTADO
					)
				VALUES (:nom,:des,:rfi,:not,:est)";
		$stmt = DBConnection::getStatement($query);
		$exito = $stmt->execute(
			array(
				':nom' => $this->NOMBRE,
				':des' => $this->DESCRIPCION,
				':rfi' => $this->RFI,
				':not' => $this->NOTAS,
				':est' => $this->estados_ID_ESTADO
				)
		);
		if($exito) {
		echo json_encode([
			'status' => 1,
			'message' => 'El Proyecto, se ha Modificado exitosamente! :D'
		]);
		} else {
			echo json_encode([
				'status' => 0,
				'message' => 'El Proyecto no existe, No se realizaron cambios! :´('
			]);
		}
		
			
	}
	public static function cargarDeArrayModif($id) {
		$query = "SELECT
						proyectos.ID_PROYECTO,
						proyectos.NOMBRE,
						proyectos.DESCRIPCION,
						proyectos.RFI,
						proyectos.NOTAS,
						estados.ID_ESTADO
						
					FROM
						proyectos
					JOIN estados ON estados_ID_ESTADO = estados.ID_ESTADO
					WHERE ID_PROYECTO = ?";
		$stmt = DBConnection::getStatement($query);
		$stmt->execute(array($id));
		return $stmt->fetchAll();
	}
	
	public function actualizar() {
		$query = "UPDATE 
						proyectos
					SET 
						NOMBRE=:nom,
						DESCRIPCION=:des,
						RFI=:rfi,	
						NOTAS=:not,
						estados_ID_ESTADO=:est
				  WHERE ID_PROYECTO = :cod
				;";
		$stmt = DBConnection::getStatement($query);
		$exito = $stmt->execute(
			array(
				':nom' => $this->NOMBRE,
				':des' => $this->DESCRIPCION,
				':rfi' => $this->RFI,
				':not' => $this->NOTAS,
				':est' => $this->estados_ID_ESTADO,
				':cod' => $this->ID_PROYECTO
			)
		);
		if($exito) {
		echo json_encode([
			'status' => 1,
			'message' => 'El Proyecto, se ha Modificado exitosamente! :D'
		]);
		} else {
			echo json_encode([
				'status' => 0,
				'message' => 'El Proyecto no existe, No se realizaron cambios! :´('
			]);
		}
		
			
	}
	
	
	
	public static function borrar($id) {
		$query = "DELETE FROM proyectos WHERE ID_PROYECTO = ?;";
		$stmt = DBConnection::getStatement($query);
		$stmt->fetch(PDO::FETCH_ASSOC);
		$exito = $stmt->execute(array($id));
		if($exito) {
		echo json_encode([
			'status' => 1,
			'message' => 'Proyecto borrado exitosamente! :D'
		]);
		} else {
			echo json_encode([
				'status' => 0,
				'message' => 'Error... :('
			]);
		}

	}
	function setID_PROYECTO($cod) {
		$this->ID_PROYECTO = $cod;
	}
	
	function getID_PROYECTO() {
		return $this->ID_PROYECTO;
	}
	function setNOMBRE($nom) {
		$this->NOMBRE = $nom;
	}
	
	function getNOMBRE() {
		return $this->NOMBRE;
	}
	function setDESCRIPCION($des) {
		$this->DESCRIPCION = $des;
	}
	
	function getDESCRIPCION() {
		return $this->DESCRIPCION;
	}
	function setRFI($rfi) {
		$this->RFI = $rfi;
	}
	
	function getRFI() {
		return $this->RFI;
	}
	
	function setNOTAS($not) {
		$this->NOTAS = $cat;
	}
	
	function getNOTAS() {
		return $this->NOTAS;
	}
	function setESTADO($est) {
		$this->estados_ID_ESTADO = $est;
	}
	
	function getESTADO() {
		return $this->estados_ID_ESTADO;
	}
	
	
}