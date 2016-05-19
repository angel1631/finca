<?php
	@session_start();

class login_Imp implements iLogin{


	

	public function entrar(){
		$values = json_decode($_POST['values']);

		//$result = array('cod'=>1, 'msj'=>$values->nombre);

		

	$no =$values->nombre;

		$usuarios =  usuario_model::login($no);
//$result = array('cod'=> 1, 'msj'=>'k'.$usuarios);

		if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                
            	
               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }
           // $result = array('cod'=> 1, 'datos'=>$usuario);
            if($values->clave = 'javier'){
            	 $result = array('cod'=> 1, 'msj'=>'Bienvenido');
            }
           
        }
        else {
           // $result = array('cod' => 0, 'mensaje' => 'No hay poblaciones para esa provincia'.$nombre);
        	$result = array('cod'=> 0, 'msj'=>'Datos erroneos');
        }

		//$result = $puesto->save();

		$_SESSION['loggedIn'] = true;

		echo json_encode($result);
	}

	/*
		puedo dejar un print_r del post values para que miren ellos que estan mandando si es necesario

	*/
	


}