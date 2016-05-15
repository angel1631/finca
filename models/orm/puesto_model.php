<?php 

	class puesto_model extends ORM {
		public $id, $titulo, $valor_hora, $salario, $estado; 
		protected static $table = 'tipo_puesto';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;
			$this->valor_hora = isset($data['valor_hora']) ? $data['valor_hora'] : null;
			$this->salario = isset($data['salario']) ? $data['salario'] : null;
			$this->estado = isset($data['estado']) ? $data['estado'] : null;
		}
	}

?>
