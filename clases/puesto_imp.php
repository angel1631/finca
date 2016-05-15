<?php
//require_once("iusuario.php");

//include(URL."clases/iusuario.php");



//bussines logic
class puesto_Imp implements iPuesto{

	private $nombre;

	

	public function guardar(){
		$values = json_decode($_POST['values']);

		//$result = array('cod'=>1, 'msj'=>$values->nombre);

		

		$data = array(
			'id'=>'',
			'titulo'=>$values->nombre,
			'valor_hora'=>$values->hora,
			'salario'=>$values->salario,
			'estado'=>1);

		$puesto = new puesto_model($data);

		$result = $puesto->save();

		echo json_encode($result);
	}

	public function buscar() {

		$values = json_decode($_POST['values']);

		// $result = array('cod' => 1, 'msj' => 'vamos');

		
		$usuarios =  puesto_model::like('titulo', $values->nombre);
		

	
         if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                $usuario[] = array(
                    'id' => $user->id,
                    'titulo' => $user->titulo
                  
                    //'puesto' =>$user->obj_tipo->titulo

                );

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }
            $result = array('cod'=> 1, 'datos'=>$usuario);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos para el puesto: '.$values->nombre);
        }

	
		echo json_encode($result);
	}

	public function buscar_id(){

		
		$values = json_decode($_POST['values']);

		
			$usuarios = puesto_model::where('id', $values->clave);
			//$usuarios = usuario_model::like('id', $nombre);

	
         if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                $usuario[] = array(
                    'id' => $user->id,
                    'nombre' => $user->titulo,
                    'valor' =>$user->valor_hora,
                    'salario' =>$user->salario
                    

                );

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }
            $result = array('cod'=> 1, 'datos'=>$usuario);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos para el id: ');
        }


		echo json_encode($result);
	}

	public function actualizar(){

		$values = json_decode($_POST['values']);

		$data = array(
			'id'=>$values->id,
			'titulo'=>$values->nombre,
			'valor_hora'=>$values->hora,
			'salario'=>$values->salario);

		$usuario = new puesto_model($data);
		$result = $usuario->save();
		echo json_encode($result);
	}

	public function reporte_activo(){

		$usuarios = puesto_model::where("estado", 1);
		$cuerpo = '';
		//$puesto = '';
//$result = array('cod'=> 1, 'msj'=>'vamos');
		if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                
                	$cuerpo= $cuerpo."<tr>";
                	//$cuerpo = $cuerpo. "<td>".$p->obj_usuario->nombre."</td>";
                    $cuerpo= $cuerpo."<td>".$user->id."</td>";
                    $cuerpo= $cuerpo."<td>".$user->titulo."</td>";
                    $cuerpo= $cuerpo."<td>".$user->valor_hora."</td>";
                    $cuerpo= $cuerpo."<td>".$user->salario."</td>";
                    $cuerpo= $cuerpo."</tr>";                 
                  

                

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }

            //armar tabla
            $cabesa = "<tr>
            
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Valor Hora</th>
              <th>Salario</th>

            </tr>";


            $result = array('cod'=> 1, 'cabesa'=>$cabesa, 'cuerpo'=>$cuerpo);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos: ');
        }

        echo json_encode($result);
	}

	public function reporte_NoActivo(){

		$usuarios = puesto_model::where("estado", 0);
		$cuerpo = '';
		//$puesto = '';
//$result = array('cod'=> 1, 'msj'=>'vamos');
		if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                
                	$cuerpo= $cuerpo."<tr>";
                	//$cuerpo = $cuerpo. "<td>".$p->obj_usuario->nombre."</td>";
                    $cuerpo= $cuerpo."<td>".$user->id."</td>";
                    $cuerpo= $cuerpo."<td>".$user->titulo."</td>";
                    $cuerpo= $cuerpo."<td>".$user->valor_hora."</td>";
                    $cuerpo= $cuerpo."<td>".$user->salario."</td>";
                    $cuerpo= $cuerpo."</tr>";                 
                  

                

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }

            //armar tabla
            $cabesa = "<tr>
            
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Valor Hora</th>
              <th>Salario</th>

            </tr>";


            $result = array('cod'=> 1, 'cabesa'=>$cabesa, 'cuerpo'=>$cuerpo);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos: ');
        }

        echo json_encode($result);
	}
	


}