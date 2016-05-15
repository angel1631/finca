<?php 
//require_once('ORM.php');
	class pagina extends ORM {
		public $id, $titulo, $menu, $obj_menu, $estatus;
		protected static $table = 'pagina';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;

			$this->menu = isset($data['menu']) ? intval($data['menu']) : null;
			

			if($this->menu){
				$this->obj_menu = rol::find($this->menu);
				
			}

			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;
		}
	}

?>