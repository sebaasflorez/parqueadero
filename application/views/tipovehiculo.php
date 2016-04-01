<div id="herramientas" class="container">
	<button id="button" type="button" class="btn btn-primary">
      Editar <span class=" glyphicon glyphicon-pencil"></span> 
    </button>
</div>
<br>
<div class="container">

	<table name='tipovehiculo' id="example" class="display cell-border compact" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Tipo</th>
				<th>Descripcion</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($tipos->result() as $value) {
				?>
				<tr>
					<td><?php echo $value->id_tipo_vehiculo; ?></td>
					<td><?php echo $value->tipo; ?></td>
					<td><?php echo $value->descripcion; ?></td>
				</tr>
				<?php
			} ?>
		</tbody>
	</table>
	<script type="text/javascript">
	var table = $('#example').DataTable(SetDatatable());
	$('#example tbody').on( 'click', 'tr', function () {
		$(this).toggleClass('selected');
	} );

	$('#button').click( function () {

		var rows =  table.rows('.selected').data().length;

		if (rows == 0) {
			alert('Seleccione un (1) registro.');
		}else if ( rows > 1) {
			alert("Seleccione solo un (1) registro.");
		}else{
			window.location = "tipovehiculo/editar/"+table.row('.selected').data()[0];
            return;
		}
	} );

	</script>
</div>


