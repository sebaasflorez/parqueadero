<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_model extends CI_Model {

	private $tabla = 'registros';
	private $id = 'id_registro';

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function crear_registro($datos){
		date_default_timezone_set('America/Bogota');

		$data = array(
			'id_tipo_vehiculo' => $datos['tipo'],
			'placa' => $datos['placa'],
			'ingreso' => date('y-m-d H:i:s'),
			'estado' => 'P'
			);

		$this->db->insert($this->tabla, $data); 

	}


	public function validar_registro($data)
	{
		$this->db->where('placa',$data['placa']);
		$this->db->where('id_tipo_vehiculo',$data['tipo']);
		$this->db->where('estado','P');
		$query = $this->db->get($this->tabla);
		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	/*public function actualizar($data){
		$datos = array(
			'cantidad_maxima' => $data['cantidad_maxima']
			);

		$this->db->where($this->id,$data[$this->id]);
		$query = $this->db->update($this->tabla,$datos);
	}*/

	public function disponible(){

		$this->db->select('e.id_tipo_vehiculo, e.cantidad_maxima - count(r.id_registro) disponibles');
		$this->db->from('estacionamientos e');
		$this->db->join('registros r', "e.id_tipo_vehiculo = r.id_tipo_vehiculo and r.estado ='P'",'left');
		$this->db->group_by("e.id_tipo_vehiculo"); 

		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function disponible_tipo($tipo){

		$this->db->select('e.id_tipo_vehiculo, e.cantidad_maxima - count(r.id_registro) disponibles');
		$this->db->from('estacionamientos e');
		$this->db->join('registros r', "e.id_tipo_vehiculo = r.id_tipo_vehiculo and r.estado ='P'",'left');
		$this->db->where('e.id_tipo_vehiculo',$tipo);
		$this->db->group_by("e.id_tipo_vehiculo"); 

		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}


	public function traer_registro($placa)
	{
		$this->db->select('*,
							EXTRACT(hour from TIMEDIFF(NOW(),ingreso)) Horas,
							EXTRACT(minute from TIMEDIFF(NOW(),ingreso)) Minutos,
							TIMEDIFF(NOW(),ingreso) Tiempo,
							NOW() fecha_actual');

		$this->db->where('placa',$placa);
		$this->db->where('estado','P');
		$this->db->join('tarifas','tarifas.id_tipo_vehiculo = registros.id_tipo_vehiculo');
		$query = $this->db->get($this->tabla);

		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function facturar($data){

		$datos = array(
			'total' => $data['total'],
			'salida' => $data['salida'],
			'estado' => 'C'
			);

		$this->db->where('placa',$data['placa']);
		$this->db->where('estado','P');
		$query = $this->db->update($this->tabla,$datos);
	}

	public function traer_datos()
	{
		$this->db->select('*,tipos_vehiculos.descripcion');
		$this->db->join('tipos_vehiculos','tipos_vehiculos.id_tipo_vehiculo = registros.id_tipo_vehiculo');
		$query = $this->db->get($this->tabla);

		if ($query->num_rows() > 0) return $query;
		else return false;
	}


}
