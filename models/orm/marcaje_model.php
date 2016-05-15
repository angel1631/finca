<?php 

	class marcaje_model extends ORM {
		public $id, $usuario, $obj_usuario, $inicio, $fin, $estado;
		protected static $table = 'marcaje';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->usuario = isset($data['usuario']) ? $data['usuario'] : null;

			if($this->usuario){
				$this->obj_usuario = usuario_model::find($this->usuario);
				
			}

			$this->inicio = isset($data['inicio']) ? $data['inicio'] : null;
			$this->fin = isset($data['fin']) ? $data['fin'] : null;
			$this->estado = isset($data['estado']) ? $data['estado'] : null;
		}
	}

?>
