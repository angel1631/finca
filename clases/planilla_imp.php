<?php

//bussines logic
class planilla_Imp implements iPlanilla{

	private $nombre;

	/*		$values = json_decode($_POST['values']);

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

		echo json_encode($result);*/
public function generar(){
	  ;
       $values = json_decode($_POST['values']);
        
        //recibo el nombre de la planilla y el tipo de puesto al que le voy a generar 
        $nombre = $values->nombre;
        $tipo = $values->puesto;

        //1)
        //crear planilla
        $data = array(
            'id'=>'',
            'titulo'=>$nombre,
            'momento'=>'',
            'autorizo'=>'Javier',
            'estado'=>1);


        $planilla = new planilla_model($data);

        $result = $planilla->save();
        $id_planilla = $result['ingreso'];
      //  $result = array('cod' => 1, 'msj' => $id_planilla);
	 // echo json_encode($result);

        //tengo que ri ir por todos los trabajadores y hacer el pago correspondiente
        //ver que el tipo sea o  no jornalero
        $puesto  = puesto_model::where('id', $tipo);
        $trabajador = usuario_model::where('tipo', $tipo);

         if ($puesto) {
            $puestos = null;
            foreach ($puesto as $index => $puesto) {
                $puestos[] = array(
                    'id' => $puesto->id,
                    'titulo' => $puesto->titulo,
                    'valor_hora' =>$puesto->valor_hora,
                    'salario'=>$puesto->salario,
                    'estado'=>$puesto->estado
                );

               // $option = $option."<option value='".$puesto->id."'>".$puesto->titulo."</option>";
            }
            if($puestos[0]['titulo'] == 'jornalero'){
                //si es jornalero este tipo de pago
                
                foreach ($trabajador as $index => $t) {
                        # code...
                ///ir por las horas del trabajador
                    //antes de ir por las horas, verificar lo del mes 
                    $mes =$values->mes;
                    $mes2 = $mes++;
                    $anio = $values->anio;
                    $h =  usuario_model::horas($t->id, $mes, $mes2, $anio);
                    $horas= $h[0]['horas'];
                    $valor = $t->obj_tipo->valor_hora;
                    $m = $horas*$valor;
                    //$monto = (50*27);
                 //   $monto = number_format($m, 2, '.', '');
                        //cada trabajador que tenga estado 1 ir a traer sus datos salario y eso 
                        $data = array(
                            'id'=>'',
                            'planilla'=>$id_planilla,
                            'usuario'=>$t->id,
                            'monto'=>$m,
                            'creado'=>'',
                            'creador'=>'j',
                            'estado'=>1);




                        $planillad = new descripcion_planilla_model($data);

                        $result = $planillad->save();

                        //echo json_encode($result);
                    }//for each jornalero
                }//si no es jornalero
                else{
                //pago a demas trabajadores sin goce de extras
                    if($trabajador){
                        foreach ($trabajador as $index => $t) {
                            # code...
                            //$monto =number_format($t->obj_tipo->salario, 2, '.', '');
                            //cada trabajador que tenga estado 1 ir a traer sus datos salario y eso 
                            $data = array(
                                'id'=>'',
                                'planilla'=>$id_planilla,
                                'usuario'=>$t->id,
                                'monto'=>$t->obj_tipo->salario,
                                'creado'=>'',
                                'creador'=>'j',
                                'estado'=>1);


                            $planillad = new descripcion_planilla_model($data);

                            $result = $planillad->save();

                            //echo json_encode($result);
                        }
                    }

                }

                $result = array('cod' => 1, 'msj' => 'generada con exito');
            }//si no existe el puesto
            else {
                $result = array('cod' => 2, 'mensaje' => 'intente mas tarde');
            }
        
           // $result = array('cod' => 1, 'msj' => 'generada con exito');

			echo json_encode($result);

        


        }
        





	public function puestos(){
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


    public function getplanillas(){
        /*$option = "";

        $planilla =  planilla_model::all();
         if ($planilla) {
          
            foreach ($planilla as $index => $planilla) {
               
                $option = $option."<option value='".$planilla->id."'>".$planilla->titulo."</option>";
            }
            $result = $option;
        }
        else {
            $result = array('error' => true, 'mensaje' => 'No hay poblaciones para esa provincia');
        }*/

        $option = "<option>javier</option>";
        echo $option;
    }


    public function prueba(){
        

         $values = json_decode($_POST['values']);

         $mes = $values->mes;
         $mes2 = $mes++;
         $anio = $values->anio;
         $h =  usuario_model::horas('19940810', $mes, $mes2, $anio);
        // $horas= $h[0]['horas'];
         $result = array('cod' => 2, 'mensaje' => $h);
         echo json_encode($result);

    }

	


}