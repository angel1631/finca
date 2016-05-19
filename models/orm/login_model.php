<?php 
	class login_model extends ORM {
		public $id, $rol, $password;
		protected static $table = 'login';
		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}
		public function populateFromRow($data){
			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->rol = isset($data['rol']) ? $data['rol'] : null;
			$this->password = isset($data['password']) ? $data['password'] : null;
			
			
		}
	}
?>