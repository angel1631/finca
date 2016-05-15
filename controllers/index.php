<?php

class Index extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		
	}

	function index(){
		$this->view->title = 'Home';
		$this->view->render('header');
		//echo Hash::create('sha256', 'jesse', HASH_PASSWORD_KEY);
		$this->view->render('index/index');
		$this->view->render('footer');
	}

	
}