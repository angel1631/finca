<!doctype html>
<html>
<head>
	<title><?=(isset($this->title)) ? $this->title : 'Finca'  ?> </title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/sunny/jquery-ui.css"/>

	

	
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>


	<meta name="viewport" content="width=device-width">
	


	<?php
		if (isset($this->js)){
			foreach ($this->js as $js) {
				//le mando que busque su javascript de la vista (para el dashboard en js = dashboard/js/default.js)
				echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
			}
			
		}

	?>

</head>
<body>
	<header>
			<div id="sintio_principal">
				
			</div>
			<div id="sintio_menu_titulo">
				<div class="invoca-menu"><img src="http://solucionclic.com/apariencia/boton_menu_blanco.png"></div>
				<nav>
					<a href="<?php echo URL; ?>index"><div class="contenedor_opcion_principal">
						<li> Inicio </li>
					</div></a>
					<a href="<?php echo URL; ?>help"><div class="contenedor_opcion_principal">
						<li> Ayuda </li>
					</div></a>
					<a href="<?php echo URL; ?>usuario"><div class="contenedor_opcion_principal">
						<li> Usuario </li>
					</div></a>
					<a href="<?php echo URL; ?>puesto"><div class="contenedor_opcion_principal">
						<li> Puesto </li>
					</div></a>
					<a href="<?php echo URL; ?>jornada"><div class="contenedor_opcion_principal">
						<li> Jornada </li>
					</div></a>
					<a href="<?php echo URL; ?>planilla"><div class="contenedor_opcion_principal">
						<li> Planilla </li>
					</div></a>
					<a href="<?php echo URL; ?>key"><div class="contenedor_opcion_principal">
						<li> Sync_Key </li>
					</div></a>
					
					
				</nav>
				<div id="contenedor_titulo_pagina">Sistema Finca</div>	
			</div>
			
				<!--<input type="text" name="text-search" placeholder="Que deseas buscar..."><input type="submit" id="button-search" value="Buscar"></form>-->
			</div>
		
		</header>

	<?php Session::init(); ?>
	<div id="header">
		
		<?php if(Session::get('loggedIn') == false):?>
		



		<?php endif;?>
		<!--aqi deberia cargar el menu dinamico y comprobar accesos?-->
		<?php if(Session::get('loggedIn') == true):?>
		<a href="<?php echo URL;?>dashboard">Dashboard</a>
		<a href="<?php echo URL;?>note">Notes</a>
			<!--aqui v lo de los roles-->
			<?php if(Session::get('role') == 'owner'):?>
			<a href="<?php echo URL;?>user">Usuario</a>
			<?php endif;?>
		
		
		<!--<a href="<?php echo URL;?>dashboard/logout">Logout</a>-->
		<?php else:?>
		<!--<a href="<?php echo URL; ?>login">login</a>-->
		<?php endif; ?>
	</div>

	<div id="content">
