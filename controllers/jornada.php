<?php

class Jornada extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		//Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		$this->view->js = array('jornada/js/default.js');

	}

	function index(){
		$this->view->title = 'Jornada';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('jornada/index');
		$this->view->render('footer');
	}

	

	

	function guardar(){
		$this->Bl->guardar();
	}

	function buscar(){
		$this->Bl->buscar();
	}

	function buscar_id(){
		$this->Bl->buscar_id();
	}

	function actualizar(){
		$this->Bl->actualizar();
	}

	function reporte_activo(){
		$this->Bl->reporte_activo();
	}

	function reporte_NoActivo(){
		$this->Bl->reporte_NoActivo();
	}
	

}