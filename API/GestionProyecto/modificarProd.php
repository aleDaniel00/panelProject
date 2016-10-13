<?php
	require_once '../config.php';
	__autoload('Proyecto');
	__autoload('Estado');
	
	$id = $_GET['ID_PROYECTO']	;
	$nuevoPro = Proyecto::cargarDeArrayModif($id);
	foreach($nuevoPro as $fila) { 
?>
		<h2>Modificar <strong><?php echo $fila["NOMBRE"]?></strong></h2>
		<form id="formModif_Prod" method="post">
			<div id="errorUsual"><p></p></div>
			<div>
				<label>Nombre Proyecto </label>
				<input type="text" id="NOMBRE_PRO" name="NOMBRE" value="<?php echo $fila["NOMBRE"];?>">
			</div>
			<div>
				<input type="hidden" id="ID_PROYECTO" name="ID_PROYECTO" value="<?php echo $fila["ID_PROYECTO"];?>">
			</div>
			<div>
				<label>Descripcion</label>
				<input type="text" id="DESCRIPCION_PRO" name="DESCRIPCION_PRO" value="<?php echo $fila["DESCRIPCION"];?>">
			</div>
			<div>
				<label>RFI</label>
				<input type="text" id="RFI_PRO" name="RFI_PRO" value="<?php echo $fila["RFI"];?>">
			</div>
			<div>
				<label>Notas</label>
				<input type="text" id="NOTAS_PRO" name="NOTAS_PRO" value="<?php echo $fila["NOTAS"];?>">
			</div>
			
			<div>
				<label >Categoria del Proyecto</label>
				<?php Estado::listarEnOptions('NOMBRE','ID_ESTADO',$fila["ID_ESTADO"]);?>
			</div>
						
			
			<button id="botonModificarProd" name="<?php echo $fila["ID_PROYECTO"];?>">Guardar</button>
			<button id="botonCancelarModif">Cancelar</button>
		</form>
		<?php 
	} 
	?>
		