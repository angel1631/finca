<?php
//require_once("iusuario.php");
//include(URL."clases/iusuario.php");
//bussines logic
class key_Imp implements iKey{

	/*public static function like_tipo($field, $value){
			$obj = null;
			self::getConnection();
			$query = "SELECT * FROM ".static:: $table." where ". $field." like '%".$value."%' and tipo = 10";
			$results = self::$database->execute($query, null, array($value));
			if($results){
				$class = get_called_class();
				for($i = 0; $i<sizeof($results); $i++){
					$obj[] = new $class($results[$i]);
				}
			}
			return $obj;
			//return $query;
		}*/

	public function generar(){
		//mando el id para poder hacer el insert 
		$values = json_decode($_POST['values']);
		
		

		$usuarios =  usuario_model::where('id', $values->clave);
		$id_usuario = '';
		$nombre_usuario = '';
		
		if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                
            	$nombre_usuario = $user->nombre;
                $id_usuario = $user->id;
               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }
           // $result = array('cod'=> 1, 'datos'=>$usuario);

        }
        else {
           // $result = array('cod' => 0, 'mensaje' => 'No hay poblaciones para esa provincia'.$nombre);
        }

        
        //key =  ;
        $key = substr(md5($nombre_usuario), 0, 5);
       
		$data = array(
			'id'=>'',
			'usuario'=>$id_usuario,
			'key'=>$key,
			'estado'=>1);
/*$data = array(
			'id'=>'',
			'nombre'=>$values->nombre,
			'apellido'=>$values->apellido,
			'estado'=>1,
			'ingreso'=>'',
			'tipo'=>$values->puesto,
			'jornada'=>$values->jornada);

		$usuario = new usuario_model($data);

		$result = $usuario->save();*/
		//$result = array('cod'=> 1, 'key' => "va".$id_usuario);
		$usuario = new key_model($data);
		
		$result = $usuario->save();

		$result = array('cod'=> 1, 'key' => $key);
		echo json_encode($result);
//$result = array('cod'=> 0, 'msj' => 'Ha ocurrido un error, porfavor intentar en un momento');
		//key_model::save();
	}

	public function buscar(){
		//$dao = $orm;
		
		$values = json_decode($_POST['values']);
		$nombre = $values->nombre;//el dato para buscar 
		$clave = $values->clave;//si es nombre o clave
		if($clave == 1){//vienen por nombre 
			$usuarios =  usuario_model::like_tipo('nombre', $nombre);
		}
		else{//por codigo
			//$usuarios = usuario_model::where('id', $nombre);
			$usuarios = usuario_model::like_tipo('id', $nombre);
		}

		//$result = array('cod'=> 1, 'msj'=>"va");
		$va = "";
         if ($usuarios) {	
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                $usuario[] = array(
                    'id' => $user->id,
                    'nombre' => $user->nombre,
                    'apellido' =>$user->apellido
                    //'puesto' =>$user->obj_tipo->titulo
                );
               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            	$va = $user->nombre;
            }
            $result = array('cod'=> 1, 'datos'=>$usuario);
            
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay poblaciones para esa provincia'.$nombre);
        }
        //$result = array('cod'=> 1, 'msj'=>"va ".$nombre);
		echo json_encode($result);
	}

	
	
	
	
}