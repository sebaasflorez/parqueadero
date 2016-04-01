<div class="container ">
<?php 
$estacionamientos = array();
foreach ($disponibles->result() as $key) {
		$estacionamientos[$key->id_tipo_vehiculo] =  $key->disponibles;
}
?>	
	<div class="row ">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form role="form"  action="<?php echo site_url('registro/registrar_ingreso');?> " enctype="multipart/form-data" name="" method="post">
				<div class="form-group">
					<h2 class="text-center"><label for="placa" class="text-center" >Ingrese la Placa</label>
					</h2>
					<input type="text" class="form-control placa"  id="placa" name="placa" value="" required>
					<hr>
					<p class="text-center" >
						<?php  
						foreach ($tipos->result() as $value) {
							?>
							<span class="radio">
								<input type="radio" name="tipoVehiculo" id="" value="<?php echo $value->id_tipo_vehiculo; ?>" required> 
								<?php echo '<strong>'.ucfirst($value->descripcion).'</strong>&nbsp;&nbsp;<small>'.$estacionamientos[$value->id_tipo_vehiculo].' Disponibles</small>'; ?>
							</span>
							<?php	

						}
						?>
					</p>
					<hr>
					<p class="text-center" >
						<button type="submit" class="btn btn-primary">Registrar</button>
					</p>
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
							<span aria-hidden="true">×</span></button> <strong>Transaccion Exitosa!</strong> Registro guardado correctamente. 
						</div>

						<?php
						break;

						case 'DUPLICADO':
						?>
						<div role="alert" class="alert alert-warning alert-dismissible fade in">
							<button aria-label="Close" data-dismiss="alert" class="close" type="button">
								<span aria-hidden="true">×</span></button> <strong>Error!</strong> El vehiculo se encuentra en el parqueadero.
							</div>

							<?php
							break;
								case 'ESPACIO':
						?>
						<div role="alert" class="alert alert-warning alert-dismissible fade in">
							<button aria-label="Close" data-dismiss="alert" class="close" type="button">
								<span aria-hidden="true">×</span></button> <strong>Error!</strong> No hay espacio disponible en el parqueadero.
							</div>

							<?php
							break;
							default:
						# code...
							break;
						}
						?>

					</div>
				</div>
				<div class="col-md-4"></div>
				<?php

			} ?>

		</div>