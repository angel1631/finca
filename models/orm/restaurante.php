<?php 

	class restaurante extends ORM {
		public $id, $titulo, $direccion, $estatus, $padre, $obj_padre;
		protected static $table = 'restaurante';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;
			$this->direccion = isset($data['direccion']) ? $data['direccion'] : null;
			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;
			$this->padre = isset($data['padre']) ? intval($data['padre']) : null;
			//en uno guardo el id y en otro el objeto 
			if($this->padre){
				$this->obj_provincia = restaurante::find($this->padre);
			}
			
		}
	}

?>

