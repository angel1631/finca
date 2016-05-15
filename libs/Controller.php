<?php


class Controller{


	function __construct(){
		//echo "Main Controller<br>";
		//en el controller principal tenemos el objeto de la vista
		$this->view = new View();

		//que llame automaticamente la implementacion -eso es inyeccion de dependencias

		//llamo la interfaz y ella automaticamente llama la implementacion correcta.

		//relaciono, entonces cuando le pido interfaz iabstractfactory me duvuelve su implementacion que es factory
		//si pido  interfaz automovil me devuelve la implementacion mazda 





	}

	public function loadModel($name, $BlPath = 'clases/'){
	/*	$path = $modelPath.$name.'_imp.php';

		if(file_exists($path)){
			require $modelPath.$name.'_imp.php';
			$modelName = $name.'_Imp';*/
		//	$this->model = new $modelName();

			//asi tiene que quedar, factroy de clase iabstract y mandar a llamar de ahi 

			//iAbstractFactory  $factory =  new Factory();
			//para que funcione la inyeccion de dependencias que no reciba parametros 
			//$this->model = $factory->getModelInstance($name, $modelPath='models/');



			//llamar a ifactory
			//$this->Bl = Factory::getModelInstance($name, $BlPath='clases/');
			$this->Bl = Factory::getImp($name, $BlPath='clases/');

		//	$model, $provider mandar el modelo que quiero y el provider que quiero .



			//aqui va el mando a llamar el $this->factory =  factoryproducer.getfactory("modelname")
			//y lo guardaro en $this->model =$this->factory.getShape("circle") ;
			//)
		//}
	}
}