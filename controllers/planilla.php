<?php

class Planilla extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		//Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		$this->view->js = array('planilla/js/default.js');

	}

	function index(){
		$this->view->title = 'Planilla';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('planilla/index');
		$this->view->render('footer');
	}

	function getplanillas(){
		//$this->view->js = array('planilla/js/reporte.js');
		$this->Bl->getplanillas();

	}
	

	function reporte(){
		//$this->view->title = 'Planilla';
		//$this->view->render('header');
		//vista carpeta/archivo
		//$this->view->render('planilla/reporte');
		//$this->view->render('footer');
	}

	function generar(){
		$this->Bl->generar();
	}

	function puestos(){
		$this->Bl->puestos();
	}

	function prueba(){
		$this->Bl->prueba();

	}

	
	

}