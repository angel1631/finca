<?php 
	class key_model extends ORM {
		public $id, $usuario, $ke, $estado;
		protected static $table = 'ke';
		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}
		public function populateFromRow($data){
			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->usuario = isset($data['usuario']) ? $data['usuario'] : null;
			$this->ke = isset($data['key']) ? $data['key'] : null;
			$this->estado = isset($data['estado']) ? $data['estado'] : null;
			
		}
	}
?>