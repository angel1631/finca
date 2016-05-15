<?php 

	class reservacion extends ORM {
		public $id,  $mesa, $restaurante, $obj_mesa_restaurante, $cliente, $dia, $hora, $comensales, $en_sitio, $estatus;
		protected static $table = 'reservacion';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;

			$this->mesa = isset($data['mesa']) ? intval($data['mesa']) : null;
			$this->restaurante = isset($data['restaurante']) ? intval($data['restaurante']) : null;
			
			if($this->mesa && $this->restaurante){
				//ya no puedo usar find, seria el where modificado, tengo que hacerlo 
				$this->obj_mesa_restaurante = mesa_restaurante::find($this->restaurante);	
				
			}

			$this->cliente = isset($data['cliente']) ? $data['cliente'] : null;
			$this->dia = isset($data['dia']) ? $data['dia'] : null;
			$this->mes = isset($data['mes']) ? $data['mes'] : null;
			$this->hora = isset($data['hora']) ? $data['hora'] : null;
			$this->comensales = isset($data['comensales']) ? $data['comensales'] : null;
			$this->en_sitio = isset($data['en_sitio']) ? $data['en_sitio'] : null;
			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;

			

			
		}
	}

?>
