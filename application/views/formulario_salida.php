<?php 
// VALIDANDO SI ES NECESAIRO SETEAR LSO DATOS EN EL FORM
if (isset($registro)) {
	$action = 'registro/facturar';
	$salida = array();

	foreach ($registro->result() as $key) {
		if ($key->tipo_tarifa == 'F') {
			$fracciones = ($key->Minutos > 0)? ($key->Horas+1):$key->Horas;
			$salida[$key->tipo_tarifa] =  $key->costo * $fracciones;
		}else if ($key->tipo_tarifa == 'D') {
			$fracciones = $key->Horas/24;
			$fracciones = explode('.',$fracciones);
			$fracciones = ( $fracciones[0] == '0' )? 1 : $fracciones[0];
			$salida[$key->tipo_tarifa] =  $key->costo * $fracciones;
		}
	}
}else{
	$action = 'registro/registrar_salida';
}
 ?>
<div class="container ">
	<div class="row ">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form role="form"  action="<?php echo site_url($action);?> " enctype="multipart/form-data" name="" method="post">
				<div class="form-group text-center">
					<h2 ><label for="placa" class="text-center" >Ingrese la Placa</label></h2>
					<?php 
					if (isset($placa)) {
						?>
						<input type="text" class="form-control placa"  id="placa" name="placa" value="<?php echo $placa; ?>" readonly>
						<?php
					}else{
						?>
						<input type="text" class="form-control placa"  id="placa" name="placa" value="" required>
						<?php
					}
					 ?>
					<hr>
					<?php if (isset($registro)) {
						?>
						<label for="ingreso" class="text-center" >Hora Ingreso</label></h2>
						<input type="text" class="form-control text-center"  id="ingreso" name="ingreso" value="<?php echo $registro->result()[0]->ingreso; ?>" readonly>
						
						<label for="salida" class="text-center" >Hora Salida</label></h2>
						<input type="text" class="form-control text-center"  id="salida" name="salida" value="<?php echo $registro->result()[0]->fecha_actual; ?>" readonly>

						<label for="salida" class="text-center" >Tiempo</label></h2>
						<input type="text" class="form-control text-center"  id="tiempo" name="tiempo" value="<?php echo $registro->result()[0]->Tiempo; ?>" readonly>
						
						<label for="" class="text-center">Tarifa</label><br>
						<label class="radio"><input type="radio" name="tarifa" id="" value="<?php echo $salida['F'] ?>" required> F&nbsp;&nbsp;<code><?php echo number_format($salida['F']).' Pesos'; ?></code> </label>
						<label class="radio"><input type="radio" name="tarifa" id="" value="<?php echo $salida['D'] ?>" required> D&nbsp;&nbsp;<code><?php echo number_format($salida['D']).' Pesos'; ?></code> </label>
					<hr>
						<button type="submit" class="btn btn-primary">Facturar</button>
						<a href="<?php echo site_url('registro/salida'); ?>" class="btn btn-warning">Cancelar</a>
						<?php
					}else{
						?>
						<button id="button" type="submit" class="btn btn-primary"> Buscar <span class=" glyphicon glyphicon-search"></span> </button>
						<?php
					}?>
					
					
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
	<!-- ALERTAS -->
	<?php if (isset($alert)) {
		?>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<?php  
				switch ($alert) {
					case 'OK':
					?>
					<div role="alert" class="alert alert-info alert-dismissible fade in">
						<button aria-label="Close" data-dismiss="alert" class="close" type="button">
							<span aria-hidden="true">×</span></button> <strong>Transaccion Exitosa!</strong> Registro actualizado correctamente. 
						</div>

						<?php
						break;

						case 'NO_FOUND':
						?>
						<div role="alert" class="alert alert-warning alert-dismissible fade in">
							<button aria-label="Close" data-dismiss="alert" class="close" type="button">
								<span aria-hidden="true">×</span></button> <strong>Error!</strong> El vehiculo NO se encuentra en el parqueadero.
							</div>

							<?php
							break;
								
							break;
						}
						?>

					</div>
				</div>
				<div class="col-md-4"></div>
				<?php

			} ?>

		</div>