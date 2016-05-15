<?php
//require_once("iusuario.php");

//include(URL."clases/iusuario.php");



//bussines logic
class jornada_Imp implements iJornada{

	private $nombre;

	//var datos = {titulo: $("#txt_titulo").val(), inicia: $("#txt_inicia").val(), finaliza:$("#txt_finaliza").val(), hora:$("#txt_hora").val()};
		
	public function guardar(){
		$values = json_decode($_POST['values']);

		//$result = array('cod'=>1, 'msj'=>$values->nombre);

		

		$data = array(
			'id'=>'',
			'titulo'=>$values->titulo,
			'inicia'=>$values->inicia,
			'finaliza'=>$values->finaliza,
			'incremento_valor_hora'=>$values->hora,
			'estado'=>1);

		$jornada = new jornada_model($data);

		$result = $jornada->save();

		echo json_encode($result);
	}


	public function buscar() {

		$values = json_decode($_POST['values']);

		// $result = array('cod' => 1, 'msj' => 'vamos');

		
		$usuarios =  jornada_model::like('titulo', $values->nombre);
		

	
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

		
			$usuarios = jornada_model::where('id', $values->clave);
			//$usuarios = usuario_model::like('id', $nombre);

	
         if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                $usuario[] = array(
                    'id' => $user->id,
                    'titulo' => $user->titulo,
                    'inicia' =>$user->inicia,
                    'fin' =>$user->finaliza,
                    'hora' =>$user->incremento_valor_hora
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
			'inicia'=>$values->inicia,
			'finaliza'=>$values->fin,
			'incremento_valor_hora'=>$values->hora);

		$usuario = new jornada_model($data);
		$result = $usuario->save();
		echo json_encode($result);
	}

	public function reporte_activo(){
		$usuarios = jornada_model::where("estado", 1);
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
                    $cuerpo= $cuerpo."<td>".$user->inicia."</td>";
                    $cuerpo= $cuerpo."<td>".$user->finaliza."</td>";
                    $cuerpo= $cuerpo."<td>".$user->incremento_valor_hora."</td>";
                    $cuerpo= $cuerpo."</tr>";                 
                  

                

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }

            //armar tabla
            $cabesa = "<tr>
            
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Inicia</th>
              <th>Finaliza</th>
              <th>Valor Hora</th>

            </tr>";


            $result = array('cod'=> 1, 'cabesa'=>$cabesa, 'cuerpo'=>$cuerpo);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos: ');
        }

        echo json_encode($result);
	}

	public function reporte_NoActivo(){
		$usuarios = jornada_model::where("estado", 0);
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
                    $cuerpo= $cuerpo."<td>".$user->inicia."</td>";
                    $cuerpo= $cuerpo."<td>".$user->finaliza."</td>";
                    $cuerpo= $cuerpo."<td>".$user->incremento_valor_hora."</td>";
                    $cuerpo= $cuerpo."</tr>";                 
                  

                

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }

            //armar tabla
            $cabesa = "<tr>
            
               <th>Codigo</th>
              <th>Nombre</th>
              <th>Inicia</th>
              <th>Finaliza</th>
              <th>Valor Hora</th>

            </tr>";


            $result = array('cod'=> 1, 'cabesa'=>$cabesa, 'cuerpo'=>$cuerpo);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos: ');
        }

        echo json_encode($result);
	}

	


}