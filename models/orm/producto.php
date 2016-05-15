<?php 

	class producto extends ORM {
		public $id, $titulo, $cantidad, $estatus;
		protected static $table = 'producto';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;
			$this->cantidad = isset($data['cantidad']) ? $data['cantidad'] : null;
			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;
		}
	}

?>

