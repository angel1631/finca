<?php

class Factory implements iAbstractFactory{

	public static function getModelInstance($name, $BlPath = 'clases/'){
			$path = $BlPath.$name.'_imp.php';

		if(file_exists($path)){
			require $BlPath.$name.'_imp.php';
			$BlName = $name.'_Imp';
			$Bl = new $BlName();
			
			return $Bl;
			//aqui va el mando a llamar el $this->factory =  factoryproducer.getfactory("modelname")
			//y lo guardaro en $this->model =$this->factory.getShape("circle") ;
			//)
		}
		//para usarla seria algo como Factory::getInstance($name, $modelPath)

		/*	public function loadModel($name, $modelPath = 'models/'){
		$path = $modelPath.$name.'_imp.php';

		if(file_exists($path)){
			require $modelPath.$name.'_imp.php';
			$modelName = $name.'_Imp';
			$this->model = new $modelName();
			//aqui va el mando a llamar el $this->factory =  factoryproducer.getfactory("modelname")
			//y lo guardaro en $this->model =$this->factory.getShape("circle") ;
			//)
		}
	}*/
	}

	public static function getImp($name, $BlPath = 'clases/'){
		$path = $BlPath.$name.'_imp.php';

		if(file_exists($path)){
			require $BlPath.$name.'_imp.php';
			$BlName = $name.'_Imp';
			$Bl = new $BlName();
			
			return $Bl;
			//aqui va el mando a llamar el $this->factory =  factoryproducer.getfactory("modelname")
			//y lo guardaro en $this->model =$this->factory.getShape("circle") ;
			//)
		}

	}

	public static function getDep($name, $DaoPath = 'models/orm/'){
		$path = $DaoPath.$name.'_orm.php';

		if(file_exists($path)){
			require $DaoPath.$name.'_orm.php';
			$daoName = new $name."_orm";
			$dao = new $daoName();
			
			return $dao;
			//aqui va el mando a llamar el $this->factory =  factoryproducer.getfactory("modelname")
			//y lo guardaro en $this->model =$this->factory.getShape("circle") ;
			//)
		}

		

	}
	
}