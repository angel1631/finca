<?php
//require_once("iusuario.php");

//include(URL."clases/iusuario.php");



//bussines logic
class usuario_Imp implements iUsuario{
	private  $dao;

	private $nombre;

	

	public function save(IORM $orm){
		$dao = $orm;
		
				$values = json_decode($_POST['values']);

			//$result = array('cod'=>1, 'msj'=>$values->nombre);
		//	$fecha = new DateTime();
		//	echo $fecha->getTimestamp();
			

			$data = array(
			'id'=>'',
			'nombre'=>$values->nombre,
			'apellido'=>$values->apellido,
			'estado'=>1,
			'ingreso'=>'',
			'tipo'=>$values->puesto,
			'jornada'=>$values->jornada);

			if(isset($dao)){
					$dao->populateFromRow($data);
				$result = $dao->save();
				echo json_encode($result);
			}
			else{
				$result = array('msj' => 'corrio');
			echo json_encode($result);

			}

		
			


	}	

	public function setVariable($name, $var){
		$nombre = $var;
		echo $nombre;
	}
	public function getVariable($name){

		echo $nombre;

	}

	public function guardar(){
		$values = json_decode($_POST['values']);

		//$result = array('cod'=>1, 'msj'=>$values->nombre);
	//	$fecha = new DateTime();
	//	echo $fecha->getTimestamp();
		

		$data = array(
			'id'=>'',
			'nombre'=>$values->nombre,
			'apellido'=>$values->apellido,
			'estado'=>1,
			'ingreso'=>'',
			'tipo'=>$values->puesto,
			'jornada'=>$values->jornada);

		$usuario = new usuario_model($data);

		$result = $usuario->save();

		echo json_encode($result);
	}


	public function puestos(){
		//puestos_model::all;
		$option = "";

		$puesto =  puesto_model::all();
         if ($puesto) {
          
            foreach ($puesto as $index => $puesto) {
               
                $option = $option."<option value='".$puesto->id."'>".$puesto->titulo."</option>";
            }
            $result = $option;
        }
        else {
            $result = array('error' => true, 'mensaje' => 'No hay poblaciones para esa provincia');
        }

        echo $result;
	}

	public function jornadas(){
		$option = "";

		$jornada =  jornada_model::all();
         if ($jornada) {
            $poblaciones = null;
            foreach ($jornada as $index => $jornada) {
                $poblaciones[] = array(
                    'id' => $jornada->id,
                    'titulo' => $jornada->titulo,
                    'incremento_valor_hora' =>$jornada->incremento_valor_hora
                );

                $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }
            $result = $option;
        }
        else {
            $result = array('error' => true, 'mensaje' => 'No hay poblaciones para esa provincia');
        }

        echo $result;

	}


	public function qr(){
		//include 'generarQR/index.php';

		//$tengo = generar();
		//echo $tengo;
		 
    echo "<h1>Crear Codigo QR</h1><hr/>";
    //echo $SERVER['root'];
    
    //set it to writable location, a place for temp generated PNG files
   $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
//    $PNG_TEMP_DIR = dirname("localhost/generarqr/temp/").DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    //$PNG_TEMP_DIR
    //html PNG location prefix

  // $PNG_TEMP_DIR = URL."clases/temp";
   echo $PNG_TEMP_DIR;
   echo "<br/><br/>";
    $PNG_WEB_DIR = 'temp/';
    echo $PNG_WEB_DIR;

    //include "phpqrcode.php";  
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    //$filename = $PNG_TEMP_DIR.'test.png';
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


  /*  if (isset($_REQUEST['data'])) { 
    
        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('Este valor no puede estar vacio <a href="?">regresar</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
    
        //default data
      //  echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    */

        
         $filename = $PNG_TEMP_DIR.'test'.md5('149002223'.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
         QRcode::png('149002223', $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
    //display generated file
   // echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
    echo '<img src="clases/temp/'.basename($filename).'" /><hr/>';  
	}



	public function marcaje(){
		$values = json_decode($_POST['values']);
		$s = "";
		$tipo=0;
		foreach($values as $v){
			$s = $s.$v->usuario;
			if($v->entrada == '1' ){
				$tipo = 1;
			}
			else{
				$tipo = 2;
			}

			$data = array(
				'id'=>'',
				'usuario'=>$v->usuario,
				'tipo'=>$tipo,
				'momento'=>$v->hora,
				'estado'=>1);



			$marcaje = new marcaje_model($data);

			$result = $marcaje->save();

		}

		//$result = array('cod'=>1, 'msj'=>"ya a");

		echo json_encode($result);
	}

	/*public function setVariable($name, $var){
		$this->$name = $var;
		echo "ok";
	}
	public function getVariable($name){

		echo $this->$name;

	}*/


	public function buscar(IORM $orm){
		$dao = $orm;
		
		$values = json_decode($_POST['values']);

		$nombre = $values->nombre;//el dato para buscar 
		$clave = $values->clave;//si es nombre o clave

		if($clave == 1){//vienen por nombre 
			$usuarios =  usuario_model::like('nombre', $nombre);
		}
		else{//por codigo
			//$usuarios = usuario_model::where('id', $nombre);
			$usuarios = usuario_model::like('id', $nombre);

		}

	
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
            }
            $result = array('cod'=> 1, 'datos'=>$usuario);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay poblaciones para esa provincia'.$nombre);
        }


		echo json_encode($result);


	}

	public function buscar_id(IORM $orm){
		$dao = $orm;
		
		$values = json_decode($_POST['values']);

		
			$usuarios = usuario_model::where('id', $values->clave);
			//$usuarios = usuario_model::like('id', $nombre);

	
         if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                $usuario[] = array(
                    'id' => $user->id,
                    'nombre' => $user->nombre,
                    'apellido' =>$user->apellido,
                    'puesto' =>$user->obj_tipo->id,
                    'salario' =>$user->obj_tipo->salario,
                    'ingreso'=>$user->ingreso,
                    'jornada' =>$user->obj_jornada->id

                );

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }
            $result = array('cod'=> 1, 'datos'=>$usuario);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos para el id: '.$nombre);
        }


		echo json_encode($result);

	}

	public function actualizar(IORM $orm){
		$dao = $orm;
		$values = json_decode($_POST['values']);

		$data = array(
			'id'=>$values->id,
			'nombre'=>$values->nombre,
			'apellido'=>$values->apellido,
			'estado'=>1,
			'ingreso'=>$values->ingreso,
			'tipo'=>$values->puesto,
			'jornada'=>$values->jornada);

		$usuario = new usuario_model($data);
		$result = $usuario->save();
		echo json_encode($result);

		/*
		$data = array(
			'id'=>'',
			'titulo'=>$values->nombre,
			'valor_hora'=>$values->hora,
			'salario'=>$values->salario,
			'estado'=>1);

		$puesto = new puesto_model($data);

		$result = $puesto->save();

		echo json_encode($result);*/


	}

	public function reporte_fecha(IORM $orm){
		//between
		$dao = $orm;
		$values = json_decode($_POST['values']);
		$usuarios = usuario_model::between('ingreso', $values->inicio, $values->fin);
		$cuerpo = '';
//$result = array('cod'=> 1, 'msj'=>'vamos');
		if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                
                	$cuerpo= $cuerpo."<tr>";
                	//$cuerpo = $cuerpo. "<td>".$p->obj_usuario->nombre."</td>";
                    $cuerpo= $cuerpo."<td><a href='#' onclick='GenerarQR(".$user->id.");'>".$user->id."</a></td>";
                    $cuerpo= $cuerpo."<td>".$user->nombre."</td>";
                    $cuerpo= $cuerpo."<td>".$user->apellido."</td>";
                    $cuerpo= $cuerpo."<td>".$user->obj_tipo->titulo."</td>";
                    $cuerpo= $cuerpo."<td>".$user->obj_tipo->salario."</td>";
                    $cuerpo= $cuerpo."<td>".$user->obj_jornada->titulo."</td>";
                    $cuerpo= $cuerpo."<td>".$user->ingreso."</td>";
                    $cuerpo= $cuerpo."</tr>";                 
                   

                

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }

            //armar tabla
            $cabesa = "<tr>
            
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Puesto</th>
              <th>Salario</th>
              <th>Jornada</th>
              <th>Ingreso</th>

            </tr>";


            $result = array('cod'=> 1, 'cabesa'=>$cabesa, 'cuerpo'=>$cuerpo);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos para el id: ');
        }

        echo json_encode($result);
	}

	public function reporte_jornada(IORM $orm){

			//between
		$dao = $orm;
		$values = json_decode($_POST['values']);
		$usuarios = usuario_model::where("jornada", $values->jornada);
		$cuerpo = '';
		$jornada = '';
//$result = array('cod'=> 1, 'msj'=>'vamos');
		if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                
                	$cuerpo= $cuerpo."<tr>";
                	//$cuerpo = $cuerpo. "<td>".$p->obj_usuario->nombre."</td>";
                    $cuerpo= $cuerpo."<td><a href='#' onclick='GenerarQR(".$user->id.");'>".$user->id."</a></td>";
                    $cuerpo= $cuerpo."<td>".$user->nombre."</td>";
                    $cuerpo= $cuerpo."<td>".$user->apellido."</td>";
                    $cuerpo= $cuerpo."<td>".$user->obj_tipo->titulo."</td>";
                    $cuerpo= $cuerpo."<td>".$user->obj_tipo->salario."</td>";
                    $cuerpo= $cuerpo."<td>".$user->obj_jornada->titulo."</td>";
                    $cuerpo= $cuerpo."<td>".$user->ingreso."</td>";
                    $cuerpo= $cuerpo."</tr>";                 
                   	$jornada = $user->obj_jornada->titulo;

                

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }

            //armar tabla
            $cabesa = "<tr>
            
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Puesto</th>
              <th>Salario</th>
              <th>Jornada</th>
              <th>Ingreso</th>

            </tr>";


            $result = array('cod'=> 1, 'cabesa'=>$cabesa, 'cuerpo'=>$cuerpo, 'jornada'=>$jornada);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos para el id: ');
        }

        echo json_encode($result);

	}

	public function reporte_puesto(IORM $orm){
		$dao = $orm;
		$values = json_decode($_POST['values']);
		$usuarios = usuario_model::where("tipo", $values->puesto);
		$cuerpo = '';
		$puesto = '';
//$result = array('cod'=> 1, 'msj'=>'vamos');
		if ($usuarios) {
            $usuario = null;
            foreach ($usuarios as $index => $user) {
                
                	$cuerpo= $cuerpo."<tr>";
                	//$cuerpo = $cuerpo. "<td>".$p->obj_usuario->nombre."</td>";
                    $cuerpo= $cuerpo."<td><a href='#' onclick='GenerarQR(".$user->id.");'>".$user->id."</a></td>";
                    $cuerpo= $cuerpo."<td>".$user->nombre."</td>";
                    $cuerpo= $cuerpo."<td>".$user->apellido."</td>";
                    $cuerpo= $cuerpo."<td>".$user->obj_tipo->titulo."</td>";
                    $cuerpo= $cuerpo."<td>".$user->obj_tipo->salario."</td>";
                    $cuerpo= $cuerpo."<td>".$user->obj_jornada->titulo."</td>";
                    $cuerpo= $cuerpo."<td>".$user->ingreso."</td>";
                    $cuerpo= $cuerpo."</tr>";                 
                   	$puesto = $user->obj_tipo->titulo;

                

               // $option = $option."<option value='".$jornada->id."'>".$jornada->titulo."</option>";
            }

            //armar tabla
            $cabesa = "<tr>
            
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Puesto</th>
              <th>Salario</th>
              <th>Jornada</th>
              <th>Ingreso</th>

            </tr>";


            $result = array('cod'=> 1, 'cabesa'=>$cabesa, 'cuerpo'=>$cuerpo, 'puesto'=>$puesto);
        }
        else {
            $result = array('cod' => 0, 'mensaje' => 'No hay datos: ');
        }

        echo json_encode($result);

	}


}