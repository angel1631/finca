<?php 

	class jornada_model extends ORM {
		public $id, $titulo, $inicia, $finaliza, $incremento_valor_hora, $estado;
		protected static $table = 'jornada';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;
			$this->inicia = isset($data['inicia']) ? $data['inicia'] : null;
			$this->finaliza = isset($data['finaliza']) ? $data['finaliza'] : null;
			$this->incremento_valor_hora = isset($data['incremento_valor_hora']) ? $data['incremento_valor_hora'] : null;
			$this->estado = isset($data['estado']) ? $data['estado'] : null;
		}
	}

?>
