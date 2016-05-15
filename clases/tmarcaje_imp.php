<?php

//bussines logic
class tmarcaje_Imp implements iPuesto{

	private $nombre;

	

	public function guardar(){
		$values = json_decode($_POST['values']);

		//$result = array('cod'=>1, 'msj'=>$values->nombre);

		

		$data = array(
			'id'=>'',
			'titulo'=>$values->titulo,
			'estado'=>1);

		$tipo = new tmarcaje_model($data);

		$result = $tipo->save();

		echo json_encode($result);
	}

	


}