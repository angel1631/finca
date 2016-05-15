<?php 
require_once('rol.php');

	class usuario extends ORM {
		public $id, $rol, $obj_rol, $login, $nombre, $apellido,  $password, $estatus;
		protected static $table = 'usuario';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->rol = isset($data['rol']) ? intval($data['rol']) : null;
			

			if($this->rol){
				$this->obj_rol = rol::find($this->rol);
				
			}

			$this->login = isset($data['login']) ? $data['login'] : null;
			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
			$this->apellido = isset($data['apellido']) ? $data['apellido'] : null;
			$this->password = isset($data['password']) ? $data['password'] : null;
			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;
		}
	}

?>

