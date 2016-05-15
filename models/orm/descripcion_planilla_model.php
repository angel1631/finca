<?php 

require_once("planilla_model.php");

	class descripcion_planilla_model extends ORM {
		public $id, $planilla, $obj_planilla, $usuario, $obj_usuario, $monto, $creado, $creador, $estado; 
		protected static $table = 'descripcion_planilla';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->planilla = isset($data['planilla']) ? $data['planilla'] : null;

			if($this->planilla){
			//ya no puedo usar find, seria el where modificado, tengo que hacerlo 
			$this->obj_planilla = planilla_model::find($this->planilla);	
			
			}

			$this->usuario = isset($data['usuario']) ? $data['usuario'] : null;

			if($this->usuario){
			//ya no puedo usar find, seria el where modificado, tengo que hacerlo 
			$this->obj_usuario = usuario_model::find($this->usuario);	
			
			}

			$this->monto = isset($data['monto']) ? $data['monto'] : null;
			$this->creado = isset($data['creado']) ? $data['creado'] : null;
			$this->creador = isset($data['creador']) ? $data['creador'] : null;
			$this->estado = isset($data['estado']) ? $data['estado'] : null;
		}
	}

?>
