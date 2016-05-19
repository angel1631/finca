<?php

require 'config.php';
require 'util/Auth.php';

require_once("clases/iusuario.php");
require_once("clases/ipuesto.php");
require_once("clases/ijornada.php");
require_once("clases/itmarcaje.php");
require_once("clases/imarcaje.php");
require_once("clases/iplanilla.php");
require_once("clases/ikey.php");
require_once("clases/ilogin.php");


require_once("models/orm/config.php");
require_once("models/orm/ORM.php");
require_once("models/orm/usuario_model.php");
require_once("models/orm/puesto_model.php");
require_once("models/orm/jornada_model.php");
require_once("models/orm/tmarcaje_model.php");
require_once("models/orm/marcaje_model.php");
require_once("models/orm/planilla_model.php");
require_once("models/orm/descripcion_planilla_model.php");
require_once("models/orm/IORM.php");
require_once("models/orm/ORM_imp.php");
require_once("models/orm/usuario_orm.php");
require_once("generarQR/phpqrcode.php");
require_once("models/orm/marcaje_model.php");
require_once("models/orm/key_model.php");
require_once("models/orm/login_model.php");


//require_once("clases/usuario_imp.php");


//require_once("Factory.php");



//use an autoloader

//there is also spl_autoload_register (take a look at if if you like)
/*
	we are going to load a class when its called, we loaded automatic
*/

function __autoload($class){
require LIBS.$class.".php";
}




/*require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';

//Library
require 'libs/Database.php';
require 'Libs/Session.php';
require 'Libs/Hash.php';
quitar estas
*/



$bootstrap = new Bootstrap();

//optional settings
//$bootstrap->setDefaulControllerPath('c')
/*setModelPath
setErrorFile($path)
setDefaultFile($path)*/
$bootstrap->init();



