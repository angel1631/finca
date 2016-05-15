<?php

class Marcaje extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		//Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		//$this->view->js = array('jornada/js/default.js');

	}

	function index(){
	/*	$this->view->title = 'Jornada';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('jornada/index');
		$this->view->render('footer');*/
	}

	

	

	function guardar(){
		$this->Bl->guardar();
	}


	
	

}