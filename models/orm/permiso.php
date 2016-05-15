<?php 
require_once('pagina.php');
require_once('rol.php');

	class permiso extends ORM {
		public $pagina, $obj_pagina, $rol, $obj_rol, $estatus;
		protected static $table = 'permiso';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

		
			$this->pagina = isset($data['pagina']) ? intval($data['pagina']) : null;
			
			if($this->pagina){
				$this->obj_pagina = pagina::find($this->pagina);	
			}

			$this->rol = isset($data['rol']) ? intval($data['rol']) : null;

			if($this->rol){
				$this->obj_rol = rol::find($this->rol);	
			}

			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;

		}
	}

?>