<?php


class Usuario extends Controller{
	

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		//Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		$this->view->js = array('usuario/js/default.js');

	}

	function index(){
		$this->view->title = 'Usuario';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('usuario/index');

		$this->view->render('footer');
		//$this->result = $this->Bl->jornadas();

	
	}

	

	
	function prueba(){
		//$values = json_decode($_POST['values']);
		//echo json_encode($values->nombre);
		$this->Bl->save(new usuario_orm);
		//$this->Bl->save(Factory::getDep("usuario", $DaoPath='models/orm/'));
	//	$this->Bl = Factory::getImp($name, $BlPath='clases/');
		//etDep($name, $DaoPath = 'models/orm/')
	}
	

	function guardar(){
		$this->Bl->guardar();
	}

	function puestos(){
		$this->Bl->puestos();
	}

	function jornadas(){
		$this->Bl->jornadas();
	}

	function qr(){
		$this->Bl->qr();
	}

	function marcaje(){
		$this->Bl->marcaje();
	}

	function buscar(){
		$this->Bl->buscar(new usuario_orm);
	}

	function buscar_id(){
		$this->Bl->buscar_id(new usuario_orm);
	}

	function actualizar(){
		$this->Bl->actualizar(new usuario_orm);
	}

	function reporte_fecha(){
		$this->Bl->reporte_fecha(new usuario_orm);
	}
	
	function reporte_jornada(){
		$this->Bl->reporte_jornada(new usuario_orm);

	}

	function reporte_puesto(){
		$this->Bl->reporte_puesto(new usuario_orm);
	}

	

}