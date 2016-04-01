
<div class="container">
	<div class="page-header">
		<h3>Reporte</h3>
	</div>

	<table name='tipovehiculo' id="example" class="display cell-border compact" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Tipo</th>
				<th>Placa</th>
				<th>Estado</th>
				<th>Ingreso</th>
				<th>Salida</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($registros->result() as $value) {
				?>
				<tr>
					<td><?php echo $value->id_registro; ?></td>
					<td><?php echo $value->descripcion; ?></td>
					<td><?php echo $value->placa; ?></td>
					<td><?php echo $value->estado; ?></td>
					<td><?php echo $value->ingreso; ?></td>
					<td><?php echo $value->salida; ?></td>
					<td><?php echo number_format($value->total); ?></td>
				</tr>
				<?php
			} ?>
		</tbody>
	</table>
	<script type="text/javascript">
	var table = $('#example').DataTable(SetDatatable());
	</script>
</div>


