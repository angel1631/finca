<?php

class marcaje_Imp implements iMarcaje{


	

	public function guardar(){
		header('Content_Type: application/json; charset=utf8');
		$values = json_decode($_POST['values']);
		$s = "";
		$tipo=0;
		foreach($values as $v){
			$s = $s.$v->usuario;
			

			$data = array(
				'id'=>'',
				'usuario'=>$v->usuario,
				'inicio'=>$v->inicio,
				'fin'=>$v->fin,
				'estado'=>1);



			$marcaje = new marcaje_model($data);

			$result = $marcaje->save();

		}

		//$result = array('cod'=>1, 'msj'=>"ya a");

		echo json_encode($result);
	}

	/*
		puedo dejar un print_r del post values para que miren ellos que estan mandando si es necesario

	*/
	


}