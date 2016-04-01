
<div class="container">
  <div class="page-header">
    <h3>Edicion Tipo Vehiculo</h3>
  </div>
 <form role="form" class="form-inline" action="<?php echo site_url('tipovehiculo/actualizar');?> " enctype="multipart/form-data" name="" method="post">
  <div class="form-group">
    <label for="codigo">Codigo :</label>
    <input type="text" class="form-control"  id="id_tipo_vehiculo" name="id_tipo_vehiculo" value="<?php echo $registro->result()[0]->id_tipo_vehiculo; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="tipo">Tipo :</label>
    <input type="text" class="form-control" id="tipo" name="tipo" value ="<?php echo $registro->result()[0]->tipo; ?>">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion :</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion"  value="<?php echo $registro->result()[0]->descripcion; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

</div>