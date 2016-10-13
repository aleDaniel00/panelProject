<?php
	require_once '../config.php';
	__autoload('Estado');
?>
	<form id="formNewProd" method="post">
		<div id="exito_pro"></div>
		<div id="errorUsual"><p></p></div>
		<div>
			<label for="altaNombreProd">Escribe el nombre del nuevo proucto: </label>
			<input id="altaNombreProd" type="text" name="NOMBRE" placeholder="Campo Obligatorio">
		</div>
		<div>
			<label>Descripcion</label>
			<input type="text" id="DESCRIPCION_PRO" name="DESCRIPCION_PRO" value="">
		</div>
		<div>
			<label>RFI</label>
			<input type="text" id="RFI_PRO" name="RFI_PRO" value="">
		</div>
		<div>
			<label>NOTAS</label>
			<input type="text" id="NOTAS_PRO" name="NOTAS_PRO" value="">
		</div>
		<div>
			<label for="altaCategoriaProd">Escoge la Estado: </label>
			<?php Estado::listarEnOptions('NOMBRE','ID_ESTADO',"1");?>
		</div>
		
		<button id="altaProductoBtn">Guardar</button>
		<button id="botonCancelarAlta">Cancelar</button>
	</form>
</li>