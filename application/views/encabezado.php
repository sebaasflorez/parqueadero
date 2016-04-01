<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Parqueadero App</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/DataTables/media/css/jquery.dataTables.css">

	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/utilities.js"></script>
  <script src="<?php echo base_url();?>assets/DataTables/media/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>assets/DataTables/media/js/dataTables.bootstrap.js"></script>
</head>
 <body role="document">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('welcome'); ?>">Parqueadero App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php $class = (isset($seleccion)) ? $seleccion : '' ; 
              $opciones_menu = array('registro/ingreso'=>'Registro Ingreso','registro/salida'=>'Registro Salida','tipovehiculo'=>'Tipos Vehiculos','administracion'=>'Administracion','reporte'=>'Reporte');

              foreach ($opciones_menu as $key => $value) { ?>
                <li class="<?php if( $class == $key ){echo 'active';}; ?>"><a href="<?php echo site_url($key); ?>"><?php echo $value; ?></a></li>
              <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>