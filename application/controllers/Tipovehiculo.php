<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipovehiculo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('tipovehiculo_model');

	}

	public function index()
	{
		$data['seleccion'] = 'tipovehiculo';
		$this->load->view('encabezado',$data);
		$data['tipos'] = $this->tipovehiculo_model->traer_datos();
		$this->load->view('tipovehiculo',$data);
		$this->load->view('footer');
	}

	public function editar()
	{
		$id = $this->uri->segment(3);
		$data['registro'] = $this->tipovehiculo_model->traer_dato($id);

		$data['seleccion'] = 'tipovehiculo';
		$this->load->view('encabezado',$data);
		$this->load->view('formulario_tipovehiculo',$data);
		$this->load->view('footer');
	}

	public function actualizar()
	{
		$data = array(
			'id_tipo_vehiculo' => $this->input->post('id_tipo_vehiculo'),
			'tipo' => $this->input->post('tipo'),
			'descripcion' => $this->input->post('descripcion')
			);

		$this->tipovehiculo_model->actualizar($data);
		redirect('tipovehiculo');
	
	}
}
