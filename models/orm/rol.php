<?php 
//require_once('ORM.php');
	class rol extends ORM {
		public $id, $titulo, $estatus;
		protected static $table = 'rol';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;
			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;
		}
	}

?>