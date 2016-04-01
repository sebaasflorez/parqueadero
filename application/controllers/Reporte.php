<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('registro_model');
		
	}

	public function index()
	{
		$data['seleccion'] = strtolower(__CLASS__);
		$this->load->view('encabezado',$data);
		$data['registros'] = $this->registro_model->traer_datos();
		$this->load->view(strtolower(__CLASS__),$data);
		$this->load->view('footer');
	}

}
