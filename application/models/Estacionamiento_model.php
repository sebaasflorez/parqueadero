<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estacionamiento_model extends CI_Model {

	private $tabla = 'estacionamientos';
	private $id = 'id_estacionamiento';

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function traer_datos()
	{
		$this->db->select('e.id_estacionamiento , t.descripcion , e.cantidad_maxima , t.tipo');
		$this->db->from('estacionamientos e');
		$this->db->join('tipos_vehiculos t', 't.id_tipo_vehiculo = e.id_tipo_vehiculo');

		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function actualizar($data){
		$datos = array(
			'cantidad_maxima' => $data['cantidad_maxima']
			);

		$this->db->where($this->id,$data[$this->id]);
		$query = $this->db->update($this->tabla,$datos);
	}

	public function traer_disponibles(){
		$this->db->select('e.id_tipo_vehiculo , e.cantidad_maxima disponibles');
		$this->db->from('estacionamientos e');
		$this->db->join('tipos_vehiculos t', 't.id_tipo_vehiculo = e.id_tipo_vehiculo');

		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
}
