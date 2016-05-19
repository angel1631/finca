<?php 

	class planilla_model extends ORM {
		public $id, $titulo, $momento, $autorizo, $estado, $mes, $anio, $puesto, $obj_puesto; 
		protected static $table = 'planilla';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;
			$this->momento = isset($data['momento']) ? $data['momento'] : null;
			$this->autorizo = isset($data['autorizo']) ? $data['autorizo'] : null;
			$this->estado = isset($data['estado']) ? $data['estado'] : null;
			$this->mes = isset($data['mes']) ? $data['mes'] : null;
			$this->anio = isset($data['anio']) ? $data['anio'] : null;
			$this->puesto = isset($data['puesto']) ? $data['puesto'] : null;
			if ($this->puesto)
			{
				$this->obj_puesto = puesto_model::find($this->puesto);	
			}
		}
	}

?>
