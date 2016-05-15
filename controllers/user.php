<?php

class User extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		//Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		$this->view->js = array('user/js/default.js');

	}

	function index(){
		$this->view->title = 'Usuario';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('user/index');
		$this->view->render('footer');
	}

	function guardar(){
		$this->model->save();
	}

	

}