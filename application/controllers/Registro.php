<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('registro_model');
		$this->load->model('tipovehiculo_model');
		$this->load->model('estacionamiento_model');
	}

	public function index()
	{
		redirect(strtolower(__CLASS__).'/ingreso');
		
	}

	public function ingreso()
	{

		$data['seleccion'] = 'registro/ingreso';
		$this->load->view('encabezado',$data);
		$data['tipos'] = $this->tipovehiculo_model->traer_datos();
		$data['disponibles'] = $this->registro_model->disponible();
		$this->load->view('formulario_ingreso',$data);
		$this->load->view('footer');
	}

	public function registrar_ingreso(){

		if (count($this->input->post()) <= 0) {
			redirect(strtolower(__CLASS__).'/ingreso');
		}

		$data = array(
			'placa' =>  $this->input->post('placa'),
			'tipo' => $this->input->post('tipoVehiculo')
			);

		$validate = $this->registro_model->validar_registro($data);
		$estacionamiento = $this->registro_model->disponible_tipo($this->input->post('tipoVehiculo'));

		

		if ($validate) {
			$data['alert'] = 'DUPLICADO';
		}else if ($estacionamiento->result()[0]->disponibles<=0) {
			$data['alert'] = 'ESPACIO';
		}else{

			$this->registro_model->crear_registro($data);
			$data['alert'] = 'OK';
		}

		$data['seleccion'] = strtolower(__CLASS__).'/ingreso';
		$this->load->view('encabezado',$data);
		$data['tipos'] = $this->tipovehiculo_model->traer_datos();
		$data['disponibles'] = $this->registro_model->disponible();
		$this->load->view('formulario_ingreso',$data);
		$this->load->view('footer');
	}

	public function salida()
	{
		$data['seleccion'] = strtolower(__CLASS__).'/salida';
		$this->load->view('encabezado',$data);
		$this->load->view('formulario_salida',$data);
		$this->load->view('footer');
	}

	public function registrar_salida(){

		if (count($this->input->post()) <= 0) {
			redirect(strtolower(__CLASS__).'/salida');
		}

		$registro = $this->registro_model->traer_registro($this->input->post('placa'));
		

		if (!$registro) {
			$data['alert'] = 'NO_FOUND';
		}else{
			$data['registro'] = $registro;
			$data['placa'] = $this->input->post('placa');

		}

		$data['seleccion'] = strtolower(__CLASS__).'/salida';
		$this->load->view('encabezado',$data);
		$this->load->view('formulario_salida',$data);
		$this->load->view('footer');
		
	}

	public function facturar(){
		if (count($this->input->post()) <= 0) {
			redirect(strtolower(__CLASS__).'/salida');
		}

		$data = array(
			'placa' => $this->input->post('placa'),
			'total' => $this->input->post('tarifa'),
			'salida' => $this->input->post('salida')

			);

		$registro = $this->registro_model->facturar($data);
		$datos['alert'] = 'OK';
		$datos['seleccion'] = strtolower(__CLASS__).'/salida';
		$this->load->view('encabezado',$datos);
		$this->load->view('formulario_salida',$datos);
		$this->load->view('footer');
	}

	function traer_registros(){
		$query = $this->db->get($this->tabla);
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
}
