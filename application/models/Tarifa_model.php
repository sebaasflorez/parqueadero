<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifa_model extends CI_Model {

	private $tabla = 'tarifas';
	private $id = 'id_tarifa';

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function traer_datos()
	{
		$this->db->select('tr.id_tarifa , t.descripcion , tr.costo , tr.tipo_tarifa');
		$this->db->from('tarifas tr');
		$this->db->join('tipos_vehiculos t', 't.id_tipo_vehiculo = tr.id_tipo_vehiculo');

		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function actualizar($data){
		$datos = array(
			'costo' => $data['costo']
			);

		$this->db->where($this->id,$data[$this->id]);
		$query = $this->db->update($this->tabla,$datos);
	}
}
