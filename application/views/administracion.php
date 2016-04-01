<div class="container">
	<div class="page-header">
		<h3>Tarifas</h3>
		<div role="alert" class="alert alert-info">
       <h5> Hora o Fraccion (F) - Dia (D)</h5>
      </div>
		
	</div>
	<form role="form" class="form-inline" action="<?php echo site_url('administracion/actualizar_tarifa');?> " enctype="multipart/form-data" name="" method="post">
		<?php 
		foreach ($tarifas->result() as $value) {
			?>
			<div class="form-group">
				<label for="<?php echo $value->id_tarifa;  ?>"><?php echo $value->descripcion; ?>  Tarifa <?php echo $value->tipo_tarifa; ?> :</label>
				<input type="number" class="form-control"  id="<?php echo $value->id_tarifa;  ?>" name="<?php echo $value->id_tarifa; ?>" value="<?php echo $value->costo; ?>" >
			</div>
			<?php } ?>		
			<button type="submit" class="btn btn-primary">Actualizar</button>
		</form>
		<div class="page-header">
			<h3>Estacionamientos</h3>
			<div role="alert" class="alert alert-info">
       <h5> Cantidad maxima de estacionamientos por tipo de vehiculo</h5>
      </div>
		</div>
		<form role="form" class="form-inline" action="<?php echo site_url('administracion/actualizar_cantidad');?> " enctype="multipart/form-data" name="" method="post">
			<?php 
			foreach ($cantidades->result() as $value) {
				?>
				<div class="form-group">
					<label for="cantidad_carros">Cantidad <?php echo $value->descripcion; ?> :</label>
					<input type="number" class="form-control"  id="<?php echo $value->id_estacionamiento;  ?>" name="<?php echo $value->id_estacionamiento; ?>" value="<?php echo $value->cantidad_maxima; ?>" >
				</div>
				<?php } ?>		
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</form>
		</div>

