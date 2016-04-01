<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('estacionamiento_model');
		$this->load->model('tarifa_model');
	}

	public function index()
	{
		$data['seleccion'] = strtolower(__CLASS__);
		$this->load->view('encabezado',$data);
		$data['cantidades'] = $this->estacionamiento_model->traer_datos();
		$data['tarifas'] = $this->tarifa_model->traer_datos();
		$this->load->view('administracion',$data);
		$this->load->view('footer');	
	}

	public function actualizar_cantidad(){

		foreach ($this->input->post() as $key => $value) {

			$data['id_estacionamiento'] = $key;
			$data['cantidad_maxima'] = $value;
			$this->estacionamiento_model->actualizar($data);
		}

		redirect(strtolower(__CLASS__));
	}

	public function actualizar_tarifa(){

		foreach ($this->input->post() as $key => $value) {

			$data['id_tarifa'] = $key; 
			$data['costo'] = $value;
			$this->tarifa_model->actualizar($data);
		}

		redirect(strtolower(__CLASS__));
	}
}
