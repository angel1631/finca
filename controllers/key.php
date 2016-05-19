<?php
class Key extends Controller{
	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		Auth::handleLogin();
		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		$this->view->js = array('key/js/default.js');
	}
	function index(){
		$this->view->title = 'Key';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('key/index');
		$this->view->render('footer');
	}
	

	function generar(){
		$this->Bl->generar();
	}
	
	function buscar(){
		$this->Bl->buscar();
	}
	
}