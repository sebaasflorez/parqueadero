<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipovehiculo_model extends CI_Model {

	private $tabla = 'tipos_vehiculos';
	private $id = 'id_tipo_vehiculo';

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function traer_datos()
	{
		$query = $this->db->get($this->tabla);
		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function traer_dato($id)
	{
		$this->db->where($this->id,$id);
		$query = $this->db->get($this->tabla);
		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function actualizar($data){
		$datos = array(
			'tipo' => $data['tipo'],
			'descripcion' => $data['descripcion']
			);

		$this->db->where($this->id,$data[$this->id]);
		$query = $this->db->update($this->tabla,$datos);
	}
}
