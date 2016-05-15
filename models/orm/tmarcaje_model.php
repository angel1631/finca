<?php 

	class tmarcaje_model extends ORM {
		public $id, $titulo, $estado; 
		protected static $table = 'tipo_marcaje';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;
			$this->estado = isset($data['estado']) ? $data['estado'] : null;
		}
	}

?>
